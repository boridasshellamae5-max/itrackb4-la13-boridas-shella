@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container py-4">

    {{-- Header Section --}}
    <div class="card mb-4">
        <div class="card-body">
            <h1 class="fw-bold">Movie Collection Management System</h1>
            <p class="text-muted mb-4">
                Keep track of your favorite films across different genres, directors, and release years — all in one place.
            </p>
            <a href="{{ route('movies.index') }}" class="btn btn-primary">
                View All Movies
            </a>
        </div>
    </div>

    {{-- Stats Row --}}
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="display-4 fw-bold">{{ $movieCount }}</h2>
                    <p class="text-muted mb-0">MOVIES</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="display-4 fw-bold">{{ $genreCount }}</h2>
                    <p class="text-muted mb-0">GENRES</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Prepared By Section --}}
    <div class="card">
        <div class="card-body d-flex align-items-center gap-3">
            <img src="{{ asset('img/profile.jpg') }}" alt="Profile" width="80" height="80" class="rounded-circle border">
            <div>
                <p class="mb-0"><strong>PREPARED BY</strong></p>
                <h5 class="fw-bold mb-1">Aira Basco</h5>
                <p class="text-muted mb-0">BS Information Technology · 4th Year · Block A</p>
            </div>
        </div>
    </div>

</div>
@endsection
