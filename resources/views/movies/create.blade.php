<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add New Movie</title>
    <style>
        body { font-family: sans-serif; max-width: 600px; margin: 2rem auto; padding: 0 1rem; }
        label { display: block; margin-top: 1rem; font-weight: bold; }
        input, select, textarea { margin-top: 0.3rem; width: 100%; padding: 0.5rem; }
        button { margin-top: 1.5rem; padding: 0.7rem 1.5rem; background: #0066cc; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .error { color: red; margin-top: 0.3rem; font-size: 0.9rem; }
        .cancel { margin-left: 1rem; color: #666; text-decoration: none; }
    </style>
</head>
<body>

<h1>Add New Movie</h1>

<form method="POST" action="{{ route('movies.store') }}">
    @csrf

    <label>Title</label>
    <input type="text" name="title" value="{{ old('title') }}">
    @error('title') <p class="error">{{ $message }}</p> @enderror

    <label>Director</label>
    <input type="text" name="director" value="{{ old('director') }}">
    @error('director') <p class="error">{{ $message }}</p> @enderror

    <label>Year</label>
    <input type="number" name="year" value="{{ old('year') }}">
    @error('year') <p class="error">{{ $message }}</p> @enderror

    <label>Genre</label>
    <select name="genre_id">
        <option value="">-- Select Genre --</option>
        @foreach ($genres as $genre)
            <option value="{{ $genre->id }}"
                @selected(old('genre_id') == $genre->id)>
                {{ $genre->name }}
            </option>
        @endforeach
    </select>
    @error('genre_id') <p class="error">{{ $message }}</p> @enderror

    <label>Featured?</label>
    <select name="is_featured">
        <option value="1" @selected(old('is_featured') == '1')>Yes</option>
        <option value="0" @selected(old('is_featured') == '0')>No</option>
    </select>
    @error('is_featured') <p class="error">{{ $message }}</p> @enderror

    <label>Description</label>
    <textarea name="description" rows="4">{{ old('description') }}</textarea>
    @error('description') <p class="error">{{ $message }}</p> @enderror

    <button type="submit">Add Movie</button>
    <a href="{{ route('movies.index') }}" class="cancel">Cancel</a>
</form>

</body>
</html>