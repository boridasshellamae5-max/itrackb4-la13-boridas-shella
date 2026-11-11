<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $movieCount = Movie::count();
        $genreCount = Genre::count();

        return view('home', compact('movieCount', 'genreCount'));
    }
}
