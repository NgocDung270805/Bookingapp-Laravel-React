<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\ProfileController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Web\ProductVariantController;
use App\Http\Controllers\Api\ProductActions\BookingController;
use App\Http\Controllers\Api\ProductActions\CommentController;
use App\Http\Controllers\Api\ProductActions\FavoriteController;

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

Route::get('products', [ProductController::class, 'index'])->name('index');

// Protected routes (yêu cầu xác thực với Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', LogoutController::class)->name('api.logout');

    Route::get('/user/profile', [ProfileController::class, 'show'])->name('api.profile.show');
    Route::post('/user/profile', [ProfileController::class, 'update'])->name('api.profile.update'); // Dùng POST cho cập nhật form-data với file

    // Bạn có thể thêm các route API khác cần xác thực tại đây
    // Ví dụ cho quản lý sản phẩm:
    // Product API Routes
    // Route::apiResource('products', ProductController::class); // Tạo các route CRUD RESTful cho products
    // Thêm các route tùy chỉnh nếu cần, ví dụ lấy variants cho một product:
    Route::get('products/{product}/variants', [ProductVariantController::class, 'index']); // Nếu bạn đã có route này
    Route::get('products/{product}/attribute-value-configs', [ProductVariantController::class, 'getAttributeValueConfigs']); // Nếu bạn đã có route này

    // Gemini AI Chat API
    Route::post('/chat/gemini', [ChatController::class, 'geminiChat'])->name('api.chat.gemini');
    
    // Favorites
    Route::post('products/{product}/favorite/toggle', [FavoriteController::class, 'toggle'])->name('api.products.favorite.toggle');
    Route::get('products/{product}/favorite/status', [FavoriteController::class, 'checkStatus'])->name('api.products.favorite.status');
    Route::get('user/favorites', [FavoriteController::class, 'index'])->name('api.user.favorites'); // Lấy danh sách sản phẩm yêu thích của user

    // Bookings
    Route::apiResource('products/{product}/bookings', BookingController::class)->only(['store', 'index']); // Đặt lịch cho 1 sản phẩm
    Route::apiResource('bookings', BookingController::class)->except(['store']); // Quản lý bookings (show, update, destroy)

    // Comments
    Route::apiResource('products/{product}/comments', CommentController::class)->only(['index', 'store']); // Xem và thêm comment cho 1 sản phẩm
    Route::apiResource('comments', CommentController::class)->except(['index', 'store']); // Quản lý comments (show, update, destroy)
});

Route::get('banners', [BannerController::class, 'index'])->name('api.banners.index'); 
Route::get('banners/{banner}', [BannerController::class, 'show'])->name('api.banners.show'); 

// ===========================================
// ROUTES CHO CATEGORIES
// ===========================================
// Lấy tất cả danh mục
Route::get('categories', [CategoryController::class, 'index']);
// Lấy danh sách sản phẩm theo slug danh mục
// Ví dụ: /api/categories/sedan-cars/products
Route::get('/products/categories/:categorySlug{category_slug}', [ProductController::class, 'productsByCategory']);

// Lấy chi tiết sản phẩm theo slug
// Ví dụ: /api/products/vinfast-lux-a2-0
Route::get('products/{product_slug}', [ProductController::class, 'show']);
// Api Url 
// http://localhost:8000/api/login <=> Login(POST)
// http://localhost:8000/api/register <=> Register(POST)
// http://localhost:8000/api/user/profile <=> Info(GET)
// http://localhost:8000/api/logout <=> Logout(POST)