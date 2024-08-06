<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\VendorController;

Route::get('/', function () {
    return view('Admin.welcome');
});
Route::group(['middleware' => 'user.guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('view.login');
    Route::post('/login-authentication', [AuthController::class, 'authentication'])->name('auth.login');
    Route::get('/register', [AuthController::class, 'register'])->name('view.register');
});


Route::group(['middleware' => 'user.auth'], function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/dashboard', [DashboardController::class, 'showHome'])->name('view.dashboard');
    Route::get('/sales', [SaleController::class, 'showSales'])->name('view.sales');
    Route::get('sales/stock-details', [SaleController::class, 'showStock'])->name('view.stock-details');
    Route::get('/purchases', [PurchaseController::class, 'showPurchase'])->name('view.purchase');
    Route::get('/purchases/amount-receivable', [PurchaseController::class, 'showAmount'])->name('view.amount');

    // Route::get('/products', [ProductController::class, 'index']);
    // Route::get('get-products', [ProductController::class, 'getProducts'])->name('get.products');
    Route::resource('products', ProductController::class);
    Route::resource('vendors', VendorController::class);
});
