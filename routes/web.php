<?php


use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ProductCatergoryController;
use Doctrine\DBAL\Driver\Middleware;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\CommentController;
use App\Http\Livewire\Home;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ADMIN - LOGIN AND REGISTER =================================

// Đăng ký
Route::get('/admin/register/secret-key/validate', function () {
    return view('admin.register');
});

// Xữ lý đăng ký
Route::post('/admin/newAdmin', [UserController::class,'register']);

// Đăng nhập
Route::get('/admin/login', function () {
    return view('admin.login');
});

Route::post('/login', [UserController::class,'login']);

// ADMIN - DASHBOARD =================================

Route::get('/admin', [UserController::class,'index'])->middleware('admin');

// statistical - thống kê
Route::get('/admin/statistical', [HomeController::class,'statistical'])->middleware('admin');

// thống kê theo tháng và năm
Route::post('/admin/monyear', [HomeController::class,'monyear']);

// ADMIN - CATEGORY =================================

// xem tất cả
Route::get('/admin/category', [ProductCatergoryController::class,'index'])->middleware('admin');

// thêm
Route::post('/admin/addCategory', [ProductCatergoryController::class,'addCategory']);

// chỉnh sửa
Route::post('/admin/editCategory/{id}', [ProductCatergoryController::class,'editCategory']);

// ADMIN - PURCHASE =================================

// xem
Route::get('/admin/purchase', [PurchaseController::class,'index'])->middleware('admin');

// chỉnh sửa
Route::get('/admin/edit-purchase/{id}', [PurchaseController::class,'editPurchase']);

// ADMIN - PRODUCT =================================

// xem
Route::get('/admin/product', [ProductController::class,'index'])->middleware('admin');

// thêm
Route::get('/admin/product/addProduct',[ProductController::class,'addProduct'])->middleware('admin');
Route::post('/admin/addNewProduct2',[ProductController::class,'addNewProduct']);

// xóa
Route::get('/admin/product/deleteProduct/{id}',[ProductController::class,'deleteProduct']);

// chỉnh sửa
Route::post('/admin/product/editProduct/{id}',[ProductController::class,'editProduct']);

Route::get('/admin/product/editProductview/{id}',[ProductController::class,'editProductview']);

// lấy sản phẩm theo id
Route::get('/admin/product/getProductById/{id}',[ProductController::class,'getProductById']);

// ADMIN - ORDER =================================

// lọc đơn
Route::get('/admin/filterOrder/{id}',[HomeController::class,'filterOrder']);

// tìm đơn theo số điện thoại
Route::post('/admin/searchOrder',[HomeController::class,'searchOrder']);

// IMAGE PROCESSING =================================

// xử lý ảnh
Route::get('storage/{filename}', function ($filename)
{
    $path = storage_path('public/images' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

// ADMIN - COMMENT =================================

// xem tất cả
Route::get('/admin/comment',[CommentController::class,'index']);

// xóa
Route::get('/admin/comment/deleteComment/{id}',[CommentController::class,'deleteComment']);

// ADMIN - CUSTOMER =================================

// xem
Route::get('/admin/customer', function () {

    // xem khách hàng mới nhất
    $customer = DB::table('customers')->orderBy('id', 'desc')->get();
    return view('admin.customer',['customer'=>$customer]);
})->middleware('admin');

// test
// Route::get('/test', [HomeController::class,'test']);


// --------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------Customer----------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------


// CUSTOMER - INDEX =================================

Route::get('/home',[HomeController::class,'index']);
Route::get('',[HomeController::class,'index']);

// CUSTOMER - PRODUCT =================================

Route::get('/single-product/{id}',[HomeController::class,'singleProduct']);

// xem tất cả sản phẩm
Route::get('/all-product/{id}',[HomeController::class,'allProduct']);

// CUSTOMER - CART =================================

Route::get('/cart', function () {
    return view('customer.cart');
});

// thêm vào giỏ hàng
Route::get('/add-to-cart/{id}',[HomeController::class,'addToCart']);

// CUSTOMER - CHECKOUT =================================

Route::get('/checkout', function () {
    return view('customer.checkout');
});

// CUSTOMER - LOGIN AND REGISTER =================================

// đăng nhập
Route::get('/loginCustomer', function () {
    return view('customer.login');
});

// đăng ký
Route::post("/registerCustomer",[HomeController::class,'registerCustomer']);

// xử lý đăng nhập
Route::post("/SignUpCustomer",[HomeController::class,'loginCustomer']);

// đăng xuất
Route::get("/logoutCustomer",[HomeController::class,'logoutCustomer']);

// CUSTOMER - ORDER =================================

// xem đơn
Route::post("/order",[HomeController::class,'order']);

// lấy tất cả đơn
Route::get("/allorder",[HomeController::class,'allOrder']);

// lấy chi tiết đơn từ mã đơn
Route::get("/orderDetails/{id}",[HomeController::class,'orderDetails']);

// CUSTOMER - MY ACCOUNT =================================

Route::get("/myAccount",[HomeController::class,'myAccount']);

// đổi trạng thái đơn
Route::get("/changeStatus/{id}",[HomeController::class,'updateStatusOrder']);

// hủy đơn
Route::get("/changeStatusCancel/{id}",[HomeController::class,'updateStatusOrderCancel']);

// địa chỉ khách hàng
Route::post("/customeraddress",[HomeController::class,'customerAddress']);

// đặt địa chỉ
Route::get("/setAddress/{id}",[HomeController::class,'setAddress']);

// liên hệ
Route::get("/contact", function () {
    return view('customer.contact');
});

