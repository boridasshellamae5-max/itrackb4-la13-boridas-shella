<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add New Book</title>
    <style>
        .error { color: red; margin-top: 5px; }
        .form-group { margin: 10px 0; }
        label { display: block; margin-bottom: 3px; }
        input, select { padding: 6px; width: 300px; }
        button { padding: 8px 16px; background: #28a745; color: white; border: none; }
    </style>
</head>
<body>
    <h1>Add New Book</h1>

    <form method="POST" action="{{ url('/books') }}">
        @csrf

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title') }}" required>
            @error('title') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label>Author</label>
            <input type="text" name="author" value="{{ old('author') }}" required>
            @error('author') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label>Year</label>
            <input type="number" name="year" value="{{ old('year') }}" required>
            @error('year') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label>Genre</label>
            <select name="genre_id" required>
                <option value="">Select Genre</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}"
                        @selected(old('genre_id') == $genre->id)>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
            @error('genre_id') <p class="error">{{ $message }}</p> @enderror
        </div>

        <button type="submit">Add Book</button>
    </form>

    <p><a href="{{ url('/books') }}">← Back to List</a></p>
</body>
</html>