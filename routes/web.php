<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\AuthController;

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

Route::get('/solutions', function () {
    return view('solutions');
})->name('solutions');

Route::get('/marketplace', [MarketplaceController::class, 'index'])->name('marketplace.index');

// Public Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Store Routes
Route::get('/store', [StoreController::class, 'index'])->name('store.index');
Route::get('/store/checkout/{priceId}', [StoreController::class, 'checkout'])->name('store.checkout');

// LMS Routes
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{slug}', [CourseController::class, 'show'])->name('courses.show');
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/dashboard', function () {
        // DEBUG TEMPORAIRE : Si vous voyez ceci, le routing fonctionne.
        // return "DEBUG: La route dashboard est bien atteinte. Le problème est dans la vue.";
        return view('client.dashboard');
    })->name('dashboard');
    Route::get('/courses/{course}/learn/{lesson}', [CourseController::class, 'watch'])->name('courses.watch');
});

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
