<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return view('welcome');
});

// ✅ Dito — pinalitan ang lumang linya na may ->only([...])
Route::resource('movies', MovieController::class);