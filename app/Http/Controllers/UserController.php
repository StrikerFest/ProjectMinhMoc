<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product;
use App\Models\order;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // Tạo tài khoản mới cho admin
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'status' => 'required',
            'password' => 'required',
        ]);
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        return redirect('/admin/login')->withSuccess('Đăng ký thành công');
    }

    // Đăng nhập cho admin
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/admin')
                ->withSuccess('Đã đăng nhập');
        }
        return redirect('/admin');
    }

    // Dashboard admin
    public function index()
    {
        // Đếm sản phẩm - Khách hàng - Đơn hàng
        $countProduct = product::count();
        $countCustomer = customer::count();
        $CountOrder = order::count();

        // Danh sách khách hàng mới (5 khách hàng)
        $newCustomer = customer::orderBy('id', 'desc')->take(5)->get();

        // Tìm top 10 sản phẩm
        $top10Product = DB::table('orders_details')
            ->join('product', 'orders_details.product_id', '=', 'product.id')
            ->select('product.name', 'product.image as image', DB::raw('count(orders_details.product_id) as total'))
            ->groupBy('product.id', 'product.name', 'product.image')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();

        // Top 5 sản phẩm sắp hết hàng
        $top5Product = DB::table('product')
            ->select('product.name', 'product.image as image', 'product.quantity as quantity')
            ->where('product.quantity', '<', 10)
            ->orderBy('quantity', 'asc')
            ->take(5)
            ->get();

        // Đếm đơn hàng hoãn - thành công - đang xử lý - chờ xử lý - tổng đơn hàng
        $countOrderCancel = order::where('Status', 3)->count();
        $countOrderSuccess = order::where('Status', 2)->count();
        $countOrderProcessing = order::where('Status', 1)->count();
        $countOrderPending = order::where('Status', 0)->count();
        $countOrderTotal = order::count();

        // Kiểm tra xem tổng đơn hàng có trống không
        if(!empty($countOrderTotal)){

            // Tính phần trăm từng loại trạng thái đơn hàng
            $percentOrderCancel = round(($countOrderCancel/$countOrderTotal)*100,2);
            $percentOrderSuccess =round(($countOrderSuccess/$countOrderTotal)*100,2);
            $percentOrderPending = round(($countOrderPending/$countOrderTotal)*100,2) ;
            $percentOrderProcessing = round(($countOrderProcessing/$countOrderTotal)*100,2);
        } else {

            // Default
            $percentOrderCancel = 0;
            $percentOrderSuccess = 0;
            $percentOrderPending = 0;
            $percentOrderProcessing = 0;
        }

        // Tính số đơn hàng trong từng tháng trong năm
        $countOrderInMonthInYear = [];

        for($i = 1; $i <= 12 ; $i++){
            $countOrderInMonthInYear[] = order::whereYear('created_at', date('Y'))->whereMonth('created_at', $i)->count();
        }

        $countOrder = implode(',', $countOrderInMonthInYear);

        // Đếm sản phẩm có mã thể loại là 1
        $countProductHasCategoryId1 = product::where('id_category', 1)->count();
        // Đếm sản phẩm có mã thể loại là 2
        $countProductHasCategoryId2 = product::where('id_category', 2)->count();

        // Tính tổng doanh thu trong mỗi tháng với trạng thái là 2
        $monthly_revenue = [];

        for($i = 1; $i <= 12 ; $i++){
            $monthly_revenue[] = order::where('status',2)
                ->whereYear('created_at', date('Y'))
                ->whereMonth('created_at', $i )
                ->sum('Total_selling_price');
        }

        $monthly_revenue = implode(',', $monthly_revenue);

        // Đếm danh thu trong tháng
        $countRevenueInMonthInYear = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))->sum('Total_selling_price');

        // Tính doanh thu tháng trước
        $countRevenueInLastMonth = order::where('status',2)->whereYear('created_at', date('Y'))->whereMonth('created_at', date('m')-1)->sum('Total_selling_price');

        $revenueInMonth = $countRevenueInMonthInYear - $countRevenueInLastMonth;

        return view(
            'admin.index',
            [
                'countProduct' => $countProduct,
                'countCustomer' => $countCustomer,
                'countOrder' => $CountOrder,
                'newCustomer' => $newCustomer,
                'top10Product' => $top10Product,
                'percentOrderCancel' => $percentOrderCancel,
                'percentOrderSuccess' => $percentOrderSuccess,
                'percentOrderPending' => $percentOrderPending,
                'percentOrderProcessing' => $percentOrderProcessing,
                'countorder' => $countOrder,
                'countProductHasCategoryId1' => $countProductHasCategoryId1,
                'countProductHasCategoryId2' => $countProductHasCategoryId2,
                'monthly_revenue' => $monthly_revenue,
                'countRevenueInMonthInYear' => $countRevenueInMonthInYear,
                'RevenueInmoth' => $revenueInMonth,
                'countRevenueInLastMonth' => $countRevenueInLastMonth,
                'top5Product' => $top5Product
            ]
        );
    }
}
