<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;

Route::get('/admin/login', [AuthController::class, 'login'])->name('view.login');
Route::get('/admin/register', [AuthController::class, 'register'])->name('view.register');

Route::get('/', [DashboardController::class, 'showHome'])->name('view.dashboard');
Route::get('/sales', [SaleController::class, 'showSales'])->name('view.sales');
Route::get('/purchases', [PurchaseController::class, 'showPurchase'])->name('view.purchase');
