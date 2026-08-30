@extends('layouts.site')
@section('title', 'Add Course')
@section('sheet', 'COURSES/NEW')

@section('content')

    <section class="hero" style="padding-bottom:40px;">
        <div class="hero-inner">
            <span class="eyebrow">COURSE REGISTRATION</span>
            <h1 style="font-size:36px;">Add a <span class="accent">new course</span></h1>
            <p class="lead">Once saved, this course will appear in the dropdown on the student form.</p>
        </div>
    </section>

    <section>
        <div class="section-inner" style="max-width:640px;">
            <div class="card reveal">
                <form method="POST" action="{{ route('manage-courses.store') }}">
                    @csrf
                    <div class="field">
                        <label>COURSE NAME</label>
                        <input type="text" name="course_name" placeholder="e.g. Database Systems" value="{{ old('course_name') }}" required>
                        @error('course_name') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>
                    <div class="field">
                        <label>COURSE CODE</label>
                        <input type="text" name="course_code" placeholder="e.g. CS-301" value="{{ old('course_code') }}" required>
                        @error('course_code') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>
                    <div class="field">
                        <label>CREDIT HOURS (1-6)</label>
                        <input type="number" name="credit_hours" min="1" max="6" placeholder="e.g. 3" value="{{ old('credit_hours', 3) }}" required>
                        @error('credit_hours') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>

                    <div class="hero-actions" style="margin-top:8px;">
                        <button type="submit" class="btn btn-primary" style="border:none; cursor:pointer;">Save Course &rarr;</button>
                        <a href="{{ route('manage-courses.index') }}" class="btn btn-outline-ink" style="border:1.5px solid var(--navy); color:var(--navy);">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
