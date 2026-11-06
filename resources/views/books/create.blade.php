@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Add New Book</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        {{-- Title --}}
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" 
                   name="title" 
                   id="title"
                   class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Author --}}
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" 
                   name="author" 
                   id="author"
                   class="form-control @error('author') is-invalid @enderror"
                   value="{{ old('author') }}">
            @error('author')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Year --}}
        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" 
                   name="year" 
                   id="year"
                   class="form-control @error('year') is-invalid @enderror"
                   value="{{ old('year') }}">
            @error('year')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Genre Dropdown --}}
        <div class="mb-4">
            <label for="genre_id" class="form-label">Genre</label>
            <select name="genre_id" 
                    id="genre_id"
                    class="form-select @error('genre_id') is-invalid @enderror">
                <option value="">-- Select Genre --</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}"
                        {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
            @error('genre_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save Book</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
