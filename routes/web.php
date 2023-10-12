<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Seller;
use App\Http\Middleware\Customer;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;

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

Route::get('/', [HomeController::class, 'index'])->name('beranda');

Route::get('/verifikasi', function () {
  return view("auth.verify");
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

  Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
  Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
  Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

  // CMS ADMINITRASTOR
  Route::middleware([Admin::class])->name('admin.')->prefix('admin')->group(function () {
      Route::get('/', [HomeController::class, 'index'])->name('beranda');
      Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
      Route::resource('user', AdminUserController::class);
    });

  // CMS SELLER
  Route::middleware([Operator::class])->name('seller.')->prefix('seller')->group(function () {
      Route::get('/', [HomeController::class, 'index'])->name('beranda');
      Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    });

  // CMS CUSTOMER
  Route::middleware([Client::class])->name('customer.')->prefix('customer')->group(function () {
      Route::get('/', [HomeController::class, 'index'])->name('beranda');
      Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    });
});