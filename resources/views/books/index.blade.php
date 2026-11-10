@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-3">My Book List</h2>
    <p class="text-center text-muted mb-5">Prepared by: Jose O. Obogne Jr.</p>

    {{-- Filter Info --}}
    <div class="alert alert-light border mb-3">
        <strong>Showing:</strong>
        @if($author && $year)
            {{ $author }} — published in {{ $year }}
        @elseif($author)
            By {{ $author }} — All Years
        @elseif($year)
            Published in {{ $year }} — All Authors
        @else
            All Books
        @endif
    </div>

    {{-- Filter by Author --}}
    <div class="mb-3">
        <strong>Filter by Author:</strong><br>
        <a href="{{ route('books.index', array_merge(request()->query(), ['author' => 'Jose Rizal'])) }}" class="btn btn-sm btn-outline-primary m-1">Jose Rizal</a>
        <a href="{{ route('books.index', array_merge(request()->query(), ['author' => 'Jose de la Cruz'])) }}" class="btn btn-sm btn-outline-primary m-1">Jose de la Cruz</a>
        <a href="{{ route('books.index', array_merge(request()->query(), ['author' => 'Francisco Balagtas'])) }}" class="btn btn-sm btn-outline-primary m-1">Francisco Balagtas</a>
        <a href="{{ route('books.index', array_merge(request()->query(), ['author' => 'Lualhati Bautista'])) }}" class="btn btn-sm btn-outline-primary m-1">Lualhati Bautista</a>
    </div>

    {{-- Filter by Year --}}
    <div class="mb-3">
        <strong>Filter by Year:</strong><br>
        <a href="{{ route('books.index', array_merge(request()->query(), ['year' => '1887'])) }}" class="btn btn-sm btn-outline-secondary m-1">1887</a>
        <a href="{{ route('books.index', array_merge(request()->query(), ['year' => '1891'])) }}" class="btn btn-sm btn-outline-secondary m-1">1891</a>
        <a href="{{ route('books.index', array_merge(request()->query(), ['year' => '1734'])) }}" class="btn btn-sm btn-outline-secondary m-1">1734</a>
        <a href="{{ route('books.index', array_merge(request()->query(), ['year' => '1983'])) }}" class="btn btn-sm btn-outline-secondary m-1">1983</a>
    </div>

    {{-- Clear Filters --}}
    <div class="mb-4">
        <a href="{{ route('books.index') }}" class="btn btn-sm btn-danger">Clear All Filters</a>
    </div>

    {{-- ✅ ADD NEW BOOK BUTTON --}}
    <div class="mb-4">
        <a href="{{ route('books.create') }}" class="btn btn-success">➕ Add New Book</a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success mb-3">
            {{ session('success') }}
        </div>
    @endif

    {{-- Books Table --}}
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Pamagat</th>
                <th>May-akda</th>
                <th>Taon</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $index => $book)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    @if ($book->author === 'Jose Rizal')
                        <strong class="text-danger">{{ $book->title }} ⭐</strong>
                    @else
                        {{ $book->title }}
                    @endif
                </td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->year }}</td>
                <td>
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-primary">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
