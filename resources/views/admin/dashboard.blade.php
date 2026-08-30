@extends('layouts.site')
@section('title', 'Admin Dashboard')
@section('sheet', 'ADMIN')

@section('content')

    <section class="hero" style="padding-bottom:40px;">
        <div class="hero-inner">
            <span class="eyebrow">WEEK 03 &middot; DAY 13 &middot; MIDDLEWARE &amp; ROLES</span>
            <h1 style="font-size:36px;">Admin <span class="accent">Dashboard</span></h1>
            <p class="lead">This page only loads for users with the "admin" role — try opening it from a
                regular student account and you'll get a 403 instead.</p>
        </div>
    </section>

    <section>
        <div class="section-inner">

            <div class="stat-grid">
                <div class="card stat-card">
                    <span class="stat-num">{{ $totalStudents }}</span>
                    <span class="stat-label">TOTAL STUDENTS</span>
                </div>
                <div class="card stat-card">
                    <span class="stat-num">{{ $totalCourses }}</span>
                    <span class="stat-label">TOTAL COURSES</span>
                </div>
                <div class="card stat-card">
                    <span class="stat-num">{{ $unassignedStudents }}</span>
                    <span class="stat-label">STUDENTS WITHOUT A COURSE</span>
                </div>
            </div>

            <div class="toolbar">
                <span class="tag">RECENTLY ADDED STUDENTS</span>
                <div>
                    <a href="{{ route('students.index') }}" class="btn btn-outline-ink" style="border:1.5px solid var(--navy); color:var(--navy); margin-right:10px;">Manage Students</a>
                    <a href="{{ route('manage-courses.index') }}" class="btn btn-outline-ink" style="border:1.5px solid var(--navy); color:var(--navy);">Manage Courses</a>
                </div>
            </div>

            @if ($recentStudents->isEmpty())
                <div class="table-wrap">
                    <div class="empty-state">
                        <p class="mono">NO STUDENTS YET</p>
                    </div>
                </div>
            @else
                <div class="table-wrap">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Roll No.</th>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Added</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentStudents as $student)
                                <tr>
                                    <td class="roll">{{ $student->roll_no }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->course->course_code ?? 'Unassigned' }}</td>
                                    <td>{{ $student->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </section>

@endsection
