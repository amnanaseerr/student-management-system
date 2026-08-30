@extends('layouts.site')
@section('title', 'Course Details')
@section('sheet', 'COURSES/VIEW')

@section('content')

    <section class="hero" style="padding-bottom:40px;">
        <div class="hero-inner">
            <span class="eyebrow">RECORD #{{ $course->id }}</span>
            <h1 style="font-size:36px;"><span class="accent">{{ $course->course_name }}</span></h1>
            <p class="lead">{{ $course->course_code }} &middot; {{ $course->credit_hours }} Credit Hour{{ $course->credit_hours === 1 ? '' : 's' }}</p>
        </div>
    </section>

    <section>
        <div class="section-inner" style="max-width:760px;">
            <div class="card reveal" style="margin-bottom:28px;">
                <span class="tag">COURSE RECORD</span>
                <div style="font-family:'JetBrains Mono', monospace; font-size:14px; line-height:2.1; color:var(--ink);">
                    <p><span style="color:var(--ink-soft);">NAME</span> &nbsp; {{ $course->course_name }}</p>
                    <p><span style="color:var(--ink-soft);">CODE</span> &nbsp; {{ $course->course_code }}</p>
                    <p><span style="color:var(--ink-soft);">CREDIT HOURS</span> &nbsp; {{ $course->credit_hours }}</p>
                    <p><span style="color:var(--ink-soft);">CREATED</span> &nbsp; {{ $course->created_at->format('d M Y') }}</p>
                </div>

                <div class="hero-actions" style="margin-top:22px;">
                    @if (auth()->user()->isAdmin())
                        <a href="{{ route('manage-courses.edit', $course->id) }}" class="btn btn-primary">Edit Course</a>
                    @endif
                    <a href="{{ route('manage-courses.index') }}" class="btn btn-outline-ink" style="border:1.5px solid var(--navy); color:var(--navy);">&larr; Back to List</a>
                </div>
            </div>

            {{-- Day 11: this list comes straight from the relationship - $course->students --}}
            <div class="toolbar">
                <span class="tag">ENROLLED STUDENTS ({{ $course->students->count() }})</span>
            </div>

            @if ($course->students->isEmpty())
                <div class="table-wrap">
                    <div class="empty-state">
                        <p class="mono">NO STUDENTS ENROLLED</p>
                        <p style="margin-top:8px;">No student is currently assigned to this course.</p>
                    </div>
                </div>
            @else
                <div class="table-wrap">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Roll No.</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Semester</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($course->students as $student)
                                <tr>
                                    <td class="roll">{{ $student->roll_no }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->department }}</td>
                                    <td>{{ $student->semester }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </section>

@endsection
