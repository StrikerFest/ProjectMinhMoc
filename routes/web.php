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

// register
Route::get('/admin/register', function () {
    return view('admin.register');
});

// register process
Route::post('/admin/newAdmin', [UserController::class,'register']);

// login
Route::get('/admin/login', function () {
    return view('admin.login');
});

Route::post('/login', [UserController::class,'login']);

// ADMIN - DASHBOARD =================================

Route::get('/admin', [UserController::class,'index'])->middleware('admin');

// statistical
Route::get('/admin/statistical', [HomeController::class,'statistical'])->middleware('admin');

// get monthly and yearly
Route::post('/admin/monyear', [HomeController::class,'monyear']);

// ADMIN - CATEGORY =================================

// view all
Route::get('/admin/category', [ProductCatergoryController::class,'index'])->middleware('admin');

// add
Route::post('/admin/addCategory', [ProductCatergoryController::class,'addCategory']);

// edit
Route::post('/admin/editCategory/{id}', [ProductCatergoryController::class,'editCategory']);

// ADMIN - PURCHASE =================================

// view
Route::get('/admin/purchase', [PurchaseController::class,'index'])->middleware('admin');

// edit
Route::get('/admin/edit-purchase/{id}', [PurchaseController::class,'editPurchase']);

// ADMIN - PRODUCT =================================

Route::get('/admin/product', [ProductController::class,'index'])->middleware('admin');

// add
Route::get('/admin/product/addProduct',[ProductController::class,'addProduct'])->middleware('admin');
Route::post('/admin/addNewProduct2',[ProductController::class,'addNewProduct']);

// delete
Route::get('/admin/product/deleteProduct/{id}',[ProductController::class,'deleteProduct']);

// edit
Route::post('/admin/product/editProduct/{id}',[ProductController::class,'editProduct']);

Route::get('/admin/product/editProductview/{id}',[ProductController::class,'editProductview']);

// get product by id
Route::get('/admin/product/getProductById/{id}',[ProductController::class,'getProductById']);

// ADMIN - ORDER =================================

// filter order
Route::get('/admin/filterOrder/{id}',[HomeController::class,'filterOrder']);

// search order by phone
Route::post('/admin/searchOrder',[HomeController::class,'searchOrder']);

// IMAGE PROCESSING =================================

// get image
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

// view all
Route::get('/admin/comment',[CommentController::class,'index']);

// delete
Route::get('/admin/comment/deleteComment/{id}',[CommentController::class,'deleteComment']);

// ADMIN - CUSTOMER =================================

// view
Route::get('/admin/customer', function () {
    // view all customer sort newest
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

// view all product
Route::get('/all-product/{id}',[HomeController::class,'allProduct']);

// CUSTOMER - CART =================================

Route::get('/cart', function () {
    return view('customer.cart');
});

// add to cart
Route::get('/add-to-cart/{id}',[HomeController::class,'addToCart']);

// CUSTOMER - CHECKOUT =================================

Route::get('/checkout', function () {
    return view('customer.checkout');
});

// CUSTOMER - LOGIN AND REGISTER =================================

// login
Route::get('/loginCustomer', function () {
    return view('customer.login');
});

// register
Route::post("/registerCustomer",[HomeController::class,'registerCustomer']);

// login
Route::post("/SignUpCustomer",[HomeController::class,'loginCustomer']);

// logout
Route::get("/logoutCustomer",[HomeController::class,'logoutCustomer']);

// CUSTOMER - ORDER =================================

// order
Route::post("/order",[HomeController::class,'order']);
// get order
Route::get("/allorder",[HomeController::class,'allOrder']);
// get orders details by order id
Route::get("/orderDetails/{id}",[HomeController::class,'orderDetails']);

// CUSTOMER - MY ACCOUNT =================================

Route::get("/myAccount",[HomeController::class,'myAccount']);

// change status order
Route::get("/changeStatus/{id}",[HomeController::class,'updateStatusOrder']);

// change status order cancel
Route::get("/changeStatusCancel/{id}",[HomeController::class,'updateStatusOrderCancel']);

// customer address
Route::post("/customeraddress",[HomeController::class,'customerAddress']);

// set address
Route::get("/setAddress/{id}",[HomeController::class,'setAddress']);

//contact
Route::get("/contact", function () {
    return view('customer.contact');
});

