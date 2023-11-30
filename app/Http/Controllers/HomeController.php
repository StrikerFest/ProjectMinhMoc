<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Order as LivewireOrder;
use Illuminate\Http\Request;
use App\Models\product_catergory;
use App\Models\product;
use App\Models\customer;
use App\Models\order;
use App\Models\orders_details;
use App\Models\address;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use \Kjmtrue\VietnamZone\Models\Province;
use \Kjmtrue\VietnamZone\Models\District;
use \Kjmtrue\VietnamZone\Models\Ward;
use App\Mail\order as orderMail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    // ==========================================
    // |                 CUSTOMER               |
    // ==========================================

    // Đăng ký khách hàng
    public function registerCustomer(Request $request)
    {

        // validate
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:6',
            'phone' => 'required|min:10|max:11'
        ]);
        $customer = new customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = hash('md5', $request->password);
        $customer->phone = $request->phone;
        $customer->save();
        return redirect()->back()->with('success', 'Đăng ký thành công!');
    }

    // Đăng nhập khách hàng
    public function loginCustomer(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $customer = customer::where('email', $request->email)->where('password', hash('md5', $request->password))->first();
        if ($customer) {
            session()->put('customer', $customer);

            // Trở về trang chủ
            return redirect("")->with('success', 'Đăng nhập thành công!');
        } else {
            return redirect()->back()->with('error', 'Email hoặc mật khẩu sai!');
        }
    }

    // Đăng xuất khách hàng
    public function logoutCustomer()
    {
        Session::forget('customer');
        session()->forget('customer');
        return redirect("")->with('success', 'Đăng xuất thành công !');
    }

    // Index - Homepage
    public function index()
    {
        // Lấy 6 sản phẩm (trạng thái đang bán)
        $productLastest = product::where('Is_Active', 0)->orderBy('id', 'desc')->take(6)->get();

        // Lấy 4 sản phẩm (trạng thái đang bán)
        $productLastest2 = product::where('Is_Active', 0)->orderBy('id', 'desc')->take(4)->get();
        return view('customer.home', ['productLastest' => $productLastest], ['productLastest2' => $productLastest2]);
    }

    // ==========================================
    // |                 PRODUCT               |
    // ==========================================

    // Trang chi tiết một sản phẩm
    public function singleProduct($id)
    {
        $product = product::find($id);

        // Lấy thể loại theo mã
        $category = product_catergory::find($product->id_category);

        // Lấy 6 sản phẩm theo mã thể loại trừ sản phẩm hiện tại
        $productByCategory = product::where('id_category', $category->id)->where('id', '<>', $product->id)->Where('Is_Active', 0)->take(6)->get();

        // Đếm comment
        $count = DB::table('comments')->where('id_product', $id)->count();

        return view('customer.single', ['product' => $product], ['productByCategory' => $productByCategory, 'count' => $count]);
    }

    // Thêm vào giỏ hàng
    public function addToCart($id)
    {
        $product = product::find($id);
        if (!$product) {
            abort(404);
        }
        $cart = session()->get('cart', []);

        // Nếu sản phẩm đã tồn tại trong giỏ hàng
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->export_price,
                "image" => $product->image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Sản phẩm thêm vào giỏ hàng thành công!');
    }

    // Lấy tất cả sản phẩm theo mã thể loại
    public function allProduct($id)
    {
        $product = Product::where('id_category', $id)->Where('Is_Active', 0)->paginate(12);
        return view('customer.allproduct', ['product' => $product]);
    }

    // ==========================================
    // |                 ORDER                 |
    // ==========================================

    // Đặt hàng
    public function order(Request $request)
    {
        // Validate thông tin khách hàng
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:10|max:11',
            'address' => 'required',
            'province' => 'required',
            'district' => 'required',
            'ward' => 'required',
        ]);

        // Tạo session lưu thông tin và địa chỉ khách hàng
        session(['name' => $request->name]);
        session(['email' => $request->email]);
        session(['phone' => $request->phone]);
        session(['province' => $request->province]);
        session(['district' => $request->district]);
        session(['ward' => $request->ward]);
        session(['address' => $request->address]);

        // Hình thức thanh toán MOMO
        if ($request->payment_method == 1) {

            // Lấy tổng giá trị sản phẩm
            $Total_selling_price = 0;
            $cart = session()->get('cart');
            foreach ($cart as $key => $value) {
                $Total_selling_price += $value['price'] * $value['quantity'];
            }

            // Thông tin MOMO
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua MoMo";
            $amount = $Total_selling_price + 20000;
            $orderId = time() . "";
            $redirectUrl = "http://127.0.0.1:8000/test";
            $ipnUrl = "http://127.0.0.1:8000/test";
            $extraData = "";
            $requestId = time() . "";
            $requestType = "payWithATM";
            //        $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );
            $result = $this->execPostRequest($endpoint, json_encode($data));

            $jsonResult = json_decode($result, true);  // decode json

            // Di chuyển đến trang thanh toán
            return redirect()->to($jsonResult['payUrl']);

        } else {
            // Thanh toán khi nhận hàng

            // Nếu session có thông tin khách hàng ( Khách có tài khoản )
            if (session()->has('customer')) {
                $customer = session()->get('customer');

                // Validate thông tin khách hàng
                $request->validate([
                    'name' => 'required',
                    'email' => 'required|email',
                    'phone' => 'required|min:10|max:11',
                    'province' => 'required',
                    'district' => 'required',
                    'ward' => 'required',
                    'address' => 'required',
                ]);

                // kiểm tra khách hàng đặt lần đầu hay không nếu đặt lần đầu thì thêm địa chỉ vào bảng address
                $customer = customer::find($customer->id);

                // Tạo đơn hàng
                $order = new order;
                $order->customer_id = $customer->id;
                $order->name = $request->name;
                $order->email = $request->email;
                $order->phone = $request->phone;
                $order->province = $request->province;
                $order->district = $request->district;
                $order->ward = $request->ward;
                $order->address = $request->address;
                $order->status = 0;
                $order->payment_method = 0;
                $order->save();

                $Total_selling_price = 0;

                // Lưu đơn chi tiết
                $cart = session()->get('cart');
                foreach ($cart as $key => $value) {
                    $order_detail = new orders_details;
                    $order_detail->order_id = $order->id;
                    $order_detail->product_id = $value['id'];
                    $order_detail->quantity = $value['quantity'];
                    $order_detail->price = $value['price'];
                    $Total_selling_price += $value['price'] * $value['quantity'];
                    $order_detail->save();
                }

                // Lưu tổng giá đơn hàng
                $order->Total_selling_price = $Total_selling_price + 20000;
                $order->save();

                // Gửi mail - Xóa cart
                $this->mail($order->id);
                session()->forget('cart');
                return view('customer.order.success', ['id' => $order->id]);
                // return redirect()->back()->with('success', 'Đặt hàng thành công!');
            }

            // Khách vãng lãi ( Khách chưa có tài khoản )
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|min:10|max:11',
                'address' => 'required',
                'province' => 'required',
                'district' => 'required',
                'ward' => 'required',
            ]);

            // Tạo đơn mới với thông tin khách vãng lai
            $order = new order;
            $order->customer_id = 0;
            $order->name = $request->name;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $Total_selling_price = 0;
            $order->province = $request->province;
            $order->district = $request->district;
            $order->ward = $request->ward;
            $order->address = $request->address;
            $order->status = 0;
            $order->payment_method = 0;
            $order->Total_selling_price = $Total_selling_price ;
            $order->save();

            // Lưu đơn chi tiết
            $cart = session()->get('cart');
            foreach ($cart as $key => $value) {
                $order_detail = new orders_details;
                $order_detail->order_id = $order->id;
                $order_detail->product_id = $value['id'];
                $order_detail->quantity = $value['quantity'];
                $order_detail->price = $value['price'];
                $Total_selling_price += $value['price'] * $value['quantity'];
                $order_detail->save();
            }

            // Lưu giá sản phẩm và giá ship
            $order = order::find($order->id);
            $order->Total_selling_price = $Total_selling_price + 20000;
            $this->mail($order->id);
            $order->save();

            session()->forget('cart');
            // return redirect()->back()->with('alert', 'Đặt hàng thành công!');
            return view('customer.order.success', ['id' => $order->id]);
        }
    }

    // Hàm gửi mail
    public function mail($id)
    {

        // Lấy thông tin sản phẩm chi tiết
        $order = order::where('id', $id)->first();
        $data = orders_details::leftJoin('product', 'orders_details.product_id', '=', 'product.id')
            ->select('orders_details.*', 'product.name as product_name')
            ->where('orders_details.order_id', $id)
            ->get();

        // Lấy email đơn hàng
        $email = order::where('id', $id)->first()->email;

        // Gửi mail
        Mail::to($email)->send(new orderMail($data));
        // return redirect()->back()->with('success', 'Gửi mail thành công!');
    }

    // test
    public function test(Request $request)
    {
        $data = $request->all();
        if ($data['resultCode'] == 0) {
            if (session()->has('customer')) {
                $customer = session()->get('customer');
                // kiểm tra khách hàng đặt lần đầu hay không nếu đặt lần đầu thì thêm địa chỉ vào bảng address
                $customer = customer::find($customer->id);

                $order = new order;
                $order->customer_id = $customer->id;
                $order->name = Session::get('name');
                $order->email = Session::get('email');
                $order->phone = Session::get('phone');
                $order->province = Session::get('province');
                $order->district = Session::get('district');
                $order->ward = Session::get('ward');
                $order->address = Session::get('address');
                session()->forget('province');
                session()->forget('district');
                session()->forget('ward');
                session()->forget('address');
                $order->status = 0;
                $order->payment_method = 1;
                $order->save();
                $Total_selling_price = 0;
                $cart = session()->get('cart');
                foreach ($cart as $key => $value) {
                    $order_detail = new orders_details;
                    $order_detail->order_id = $order->id;
                    $order_detail->product_id = $value['id'];
                    $order_detail->quantity = $value['quantity'];
                    $order_detail->price = $value['price'];
                    $Total_selling_price += $value['price'] * $value['quantity'];
                    $order_detail->save();
                }
                $order->Total_selling_price = $Total_selling_price + 20000;
                $order->save();
                $this->mail($order->id);
                session()->forget('cart');
                echo "<script>";
                echo "alert('hello');";
                echo "</script>";
                return redirect('/checkout')->with('alert', 'Đặt hàng thành công!');
            }
            //--------------------- order for customer not login ----------------------------------------------//
            $order = new order;
            $order->customer_id = 0;
            $order->name = Session::get('name');
            $order->email = Session::get('email');
            $order->phone = Session::get('phone');
            $Total_selling_price = 0;
            $order->province = Session::get('province');
            $order->district = Session::get('district');
            $order->ward = Session::get('ward');
            $order->address = Session::get('address');
            $order->status = 0;
            $order->payment_method = 1;
            $order->save();
            $cart = session()->get('cart');
            // foget session address
            session()->forget('province');
            session()->forget('district');
            session()->forget('ward');
            session()->forget('address');
            foreach ($cart as $key => $value) {
                $order_detail = new orders_details;
                $order_detail->order_id = $order->id;
                $order_detail->product_id = $value['id'];
                $order_detail->quantity = $value['quantity'];
                $order_detail->price = $value['price'];
                $Total_selling_price += $value['price'] * $value['quantity'];
                $order_detail->save();
            }
            // update total price and import price
            $order = order::find($order->id);
            $order->Total_selling_price = $Total_selling_price + 20000;
            $order->save();
            $this->mail($order->id);
            session()->forget('cart');
            echo "<script>";
            echo "alert('hello');";
            echo "</script>";
            return redirect('/checkout')->with('alert', 'Order successfully!');
        }
        return view('customer.checkout');
    }

    // Xử lý request MOMO
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    // ==========================================
    // |             ORDER DETAIL               |
    // ==========================================

    // Lấy tất cả đơn hàng
    public function allOrder()
    {
        // select order join customer fomat created_at M d, Y
        $order = order::leftJoin('customers', 'orders.customer_id', '=', 'customers.id')
            ->select('orders.*', 'customers.name as customer_name')
            ->orderBy('orders.id', 'desc')
            ->paginate(8);
        return view('admin.orders', ['order' => $order]);
    }

    // Chi tiết đơn hàng theo mã hóa đơn
    public function orderDetails($id)
    {

        // Lấy đơn - select order join customer fomat created_at M d, Y
        $order = order::leftJoin('customers', 'orders.customer_id', '=', 'customers.id')
            ->select('orders.*', 'customers.name as customer_name')
            ->where('orders.id', $id)
            ->first();

        // Lấy tỉnh thành quận theo mã trong hóa đơn
        $province = Province::find($order->province);
        $district = District::find($order->district);
        $ward = Ward::find($order->ward);

        // Lấy chi tiết hóa đơn theo mã hóa đơn
        $order_details = orders_details::leftJoin('product', 'orders_details.product_id', '=', 'product.id')
            ->select('orders_details.*', 'product.name as product_name')
            ->where('orders_details.order_id', $id)
            ->get();

        return view('admin.vieworderdetail', ['order' => $order,], ['order_details' => $order_details, 'province' => $province, 'district' => $district, 'ward' => $ward]);
    }

    // ==========================================
    // |            ORDER STATUS                |
    // ==========================================

    // Cập nhật hóa đơn
    public function updateStatusOrder(Request $request)
    {
        $order = order::find($request->id);
        $current_status = $order->Status;
        if ($current_status == 1) {

            // Lưu trạng thái hóa đơn
            $order->Status = 2;
            $order->save();

        } else {

            // Lưu trạng thái hóa đơn
            $order->Status = 1;
            $order->save();

            // Cập nhật số lượng kho hàng - join order_details and product to update quantity
            $order_details = orders_details::leftJoin('product', 'orders_details.product_id', '=', 'product.id')
                ->select('orders_details.*', 'product.name as product_name', 'product.quantity as product_quantity')
                ->where('orders_details.order_id', $request->id)
                ->get();
            foreach ($order_details as $value) {
                $product = product::find($value->product_id);
                $product->quantity = $product->quantity - $value->quantity;
                $product->save();
            }
        }

        return redirect()->back();
    }

    // Cập nhật trạng thái hủy hàng
    public function updateStatusOrderCancel(Request $request)
    {
        $order = order::find($request->id);
        $order->Status = 3;
        $order->save();
        return redirect('/allorder')->with('success', 'Cập nhật trạng thái thành công!');
    }

    // Filter đơn hàng để hiển thị
    public function filterOrder($id)
    {
        $order = order::leftJoin('customers', 'orders.customer_id', '=', 'customers.id')
            ->select('orders.*', 'customers.name as customer_name')
            ->where('orders.Status', $id)
            ->orderBy('orders.id', 'desc')
            ->paginate(8);

        return view('admin.orders', ['order' => $order]);
    }

    // Tìm đơn hàng
    public function searchOrder(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);
        $search = $request->search;
        $order = order::leftJoin('customers', 'orders.customer_id', '=', 'customers.id')
            ->select('orders.*', 'customers.name as customer_name')
            ->orWhere('orders.phone', 'like',  $search)
            ->orWhere('orders.email', 'like', $search)
            ->orderBy('orders.id', 'desc')
            ->paginate(8);
        return view('admin.orders', ['order' => $order]);
    }

    // ==========================================
    // |              MY ACCOUNT                |
    // ==========================================

    // Thông tin tài khoản khách hàng
    public function myAccount()
    {
        // Lấy mã khách hàng từ session
        $customer = session()->get('customer');

        if (!$customer) {
            return redirect('/loginCustomer')->with('error', 'Mời quý khách đăng nhập trước');
        }
        $customer_id = $customer->id;

        // Lấy thông tin khách hàng
        $customer = customer::find($customer_id);

        // Lấy đơn hàng theo mã khách hàng
        $order = order::where('customer_id', $customer_id)->orderBy('id', 'desc')->paginate(10);
        return view('customer.myacount', ['order' => $order, 'customer' => $customer]);
    }

    // ==========================================
    // |               DASHBOARD                |
    // ==========================================

    // statistical - thống kê thông số
    public function statistical()
    {
        $monthly_revenue = [];

        for($i = 1; $i <= 12; $i++){
            $monthly_revenue[] = order::where('status',2)
                ->whereYear('created_at', date('Y'))
                ->whereMonth('created_at', $i)
                ->sum('Total_selling_price');
        }

    // Tính doanh thu của các ngày trong tháng hiện tại và status = 2
    $month = date('m');
    $year = date('Y');

    $revenueByDay = Order::select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(Total_selling_price) as revenue'))
        ->whereMonth('created_at', $month)
        ->whereYear('created_at', $year)
        ->groupBy(DB::raw('DATE(created_at)'))
        ->get();

        return view('admin.statistical', ['monthly_revenue' => $monthly_revenue,'revenueByDay'=>$revenueByDay]);
    }

    public function monyear(request $request){

        $monthly_revenue = [];

        for($i = 1; $i <= 12; $i++){
            $monthly_revenue[] = order::where('status',2)
                ->whereYear('created_at', date('Y'))
                ->whereMonth('created_at', $i)
                ->sum('Total_selling_price');
        }

        $revenueByDay = Order::select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(Total_selling_price) as revenue'))
            ->whereMonth('created_at',$request->selectedMonth)
            ->whereYear('created_at', $request->selectedYear)
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();

        return view('admin.statistical', ['monthly_revenue'=>$monthly_revenue,'revenueByDay'=>$revenueByDay]);
    }
}
