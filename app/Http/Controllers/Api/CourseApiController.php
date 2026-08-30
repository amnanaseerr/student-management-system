<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseApiController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->paginate(10);

        return CourseResource::collection($courses);
    }

    public function show(Course $course)
    {
        return new CourseResource($course);
    }

    public function store(Request $request)
    {
        // course_name is the one field we've confirmed exists on the Course model.
        // If your Course has more fields (e.g. course_code, credit_hours), add their
        // validation rules here the same way.
        $request->validate([
            'course_name' => 'required|string|max:255',
        ]);

        // Passes through any other fillable fields on the model without needing
        // to know every column name in advance.
        $course = Course::create($request->only((new Course())->getFillable()));

        return new CourseResource($course);
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'course_name' => 'required|string|max:255',
        ]);

        $course->fill($request->only($course->getFillable()));
        $course->save();

        return new CourseResource($course);
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return response()->json(['message' => 'Course deleted successfully.']);
    }
}
