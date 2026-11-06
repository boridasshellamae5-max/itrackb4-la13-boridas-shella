@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Movies</h1>

    {{-- Filter Buttons --}}
    <div class="mb-4">
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">All Movies</a>
        @foreach ($genres as $genre)
            <a href="{{ route('movies.index', ['genre_id' => $genre->id]) }}"
               class="btn btn-info text-white">
                {{ $genre->name }}
            </a>
        @endforeach
    </div>

    {{-- Movie List --}}
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Director</th>
                <th>Year</th>
                <th>Genre</th>
                <th>Featured</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->director }}</td>
                    <td>{{ $movie->year }}</td>
                    <td>{{ $movie->genre->name }}</td>
                    <td>{{ $movie->is_featured ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        
                        {{-- ✅ DELETE FORM — Screenshot 6 --}}
                        <form action="{{ route('movies.destroy', ['movie' => $movie->id]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this movie?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
