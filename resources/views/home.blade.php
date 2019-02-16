@extends('layouts.front')

@section('content')

<!--================Banner Area =================-->
        <section class="banner_area banner_area2">
            <div class="container">
                <div class="banner_content">
                    <h3 title="Members"><img class="left_img" src="img/banner/t-left-img.png" alt="">{{ __('home.members') }}<img class="right_img" src="img/banner/t-right-img.png" alt=""></h3>
                    <a href="/">{{ __('header.home_title') }}</a>
                    <a href="/home">{{ __('home.members') }}</a>
            </div>
        </section>
        <!--================End Banner Area =================-->

<!--================Pending Memebers Area =================-->
<section class="actives_members">
    <div class="container">
        <div class="welcome_title">
            <h3>{{ __('home.pending_request') }}</h3>
            <img src="img/w-title-b.png" alt="">
        </div>
        <div class="row member-flex">
            @if($pendingRequests->isNotEmpty())
                @foreach($pendingRequests as $request)
                <?php $user = $request->sender; ?>
                    <div class="col-sm-2 col-xs-6 request-outer">
                        <div class="active_mem_item">
                            <ul class="nav navbar-nav">
                                <li class="dropdown tool_hover">
                                <a href="/user/{{$user->id}}" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">
                                    @if($user->getMedia('avatars')->isNotEmpty())
                                        <img src="{{$user->getMedia('avatars')->last()->getUrl()}}" />
                                    @elseif($user->gender == 'Male')
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
                                                    @if($user->getMedia('avatars')->isNotEmpty())
                                                        <img src="{{$user->getMedia('avatars')->last()->getUrl()}}" />
                                                    @elseif($user->gender == 'Male')
                                                        <img src="{{ asset('male_dp.jpeg') }}" alt="" height="40" width="50">
                                                    @else
                                                        <img src="{{ asset('female_dp.jpeg') }}" alt="" height="40" width="50">
                                                    @endif
                                                </div>
                                                <div class="media-body">
                                                    <h6>@if($user->dob && !empty($user->dob)) {{ Carbon\Carbon::parse($user->dob)->age}}  @endif {{ __('home.years_old') }} <br> From Derby <br> Single</h6>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <h4>{{$user->name}}</h4>
                            <h5>@if($user->dob && !empty($user->dob)) {{ Carbon\Carbon::parse($user->dob)->age}}  @endif {{ __('home.years_old') }} </h5>
                            <a href="javascript:void(0);" class="approve-request" userid="{{$user->id}}"><i class="fa fa-check" aria-hidden="true"></i> <span>{{ __('home.approve') }}</span></a>
                            <a href="javascript:void(0);" class="decline-request" userid="{{$user->id}}"><i class="fa fa-times" aria-hidden="true"></i> <span>{{ __('home.decline') }}</span></a>
                        </div>
                    </div>
                @endforeach
            @else
                    <h3>{{ __('home.norequest') }}</h3>
            @endif
    </div>
</section>
<!--================End Pending Memebers Area =================-->

<!--================Active Memebers Area =================-->
<section class="actives_members">
    <div class="container">
        <div class="welcome_title">
            <h3>{{ __('home.activemembers') }}</h3>
            <img src="img/w-title-b.png" alt="">
        </div>
        <div class="row member-flex">
            @if($activeUsers->isNotEmpty())
                @foreach($activeUsers as $user)
                    <div class="col-sm-2 col-xs-6">
                        <div class="active_mem_item">
                            <ul class="nav navbar-nav">
                                <li class="dropdown tool_hover">
                                <a href="/user/{{$user->id}}" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">
                                    @if($user->getMedia('avatars')->isNotEmpty())
                                        <img src="{{$user->getMedia('avatars')->last()->getUrl()}}" />
                                    @elseif($user->gender == 'Male')
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
                                                    @if($user->getMedia('avatars')->isNotEmpty())
                                                        <img src="{{$user->getMedia('avatars')->last()->getUrl()}}" />
                                                    @elseif($user->gender == 'Male')
                                                        <img src="{{ asset('male_dp.jpeg') }}" alt="" height="40" width="50">
                                                    @else
                                                        <img src="{{ asset('female_dp.jpeg') }}" alt="" height="40" width="50">
                                                    @endif
                                                </div>
                                                <div class="media-body">
                                                    <h6>@if($user->dob && !empty($user->dob)) {{ Carbon\Carbon::parse($user->dob)->age}}  @endif {{ __('home.years_old') }} <br> From Derby <br> Single</h6>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <h4>{{$user->name}}</h4>
                            <h5>@if($user->dob && !empty($user->dob)) {{ Carbon\Carbon::parse($user->dob)->age}}  @endif {{ __('home.years_old') }} </h5>
                        </div>
                    </div>
                @endforeach
            @else
                    <h3>{{ __('home.no_online') }}</h3>
            @endif
    </div>
</section>
<!--================End Active Memebers Area =================-->
<section class="register_members_slider">
    <div class="container">
        <div class="welcome_title">
            <h3>{{ __('home.latestmembers') }}</h3>
            <img src="{{ asset('img/w-title-b.png') }}" alt="">
        </div>
        <div class="r_members_inner">
            @if(!empty($users))

                @foreach($users as $user)
                    <div class="item">
                    <a href="/user/{{$user->id}}">
                        @if($user->getMedia('avatars')->isNotEmpty())
                            <img src="{{$user->getMedia('avatars')->last()->getUrl()}}" />
                        @elseif($user->gender == 'Male')
                            <img src="{{ asset('male_dp.jpeg') }}" alt="">
                        @else
                            <img src="{{ asset('female_dp.jpeg') }}" alt="">
                        @endif
                        <h4>{{$user->name}}</h4>
                        <h5> @if($user->dob && !empty($user->dob)) {{ Carbon\Carbon::parse($user->dob)->age}}  @endif {{ __('home.years_old')  }}</h5>
                    </a>
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
            <h3>{{ __('home.all_members') }}</h3>
            <img src="img/w-title-b.png" alt="">
        </div>
        <div class="row member-flex view-list">
            @if($allUsers->isNotEmpty())
                @foreach($allUsers as $user)
                    <div class="col-sm-2 col-xs-6">
                        <div class="all_members_item">
                        <a href="/user/{{$user->id}}">
                            @if($user->getMedia('avatars')->isNotEmpty())
                                <img  src="{{$user->getMedia('avatars')->last()->getUrl()}}" />
                            @elseif($user->gender == 'Male')
                                <img src="{{ asset('male_dp.jpeg') }}" alt="">
                            @else
                                <img src="{{ asset('female_dp.jpeg') }}" alt="">
                            @endif
                            <h4>{{$user->name}}</h4>
                            <h5>@if($user->dob && !empty($user->dob)) {{ Carbon\Carbon::parse($user->dob)->age}}  @endif {{ __('home.years_old') }}</h5>
                        </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <a href="/allusers?page=2"  pageno="2"  class="register_angkar_btn view-more">{{ __('home.viewmore') }}</a>
    </div>
</section>
<!--================End All Members Area =================-->

@if($percentage < 75)
<div id="profile-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Your Profile</h4>
      </div>
      <div class="modal-body">
        <p>Your Profile is {{ceil($percentage)}}% done. Please Complete this.  </p>
      </div>
      <div class="modal-footer">
        <a href="/profile" class="btn btn-default" >Complete Now</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endif
@endsection
