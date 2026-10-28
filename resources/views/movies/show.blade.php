<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $movie->title }}</title>
    <style>
        body { font-family: sans-serif; max-width: 600px; margin: 2rem auto; padding: 0 1rem; }
        dt { font-weight: bold; margin-top: 1rem; }
        .actions { margin-top: 2rem; padding-top: 1rem; border-top: 1px solid #ddd; }
        .btn { display: inline-block; padding: 0.5rem 1rem; text-decoration: none; border-radius: 4px; margin-right: 0.5rem; border: none; cursor: pointer; }
        .btn-edit { background: #007bff; color: white; }
        .btn-delete { background: #dc3545; color: white; }
    </style>
</head>
<body>

<h1>{{ $movie->title }}</h1>

<dl>
    <dt>Director</dt>
    <dd>{{ $movie->director }}</dd>

    <dt>Year</dt>
    <dd>{{ $movie->year }}</dd>

    <dt>Genre</dt>
    <dd>{{ $movie->genre->name }}</dd>

    <dt>Featured</dt>
    <dd>{{ $movie->is_featured ? 'Yes' : 'No' }}</dd>

    <dt>Description</dt>
    <dd>{{ $movie->description }}</dd>
</dl>

<div class="actions">
    <a href="{{ route('movies.edit', $movie) }}" class="btn btn-edit">Edit</a>

    {{-- ✅ Delete Button — may Confirm at tamang @method('DELETE') --}}
    <form action="{{ route('movies.destroy', $movie) }}" method="POST"
          onsubmit="return confirm('Sigurado ka bang buburahin ang pelikulang ito?')" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-delete">Delete</button>
    </form>

    <p style="margin-top: 1rem;"><a href="{{ route('movies.index') }}">← Balik sa Listahan</a></p>
</div>

</body>
</html>