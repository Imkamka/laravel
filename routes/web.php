<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchasePaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SalePaymentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\VendorController;
use App\Models\PurchasePayment;

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

    //Resource controllers
    Route::resource('products', ProductController::class);
    Route::resource('vendors', VendorController::class);
    Route::resource('purchases', PurchaseController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('sales', SaleController::class);
    Route::resource('purchase-payments', PurchasePaymentController::class);
    Route::resource('sale-payments', SalePaymentController::class);
    Route::resource('expenses', ExpenseController::class);

    //search requests
    Route::get('/search', [SearchController::class, 'search']);
    Route::get('/vendor-search', [SearchController::class, 'vendorSearchQuery']);
    Route::get('/purchase-search', [SearchController::class, 'purchaseSearchProduct']);
    Route::get('/customer-search', [SearchController::class, 'customerSearch']);


    //Reports controllers
    Route::get('/purchase-report', [ReportController::class, 'purchasesReport'])->name(
        'purchases.report'
    );
    Route::get('/sale-report', [ReportController::class, 'salesReport'])->name(
        'sales.report'
    );
    Route::get('/payments-report', [ReportController::class, 'paymentsReport'])->name(
        'payments.report'
    );
    Route::get('/expense-report', [ReportController::class, 'expensesReport'])->name('expenses.report');
});
