<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('genre')->get();
        $genres = Genre::orderBy('name')->get();
        return view('movies.index', compact('movies', 'genres'));
    }

    public function create()
    {
        $genres = Genre::orderBy('name')->get();
        return view('movies.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'director'    => 'required|string|max:255',
            'year'        => 'required|integer|min:1900|max:2030',
            'genre_id'    => 'required|exists:genres,id',
            'is_featured' => 'boolean',
            'description' => 'nullable|string',
        ]);

        $movie = Movie::create($validated);

        Log::info('Movie saved successfully', [
            'id'       => $movie->id,
            'title'    => $movie->title,
            'genre_id' => $movie->genre_id,
        ]);

        return redirect()->route('movies.index')
            ->with('success', "Movie \"{$movie->title}\" added.");
    }

    public function show(Movie $movie)
    {
        $movie->load('genre');
        return view('movies.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        $genres = Genre::orderBy('name')->get();
        return view('movies.edit', compact('movie', 'genres'));
    }

    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'director'    => 'required|string|max:255',
            'year'        => 'required|integer|min:1900|max:2030',
            'genre_id'    => 'required|exists:genres,id',
            'is_featured' => 'boolean',
            'description' => 'nullable|string',
        ]);

        $movie->update($validated);

        Log::info('Movie updated', ['id' => $movie->id]);

        return redirect()->route('movies.index')
            ->with('success', "Movie \"{$movie->title}\" updated.");
    }

    // ✅ PART E — Screenshot 6
    public function destroy(Movie $movie)
    {
        abort_if(
            $movie->genre->movies()->count() === 1,
            403,
            'Cannot delete: This is the last movie in its genre.'
        );

        $movie->delete();

        return redirect()->route('movies.index')
            ->with('success', "Movie \"{$movie->title}\" deleted.");
    }
}
