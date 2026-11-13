@extends('layouts.app')

@section('content')
<div class="py-4">
    <!-- Hero Section -->
    <div class="p-5 bg-light rounded mb-4">
        <h1>Product Inventory System</h1>
        <p class="lead">Track and manage your store products, categories, stock levels, and availability — all in one place.</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary">View all products</a>
    </div>

    <!-- Counts Row -->
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="border rounded p-3 bg-white">
                <p class="text-muted small mb-1">PRODUCTS</p>
                <h2 class="display-4 fw-bold">{{ $productCount }}</h2>
            </div>
        </div>
        <div class="col-md-6">
            <div class="border rounded p-3 bg-white">
                <p class="text-muted small mb-1">CATEGORIES</p>
                <h2 class="display-4 fw-bold">{{ $categoryCount }}</h2>
            </div>
        </div>
    </div>

    <!-- Prepared By Section -->
    <div class="border rounded p-3 bg-white d-flex align-items-center gap-3">
        <img src="{{ asset('img/profile.jpg') }}" alt="Profile" width="72" height="72" class="rounded-circle" onerror="this.src='https://ui-avatars.com/api/?name=Shella+Mae&background=random&size=72'">
        <div>
            <p class="text-muted small mb-1">PREPARED BY</p>
            <h5 class="mb-1">Shella Mae</h5>
            <p class="text-muted small mb-0">BS Information Technology · Your Year · Your Block</p>
        </div>
    </div>
</div>
@endsection
