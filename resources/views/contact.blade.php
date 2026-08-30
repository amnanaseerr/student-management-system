@extends('layouts.site')
@section('title', 'Contact')
@section('sheet', 'CONTACT')

@section('content')

    <section class="hero" style="padding-bottom:40px;">
        <span class="coord-readout mono">X:0000  Y:0000</span>
        <div class="hero-inner">
            <span class="eyebrow">GET IN TOUCH</span>
            <h1 style="font-size:36px;">Contact <span class="accent">Us</span></h1>
            <p class="lead">Questions about the system? Send a message below.</p>
        </div>
    </section>

    <section>
        <div class="section-inner" style="max-width:640px;">

            @if (session('status'))
                <div class="success-box">{{ session('status') }}</div>
            @endif

            <form id="contact-form" method="POST" action="{{ route('contact.submit') }}">
                @csrf
                <div class="field">
                    <label>NAME</label>
                    <input type="text" name="name" value="{{ old('name') }}" required>
                    @error('name') <div class="error-msg">{{ $message }}</div> @enderror
                </div>
                <div class="field">
                    <label>EMAIL</label>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                    @error('email') <div class="error-msg">{{ $message }}</div> @enderror
                </div>
                <div class="field">
                    <label>MESSAGE</label>
                    <textarea id="message-field" name="message" required>{{ old('message') }}</textarea>
                    <div class="char-counter" id="char-counter"></div>
                    @error('message') <div class="error-msg">{{ $message }}</div> @enderror
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>

        </div>
    </section>

@endsection
