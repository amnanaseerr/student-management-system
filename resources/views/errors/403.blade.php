@extends('layouts.site')
@section('title', 'Access Denied')
@section('sheet', '403')

@section('content')
<section class="hero" style="min-height:50vh; display:flex; align-items:center;">
    <span class="coord-readout mono">X:0403  Y:0000</span>
    <div class="hero-inner">
        <span class="eyebrow">ERROR 403</span>
        <h1 style="font-size:36px;">Access <span class="accent">Restricted</span></h1>
        <p class="lead">You're logged in, but this page is only available to admin accounts.</p>
        <div class="hero-actions">
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
            <a href="{{ route('home') }}" class="btn btn-outline">Home</a>
        </div>
    </div>
</section>
@endsection
