<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // ✅ DAPAT ITO

class BookController extends Controller
{
    public function index(Request $request)
    {
        // ✅ I-ENABLE ANG QUERY LOGGING — DAPAT NAKASULAT ITO
        DB::enableQueryLog();

        $genre_id = $request->query('genre_id');
        $query = Book::with('genre'); // ✅ Eager loading → magiging 3 queries lang

        if ($genre_id) {
            $query->where('genre_id', $genre_id);
        }

        $books = $query->get();
        $genres = Genre::all();

        // ✅ I-check ang bilang
        // dd(DB::getQueryLog()); // i-uncomment para makita ang listahan

        return view('books.index', compact('books', 'genres'));
    }

    // ... ang natitirang code (create, store) ay mananatili pareho
}