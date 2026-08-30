@extends('layouts.site')
@section('title', 'Home')
@section('sheet', 'HOME')

@section('content')

    <section class="hero">
        <span class="coord-readout mono">X:0000  Y:0000</span>
        <div class="hero-inner">
            <span class="eyebrow">STUDENT MANAGEMENT SYSTEM</span>
            <h1>Manage students and courses <span class="accent">without the mess.</span></h1>
            <p class="lead">A simple, secure system to register students, organize courses, and keep
                enrollment records straight — built with Laravel from the ground up.</p>
            <div class="hero-actions">
                @auth
                    <a href="{{ route('students.index') }}" class="btn btn-primary">View Students</a>
                    <a href="{{ route('dashboard') }}" class="btn btn-outline">Go to Dashboard</a>
                @else
                    <a href="{{ route('register') }}" class="btn btn-primary">Get Started</a>
                    <a href="{{ route('login') }}" class="btn btn-outline">Login</a>
                @endauth
            </div>

            <div class="spec-row">
                <div class="spec-item">
                    <span class="num">CRUD</span>
                    <span class="label">STUDENT &amp; COURSE RECORDS</span>
                </div>
                <div class="spec-item">
                    <span class="num">AUTH</span>
                    <span class="label">ROLE-BASED ACCESS</span>
                </div>
                <div class="spec-item">
                    <span class="num">API</span>
                    <span class="label">REST + SANCTUM</span>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="section-inner">
            <div class="section-head">
                <span class="eyebrow">WHAT IT DOES</span>
                <h2>Everything a student office needs</h2>
                <p>Three core modules, built and hardened week by week.</p>
            </div>
            <div class="grid grid-3">
                <div class="card">
                    <span class="tag">MODULE 01</span>
                    <h3>Student Records</h3>
                    <p>Add, search, and manage student profiles — including photos, department, semester and
                        the course they're enrolled in.</p>
                </div>
                <div class="card">
                    <span class="tag">MODULE 02</span>
                    <h3>Course Management</h3>
                    <p>Organize courses and see, at a glance, which students belong to each one.</p>
                </div>
                <div class="card">
                    <span class="tag">MODULE 03</span>
                    <h3>Secure Access</h3>
                    <p>Role-based login means only admins can create, edit, or delete records — everyone
                        else gets read-only access.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="on-navy">
        <div class="section-inner">
            <div class="section-head">
                <span class="eyebrow">BUILT WITH</span>
                <h2>Laravel, end to end</h2>
                <p>From migrations to a documented REST API.</p>
            </div>
            <div class="grid grid-3">
                <div class="card">
                    <h3>Eloquent &amp; MySQL/SQLite</h3>
                    <p>Migrations, relationships, and validation on every write.</p>
                </div>
                <div class="card">
                    <h3>Breeze Authentication</h3>
                    <p>Login, registration, and role-based middleware.</p>
                </div>
                <div class="card">
                    <h3>REST API + Sanctum</h3>
                    <p>Token-based API access with documented endpoints.</p>
                </div>
            </div>
        </div>
    </section>

@endsection
