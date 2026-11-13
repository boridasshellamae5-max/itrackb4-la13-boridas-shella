@extends('layouts.app')

@section('title', 'Filter Products')

@section('content')

    <h2 class="mb-4">Filter Products</h2>

    @if ($category === null)

        <div class="alert alert-info">
            All products are shown.
        </div>

    @else

        <div class="alert alert-info">
            Showing products with category:
            <strong>{{ $category }}</strong>
        </div>

    @endif

    @forelse ($products as $product)

        <div class="card mb-3 shadow-sm">

            <div class="card-body">

                <h5 class="card-title">
                    {{ $product['name'] }}
                </h5>

                <p>
                    <strong>Price:</strong>
                    ₱{{ number_format($product['price'], 2) }}
                </p>

                <p>
                    <strong>Category:</strong>
                    {{ $product['category'] }}
                </p>

                <p>
                    <strong>Quantity:</strong>
                    {{ $product['quantity'] }}
                </p>

                <a href="{{ route('products.show', $product['id']) }}"
                   class="btn btn-outline-primary">
                    View Details
                </a>

            </div>

        </div>

    @empty

        <div class="alert alert-warning">
            No products found in this category.
        </div>

    @endforelse

@endsection