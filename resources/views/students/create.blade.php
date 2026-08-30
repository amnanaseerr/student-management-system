@extends('layouts.site')
@section('title', 'Add Student')
@section('sheet', 'NEW STUDENT')

@section('content')

    <section class="hero" style="padding-bottom:40px;">
        <span class="coord-readout mono">X:0000  Y:0000</span>
        <div class="hero-inner">
            <span class="eyebrow">STUDENTS &middot; NEW RECORD</span>
            <h1 style="font-size:36px;">Add <span class="accent">Student</span></h1>
            <p class="lead">Create a new student record.</p>
        </div>
    </section>

    <section>
        <div class="section-inner" style="max-width:640px;">
            <div class="card">
                <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="field">
                        <label>NAME</label>
                        <input type="text" name="name" value="{{ old('name') }}" required>
                        @error('name') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>

                    <div class="field">
                        <label>EMAIL</label>
                        <input type="email" name="email" value="{{ old('email') }}" required>
                        @error('email') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>

                    <div class="field">
                        <label>ROLL NUMBER</label>
                        <input type="text" name="roll_no" value="{{ old('roll_no') }}" required>
                        @error('roll_no') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>

                    <div class="field">
                        <label>DEPARTMENT</label>
                        <input type="text" name="department" value="{{ old('department') }}">
                        @error('department') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>

                    <div class="field">
                        <label>SEMESTER</label>
                        <input type="text" name="semester" value="{{ old('semester') }}">
                        @error('semester') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>

                    <div class="field">
                        <label>COURSE</label>
                        <select name="course_id" style="width:100%; font-family:'Inter',sans-serif; font-size:14px; padding:12px 14px; border:1.5px solid #DDD8C8; border-radius:4px; background:#fff; color:var(--ink);">
                            <option value="">— Unassigned —</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}" @selected(old('course_id') == $course->id)>{{ $course->course_name }}</option>
                            @endforeach
                        </select>
                        @error('course_id') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>

                    <div class="field">
                        <label>PHOTO (OPTIONAL)</label>
                        <input type="file" name="photo" accept="image/*">
                        <p style="font-size:12px; color:var(--ink-soft); margin-top:4px;">JPG or PNG, max 2MB.</p>
                        @error('photo') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Save Student</button>
                    <a href="{{ route('students.index') }}" class="btn btn-outline-ink" style="border:1.5px solid var(--navy); color:var(--navy);">Cancel</a>
                </form>
            </div>
        </div>
    </section>

@endsection
