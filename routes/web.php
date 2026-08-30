<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

// Week 1: public pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/courses', [PageController::class, 'courses'])->name('courses');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');

// ------------------------------------------------------------------
// Week 3, Day 15: Resource Controllers + Route Model Binding
// Everything below uses Route::resource() instead of listing every
// verb by hand. {student} / {course} in the URL are auto-resolved
// to model instances by Laravel (see the controllers).
// ------------------------------------------------------------------

// Any LOGGED-IN user (student or admin) can browse and view records.
// IMPORTANT: the admin (create/edit/delete) routes are registered FIRST,
// before the public "show" route below - otherwise a request to
// /students/create would be wrongly matched by /students/{student}
// (Laravel would think "create" is a student ID).
Route::middleware('auth')->group(function () {

    // Only ADMINS can create/edit/delete students & courses, or see the dashboard
    // Week 3, Day 13: Middleware, Authorization, Roles & Permissions
    Route::middleware('admin')->group(function () {
        Route::resource('students', StudentController::class)->except(['index', 'show']);
        Route::resource('manage-courses', CourseController::class)
            ->except(['index', 'show'])
            ->parameters(['manage-courses' => 'course']);

        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });

    // Everyone logged in (students included) can browse and view records
    Route::resource('students', StudentController::class)->only(['index', 'show']);
    Route::resource('manage-courses', CourseController::class)
        ->only(['index', 'show'])
        ->parameters(['manage-courses' => 'course']);
});

// ------------------------------------------------------------------
// Week 3, Day 12: Authentication (Laravel Breeze)
// ------------------------------------------------------------------
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Breeze's default profile-management routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Pulls in /login, /register, /logout, /forgot-password, /reset-password, etc.
require __DIR__.'/auth.php';

// Temporary one-time admin setup route - remove after use
Route::get('/make-admin/{token}', function (\Illuminate\Http\Request $request, $token) {
    if ($token !== 'amna-secret-2026') {
        abort(404);
    }
    $user = \App\Models\User::where('email', $request->query('email'))->first();
    if (!$user) {
        return 'No user found with that email.';
    }
    $user->role = 'admin';
    $user->save();
    return $user->email . ' is now an admin.';
});