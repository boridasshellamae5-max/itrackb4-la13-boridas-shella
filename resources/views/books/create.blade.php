<h1>Add New Book</h1>

<form method="POST" action="{{ url('/books') }}">
    @csrf

    <p>
        <label>Title:</label>
        <input type="text" name="title" value="{{ old('title') }}" required>
        @error('title') <span style="color:red">{{ $message }}</span> @enderror
    </p>

    <p>
        <label>Author:</label>
        <input type="text" name="author" value="{{ old('author') }}" required>
        @error('author') <span style="color:red">{{ $message }}</span> @enderror
    </p>

    <p>
        <label>Year:</label>
        <input type="number" name="year" value="{{ old('year') }}" required>
        @error('year') <span style="color:red">{{ $message }}</span> @enderror
    </p>

    <p>
        <label>Genre:</label>
        <select name="genre_id" required>
            <option value="">-- Select Genre --</option>
            @foreach ($genres as $genre)
                <option value="{{ $genre->id }}"
                    @selected(old('genre_id') == $genre->id)>
                    {{ $genre->name }}
                </option>
            @endforeach
        </select>
        @error('genre_id') <span style="color:red">{{ $message }}</span> @enderror
    </p>

    <p><button type="submit">Save</button></p>
</form>