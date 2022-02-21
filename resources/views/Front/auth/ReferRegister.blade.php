@extends('Front.auth.master')

@section('title','Welcom to Survey Pesa')

@section('content')


<div class="form-content">

    <h3 class="">Sign up and get Kshs.500 </h3>
    <p class="signup-link register">It's a limited time offer, Hurry up... </p>
    <form class="text-left" method="POST" action="{{ route('store_invitedUser') }}">
        @csrf
        <div class="form">

            <div id="email-field" class="field-wrapper input">
                <label for="phone_number">Phone Number</label>
                <input id="phone_number" name="phone_number" type="number" value="{{ old('phone_number') }}" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Your contact number">
                <input name="refer_id" type="hidden" value="{{ $refer_id }}" >
                @error('phone_number')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>

            <div id="password-field" class="field-wrapper input mb-2">
                <div class="d-flex justify-content-between">
                    <label for="password">Password</label>
                    <a href="auth_pass_recovery_boxed.html" class="forgot-pass-link">Forgot Password?</a>
                </div>
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
                <input id="password" name="password_confirmation" value="{{ old('password_confirmation') }}" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Retype your password">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
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

        </div>
    </form>

</div>

@endsection
