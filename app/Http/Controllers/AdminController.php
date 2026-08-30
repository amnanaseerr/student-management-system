<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;

class AdminController extends Controller
{
    // Day 13: Admin Dashboard - only reachable by users with role = 'admin'
    // (enforced by the 'admin' middleware on this route, not here)
    public function dashboard()
    {
        $totalStudents = Student::count();
        $totalCourses = Course::count();
        $unassignedStudents = Student::whereNull('course_id')->count();
        $recentStudents = Student::with('course')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalStudents',
            'totalCourses',
            'unassignedStudents',
            'recentStudents'
        ));
    }
}
