<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\TagController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Web\BannerController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\ProductVariantController;
use App\Http\Controllers\Web\ProductAttributeTypeController;
use App\Http\Controllers\Web\ProductAttributeValueController;
use App\Http\Controllers\Web\ProductAttributeValueConfigController;


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/pJM', [HomeController::class, 'pJM'])->middleware('auth')->name('pJM');
Route::get('/product', [HomeController::class, 'product'])->middleware('auth')->name('product');
Route::get('/add-product', [HomeController::class, 'addProduct'])->middleware('auth')->name('addProduct');

// Route cho Category CRUD
Route::prefix('category')->name('category.')->middleware('auth')->group(function () {
    Route::get('/', [CategoriesController::class, 'index'])->name('index');
    Route::post('/', [CategoriesController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [CategoriesController::class, 'edit'])->name('edit');
    Route::put('/{id}', [CategoriesController::class, 'update'])->name('update');
    Route::delete('/{id}', [CategoriesController::class, 'destroy'])->name('destroy');
});

// Route cho Tag CRUD
Route::prefix('tag')->name('tag.')->middleware('auth')->group(function () {
    Route::get('/', [TagController::class, 'index'])->name('index');
    Route::post('/', [TagController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [TagController::class, 'edit'])->name('edit');
    Route::put('/{id}', [TagController::class, 'update'])->name('update');
    Route::delete('/{id}', [TagController::class, 'destroy'])->name('destroy');
});

// Route cho Product CRUD
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

// Route cho ProductAttributeType CRUD
Route::prefix('product-attribute-types')->name('product_attribute_type.')->group(function () {
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

// Route cho ProductAttributeValue CRUD (khi truy cập trực tiếp bằng ID giá trị)
Route::prefix('product-attribute-values')->name('product_attribute_value.')->group(function () {
    Route::get('/{attributeValue}/edit', [ProductAttributeValueController::class, 'edit'])->name('edit');
    // SỬA DÒNG NÀY:
    Route::put('/{attributeValue}', [ProductAttributeValueController::class, 'update'])->name('update'); // Đổi từ ProductAttributeValue::class
    Route::delete('/{attributeValue}', [ProductAttributeValueController::class, 'destroy'])->name('destroy');
    Route::post('/get-by-ids', [ProductAttributeValueController::class, 'getByIds']);
});
// Route để lấy các cấu hình giá trị thuộc tính cho một sản phẩm cụ thể
Route::get('/product/{product}/attribute-value-configs', [ProductAttributeValueConfigController::class, 'index'])->name('product.attribute_value_configs.index');
Route::get('/product/{product}/attribute-value-configs', [ProductVariantController::class, 'getAttributeValueConfigs'])->name('product.attribute_value_configs.index');

// Route cho quản lý banners
Route::resource('banners', BannerController::class);
