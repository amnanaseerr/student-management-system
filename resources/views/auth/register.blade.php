@extends('layouts.site')
@section('title', 'Register')
@section('sheet', 'REGISTER')

@section('content')
<section>
    <div class="section-inner" style="max-width:440px;">
        <div class="card" style="margin-top:40px;">
            <span class="tag">GET STARTED</span>
            <h3 style="font-size:22px; margin-bottom:20px;">Create an account</h3>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="field">
                    <label>NAME</label>
                    <input type="text" name="name" value="{{ old('name') }}" required autofocus>
                    @error('name') <div class="error-msg">{{ $message }}</div> @enderror
                </div>
                <div class="field">
                    <label>EMAIL</label>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                    @error('email') <div class="error-msg">{{ $message }}</div> @enderror
                </div>
                <div class="field">
                    <label>PASSWORD</label>
                    <input type="password" name="password" required>
                    @error('password') <div class="error-msg">{{ $message }}</div> @enderror
                </div>
                <div class="field">
                    <label>CONFIRM PASSWORD</label>
                    <input type="password" name="password_confirmation" required>
                </div>

                <button type="submit" class="btn btn-primary" style="width:100%; justify-content:center;">Register</button>
            </form>

            <div style="text-align:center; margin-top:20px; font-size:13px; border-top:1px solid #E4E0D4; padding-top:16px;">
                Already have an account? <a href="{{ route('login') }}" style="color:var(--amber-dark); font-weight:600;">Login</a>
            </div>
            <div style="text-align:center; margin-top:10px; font-size:13px;">
                <a href="{{ route('home') }}" class="mono" style="color:var(--ink-soft);">&larr; Back to Home</a>
            </div>
        </div>
    </div>
</section>
@endsection
