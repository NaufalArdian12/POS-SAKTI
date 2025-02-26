<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;

// 1. Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// 2. Product Pages (with route prefix)
Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [ProductController::class, 'foodBeverage'])->name('products.food-beverage');
    Route::get('/beauty-health', [ProductController::class, 'beautyHealth'])->name('products.beauty-health');
    Route::get('/home-care', [ProductController::class, 'homeCare'])->name('products.home-care');
    Route::get('/baby-kid', [ProductController::class, 'babyKid'])->name('products.baby-kid');
});

// 3. User Profile Page (with route parameters)
Route::get('/user/{id}/name/{name}', [UserController::class, 'show'])->name('user.profile');

// 4. Sales/POS Page
Route::get('/sales', [SalesController::class, 'index'])->name('sales');
