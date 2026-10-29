<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

// ✅ Lahat ng kailangang Route para sa Lab 10
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');

// ✅ Mga nawawalang route mula sa view
Route::get('/books/featured', [BookController::class, 'featured'])->name('books.featured');
Route::get('/books/category/{name}', [BookController::class, 'category'])->name('books.category');