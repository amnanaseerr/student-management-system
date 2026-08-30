<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function courses()
    {
        $courses = Course::orderBy('course_name')->get();

        return view('courses', compact('courses'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:300',
        ]);

        return back()->with('status', 'Thanks! Your message has been received.');
    }
}
