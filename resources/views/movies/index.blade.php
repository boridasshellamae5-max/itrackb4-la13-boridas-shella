@extends('layouts.app')

@section('title', 'All Movies')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>List of Movies</h2>
    <a href="{{ route('movies.create') }}" class="btn btn-primary">+ Add New Movie</a>
</div>

{{-- Success Message --}}
@if(session('success'))
    <div class="alert alert-success mb-3">
        {{ session('success') }}
    </div>
@endif

{{-- Search & Filter Form --}}
<form method="GET" action="{{ route('movies.index') }}" class="mb-4">
    <div class="d-flex align-items-center gap-2">
        <input type="text" name="search" class="form-control" style="max-width: 250px;" placeholder="Title or Director..." value="{{ request('search') }}">
        
        <select name="genre_id" class="form-select">
            <option value="">All Genres</option>
            @foreach ($genres as $genre)
                <option value="{{ $genre->id }}" @selected(request('genre_id') == $genre->id)>
                    {{ $genre->name }}
                </option>
            @endforeach
        </select>

        <select name="is_featured" class="form-select">
            <option value="">Any</option>
            <option value="1" @selected(request('is_featured') === '1')>Yes</option>
            <option value="0" @selected(request('is_featured') === '0')>No</option>
        </select>

        <button type="submit" class="btn btn-primary">Apply</button>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Clear</a>
    </div>
</form>

{{-- Movies Table --}}
<table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Director</th>
            <th>Year</th>
            <th>Genre</th>
            <th>Featured</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($movies as $movie)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->director }}</td>
                <td>{{ $movie->year }}</td>
                <td>{{ optional($movie->genre)->name ?? 'N/A' }}</td>
                <td>{{ $movie->is_featured ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('movies.show', $movie) }}" class="btn btn-sm btn-primary">View</a>
                    <a href="{{ route('movies.edit', $movie) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('movies.destroy', $movie) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center py-4">
                    <strong>No movies found.</strong> Check your filters or <a href="{{ route('movies.create') }}">add a new movie</a>.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

{{-- Pagination — Previous/Next sa ibaba ng Showing --}}
<div class="mt-3">
    <div>
        Showing {{ $movies->firstItem() ?: 0 }} to {{ $movies->lastItem() ?: 0 }} of {{ $movies->total() }} results
    </div>
    <div class="mt-1">
        @if ($movies->onFirstPage())
            <span class="btn btn-light border btn-sm disabled">« Previous</span>
        @else
            <a href="{{ $movies->previousPageUrl() }}" class="btn btn-light border btn-sm">« Previous</a>
        @endif

        @for ($i = 1; $i <= $movies->lastPage(); $i++)
            @if ($i == $movies->currentPage())
                <span class="btn btn-primary btn-sm">{{ $i }}</span>
            @else
                <a href="{{ $movies->url($i) }}" class="btn btn-light border btn-sm">{{ $i }}</a>
            @endif
        @endfor

        @if ($movies->hasMorePages())
            <a href="{{ $movies->nextPageUrl() }}" class="btn btn-light border btn-sm">Next »</a>
        @else
            <span class="btn btn-light border btn-sm disabled">Next »</span>
        @endif
    </div>
</div>
@endsection
