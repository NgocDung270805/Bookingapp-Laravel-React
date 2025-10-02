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
use App\Http\Controllers\Api\Auth\SocialiteController;
use App\Http\Controllers\Web\ProductVariantController;
use App\Http\Controllers\Api\ProductActions\BookingController;
use App\Http\Controllers\Api\ProductActions\CommentController;
use App\Http\Controllers\Api\ProductActions\FavoriteController;
use App\Http\Controllers\Api\VideoController;

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
// ===========================================
// ROUTES CHO AUTH
// ===========================================
Route::post('/login', LoginController::class)->name('login');
Route::post('/register', RegisterController::class)->name('api.register');

// Router Api Login GG & FB
Route::get('auth/{provider}/redirect', [SocialiteController::class, 'redirectToProvider']);
Route::get('auth/{provider}/callback', [SocialiteController::class, 'handleProviderCallback']);

// Gemini AI Chat API
Route::post('/chat/gemini', [ChatController::class, 'geminiChat'])->name('api.chat.gemini');


// ===========================================
// ROUTES CHO CATEGORIES
// ===========================================
Route::get('categories', [CategoryController::class, 'index']); // Lấy tất cả danh mục
Route::get('/products/categories/{category_slug}', [ProductController::class, 'productsByCategory']); // Lấy danh sách sản phẩm theo slug danh mục


// ===========================================
// ROUTES CHO PRODUCTS
// ===========================================
Route::get('products', [ProductController::class, 'index'])->name('index');
Route::get('products/{product_slug}', [ProductController::class, 'show']); // Lấy chi tiết sản phẩm theo slug


// ===========================================
// ROUTES CHO BANNERS
// ===========================================
Route::get('banners', [BannerController::class, 'index'])->name('api.banners.index');
Route::get('banners/{banner}', [BannerController::class, 'show'])->name('api.banners.show');

// Videos
Route::get('/videos', [VideoController::class, 'index']);

// ===========================================
// ROUTES CHO CÁC CHỨC NĂNG YÊU CẦU XÁC THỰC
// ===========================================
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', LogoutController::class)->name('api.logout');

    Route::get('/user/profile', [ProfileController::class, 'show'])->name('api.profile.show');
    Route::post('/user/profile', [ProfileController::class, 'update'])->name('api.profile.update');

    // Product
    Route::get('products/{product}/variants', [ProductVariantController::class, 'index']);
    Route::get('products/{product}/attribute-value-configs', [ProductVariantController::class, 'getAttributeValueConfigs']);

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

Route::get('/stats', [App\Http\Controllers\DashboardController::class, 'getStats']);
