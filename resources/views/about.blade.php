@extends('layouts.site')
@section('title', 'About')
@section('sheet', 'ABOUT')

@section('content')

    <section class="hero" style="padding-bottom:40px;">
        <span class="coord-readout mono">X:0000  Y:0000</span>
        <div class="hero-inner">
            <span class="eyebrow">ABOUT THIS PROJECT</span>
            <h1 style="font-size:36px;">Built for <span class="accent">student offices</span></h1>
            <p class="lead">A Laravel application for managing students, courses, and enrollment —
                designed to be simple to use and secure by default.</p>
        </div>
    </section>

    <section>
        <div class="section-inner">
            <div class="section-head">
                <span class="eyebrow">WHAT'S INSIDE</span>
                <h2>Core modules</h2>
                <p>Everything needed to run student records day to day.</p>
            </div>
            <div class="grid grid-2">
                <div class="card">
                    <span class="tag">MODULE</span>
                    <h3>Student &amp; Course Records</h3>
                    <p>Full CRUD for students and courses, with each student linked to a course
                        through a proper Eloquent relationship.</p>
                </div>
                <div class="card">
                    <span class="tag">MODULE</span>
                    <h3>Authentication &amp; Roles</h3>
                    <p>Secure login and registration, with role-based access so only admins can
                        create, edit, or delete records.</p>
                </div>
                <div class="card">
                    <span class="tag">MODULE</span>
                    <h3>Search &amp; File Uploads</h3>
                    <p>Search and pagination on the student list, plus profile photo uploads for
                        each student.</p>
                </div>
                <div class="card">
                    <span class="tag">MODULE</span>
                    <h3>REST API</h3>
                    <p>A documented, token-secured JSON API covering the same student and course
                        data, for use outside the browser.</p>
                </div>
            </div>
        </div>
    </section>

@endsection
