<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->filled('search')) {
            $term = $request->search;
            $query->where(function ($q) use ($term) {
                $q->where('name', 'like', "%{$term}%")
                  ->orWhere('roll_no', 'like', "%{$term}%")
                  ->orWhere('department', 'like', "%{$term}%");
            });
        }

        $students = $query->latest()->paginate(10)->withQueryString();

        return view('students.index', compact('students'));
    }

    public function create()
    {
        $courses = Course::orderBy('course_name')->get();

        return view('students.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'roll_no' => 'required|string|unique:students,roll_no',
            'department' => 'nullable|string|max:255',
            'semester' => 'nullable|string|max:50',
            'course_id' => 'nullable|exists:courses,id',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('students', 'public');
        }

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $courses = Course::orderBy('course_name')->get();

        return view('students.edit', compact('student', 'courses'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'roll_no' => 'required|string|unique:students,roll_no,' . $student->id,
            'department' => 'nullable|string|max:255',
            'semester' => 'nullable|string|max:50',
            'course_id' => 'nullable|exists:courses,id',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($student->photo) {
                Storage::disk('public')->delete($student->photo);
            }
            $validated['photo'] = $request->file('photo')->store('students', 'public');
        }

        $student->update($validated);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        if ($student->photo) {
            Storage::disk('public')->delete($student->photo);
        }

        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
