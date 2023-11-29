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
    // registerCustomer
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
        return redirect()->back()->with('success', 'Register successfully!');
    }
    // loginCustomer
    public function loginCustomer(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $customer = customer::where('email', $request->email)->where('password', hash('md5', $request->password))->first();
        if ($customer) {
            session()->put('customer', $customer);
            // redirect to home
            return redirect("")->with('success', 'Login successfully!');
        } else {
            return redirect()->back()->with('error', 'Email or password is incorrect!');
        }
    }
    // logoutCustomer
    public function logoutCustomer()
    {
        Session::forget('customer');
        session()->forget('customer');
        return redirect("")->with('success', 'Logout successfully!');
    }
    // index
    public function index()
    {
        // get  6 product latest and Is_Active = 0
        $productLastest = product::where('Is_Active', 0)->orderBy('id', 'desc')->take(6)->get();
        // dd($productLastest);
        // get 4 product latest
        $productLastest2 = product::where('Is_Active', 0)->orderBy('id', 'desc')->take(4)->get();
        return view('customer.home', ['productLastest' => $productLastest], ['productLastest2' => $productLastest2]);
    }
    // product category

    // single product
    public function singleProduct($id)
    {
        $product = product::find($id);
        // get category by id
        $category = product_catergory::find($product->id_category);
        // get 6 product by category except product current
        $productByCategory = product::where('id_category', $category->id)->where('id', '<>', $product->id)->Where('Is_Active', 0)->take(6)->get();
        // count comment
        $count = DB::table('comments')->where('id_product', $id)->count();
        return view('customer.single', ['product' => $product], ['productByCategory' => $productByCategory, 'count' => $count]);
    }

    // add to cart
    public function addToCart($id)
    {
        $product = product::find($id);
        if (!$product) {
            abort(404);
        }
        $cart = session()->get('cart', []);
        // if product already exists in cart
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
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    // all product by category
    public function allProduct($id)
    {
        $product = Product::where('id_category', $id)->Where('Is_Active', 0)->paginate(12);
        return view('customer.allproduct', ['product' => $product]);
    }
    // order
    public function order(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:10|max:11',
            'address' => 'required',
            'province' => 'required',
            'district' => 'required',
            'ward' => 'required',
            'address' => 'required',
        ]);
        // start session save address and info customer
        session(['name' => $request->name]);
        session(['email' => $request->email]);
        session(['phone' => $request->phone]);
        session(['province' => $request->province]);
        session(['district' => $request->district]);
        session(['ward' => $request->ward]);
        session(['address' => $request->address]);

        if ($request->payment_method == 1) {
            $Total_selling_price = 0;
            $cart = session()->get('cart');
            foreach ($cart as $key => $value) {
                $Total_selling_price += $value['price'] * $value['quantity'];
            }
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

            //Just a example, please check more in there
            return redirect()->to($jsonResult['payUrl']);
        } else {
            if (session()->has('customer')) {
                $customer = session()->get('customer');
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
                $address = address::where('id_customer', $customer->id)->get();
                if (count($address) == 0) {
                    $address = new address;
                    $address->id_customer  = $customer->id;
                    $address->province  = $request->province;
                    $address->district  = $request->district;
                    $address->ward  = $request->ward;
                    $address->address  = $request->address;
                    $address->status  = 1;
                    $address->save();
                }
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
                return redirect()->back()->with('success', 'Order successfully!');
            }
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|min:10|max:11',
                'address' => 'required',
                'province' => 'required',
                'district' => 'required',
                'ward' => 'required',
            ]);
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
            $order->save();
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
            // update total price and import price
            $order = order::find($order->id);
            $order->Total_selling_price = $Total_selling_price + 20000;
            $this->mail($order->id);
            $order->save();

            session()->forget('cart');
            echo "<script>";
            echo "alert('hello');";
            echo "</script>";
            return redirect()->back()->with('alert', 'Order successfully!');
        }
    }
    // mail
    public function mail($id)
    {

        $order = order::where('id', $id)->first();
        $data = orders_details::leftJoin('product', 'orders_details.product_id', '=', 'product.id')
            ->select('orders_details.*', 'product.name as product_name')
            ->where('orders_details.order_id', $id)
            ->get();
        
        $email = order::where('id', $id)->first()->email;
        Mail::to($email)->send(new orderMail($data));
        return redirect()->back()->with('success', 'Send mail successfully!');
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
                $address = address::where('id_customer', $customer->id)->get();
                if (count($address) == 0) {
                    $address = new address;
                    $address->id_customer  = $customer->id;
                    $address->province  = Session::get('province');
                    $address->district  =  Session::get('district');
                    $address->ward  = Session::get('ward');
                    $address->address  = Session::get('address');
                    $address->status  = 1;
                    $address->save();
                }
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
                return redirect('/checkout')->with('alert', 'Order successfully!');
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

    // all order
    public function allOrder()
    {
        // select order join customer fomat created_at M d, Y
        $order = order::leftJoin('customers', 'orders.customer_id', '=', 'customers.id')
            ->select('orders.*', 'customers.name as customer_name')
            ->orderBy('orders.id', 'desc')
            ->paginate(8);
        return view('admin.orders', ['order' => $order]);
    }
    // orderDetails by order id
    public function orderDetails($id)
    {

        // select order join customer fomat created_at M d, Y
        $order = order::leftJoin('customers', 'orders.customer_id', '=', 'customers.id')
            ->select('orders.*', 'customers.name as customer_name')
            ->where('orders.id', $id)
            ->first();
        // select province by id
        $province = Province::find($order->province);
        $district = District::find($order->district);
        $ward = Ward::find($order->ward);
        // select district by id

        // select order_details join product
        $order_details = orders_details::leftJoin('product', 'orders_details.product_id', '=', 'product.id')
            ->select('orders_details.*', 'product.name as product_name')
            ->where('orders_details.order_id', $id)
            ->get();
        // get address by order id
        return view('admin.vieworderdetail', ['order' => $order,], ['order_details' => $order_details, 'province' => $province, 'district' => $district, 'ward' => $ward]);
    }
    // update status order
    public function updateStatusOrder(Request $request)
    {
        $order = order::find($request->id);
        $current_status = $order->Status;
        if ($current_status == 1) {
            $order->Status = 2;
            $order->save();
            // join order_details and product to update quantity

            return redirect()->back();
        } else {
            $order->Status = 1;
            $order->save();
            $order_details = orders_details::leftJoin('product', 'orders_details.product_id', '=', 'product.id')
                ->select('orders_details.*', 'product.name as product_name', 'product.quantity as product_quantity')
                ->where('orders_details.order_id', $request->id)
                ->get();
            foreach ($order_details as $key => $value) {
                $product = product::find($value->product_id);
                $product->quantity = $product->quantity - $value->quantity;
                $product->save();
            }
            return redirect()->back();
        }
    }
    // updateStatusOrderCancel
    public function updateStatusOrderCancel(Request $request)
    {
        $order = order::find($request->id);
        $order->Status = 3;
        $order->save();
        return redirect('/allorder')->with('success', 'Update status successfully!');
    }
    // filterOrder
    public function filterOrder($id)
    {
        $order = order::leftJoin('customers', 'orders.customer_id', '=', 'customers.id')
            ->select('orders.*', 'customers.name as customer_name')
            ->where('orders.Status', $id)
            ->orderBy('orders.id', 'desc')
            ->paginate(8);

        return view('admin.orders', ['order' => $order]);
    }
    //searchOrder
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
    // myaccount
    public function myAccount()
    {
        // get id customer from session
        $customer = session()->get('customer');
        $customer_id = $customer->id;
        //get info customer
        $customer = customer::find($customer_id);
        // get address by customer id
        $addressCustomer = [];
        $address = address::where('id_customer', $customer_id)->get();
        foreach ($address as $key => $value) {
            $province = Province::find($value->province);
            $district = District::find($value->district);
            $ward = Ward::find($value->ward);
            $value->province = $province->name;
            $value->district = $district->name;
            $value->ward = $ward->name;
            array_push($addressCustomer, $value);
        }
        // select order by customer id 
        $order = order::where('customer_id', $customer_id)->orderBy('id', 'desc')->paginate(10);
        return view('customer.myacount', ['order' => $order, 'customer' => $customer, 'addressCustomer' => $addressCustomer]);
    }
    // customer address
    public function customerAddress(Request $request)
    {
        // get id customer from session
        $customer = session()->get('customer');
        $customer_id = $customer->id;
        $addressCustomer = $request->all();
        $address = new address;
        $address->id_customer  = $customer_id;
        $address->province  = $addressCustomer['province'];
        $address->district  = $addressCustomer['district'];
        $address->ward  = $addressCustomer['ward'];
        $address->address  = $addressCustomer['address'];
        $address->status  = 0;
        $address->save();
        return redirect()->back()->with('success', 'Add address successfully!');
    }
    // setAddress
    public function setAddress(Request $request)
    {
        // get id customer from session
        $customer = session()->get('customer');
        $customer_id = $customer->id;
        $address = address::find($request->id);
        $address->status = 1;
        $address->save();
        $address = address::where('id_customer', $customer_id)->where('id', '<>', $request->id)->get();
        foreach ($address as $key => $value) {
            $value->status = 0;
            $value->save();
        }
        return redirect()->back()->with('success', 'Set address successfully!');
    }

    // statistical
    public function statistical()
    {
        $monthly_revenue = [];
        // count revenue in month january and status = 2
        $countRevenueInMonthJanuary = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', 1)->sum('Total_selling_price');
        // count revenue in month february and status = 2
        $countRevenueInMonthFebruary = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', 2)->sum('Total_selling_price');
        // count revenue in month march and status = 2
        $countRevenueInMonthMarch = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', 3)->sum('Total_selling_price');
        // count revenue in month april and status = 2
        $countRevenueInMonthApril = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', 4)->sum('Total_selling_price');
        // count revenue in month may and status = 2
        $countRevenueInMonthMay = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', 5)->sum('Total_selling_price');
        // count revenue in month june and status = 2
        $countRevenueInMonthJune = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', 6)->sum('Total_selling_price');
        // count revenue in month july and status = 2
        $countRevenueInMonthJuly = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', 7)->sum('Total_selling_price');
        // count revenue in month august and status = 2
        $countRevenueInMonthAugust = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', 8)->sum('Total_selling_price');
        // count revenue in month september and status = 2
        $countRevenueInMonthSeptember = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', 9)->sum('Total_selling_price');
        // count revenue in month october and status = 2
        $countRevenueInMonthOctober = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', 10)->sum('Total_selling_price');
        // count revenue in month november and status = 2
        $countRevenueInMonthNovember = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', 11)->sum('Total_selling_price');
        // count revenue in month december and status = 2
        $countRevenueInMonthDecember = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', 12)->sum('Total_selling_price');
        // put revenue in $monthly_revenue
        $monthly_revenue = [$countRevenueInMonthJanuary, $countRevenueInMonthFebruary, $countRevenueInMonthMarch, $countRevenueInMonthApril, $countRevenueInMonthMay, $countRevenueInMonthJune, $countRevenueInMonthJuly, $countRevenueInMonthAugust, $countRevenueInMonthSeptember, $countRevenueInMonthOctober, $countRevenueInMonthNovember, $countRevenueInMonthDecember];
    //    Tính doanh thu của các ngày trong tháng hiện tại và status = 2
    $month = 7;
    $year = 2023;
    
    $revenueByDay = Order::select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(Total_selling_price) as revenue'))
        ->whereMonth('created_at', $month)
        ->whereYear('created_at', $year)
        ->groupBy(DB::raw('DATE(created_at)'))
        ->get();
        
       


     
        return view('admin.statistical', ['monthly_revenue' => $monthly_revenue,'revenueByDay'=>$revenueByDay]);
    }
    public function monyear(request $request){
        // dd($request->all());
        $monthly_revenue = [];
        // count revenue in month january and status = 2
        $countRevenueInMonthJanuary = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', 1)->sum('Total_selling_price');
        // count revenue in month february and status = 2
        $countRevenueInMonthFebruary = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', 2)->sum('Total_selling_price');
        // count revenue in month march and status = 2
        $countRevenueInMonthMarch = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', 3)->sum('Total_selling_price');
        // count revenue in month april and status = 2
        $countRevenueInMonthApril = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', 4)->sum('Total_selling_price');
        // count revenue in month may and status = 2
        $countRevenueInMonthMay = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', 5)->sum('Total_selling_price');
        // count revenue in month june and status = 2
        $countRevenueInMonthJune = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', 6)->sum('Total_selling_price');
        // count revenue in month july and status = 2
        $countRevenueInMonthJuly = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', 7)->sum('Total_selling_price');
        // count revenue in month august and status = 2
        $countRevenueInMonthAugust = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', 8)->sum('Total_selling_price');
        // count revenue in month september and status = 2
        $countRevenueInMonthSeptember = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', 9)->sum('Total_selling_price');
        // count revenue in month october and status = 2
        $countRevenueInMonthOctober = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', 10)->sum('Total_selling_price');
        // count revenue in month november and status = 2
        $countRevenueInMonthNovember = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', 11)->sum('Total_selling_price');
        // count revenue in month december and status = 2
        $countRevenueInMonthDecember = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', 12)->sum('Total_selling_price');
        // put revenue in $monthly_revenue
        $monthly_revenue = [$countRevenueInMonthJanuary, $countRevenueInMonthFebruary, $countRevenueInMonthMarch, $countRevenueInMonthApril, $countRevenueInMonthMay, $countRevenueInMonthJune, $countRevenueInMonthJuly, $countRevenueInMonthAugust, $countRevenueInMonthSeptember, $countRevenueInMonthOctober, $countRevenueInMonthNovember, $countRevenueInMonthDecember];
       
      
        $revenueByDay = Order::select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(Total_selling_price) as revenue'))
            ->whereMonth('created_at',$request->selectedMonth)
            ->whereYear('created_at', $request->selectedYear)
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();
        
        return view('admin.statistical', ['monthly_revenue'=>$monthly_revenue,'revenueByDay'=>$revenueByDay]);
    }
}
