<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;  // ← IMPORTANT: Add this line

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Products Routes — This creates products.index, products.create, etc.
Route::resource('products', ProductController::class);
