<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])
// ->middleware('auth')
->name('home');
// Route::get('/pJM', [HomeController::class, 'pJM'])->name('pJM');
// Route::get('/product', [HomeController::class, 'product'])->name('product');
// Route::get('/add-product', [HomeController::class, 'addProduct'])->name('addProduct');

// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');