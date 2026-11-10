@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Add New Book</h2>

    {{-- Error Messages --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Please fix the following errors:</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('books.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Pamagat (Title) <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">May-akda (Author) <span class="text-danger">*</span></label>
                    <input type="text" name="author" id="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author') }}" required>
                </div>

                <div class="mb-3">
                    <label for="year" class="form-label">Taon (Year Published) <span class="text-danger">*</span></label>
                    <input type="number" name="year" id="year" class="form-control @error('year') is-invalid @enderror" value="{{ old('year') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Filipino Book? <span class="text-danger">*</span></label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="is_filipino" id="is_filipino_yes" value="1" {{ old('is_filipino') == '1' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="is_filipino_yes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="is_filipino" id="is_filipino_no" value="0" {{ old('is_filipino') == '0' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="is_filipino_no">No</label>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description / Buod</label>
                    <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    <small class="text-muted">Optional — you may leave this blank</small>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Save Book</button>
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
