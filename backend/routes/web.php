<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/pJM', [HomeController::class, 'pJM'])->name('pJM');
Route::get('/product', [HomeController::class, 'product'])->name('product');
Route::get('/add-product', [HomeController::class, 'addProduct'])->name('addProduct');