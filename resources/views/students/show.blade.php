@extends('layouts.site')
@section('title', 'Student Details')
@section('sheet', 'STUDENT')

@section('content')

    <section class="hero" style="padding-bottom:40px;">
        <span class="coord-readout mono">X:0000  Y:0000</span>
        <div class="hero-inner">
            <span class="eyebrow">STUDENTS &middot; RECORD</span>
            <h1 style="font-size:36px;">{{ $student->name }}</h1>
            <p class="lead">Roll No. {{ $student->roll_no }}</p>
        </div>
    </section>

    <section>
        <div class="section-inner" style="max-width:640px;">
            <div class="card">
                <div style="margin-bottom:16px;">
                    @if ($student->photo)
                        <img src="{{ asset('storage/' . $student->photo) }}" alt="{{ $student->name }}"
                             style="width:100px; height:100px; border-radius:50%; object-fit:cover; border:1px solid #DDD8C8;">
                    @else
                        <span class="avatar-placeholder" style="width:100px; height:100px; font-size:32px;">
                            {{ strtoupper(substr($student->name, 0, 1)) }}
                        </span>
                    @endif
                </div>

                <div class="field"><label>EMAIL</label><p>{{ $student->email }}</p></div>
                <div class="field"><label>DEPARTMENT</label><p>{{ $student->department ?: '—' }}</p></div>
                <div class="field"><label>SEMESTER</label><p>{{ $student->semester ?: '—' }}</p></div>
                <div class="field">
                    <label>COURSE</label>
                    <p>{{ $student->course->course_name ?? 'Unassigned' }}</p>
                </div>

                <div style="margin-top:20px; display:flex; gap:10px;">
                    <a href="{{ route('students.index') }}" class="btn btn-outline-ink" style="border:1.5px solid var(--navy); color:var(--navy);">&larr; Back to List</a>
                    @if (auth()->user()->isAdmin())
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
