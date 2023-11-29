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

// register Admin
Route::get('/admin/register', function () {
    return view('admin.register');
});
// register Admin
Route::post('/admin/newAdmin', [UserController::class,'register']);
//using middleware to check if user is admin
// login Admin
Route::get('/admin/login', function () {
    return view('admin.login');
});
Route::post('/login', [UserController::class,'login']);
// Admin Routes
Route::get('/admin', [UserController::class,'index'])->middleware('admin');
Route::get('/admin/product', [ProductController::class,'index'])->middleware('admin');
Route::get('/admin/category', [ProductCatergoryController::class,'index'])->middleware('admin');
// add product category
Route::post('/admin/addCategory', [ProductCatergoryController::class,'addCategory']);
// edit product category
Route::post('/admin/editCategory/{id}', [ProductCatergoryController::class,'editCategory']);
// view all categories
// view purchase
Route::get('/admin/purchase', [PurchaseController::class,'index'])->middleware('admin');
// edit purchase
Route::get('/admin/edit-purchase/{id}', [PurchaseController::class,'editPurchase']);
// add product
Route::get('/admin/product/addProduct',[ProductController::class,'addProduct'])->middleware('admin');
// delete product
Route::get('/admin/product/deleteProduct/{id}',[ProductController::class,'deleteProduct']);
// edit product
Route::post('/admin/product/editProduct/{id}',[ProductController::class,'editProduct']);
Route::get('/admin/product/editProductview/{id}',[ProductController::class,'editProductview']);
// get product by id
Route::get('/admin/product/getProductById/{id}',[ProductController::class,'getProductById']);

Route::post('/admin/addNewProduct2',[ProductController::class,'addNewProduct']);
// filter order
Route::get('/admin/filterOrder/{id}',[HomeController::class,'filterOrder']);
// search order by phone
Route::post('/admin/searchOrder',[HomeController::class,'searchOrder']);
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
// view all comments
Route::get('/admin/comment',[CommentController::class,'index']);
// delete comment
Route::get('/admin/comment/deleteComment/{id}',[CommentController::class,'deleteComment']);


// view customer
Route::get('/admin/customer', function () {
    // view all customer sort newest
    $customer = DB::table('customers')->orderBy('id', 'desc')->get();
    return view('admin.customer',['customer'=>$customer]);
})->middleware('admin');


// test
Route::get('/test', [HomeController::class,'test']);

// statistical
Route::get('/admin/statistical', [HomeController::class,'statistical'])->middleware('admin');
// get monthly and yearly
Route::post('/admin/monyear', [HomeController::class,'monyear']);




















// --------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------Customer----------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------


// Customer Routes
Route::get('/home',[HomeController::class,'index']);
Route::get('',[HomeController::class,'index']);
// single product
Route::get('/single-product/{id}',[HomeController::class,'singleProduct']);
// cart
Route::get('/cart', function () {
    return view('customer.cart');
});
// checkout
Route::get('/checkout', function () {
    return view('customer.checkout');
});
// add to cart
Route::get('/add-to-cart/{id}',[HomeController::class,'addToCart']);

// view all product
Route::get('/all-product/{id}',[HomeController::class,'allProduct']);
// login customer
Route::get('/loginCustomer', function () {
    return view('customer.login');
});
// register customer
Route::post("/registerCustomer",[HomeController::class,'registerCustomer']);
// login customer
Route::post("/SignUpCustomer",[HomeController::class,'loginCustomer']);
// logout customer
Route::get("/logoutCustomer",[HomeController::class,'logoutCustomer']);
// order
Route::post("/order",[HomeController::class,'order']);
// get order
Route::get("/allorder",[HomeController::class,'allOrder']);
// get orders details by order id
Route::get("/orderDetails/{id}",[HomeController::class,'orderDetails']);

// my account
Route::get("/myAccount",[HomeController::class,'myAccount']);

// logout customer
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

