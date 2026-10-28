<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>My Movie Collection</title>
    <style>
        body { font-family: sans-serif; max-width: 1000px; margin: 2rem auto; padding: 0 1rem; }
        
        .prepared { 
            text-align: center; 
            margin-bottom: 0.5rem; 
            color: #555; 
            font-size: 0.95rem; 
        }
        
        h1 { text-align: center; margin-bottom: 0.3rem; }
        
        .nav-buttons { margin: 1rem 0; text-align: center; }
        .nav-label { font-weight: bold; margin-right: 8px; }
        .nav-btn { 
            display: inline-block; 
            padding: 6px 14px; 
            margin-right: 8px; 
            border-radius: 4px; 
            color: white; 
            text-decoration: none; 
            font-size: 0.9rem;
        }
        .btn-all { background: #6c757d; }
        .btn-sci { background: #007bff; }
        .btn-act { background: #ffc107; color: #212529; }
        .btn-crime { background: #dc3545; }
        
        .all-genre { 
            text-align: center; 
            color: #666; 
            margin: 0.5rem 0 1.5rem; 
            font-style: italic; 
        }
        
        table { width: 100%; border-collapse: collapse; margin: 1.5rem 0; }
        th, td { border: 1px solid #ccc; padding: 0.6rem; text-align: left; vertical-align: top; }
        th { background: #f5f5f5; }
        a { text-decoration: none; color: #0066cc; }
        .add-link { text-align: center; margin-top: 1rem; }
        .query-count { text-align: center; margin-top: 1rem; font-weight: bold; color: #d9534f; }
    </style>
</head>
<body>



<h1>My Movie Collection</h1>

<div class="nav-buttons">
    <span class="nav-label">Movies</span>
    <a href="{{ route('movies.index') }}" class="nav-btn btn-all">All Movies</a>
    <a href="{{ route('movies.index', ['genre_id' => 1]) }}" class="nav-btn btn-sci">Sci-Fi</a>
    <a href="{{ route('movies.index', ['genre_id' => 2]) }}" class="nav-btn btn-act">Action</a>
    <a href="{{ route('movies.index', ['genre_id' => 3]) }}" class="nav-btn btn-crime">Crime</a>
</div>

<p class="all-genre"></p>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Director</th>
            <th>Genre</th>
            <th>Featured</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($movies as $movie)
        <tr>
            <td>{{ $movie->id }}</td>
            <td>
                <a href="{{ route('movies.show', $movie->id) }}">
                    {{ $movie->title }}

                    
                </a>
            </td>
            <td>{{ $movie->director }}</td>
            <td>{{ $movie->genre->name }}</td>
            <td>{{ $movie->is_featured ? 'Yes' : 'No' }}</td>
            <td>{{ $movie->description }}</td>

            
        </tr>
        @endforeach

        <p class="prepared">Prepared by Aira Basco</p>
    </tbody>

</table>

<p class="add-link"><a href="{{ route('movies.create') }}">+ Add New Movie</a></p>

<p class="query-count">Queries: {{ count(\Illuminate\Support\Facades\DB::getQueryLog()) }}</p>

</body>
</html>