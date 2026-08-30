@extends('layouts.site')
@section('title', 'Courses')
@section('sheet', 'COURSES')

@section('content')

    <section class="hero" style="padding-bottom:40px;">
        <span class="coord-readout mono">X:0000  Y:0000</span>
        <div class="hero-inner">
            <span class="eyebrow">CATALOG</span>
            <h1 style="font-size:36px;">Available <span class="accent">Courses</span></h1>
            <p class="lead">Every course currently set up in the system.</p>
        </div>
    </section>

    <section>
        <div class="section-inner">
            @if (isset($courses) && $courses->count())
                <div class="grid grid-3">
                    @foreach ($courses as $course)
                        <div class="card">
                            <span class="tag">COURSE</span>
                            <h3>{{ $course->course_name }}</h3>
                            @auth
                                <a href="{{ route('manage-courses.show', $course->id) }}" class="action-link" style="margin-top:10px;">View details</a>
                            @endauth
                        </div>
                    @endforeach
                </div>
            @else
                <div class="table-wrap">
                    <div class="empty-state">
                        <p class="mono">NO COURSES YET</p>
                        <p style="margin-top:8px;">Courses will appear here once they're added.</p>
                    </div>
                </div>
            @endif
        </div>
    </section>

@endsection
