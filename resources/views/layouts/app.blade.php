<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Flex</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 40px;
        }
        .nav-buttons {
            margin: 20px 0;
        }
        .btn {
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin-right: 8px;
        }
        .btn-primary {
            background: #0066ff;
            color: white;
        }
        .btn-outline {
            border: 1px solid #0066ff;
            color: #0066ff;
        }
        a {
            color: #0066ff;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h1>Movie Flex</h1>
    <p>Prepared by: Aira Basco</p>

    <div class="nav-buttons">
        <a href="{{ route('movies.index') }}" class="btn btn-primary">All Movies</a>
        <a href="#" class="btn btn-outline">Featured Movie</a>
    </div>

    @yield('content')

</body>
</html>
