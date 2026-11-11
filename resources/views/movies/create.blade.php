@extends('layouts.app')

@section('title', 'Add New Movie')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add New Movie</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('movies.store') }}">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" name="title" id="title" class="form-control" required>
                @error('title')
                    <p class="text-danger small mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="director" class="form-label">Director <span class="text-danger">*</span></label>
                <input type="text" name="director" id="director" class="form-control" required>
                @error('director')
                    <p class="text-danger small mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="year" class="form-label">Year <span class="text-danger">*</span></label>
                <input type="number" name="year" id="year" class="form-control" required>
                @error('year')
                    <p class="text-danger small mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="genre_id" class="form-label">Genre <span class="text-danger">*</span></label>
                <select name="genre_id" id="genre_id" class="form-select" required>
                    <option value="">-- Select Genre --</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
                @error('genre_id')
                    <p class="text-danger small mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="is_featured" class="form-label">Featured <span class="text-danger">*</span></label>
                <select name="is_featured" id="is_featured" class="form-select" required>
                    <option value="">-- Select --</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
                @error('is_featured')
                    <p class="text-danger small mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="4" class="form-control"></textarea>
                @error('description')
                    <p class="text-danger small mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Save Movie</button>
                <a href="{{ route('movies.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
