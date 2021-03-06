@extends('Front.auth.master')

@section('title','Start Your Session')

@section('content')


<div class="form-content">

    <h1 class="">Start Your Session</h1>
    <p class="signup-link register">Already have an account? <a href="{{ url('login') }}">Log in</a></p>
    <form class="text-left" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form">

            {{-- <div id="username-field" class="field-wrapper input">
                <label for="username">USERNAME</label>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                <input id="username" name="username" type="text" class="form-control" placeholder="Username">
            </div> --}}

            <div id="email-field" class="field-wrapper input">
                <label for="phone_number">Phone Number</label>
                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register">
                    <circle cx="12" cy="12" r="4"></circle>
                    <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                </svg> --}}
                <input id="phone_number" name="phone_number" type="number" value="{{ old('phone_number') }}" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Your contact number">
                @error('phone_number')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>

            <div id="password-field" class="field-wrapper input mb-2">
                <div class="d-flex justify-content-between">
                    <label for="password">Password</label>
                    <a href="auth_pass_recovery_boxed.html" class="forgot-pass-link">Forgot Password?</a>
                </div>
                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> --}}
                <input id="password" name="password" type="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                @error('password')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>

            <div id="password-field" class="field-wrapper input mb-2">
                <div class="d-flex justify-content-between">
                    <label for="password">Confirm Password</label>
                </div>
                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> --}}
                <input id="password" name="password_confirmation" value="{{ old('password_confirmation') }}" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Retype your password">
                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> --}}
                @error('password_confirmation')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>

            <div class="field-wrapper terms_condition">
                <div class="n-chk">
                    <label class="new-control new-checkbox checkbox-primary">
                      <input type="checkbox" name="term_condition" value="I agree to the term and conditions" class="new-control-input">
                      <span class="new-control-indicator"></span><span>I agree to the <a href="javascript:void(0);">  terms and conditions </a></span>
                    </label>
                </div>
                @error('term_condition')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-sm-flex justify-content-between">
                <div class="field-wrapper">
                    <button type="submit" class="btn btn-primary" value="">Get Started!</button>
                </div>
            </div>

            {{-- <div class="division">
                <span>OR</span>
            </div>

            <div class="social">
                <a href="javascript:void(0);" class="btn social-fb">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                    <span class="brand-name">Facebook</span>
                </a>
               <a href="javascript:void(0);" class="btn social-github">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                    <span class="brand-name">Github</span>
                </a>
            </div> --}}

        </div>
    </form>

</div>

@endsection
