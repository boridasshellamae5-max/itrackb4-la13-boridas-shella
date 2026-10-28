<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        DB::enableQueryLog();

        $course_id = $request->query('course_id');
        $query = Subject::query();

        if ($course_id) {
            $query->where('course_id', $course_id);
        }

        $subjects = $query->get();

        $courses = Course::all();
        Course::first();

        return view('subjects.index', compact('subjects', 'courses'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('subjects.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code'      => 'required|string|max:20|unique:subjects,code',
            'title'     => 'required|string|max:255',
            'units'     => 'required|integer',
            'course_id' => 'required|exists:courses,id',
        ]);

        Subject::create($validated);

        return redirect()->route('subjects.index')->with('success', 'Subject added successfully!');
    }

    public function show(Subject $subject)
    {
        return view('subjects.show', compact('subject'));
    }
}