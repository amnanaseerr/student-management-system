@extends('layouts.site')
@section('title', 'Page Not Found')
@section('sheet', '404')

@section('content')
<section class="hero" style="min-height:50vh; display:flex; align-items:center;">
    <span class="coord-readout mono">X:0404  Y:0000</span>
    <div class="hero-inner">
        <span class="eyebrow">ERROR 404</span>
        <h1 style="font-size:36px;">Page <span class="accent">Not Found</span></h1>
        <p class="lead">The page you're looking for doesn't exist or may have moved.</p>
        <div class="hero-actions">
            <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
        </div>
    </div>
</section>
@endsection
