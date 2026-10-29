@extends('layouts.app')

@section('content')
<h1 class="mb-4">Books</h1>

{{-- Genre Filter Buttons --}}
<div class="mb-3">
    <a href="{{ route('books.index') }}" class="btn btn-secondary">All Books</a>
    @foreach ($genres as $genre)
        <a href="{{ route('books.index', ['genre_id' => $genre->id]) }}" 
           class="btn 
              @if($genre->name === 'Fantasy') btn-info
              @elseif($genre->name === 'Classic') btn-warning
              @elseif($genre->name === 'Romance') btn-danger text-white
              @else btn-secondary @endif">
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
                <label class="form-label">Category</label>
                <select name="genre_id" class="form-select" onchange="this.form.submit()">
                    <option value="">All Categories</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" 
                            {{ request('genre_id') == $genre->id ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 align-self-end">
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>
</div>

{{-- Books Table --}}
<div class="card">
    <div class="card-body">
        <h5 class="card-title">All Books</h5>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Year</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->year }}</td>
                        {{-- ✅ Walang laman ang loob ng Category --}}
                        <td></td>
                        <td>
                            <button class="btn btn-info btn-sm">View</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            No books found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Queries Counter — nagpapakita ng 3 --}}
<p class="mt-3 text-muted">
    Queries: {{ count(\Illuminate\Support\Facades\DB::getQueryLog()) }}
</p>

<div class="mt-4">
    <a href="{{ route('books.create') }}" class="btn btn-success">+ Add New Book</a>
</div>

<p class="mt-5 text-muted text-center">Prepared by: Amor Tonio</p>
@endsection