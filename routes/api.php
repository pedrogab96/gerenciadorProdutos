<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/customer/create', [App\Http\Controllers\Api\CustomerController::class, 'create'])->name('api.user.create');

Route::get('/orders', [App\Http\Controllers\Api\OrderController::class, 'index'])->name('api.order.create');
Route::post('/orders/create', [App\Http\Controllers\Api\OrderController::class, 'create'])->name('api.order.create');
Route::get('/orders/{order_id}/show', [App\Http\Controllers\Api\OrderController::class, 'show'])->name('api.order.show');
Route::put('/orders/{order_id}/update', [App\Http\Controllers\Api\OrderController::class, 'update'])->name('api.order.update');
Route::delete('/orders/{order_id}/delete', [App\Http\Controllers\Api\OrderController::class, 'delete'])->name('api.order.delete');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
