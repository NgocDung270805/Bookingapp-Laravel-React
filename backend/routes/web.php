<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\TagController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\VideoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Web\BannerController;
use App\Http\Controllers\Web\BookingController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Web\CategoriesController;
use App\Http\Controllers\Web\Accounts\AdminController;
use App\Http\Controllers\Web\ProductVariantController;
use App\Http\Controllers\Web\ProductAttributeTypeController;
use App\Http\Controllers\Web\ProductAttributeValueController;
use App\Http\Controllers\Web\ProductAttributeValueConfigController;

// ==========================================================
// ROUTE AUTHENTICATION
// ==========================================================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Routes cho Google Login
Route::get('/auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);

// Routes cho Facebook Login
Route::get('/auth/facebook', [SocialiteController::class, 'redirectToFacebook'])->name('auth.facebook');
Route::get('/auth/facebook/callback', [SocialiteController::class, 'handleFacebookCallback']);


// ==========================================================
// ROUTE CHO ỨNG DỤNG
// ==========================================================
Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/pJM', [HomeController::class, 'pJM'])->middleware('auth')->name('pJM');
Route::get('/product', [HomeController::class, 'product'])->middleware('auth')->name('product');
Route::get('/add-product', [HomeController::class, 'addProduct'])->middleware('auth')->name('addProduct');


// ==========================================================
// ROUTE CHO QUẢN LÝ TÀI KHOẢN
// ==========================================================

// Route cho quản lý tài khoản admin
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.index'); // Admin
Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->middleware('auth')->name('admin.edit');
Route::post('/admin/update/{id}', [AdminController::class, 'update'])->middleware('auth')->name('admin.update');
Route::post('/admin/assign-roles/{id}', [AdminController::class, 'assignRoles'])->middleware('auth')->name('admin.assign_roles'); // Phân quyền roles

// Route cho quản lý tài khoản manager
Route::get('/manager', [AdminController::class, 'showManage'])->middleware('auth')->name('manager.index');

// Route cho quản lý tài khoản user
Route::get('/users', [AdminController::class, 'showUsers'])->middleware('auth')->name('users.index');


// ==========================================================
// ROUTE CHO QUẢN LÝ BANNER
// ==========================================================
Route::resource('banners', BannerController::class)->middleware('auth');


// ==========================================================
// ROUTE CHO QUẢN LÝ VIDEO
// ==========================================================
Route::resource('videos', VideoController::class)->middleware('auth');
Route::post('/videos/{video}/toggle-status', [VideoController::class, 'toggleStatus'])->name('videos.toggle-status');
Route::resource('videos', VideoController::class);


// ==========================================================
// ROUTE CHO QUẢN LÝ CATEGORY
// ==========================================================
Route::prefix('category')->name('category.')->middleware('auth')->group(function () {
    Route::get('/', [CategoriesController::class, 'index'])->name('index');
    Route::post('/', [CategoriesController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [CategoriesController::class, 'edit'])->name('edit');
    Route::put('/{id}', [CategoriesController::class, 'update'])->name('update');
    Route::delete('/{id}', [CategoriesController::class, 'destroy'])->name('destroy');
});


// ==========================================================
// ROUTE CHO QUẢN LÝ TAG
// ==========================================================
Route::prefix('tag')->name('tag.')->middleware('auth')->group(function () {
    Route::get('/', [TagController::class, 'index'])->name('index');
    Route::post('/', [TagController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [TagController::class, 'edit'])->name('edit');
    Route::put('/{id}', [TagController::class, 'update'])->name('update');
    Route::delete('/{id}', [TagController::class, 'destroy'])->name('destroy');
});


// ==========================================================
// ROUTE CHO BOOKING
// ==========================================================
Route::prefix('bookings')->name('booking.')->middleware('auth')->group(function () {
    Route::get('/', [BookingController::class, 'index'])->name('index');
    Route::get('/create', [BookingController::class, 'create'])->name('create');
    Route::post('/', [BookingController::class, 'store'])->name('store');
    Route::get('/{id}', [BookingController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [BookingController::class, 'edit'])->name('edit');
    Route::put('/{id}', [BookingController::class, 'update'])->name('update');
    Route::delete('/{id}', [BookingController::class, 'destroy'])->name('destroy');
    Route::post('/{id}/approve', [BookingController::class, 'approve'])->name('approve');
    Route::post('/{id}/reject', [BookingController::class, 'reject'])->name('reject');
    Route::post('/{id}/status', [BookingController::class, 'changeStatus'])->name('bookings.status');
});

// ==========================================================
// ROUTE CHO QUẢN LÝ SẢN PHẨM VÀ BIẾN THỂ SẢN PHẨM
// ==========================================================
Route::prefix('product')->name('product.')->middleware('auth')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::post('/', [ProductController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
    Route::put('/{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy');

    // Route để lấy danh sách biến thể của một sản phẩm
    Route::get('/{product}/variants', [ProductVariantController::class, 'index'])->name('variants.index');
    // Route để thêm biến thể mới cho sản phẩm (sẽ gửi POST đến đây)
    Route::post('/{product}/variants', [ProductVariantController::class, 'store'])->name('variants.store');
});

// Route cho Product Variant CRUD (ngoài việc liên quan trực tiếp đến Product)
Route::prefix('product-variant')->name('product_variant.')->middleware('auth')->group(function () {
    Route::get('/{productVariant}/edit', [ProductVariantController::class, 'edit'])->name('edit');
    Route::put('/{productVariant}', [ProductVariantController::class, 'update'])->name('update');
    Route::delete('/{productVariant}', [ProductVariantController::class, 'destroy'])->name('destroy');
});


// ==========================================================
// THÊM CÁC ROUTE MỚI CHO QUẢN LÝ THUỘC TÍNH SẢN PHẨM (ATTRIBUTES)
// ==========================================================
Route::prefix('product-attribute-types')->middleware('auth')->name('product_attribute_type.')->group(function () {
    Route::get('/', [ProductAttributeTypeController::class, 'index'])->name('index'); // Route bị thiếu
    Route::post('/', [ProductAttributeTypeController::class, 'store'])->name('store');
    Route::get('/{attributeType}/edit', [ProductAttributeTypeController::class, 'edit'])->name('edit');
    Route::put('/{attributeType}', [ProductAttributeTypeController::class, 'update'])->name('update');
    Route::delete('/{attributeType}', [ProductAttributeTypeController::class, 'destroy'])->name('destroy');

    // Nested Routes cho ProductAttributeValue CRUD (giá trị của thuộc tính)
    Route::prefix('{attributeType}/values')->name('values.')->group(function () {
        Route::get('/', [ProductAttributeValueController::class, 'index'])->name('index');
        Route::post('/', [ProductAttributeValueController::class, 'store'])->name('store');
    });
});

// Route cho ProductAttributeValue CRUD 
Route::prefix('product-attribute-values')->middleware('auth')->name('product_attribute_value.')->group(function () {
    Route::get('/{attributeValue}/edit', [ProductAttributeValueController::class, 'edit'])->name('edit');
    Route::put('/{attributeValue}', [ProductAttributeValueController::class, 'update'])->name('update'); // Đổi từ ProductAttributeValue::class
    Route::delete('/{attributeValue}', [ProductAttributeValueController::class, 'destroy'])->name('destroy');
    Route::post('/get-by-ids', [ProductAttributeValueController::class, 'getByIds']);
});
// Route để lấy các cấu hình giá trị thuộc tính cho một sản phẩm cụ thể
Route::get('/product/{product}/attribute-value-configs', [ProductAttributeValueConfigController::class, 'index'])->middleware('auth')->name('product.attribute_value_configs.index');
Route::get('/product/{product}/attribute-value-configs', [ProductVariantController::class, 'getAttributeValueConfigs'])->middleware('auth')->name('product.attribute_value_configs.index');

require __DIR__ . '/backup.php';