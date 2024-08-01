<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/admin/login', [AuthController::class, 'login'])->name('view.login');
Route::get('/admin/register', [AuthController::class, 'register'])->name('view.register');

Route::get('/', [DashboardController::class, 'showHome'])->name('view.dashboard');
