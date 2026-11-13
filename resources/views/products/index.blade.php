<@extends('layouts.app')

@section('content')
<div class="py-3">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>All Products</h2>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
    </div>

    <!-- Search & Filter Form -->
    <form method="GET" action="{{ route('products.index') }}" class="row g-3 mb-4 bg-light p-3 rounded">
        <div class="col-auto">
            <input type="text" name="search" placeholder="Search products..." 
                   value="{{ request('search') }}" class="form-control">
        </div>
        <div class="col-auto">
            <select name="category_id" class="form-select">
                <option value="">All Categories</option>
                @foreach (\App\Models\Category::all() as $cat)
                    <option value="{{ $cat->id }}"
                        @selected(request('category_id') == $cat->id)>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <select name="available" class="form-select">
                <option value="">Any Availability</option>
                <option value="1" @selected(request('available') === '1')>Available</option>
                <option value="0" @selected(request('available') === '0')>Not Available</option>
            </select>
        </div>
        <div class="col-auto">
            <select name="sort_by" class="form-select">
                <option value="name" @selected(request('sort_by', 'name') == 'name')>Sort by Name</option>
                <option value="price" @selected(request('sort_by') == 'price')>Sort by Price</option>
            </select>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Apply</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Clear</a>
        </div>
    </form>

    <!-- Products Table -->
    <div class="table-responsive">
        <table class="table table-bordered bg-white">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>₱{{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        @if ($product->available)
                            <span class="badge bg-success">Available</span>
                        @else
                            <span class="badge bg-danger">Not Available</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-outline-dark">View</a>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this product?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection