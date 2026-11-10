@extends('layouts.app')

@section('content')
    <h2 class="mt-4 mb-3">Book Details</h2>
    
    <dl class="row">
        <dt class="col-sm-3">Pamagat</dt>
        <dd class="col-sm-9">{{ $book['title'] }}</dd>

        <dt class="col-sm-3">May-akda</dt>
        <dd class="col-sm-9">{{ $book['author'] }}</dd>

        <dt class="col-sm-3">Taon</dt>
        <dd class="col-sm-9">{{ $book['year'] }}</dd>
    </dl>

    <a href="{{ route('books.index') }}" class="btn btn-secondary">← Back to Book List</a>
@endsection