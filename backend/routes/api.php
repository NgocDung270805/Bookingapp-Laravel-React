<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\ProfileController;

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

// Public routes (không yêu cầu xác thực)
Route::post('/login', LoginController::class)->name('login');
Route::post('/register', RegisterController::class)->name('api.register');

// Protected routes (yêu cầu xác thực với Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', LogoutController::class)->name('api.logout');

    Route::get('/user/profile', [ProfileController::class, 'show'])->name('api.profile.show');
    Route::post('/user/profile', [ProfileController::class, 'update'])->name('api.profile.update'); // Dùng POST cho cập nhật form-data với file

    // Bạn có thể thêm các route API khác cần xác thực tại đây
    // Ví dụ cho quản lý sản phẩm:
    // Route::apiResource('products', ProductController::class); // Đảm bảo bạn đã tạo ProductController
});

// Api Url 
// http://localhost:8000/api/login <=> Login(POST)
// http://localhost:8000/api/register <=> Register(POST)
// http://localhost:8000/api/user/profile <=> Info(GET)
// http://localhost:8000/api/logout <=> Logout(POST)