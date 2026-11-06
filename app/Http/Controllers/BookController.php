<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // ✅ 1. INDEX — Listahan + Genre filters
    public function index()
    {
        $books = Book::with('genre')->get();
        $genres = Genre::all();

        return view('books.index', compact('books', 'genres'));
    }

    // ✅ 2. SHOW — Ipakita ang isang libro
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // ✅ 3. CREATE — Form para magdagdag
    public function create()
    {
        $genres = Genre::all();
        return view('books.create', compact('genres'));
    }

    // ✅ 4. STORE — I-save ang bagong libro
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'     => 'required|string|max:255',
            'author'    => 'required|string|max:255',
            'year'      => 'required|integer|min:1000|max:' . date('Y'),
            'genre_id'  => 'required|exists:genres,id',
        ]);

        Book::create($validated);

        return redirect()->route('books.index');
    }

    // ✅ 5. EDIT — Form para magbago
    public function edit(Book $book)
    {
        $genres = Genre::all();
        return view('books.edit', compact('book', 'genres'));
    }

    // ✅ 6. UPDATE — I-save ang pagbabago
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title'     => 'required|string|max:255',
            'author'    => 'required|string|max:255',
            'year'      => 'required|integer|min:1000|max:' . date('Y'),
            'genre_id'  => 'required|exists:genres,id',
        ]);

        $book->update($validated);

        return redirect()->route('books.index');
    }

    // ✅ 7. DESTROY — Burahin ang libro
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}
