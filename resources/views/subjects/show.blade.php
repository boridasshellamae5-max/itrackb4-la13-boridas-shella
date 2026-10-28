<!DOCTYPE html>
<html>
<head>
    <title>{{ $subject->code }} | LibSys Portal</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; font-size: 13px; }
        body { display: flex; min-height: 100vh; }
        
        .sidebar { width: 180px; padding: 1rem; background: #f0f4f0; border-right: 1px solid #ddd; }
        .sidebar h3 { margin-bottom: 1.5rem; font-size: 13px; font-weight: bold; }
        .sidebar ul { list-style: none; }
        .sidebar li { margin: 0.7rem 0; }
        .sidebar a { text-decoration: none; color: #333; font-size: 13px; }
        
        .main { flex: 1; padding: 2rem; }
        h1 { font-size: 18px; margin-bottom: 1.5rem; }
        .card { border: 1px solid #ddd; border-radius: 4px; padding: 1.5rem; max-width: 500px; }
        .row { margin: 0.8rem 0; }
        .label { font-weight: bold; display: inline-block; width: 100px; color: #555; }
        .back-link { display: inline-block; margin-top: 1.5rem; color: #007bff; text-decoration: none; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3>LibSys Portal</h3>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="{{ route('subjects.index') }}">Subjects</a></li>
            <li><a href="#">Teachers</a></li>
        </ul>
    </div>

    <div class="main">
        <h1>{{ $subject->code }} — {{ $subject->title }}</h1>

        <div class="card">
            <div class="row">
                <span class="label">Code:</span>
                <span>{{ $subject->code }}</span>
            </div>
            <div class="row">
                <span class="label">Title:</span>
                <span>{{ $subject->title }}</span>
            </div>
            <div class="row">
                <span class="label">Units:</span>
                <span>{{ $subject->units }}</span>
            </div>
            <div class="row">
                <span class="label">Status:</span>
                <span>{{ $subject->is_active ? 'Active' : 'Inactive' }}</span>
            </div>
            <div class="row">
                <span class="label">Description:</span>
                <span>{{ $subject->description ?? 'No description provided.' }}</span>
            </div>
        </div>

        <a href="{{ route('subjects.index') }}" class="back-link">← Back to Subject List</a>
    </div>
</body>
</html>