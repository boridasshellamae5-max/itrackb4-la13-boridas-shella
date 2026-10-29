<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books — Lab Activity 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            {{-- Palitan ang Subjects → Books --}}
            <a class="navbar-brand" href="{{ route('books.index') }}">Book Library</a>
            
            <div class="collapse navbar-collapse">
                <div class="navbar-nav me-auto">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                    <a class="nav-link" href="{{ route('books.index') }}">Books</a>
                </div>
            </div>

            {{-- Palitan ang "Add Subject" → "Add Book" --}}
            <a href="{{ route('books.create') }}" class="btn btn-success">+ Add New Book</a>
        </div>
    </nav>

    <div class="container mt-4">
        {{-- Ipakita ang mensahe kung may success --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Dito papasok ang laman ng ibang pahina --}}
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>