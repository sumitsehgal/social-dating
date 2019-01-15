@extends('layouts.front')

@section('content')
<div class="container">
   <section class="register_members_slider">
            <div class="container">
                <div class="welcome_title">
                    <h3>Suggestions</h3>
                    <img src="{{ asset('img/w-title-b.png') }}" alt="">
                </div>
                <div class="r_members_inner">
                    @if(!empty($users))

                        @foreach($users as $user)
                            <div class="item">
                                @if($user->gender == 'Male')
                                    <img src="{{ asset('male_dp.jpeg') }}" alt="">
                                @else
                                    <img src="{{ asset('female_dp.jpeg') }}" alt="">
                                @endif
                                <h4>{{$user->name}}</h4>
                                <h5> @if($user->dob && !empty($user->dob)) {{ Carbon\Carbon::parse($user->dob)->age}}  @endif years old</h5>
                            </div>
                        @endforeach

                    @endif
                </div>
            </div>
        </section>
</div>
@endsection
