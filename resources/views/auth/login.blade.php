@extends('layouts.site')
@section('title', 'Login')
@section('sheet', 'LOGIN')

@section('content')
<section>
    <div class="section-inner" style="max-width:440px;">
        <div class="card" style="margin-top:40px;">
            <span class="tag">ACCESS</span>
            <h3 style="font-size:22px; margin-bottom:20px;">Login to your account</h3>

            @if (session('status'))
                <div class="success-box">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="field">
                    <label>EMAIL</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email') <div class="error-msg">{{ $message }}</div> @enderror
                </div>
                <div class="field">
                    <label>PASSWORD</label>
                    <input type="password" name="password" required>
                    @error('password') <div class="error-msg">{{ $message }}</div> @enderror
                </div>
                <div class="field" style="display:flex; align-items:center; gap:8px;">
                    <input type="checkbox" name="remember" id="remember" style="width:auto;">
                    <label for="remember" style="margin:0;">Remember me</label>
                </div>

                <button type="submit" class="btn btn-primary" style="width:100%; justify-content:center;">Login</button>
            </form>

            <div style="text-align:center; margin-top:20px; font-size:13px; border-top:1px solid #E4E0D4; padding-top:16px;">
                Don't have an account? <a href="{{ route('register') }}" style="color:var(--amber-dark); font-weight:600;">Register</a>
            </div>
            <div style="text-align:center; margin-top:10px; font-size:13px;">
                <a href="{{ route('home') }}" class="mono" style="color:var(--ink-soft);">&larr; Back to Home</a>
            </div>
        </div>
    </div>
</section>
@endsection
