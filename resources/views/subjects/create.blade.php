@extends('layouts.app')

@section('content')
    <h2>Add New Subject</h2>

    <form method="POST" action="{{ route('subjects.store') }}">
        @csrf

        <div class="mb-3">
            <label>Code:</label>
            <input type="text" name="code" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Units:</label>
            <input type="number" name="units" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Course:</label>
            <select name="course_id" class="form-control" required>
                <option value="">-- Select Course --</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}"
                        @selected(old('course_id') == $course->id)>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Add Subject</button>
        <a href="{{ route('subjects.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection