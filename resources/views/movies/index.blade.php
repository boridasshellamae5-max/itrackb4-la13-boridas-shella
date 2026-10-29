@extends('layouts.app')

@section('content')
<h1 class="mb-4">Books</h1>

{{-- Filter Buttons — gumagamit ng Genres mula sa lookup table --}}
<div class="mb-4">
    <a href="{{ route('books.index') }}" class="btn btn-secondary">All Books</a>
    @foreach ($genres as $genre)
        <a href="{{ route('books.index', ['genre_id' => $genre->id]) }}" 
           class="btn btn-info text-white">
            {{ $genre->name }}
        </a>
    @endforeach
</div>

{{-- Filter Form --}}
<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title">Filter Books</h5>
        <form action="{{ route('books.index') }}" method="GET" class="row g-3">
            <div class="col-md-5">
                <select name="genre_id" class="form-select" onchange="this.form.submit()">
                    <option value="">All Genres</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" 
                            {{ request('genre_id') == $genre->id ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>
</div>

{{-- Books Table --}}
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Year</th>
                        <th>Genre</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->year }}</td>
                        {{-- ✅ Sumusunod sa Lookup Table --}}
                        <td>{{ $book->genre->name }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            No books found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- ✅ Para sa Screenshot 6 & 7 — pansamantalang query counter --}}
{{-- <p class="mt-3 text-muted">Queries: {{ count(\Illuminate\Support\Facades\DB::getQueryLog()) }}</p> --}}

@endsection