@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">🔍 Maghanap ng Libro</h2>

    <div class="card mb-5">
        <div class="card-body">
            <form method="GET" action="{{ route('books.filter') }}">
                <div class="row g-3">
                    <div class="col-md-5">
                        <label for="author" class="form-label">Pangalan ng May-akda:</label>
                        <input type="text" name="author" id="author" class="form-control" 
                               placeholder="Hal. Jose Rizal" value="{{ request('author') }}">
                    </div>
                    <div class="col-md-5">
                        <label for="year" class="form-label">Taon ng Paglilimbag:</label>
                        <input type="number" name="year" id="year" class="form-control" 
                               placeholder="Hal. 1887" value="{{ request('year') }}">
                    </div>
                    <div class="col-md-2 align-self-end">
                        <button type="submit" class="btn btn-primary w-100">Hanapin</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if(isset($results))
        @if(count($results) > 0)
            <h5>Nahanap na Libro: {{ count($results) }} ang resulta</h5>
            <table class="table table-bordered table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>Pamagat</th>
                        <th>May-akda</th>
                        <th>Taon</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $book)
                    <tr>
                        <td>{{ $book['title'] }}</td>
                        <td>{{ $book['author'] }}</td>
                        <td>{{ $book['year'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-warning">Walang nakitang libro na tumutugma sa iyong paghahanap.</div>
        @endif
    @endif

    <div class="mt-4">
        <a href="{{ route('books.index') }}" class="btn btn-secondary">← Balik sa Listahan</a>
    </div>
</div>
@endsection