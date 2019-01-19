@extends('layouts.front')

@section('content')
<div class="container">
<!--================Active Memebers Area =================-->
<section class="actives_members">
    <div class="container">
        <div class="welcome_title">
            <h3>Active Members</h3>
            <img src="img/w-title-b.png" alt="">
        </div>
        <div class="row">
            @if($activeUsers->isNotEmpty())
                @foreach($activeUsers as $user)
                    <div class="col-sm-2 col-xs-6">
                        <div class="active_mem_item">
                            <ul class="nav navbar-nav">
                                <li class="dropdown tool_hover">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    @if($user->gender == 'Male')
                                        <img src="{{ asset('male_dp.jpeg') }}" alt="" >
                                    @else
                                        <img src="{{ asset('female_dp.jpeg') }}" alt="" >
                                    @endif
                                </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="head_area">
                                                <h4>{{$user->name}}</h4>
                                                <h4>53% Match</h4>
                                            </div>
                                            <div class="media">
                                                <div class="media-left">
                                                    @if($user->gender == 'Male')
                                                        <img src="{{ asset('male_dp.jpeg') }}" alt="" height="40" width="50">
                                                    @else
                                                        <img src="{{ asset('female_dp.jpeg') }}" alt="" height="40" width="50">
                                                    @endif
                                                </div>
                                                <div class="media-body">
                                                    <h6>@if($user->dob && !empty($user->dob)) {{ Carbon\Carbon::parse($user->dob)->age}}  @endif years old <br> From Derby <br> Single</h6>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <h4>{{$user->name}}</h4>
                            <h5>@if($user->dob && !empty($user->dob)) {{ Carbon\Carbon::parse($user->dob)->age}}  @endif years old</h5>
                        </div>
                    </div>
                @endforeach
            @else
                    <h3>No Online</h3>
            @endif
    </div>
</section>
<!--================End Active Memebers Area =================-->
<section class="register_members_slider">
    <div class="container">
        <div class="welcome_title">
            <h3>Latest registered members</h3>
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


<!--================All Members Area =================-->
<section class="all_members_area">
    <div class="container">
        <div class="welcome_title">
            <h3>All Members</h3>
            <img src="img/w-title-b.png" alt="">
        </div>
        <div class="row">
            @if($allUsers->isNotEmpty())
                @foreach($allUsers as $user)
                    <div class="col-sm-2 col-xs-6">
                        <div class="all_members_item">
                            @if($user->gender == 'Male')
                                <img src="{{ asset('male_dp.jpeg') }}" alt="">
                            @else
                                <img src="{{ asset('female_dp.jpeg') }}" alt="">
                            @endif
                            <h4>{{$user->name}}</h4>
                            <h5>@if($user->dob && !empty($user->dob)) {{ Carbon\Carbon::parse($user->dob)->age}}  @endif years old</h5>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <a href="/allusers?page=2" class="register_angkar_btn view-more">View More</a>
    </div>
</section>
<!--================End All Members Area =================-->

</div>
@endsection
