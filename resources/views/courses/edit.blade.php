@extends('layouts.site')
@section('title', 'Edit Course')
@section('sheet', 'COURSES/EDIT')

@section('content')

    <section class="hero" style="padding-bottom:40px;">
        <div class="hero-inner">
            <span class="eyebrow">EDIT RECORD &middot; #{{ $course->id }}</span>
            <h1 style="font-size:36px;">Update <span class="accent">{{ $course->course_name }}</span></h1>
            <p class="lead">Changes here are reflected instantly for every student enrolled in this course.</p>
        </div>
    </section>

    <section>
        <div class="section-inner" style="max-width:640px;">
            <div class="card reveal">
                <form method="POST" action="{{ route('manage-courses.update', $course->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="field">
                        <label>COURSE NAME</label>
                        <input type="text" name="course_name" value="{{ old('course_name', $course->course_name) }}" required>
                        @error('course_name') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>
                    <div class="field">
                        <label>COURSE CODE</label>
                        <input type="text" name="course_code" value="{{ old('course_code', $course->course_code) }}" required>
                        @error('course_code') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>
                    <div class="field">
                        <label>CREDIT HOURS (1-6)</label>
                        <input type="number" name="credit_hours" min="1" max="6" value="{{ old('credit_hours', $course->credit_hours) }}" required>
                        @error('credit_hours') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>

                    <div class="hero-actions" style="margin-top:8px;">
                        <button type="submit" class="btn btn-primary" style="border:none; cursor:pointer;">Update Course &rarr;</button>
                        <a href="{{ route('manage-courses.index') }}" class="btn btn-outline-ink" style="border:1.5px solid var(--navy); color:var(--navy);">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
