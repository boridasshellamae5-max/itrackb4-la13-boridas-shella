<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(Request $request)
    {
        // === PARA SA SCREENSHOT 6 & 7 — TANGGALIN PAGKATAPOS ===
        DB::enableQueryLog();
        // =====================================================

        $genreId = $request->query('genre_id');

        // Tanggalin ang // sa ibaba PAGKATAPOS ng screenshot 6
        $query = Book::with('genre');

        // I-comment sa ibaba PARA SA screenshot 6
        // $query = Book::query();

        if ($genreId) {
            $query->where('genre_id', $genreId);
        }

        $books = $query->get();
        $genres = Genre::all();

        return view('books.index', compact('books', 'genres'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('books.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'    => 'required|string|max:255',
            'author'   => 'required|string|max:255',
            'year'     => 'required|integer',
            'genre_id' => 'required|exists:genres,id',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }
}