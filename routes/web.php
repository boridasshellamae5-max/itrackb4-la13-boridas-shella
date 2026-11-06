<?php
 use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// BEFORE
// Route::resource('books', BookController::class)
//     ->only(['index', 'show', 'create', 'store']);

// AFTER
Route::resource('books', BookController::class);
