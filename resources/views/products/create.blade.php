@extends('layouts.app')

@section('title', 'Add Product')

@section('content')

<h2>Add Product</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name"
            class="form-control"
            value="{{ old('name') }}" required>
    </div>

    <div class="mb-3">
        <label>Price</label>
        <input type="number" name="price"
            class="form-control"
            value="{{ old('price') }}" required>
    </div>

    <div class="mb-3">
        <label>Quantity</label>
        <input type="number" name="quantity"
            class="form-control"
            value="{{ old('quantity') }}" required>
    </div>

    <div class="mb-3">
        <label>Category</label>

        <select name="category_id" class="form-control" required>
            <option value="" disabled {{ old('category_id') ? '' : 'selected' }}></option>

            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    @selected(old('category_id') == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Available</label>
        <select name="available" class="form-control" required>
            <option value="" disabled {{ old('available') !== null ? '' : 'selected' }}></option>
            <option value="1" @selected(old('available') == '1')>Yes</option>
            <option value="0" @selected(old('available') == '0')>No</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description"
            class="form-control">{{ old('description') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">
        Save Product
    </button>

    <a href="{{ route('products.index') }}"
        class="btn btn-secondary">Cancel</a>
</form>

@endsection