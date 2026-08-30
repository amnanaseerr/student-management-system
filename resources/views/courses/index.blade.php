@extends('layouts.site')
@section('title', 'Courses')
@section('sheet', 'COURSES')

@section('content')

    <section class="hero" style="padding-bottom:40px;">
        <span class="coord-readout mono">X:0000  Y:0000</span>
        <div class="hero-inner">
            <span class="eyebrow">WEEK 03 &middot; ELOQUENT RELATIONSHIPS &amp; ROLES</span>
            <h1 style="font-size:36px;">Course <span class="accent">Management</span></h1>
            <p class="lead">Each course can have many students. Deleting a course does not delete its
                students - they're simply unassigned (see the "nullOnDelete" rule on the relationship).</p>
        </div>
    </section>

    <section>
        <div class="section-inner">

            @if (session('success'))
                <div class="success-box">{{ session('success') }}</div>
            @endif

            <div class="toolbar">
                <div>
                    <span class="tag">{{ $courses->count() }} COURSE{{ $courses->count() === 1 ? '' : 'S' }}</span>
                </div>
                @if (auth()->user()->isAdmin())
                    <a href="{{ route('manage-courses.create') }}" class="btn btn-primary">+ Add Course</a>
                @endif
            </div>

            @if ($courses->isEmpty())
                <div class="table-wrap">
                    <div class="empty-state">
                        <p class="mono">NO COURSES YET</p>
                        <p style="margin-top:8px;">No courses have been added. Start by adding the first one.</p>
                        @if (auth()->user()->isAdmin())
                            <a href="{{ route('manage-courses.create') }}" class="btn btn-primary" style="margin-top:18px;">+ Add Course</a>
                        @endif
                    </div>
                </div>
            @else
                <div class="table-wrap">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Course Name</th>
                                <th>Credit Hours</th>
                                <th>Enrolled Students</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td class="roll">{{ $course->course_code }}</td>
                                    <td>{{ $course->course_name }}</td>
                                    <td>{{ $course->credit_hours }}</td>
                                    <td>{{ $course->students_count }}</td>
                                    <td>
                                        <a href="{{ route('manage-courses.show', $course->id) }}" class="action-link">View</a>
                                        @if (auth()->user()->isAdmin())
                                            <a href="{{ route('manage-courses.edit', $course->id) }}" class="action-link primary">Edit</a>
                                            <form action="{{ route('manage-courses.destroy', $course->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete {{ $course->course_name }}? Enrolled students will be kept but unassigned.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="action-link danger" style="border:1px solid #EFD3D0; cursor:pointer;">Delete</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </section>

@endsection
