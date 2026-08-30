@extends('layouts.site')
@section('title', 'Dashboard')
@section('sheet', 'DASHBOARD')

@section('content')

    <section class="hero" style="padding-bottom:40px;">
        <span class="coord-readout mono">X:0000  Y:0000</span>
        <div class="hero-inner">
            <span class="eyebrow">WELCOME BACK</span>
            <h1 style="font-size:36px;">Hello, <span class="accent">{{ auth()->user()->name }}</span></h1>
            <p class="lead">Here's a quick overview of the system.</p>
        </div>
    </section>

    <section>
        <div class="section-inner">
            <div class="grid grid-3" style="margin-bottom:40px;">
                <div class="card">
                    <span class="tag">TOTAL</span>
                    <h3>{{ \App\Models\Student::count() }}</h3>
                    <p>Students registered</p>
                </div>
                <div class="card">
                    <span class="tag">TOTAL</span>
                    <h3>{{ \App\Models\Course::count() }}</h3>
                    <p>Courses available</p>
                </div>
                <div class="card">
                    <span class="tag">YOUR ROLE</span>
                    <h3 style="text-transform:capitalize;">{{ auth()->user()->role ?? 'student' }}</h3>
                    <p>Account type</p>
                </div>
            </div>

            <div class="section-head">
                <span class="eyebrow">QUICK LINKS</span>
                <h2>Where to go next</h2>
            </div>
            <div class="grid grid-3">
                <a href="{{ route('students.index') }}" class="card" style="display:block;">
                    <span class="tag">MODULE</span>
                    <h3>Students</h3>
                    <p>View and manage student records.</p>
                </a>
                <a href="{{ route('courses') }}" class="card" style="display:block;">
                    <span class="tag">MODULE</span>
                    <h3>Courses</h3>
                    <p>Browse available courses.</p>
                </a>
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="card" style="display:block;">
                        <span class="tag">ADMIN</span>
                        <h3>Admin Panel</h3>
                        <p>Create, edit and delete records.</p>
                    </a>
                @else
                    <a href="{{ route('profile.edit') }}" class="card" style="display:block;">
                        <span class="tag">ACCOUNT</span>
                        <h3>Profile</h3>
                        <p>Update your account details.</p>
                    </a>
                @endif
            </div>
        </div>
    </section>

@endsection
