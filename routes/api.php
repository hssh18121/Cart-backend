<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\OrderDetail\OrderDetailController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('cart/add-to-cart', [CartController::class, 'addToCart']);
Route::get('cart/show', [CartController::class, 'showCart'])->middleware('checkLogin::class');
Route::patch('cart/update', [CartController::class, 'updateQuantity']);
Route::delete('cart/delete/{id}', [CartController::class, 'deleteProduct']);

# Order API
Route::get('order/show', [OrderController::class, 'showOrders']);
Route::get('order/show-by-year/{year}', [OrderController::class, 'showOrdersByYear']);
Route::post('order/create', [OrderController::class, 'createOrder']);

#Order Detail API
Route::get('details/get/{id}', [OrderDetailController::class, 'getOrderDetails']);