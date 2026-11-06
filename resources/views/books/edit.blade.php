<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-bold mb-4">Edit Book</h1>

        <form action="{{ route('books.update', $book) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div class="mb-3">
                <label class="block mb-1">Title</label>
                <input type="text" name="title" 
                    value="{{ old('title', $book->title) }}"
                    class="w-full border rounded p-2">
                @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Author --}}
            <div class="mb-3">
                <label class="block mb-1">Author</label>
                <input type="text" name="author" 
                    value="{{ old('author', $book->author) }}"
                    class="w-full border rounded p-2">
                @error('author') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Year --}}
            <div class="mb-3">
                <label class="block mb-1">Year</label>
                <input type="number" name="year" 
                    value="{{ old('year', $book->year) }}"
                    class="w-full border rounded p-2">
                @error('year') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Genre Dropdown --}}
            <div class="mb-3">
                <label class="block mb-1">Genre</label>
                <select name="genre_id" class="w-full border rounded p-2">
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}"
                            {{ old('genre_id', $book->genre_id) == $genre->id ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
                @error('genre_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                Update Book
            </button>
        </form>
    </div>
</x-app-layout>
