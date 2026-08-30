<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // READ - list all courses with a live count of enrolled students
    public function index()
    {
        $courses = Course::withCount('students')->latest()->get();
        return view('courses.index', compact('courses'));
    }

    // CREATE - show the form
    public function create()
    {
        return view('courses.create');
    }

    // CREATE - validate and store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_name'  => 'required|string|max:255',
            'course_code'  => 'required|string|max:50|unique:courses,course_code',
            'credit_hours' => 'required|integer|min:1|max:6',
        ]);

        Course::create($validated);

        return redirect()->route('manage-courses.index')->with('success', 'Course "' . $validated['course_name'] . '" added successfully.');
    }

    // Day 15: Route Model Binding - Laravel automatically fetches the
    // Course matching the {course} segment in the URL. No more findOrFail().
    public function show(Course $course)
    {
        $course->load('students');
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'course_name'  => 'required|string|max:255',
            'course_code'  => 'required|string|max:50|unique:courses,course_code,' . $course->id,
            'credit_hours' => 'required|integer|min:1|max:6',
        ]);

        $course->update($validated);

        return redirect()->route('manage-courses.index')->with('success', 'Course "' . $course->course_name . '" updated successfully.');
    }

    public function destroy(Course $course)
    {
        $name = $course->course_name;
        $course->delete(); // students on this course keep their record, course_id becomes null

        return redirect()->route('manage-courses.index')->with('success', 'Course "' . $name . '" deleted. Its students were kept and unassigned.');
    }
}
