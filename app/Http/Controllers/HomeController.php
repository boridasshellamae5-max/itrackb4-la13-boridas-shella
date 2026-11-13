<?php

namespace App\Http\Controllers;

use App\Models\Product;    // ← ADD THIS LINE
use App\Models\Category;  // ← ADD THIS LINE

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'productCount' => Product::count(),
            'categoryCount' => Category::count(),
        ]);
    }
}
