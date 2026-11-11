<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Movie::with('genre');

        // Search
        if ($request->filled('search')) {
            $query->where(function($q) {
                $q->where('title', 'like', '%'.request('search').'%')
                  ->orWhere('director', 'like', '%'.request('search').'%');
            });
        }

        // Genre Filter
        if ($request->filled('genre_id')) {
            $query->where('genre_id', $request->genre_id);
        }

        // Featured Filter
        if ($request->has('is_featured') && $request->is_featured !== '') {
            $query->where('is_featured', $request->is_featured);
        }

        // ✅ 4 movies per page
        $movies = $query->orderBy('title', 'asc')->paginate(4);
        $genres = Genre::all();

        return view('movies.index', compact('movies', 'genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'director'    => 'required|string|max:255',
            'year'        => 'required|integer|min:1888|max:2100',
            'genre_id'    => 'required|exists:genres,id',
            'is_featured' => 'required|boolean',
            'description' => 'nullable|string|max:1000',
        ]);

        Movie::create($validated);

        return redirect()->route('movies.index')
            ->with('success', 'Movie added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'director'    => 'required|string|max:255',
            'year'        => 'required|integer|min:1888|max:2100',
            'genre_id'    => 'required|exists:genres,id',
            'is_featured' => 'required|boolean',
            'description' => 'nullable|string|max:1000',
        ]);

        $movie->update($validated);

        return redirect()->route('movies.index')
            ->with('success', 'Movie updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index')
            ->with('success', 'Movie deleted successfully.');
    }
}
