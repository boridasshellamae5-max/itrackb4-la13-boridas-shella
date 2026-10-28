<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        DB::enableQueryLog();

        $genreId = $request->query('genre_id');
        $query = Movie::query();

        if ($genreId) {
            $query->where('genre_id', $genreId);
        }

        $movies = $query->with('genre')->get();
        $genres = Genre::all();

        return view('movies.index', compact('movies', 'genres'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'director'    => 'required|string|max:255',
            'year'        => 'required|integer|min:1888|max:2100',
            'is_featured' => 'required|boolean',
            'genre_id'    => 'required|exists:genres,id',
            'description' => 'nullable|string|max:1000',
        ]);

        Movie::create($validated);

        return redirect()->route('movies.index');
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'director'    => 'required|string|max:255',
            'year'        => 'required|integer|min:1888|max:2100',
            'is_featured' => 'required|boolean',
            'genre_id'    => 'required|exists:genres,id',
            'description' => 'nullable|string|max:1000',
        ]);

        $movie->update($validated);

        return redirect()->route('movies.index');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')
            ->with('success', 'Movie deleted successfully.');
    }
}