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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Licensing Routes
Route::post('/license/activate', [App\Http\Controllers\Api\LicenseController::class, 'activate']);
Route::post('/license/check', [App\Http\Controllers\Api\LicenseController::class, 'check']);
