<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PurchaseController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// get product by id
Route::get('/admin/apigetproduct/{id}', [PurchaseController::class, 'getProductById']);
// add purchase
Route::post('/admin/apiaddpurchase', [PurchaseController::class, 'addPurchase']);
// get purchase by id
Route::get('/admin/apigetpurchase/{id}', [PurchaseController::class, 'getPurchaseById']);
// insert purchase by id
Route::post('/admin/apiinsertpurchase', [PurchaseController::class, 'insertPurchaseById']);
// update purchase by id
Route::post('/admin/apiupdatepurchase', [PurchaseController::class, 'updatePurchaseById']);