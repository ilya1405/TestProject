<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('admin')->group(function () {
    Route::put('reviews/{review}', [\App\Http\Controllers\Api\Admin\ReviewController::class, 'update'])
        ->middleware('role:admin');
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('auth/logout', [\App\Http\Controllers\Api\AuthController::class, 'logoutUser']);

    Route::apiResource('reviews', \App\Http\Controllers\Api\ReviewController::class)
        ->only(['index', 'store']);
});

Route::post('auth/register', [\App\Http\Controllers\Api\AuthController::class, 'createUser']);
Route::post('auth/login', [\App\Http\Controllers\Api\AuthController::class, 'loginUser']);
