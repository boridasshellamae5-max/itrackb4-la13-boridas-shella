@extends('layouts.app')

@section('content')
    <ul class="nav nav-tabs mb-3">
        <li class="nav-item"><a class="nav-link active" href="#">Subject List</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Featured Subjects</a></li>
    </ul>

    <h5>My Subject List</h5>

    <div class="mb-2">
        <span>Filter by Course:</span>
        <a href="{{ route('subjects.index', ['course_id' => 1]) }}" class="btn btn-sm btn-outline-secondary {{ request('course_id') == 1 ? 'active' : '' }}">BSIT</a>
        <a href="{{ route('subjects.index', ['course_id' => 2]) }}" class="btn btn-sm btn-outline-secondary {{ request('course_id') == 2 ? 'active' : '' }}">GED</a>
        <a href="{{ route('subjects.index') }}" class="btn btn-sm btn-light">Clear Course</a>

        <input type="text" placeholder="Code or Title" class="form-control d-inline w-auto ms-2">
        <button class="btn btn-primary">Search</button>
    </div>

    <div class="mb-3">
        <small>Currently showing:
            @if(request('course_id') == 1) BSIT Subjects
            @elseif(request('course_id') == 2) GED Subjects
            @else All Subjects
            @endif
            — <a href="{{ route('subjects.index') }}">Clear All</a>
        </small>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No.</th>
                <th>Code</th>
                <th>Title</th>
                <th>Units</th>
                <th>Course</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $index => $subject)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $subject->code }}</td>
                <td>{{ $subject->title }}</td>
                <td>{{ $subject->units }}</td>
                <td>
                    @if($subject->course)
                        @if($subject->course->name === 'GED')
                            <span class="text-success">{{ $subject->course->name }}</span>
                        @else
                            {{ $subject->course->name }}
                        @endif
                    @endif
                </td>
                <td>
                    <a href="{{ route('subjects.show', $subject) }}" class="btn btn-primary btn-sm">View Details</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>



    {{-- ↓↓↓ DAGDAG NA LAMAN ↓↓↓ --}}
    <div class="mt-4 text-end">
        <p><strong>Prepared by: Nadine C. Rojas</strong></p>
    </div>
@endsection