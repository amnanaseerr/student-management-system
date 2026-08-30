<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\StudentApiController;
use App\Http\Controllers\Api\CourseApiController;
use Illuminate\Support\Facades\Route;

// Public - no token needed
Route::post('/login', [AuthApiController::class, 'login']);

// Everything below requires a valid Sanctum token (Authorization: Bearer <token>)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthApiController::class, 'logout']);
    Route::get('/user', [AuthApiController::class, 'me']);

    // ->names(...) avoids clashing with the web route names (students.index, etc.)
    Route::apiResource('students', StudentApiController::class)->names('api.students');
    Route::apiResource('courses', CourseApiController::class)->names('api.courses');
});
