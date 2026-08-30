<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentApiController extends Controller
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

        return StudentResource::collection($students);
    }

    public function show(Student $student)
    {
        return new StudentResource($student);
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

        $student = Student::create($validated);

        return new StudentResource($student);
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
            $validated['photo'] = $request->file('photo')->store('students', 'public');
        }

        $student->update($validated);

        return new StudentResource($student);
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json(['message' => 'Student deleted successfully.']);
    }
}
