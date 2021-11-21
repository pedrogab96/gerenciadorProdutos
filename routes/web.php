<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/admin', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');

    Route::get('/admin/clientes', [App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('admin.customers');
    Route::get('/admin/pedidos', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.orders');

    Route::get('/admin/produtos', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/produtos/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/produtos/store', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/produtos/edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/produtos/update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/produtos/apagar/{id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('admin.products.destroy');
});
