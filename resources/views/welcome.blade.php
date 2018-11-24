@extends('layouts.front')

@section('content')
<section class="banner-text">
    <div class="login-form">
		<div class="login-form-inner">
		    <h2>{{ __('LOGIN') }}</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="email">
                    <input type="text"  placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="email password">
                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="forgot-wrapper">
                    <div class="remember">
                        <input type="checkbox"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> <span>Remember me</span>
                    </div>
                    <div class="forgot">
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                </div>
                <div class="login-button">
                    <input type="submit" value="LOGIN">
                </div>
                <div class="OR">
                    <span>OR</span>
                </div>
                <div class="facebook-button">
                    <a href="{{ url('login/google') }}" class="btn btn-social-icon btn-google-plus">G+ LogIn</a>
                </div>
                <div class="account-register">
                    <span>Don't have an account?</span>
                    <a href="/signup">SIGNUP NOW!</a>
                </div>
            </form>
		</div>
    </div>
</section>
@endsection