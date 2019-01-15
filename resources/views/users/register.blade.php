@extends('layouts.front')

@section('content')
<section class="banner-text signup">
<div class="container">
        <div class="inner-form">
        <form method="POST" data-aos="zoom-in-up" action="{{ route('register') }}">
            @csrf
                <h2>Get Started	</h2>
                <p>Take a second to register and you'll have complete access to everything!</p>
                <div class="form-inner">
                    <label>I am</label>
                    <div class="form-input">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-inner">
                    <label>Gender</label>
                    <div class="form-input">
                    <select class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" required autofocus>
                            <optgroup>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
                <div class="form-inner">
                    <label>{{ __('E-Mail Address') }}</label>
                    <div class="form-input">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-inner">
                    <label>Password</label>
                    <div class="form-input">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-inner">
                    <label>Confirm Password</label>
                    <div class="form-input">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>
                <div class="form-button">
                    <input type="submit" value="Start Now">
                </div>
            </form>
        </div>
    </div>
</section>
@endsection