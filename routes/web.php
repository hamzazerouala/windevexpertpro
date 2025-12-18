<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\StoreController;

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
    return view('welcome');
});

// Store Routes
Route::get('/store', [StoreController::class, 'index'])->name('store.index');
Route::get('/store/checkout/{priceId}', [StoreController::class, 'checkout'])->name('store.checkout');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Admin Auth Routes
Route::get('admin/login', [AdminAuthController::class, 'loginForm'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'login']);

// Admin Protected Routes
Route::middleware(['is_super_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
});
