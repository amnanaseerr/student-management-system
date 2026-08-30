@extends('layouts.site')
@section('title', 'Students')
@section('sheet', 'STUDENTS')

@section('content')

    <section class="hero" style="padding-bottom:40px;">
        <span class="coord-readout mono">X:0000  Y:0000</span>
        <div class="hero-inner">
            <span class="eyebrow">STUDENTS MODULE</span>
            <h1 style="font-size:36px;">Student <span class="accent">Management</span></h1>
            <p class="lead">A working CRUD module backed by a database — search, page through, and manage
                every student record, each optionally linked to a course and a profile photo.</p>
        </div>
    </section>

    <section>
        <div class="section-inner">

            @if (session('success'))
                <div class="success-box">{{ session('success') }}</div>
            @endif

            <div class="toolbar">
                <form method="GET" action="{{ route('students.index') }}" class="search-form">
                    <input type="text" name="search" placeholder="Search by name, roll no, department..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-outline-ink" style="border:1.5px solid var(--navy); color:var(--navy);">Search</button>
                    @if (request('search'))
                        <a href="{{ route('students.index') }}" class="btn btn-outline-ink" style="border:1.5px solid var(--navy); color:var(--navy);">Clear</a>
                    @endif
                </form>
                @if (auth()->user()->isAdmin())
                    <a href="{{ route('students.create') }}" class="btn btn-primary">+ Add Student</a>
                @endif
            </div>

            <div style="margin-bottom:16px;">
                <span class="tag">{{ $students->total() }} RECORD{{ $students->total() === 1 ? '' : 'S' }}{{ request('search') ? ' MATCHING "' . request('search') . '"' : '' }}</span>
            </div>

            @if ($students->isEmpty())
                <div class="table-wrap">
                    <div class="empty-state">
                        <p class="mono">NO RECORDS FOUND</p>
                        <p style="margin-top:8px;">
                            @if (request('search'))
                                No student matches "{{ request('search') }}". Try a different search.
                            @else
                                No students have been added. Start by adding the first one.
                            @endif
                        </p>
                        @if (auth()->user()->isAdmin() && !request('search'))
                            <a href="{{ route('students.create') }}" class="btn btn-primary" style="margin-top:18px;">+ Add Student</a>
                        @endif
                    </div>
                </div>
            @else
                <div class="table-wrap">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Roll No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Course</th>
                                <th>Department</th>
                                <th>Semester</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>
                                        @if ($student->photo)
                                            <img src="{{ asset('storage/' . $student->photo) }}" alt="{{ $student->name }}" class="avatar-thumb">
                                        @else
                                            <span class="avatar-placeholder">{{ strtoupper(substr($student->name, 0, 1)) }}</span>
                                        @endif
                                    </td>
                                    <td class="roll">{{ $student->roll_no }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>
                                        @if ($student->course)
                                            <span class="chip" style="margin:0;">{{ $student->course->course_name }}</span>
                                        @else
                                            <span style="color:var(--ink-soft); font-size:13px;">Unassigned</span>
                                        @endif
                                    </td>
                                    <td>{{ $student->department }}</td>
                                    <td>{{ $student->semester }}</td>
                                    <td>
                                        <a href="{{ route('students.show', $student->id) }}" class="action-link">View</a>
                                        @if (auth()->user()->isAdmin())
                                            <a href="{{ route('students.edit', $student->id) }}" class="action-link primary">Edit</a>
                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete {{ $student->name }}? This cannot be undone.');">
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

                <div style="margin-top:20px;">
                    {{ $students->links() }}
                </div>
            @endif

        </div>
    </section>

@endsection
