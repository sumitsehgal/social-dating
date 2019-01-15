@extends('layouts.front')

@section('content')
<div class="container">
 <section class="register_members_slider">
  <div class="container">

    <div class="forgot-form">
     @if (session('status'))
     <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
      @csrf
      <h2>Forgot Password</h2>
      <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
      @if ($errors->has('email'))
      <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('email') }}</strong>
      </span>
      @endif
      <div class="forgot-button">
        <input type="submit" value="Submit" >
      </div>
    </form>
  </div>
</div>
</section>
</div>
@endsection