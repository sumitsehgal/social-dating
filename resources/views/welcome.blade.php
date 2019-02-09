@extends('layouts.front')

@section('content')
<!--================Slider Reg Area =================-->
        <section class="slider_area">
            <div class="slider_inner">
                <div class="rev_slider"  data-version="5.3.0.2" id="home-slider">
                    <ul> 
                       <li data-slotamount="7" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="600" data-rotate="0" data-saveperformance="off">
                            <!-- MAIN IMAGE -->
                            <img src="images/bg2.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->
                        </li>
                        <li data-slotamount="7" data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="600" data-rotate="0" data-saveperformance="off">
                            <!-- MAIN IMAGE -->
                            <img src="images/bg2.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->
                        </li>
                        
                    </ul> 
                </div><!-- END REVOLUTION SLIDER -->
            </div>
            <div class="registration_form_area">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            @if(!Auth::check())
                            <div class="registration_form_s">
                                <h4>{{ __('register.register_head') }}</h4>
                                <form  method="POST" action="{{ route('register') }}" id="home-registration" class="frm-register register-btn-submit">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="reg_email2" placeholder="{{ __('register.email') }}" name="email" value="{{ old('email') }}" required >
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="reg_first2" placeholder="{{ __('register.full_name') }}" name="name" value="{{ old('name') }}" required>
                                    </div>
                                    <!-- <div class="form-group">
                                        <input type="text" class="form-control" id="reg_user2" placeholder="Username">
                                    </div> -->
                                    <div class="form-group">
                                        <input type="password" class="form-control password" id="reg_pass2" placeholder="{{ __('register.password') }}"  name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <input id="password-confirm" type="password" class="form-control confirm-password" placeholder="{{ __('register.confirm_password') }}" name="password_confirmation" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <!-- <div class="btn-group">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" name="gender">
                                                    <span data-bind="label">Gender</span>&nbsp;<span class="arrow_carrot-down"><i class="fa fa-sort-asc" aria-hidden="true"></i><i class="fa fa-sort-desc" aria-hidden="true"></i></span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#">Male</a></li>
                                                        <li><a href="#">Female</a></li>
                                                    </ul>
                                                </div> -->
                                                <select name="gender" class="form-control input">
                                                    <option value="Male">{{ __('register.male') }}</option>
                                                    <option value="Female">{{ __('register.female') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="datepicker">
                                                    <input type='text' class="form-control datetimepicker4 datetime" placeholder="{{ __('register.birthday') }}"  name="dob" required autocomplete="off"/>
                                                    <span class="add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="reg_chose form-group">
                                        <button type="submit" value="LogIn" class="btn form-control login_btn ">{{ __('register.register') }}</button>
                                    </div>
                                </form>
                            </div>
                            @endif
                        </div>
                        <div class="col-sm-6">
                            <!-- <div class="form_man">
                                <img src="{{ asset('img/registration-man.png') }}" alt="">
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Slider Reg Area =================-->
        
        <!--================Welcome Area =================-->
        <section class="welcome_area">
            <div class="container">
                <div class="welcome_title">
                    <h3>{{ __('register.welcome_to') }} <span>{{ __('register.brown') }}</span> {{ __('register.sugar') }} {{ __('register.male') }}</h3>
                    <img src="{{ asset('img/w-title-b.png') }}" alt="">
                </div>
                <div class="row">
                    <div class="col-sm-3 col-xs-6">
                        <div class="welcome_item">
                            <img src="{{ asset('images/w-icon-1.png') }}" alt="">
                            <h4 class="counter">{{$users->total()}}</h4>
                            <h6>{{ __('register.total_members') }}</h6>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="welcome_item">
                            <img src="{{ asset('img/welcome-icon/w-icon-2.png') }}" alt="">
                            <h4 class="counter">{{ $onlineMale + $onlineFemale }}</h4>
                            <h6>{{ __('register.member_online') }}</h6>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="welcome_item">
                            <img src="{{ asset('img/welcome-icon/w-icon-3.png') }}" alt="">
                            <h4 class="counter">{{$onlineMale}}</h4>
                            <h6>{{ __('register.male_online')  }}</h6>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="welcome_item">
                            <img src="{{ asset('img/welcome-icon/w-icon-4.png') }}" alt="">
                            <h4 class="counter">{{$onlineFemale}}</h4>
                            <h6>{{ __('register.female_online') }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Welcome Area =================-->


<!--================Download Area =================-->
        <section class="download_area">
            <div class="download_full_slider">
                <div class="container">
                    <div class="row">
                        <div class="item">
                            <div class="col-md-7">
                                <div class="download_app_icon">
                                    <h3> {{ __('register.download') }} <span>{{ __('register.brown') }} </span><span>{{ __('register.sugar') }} {{ __('register.male') }}</span> {{ __('register.app') }}</h3>
                                    <h5>{{ __('register.free_phrase') }}</h5>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-android"></i></a></li>
                                        <li><a href="#"><i class="fa fa-apple"></i></a></li>
                                        <li><a href="#"><i class="fa fa-windows"></i></a></li>
                                    </ul>
                                </div>
                                <div class="download_content">
                                    <div class="item">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua.</p>
                                        <h4>Lorem ipsum</h4>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="item">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua.</p>
                                        <h4>Lorem ipsum</h4>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="download_moblie">
                                    <div class="download_m_slider">
                                        <img src="img/mobile-slider/mobile-1.png" alt="">
                                            <div class="download_moblile_slider">
                                                <div class="item">
                                                    <!-- <img src="img/mobile-slider/screen-1.png" alt=""> -->
                                                    {{ __('register.coming_soon') }}
                                                </div>
                                                <div class="item">
                                                    <!-- <img src="img/mobile-slider/screen-1.png" alt=""> -->
                                                    {{ __('register.coming_soon') }}
                                                </div>
                                                <div class="item">
                                                    <!-- <img src="img/mobile-slider/screen-1.png" alt=""> -->
                                                    {{ __('register.coming_soon') }}
                                                </div>
                                                <!-- <div class="item">
                                                    <img src="img/mobile-slider/screen-1.png" alt="">
                                                </div>
                                                <div class="item">
                                                    <img src="img/mobile-slider/screen-1.png" alt="">
                                                </div> -->
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Download Area =================-->
        
        <!--================Find Your Soul Area =================-->
        <section class="find_soul_area">
            <div class="container">
                <div class="welcome_title">
                    <h3>{{ __('register.soul_steps') }}</h3>
                    <img src="{{ asset('img/w-title-b.png') }}" alt="">
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="find_soul_item">
                            <img src="{{ asset('images/soul-1.png') }}" alt="">
                            <h4>{{ __('register.create_profile') }}</h4>
                            <p>Lorem ipsum Lorem ipsum Lorem ipsum</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="find_soul_item">
                            <img src="{{ asset('img/soul-icon/soul-2.png') }}" alt="">
                            <h4>{{ __('register.findmatches') }} </h4>
                            <p>Lorem Ipsum Lorem ipsum Lorem ipsum</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="find_soul_item">
                            <img src="{{ asset('images/soul-3.png') }}" alt="">
                            <h4>{{ __('register.startdating') }}</h4>
                            <p>Lorem ipsum Lorem ipsum Lorem ipsum</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Find Your Soul Area =================-->
        
        <!--================Video Area =================-->
        <section class="video_area">
            <div class="row m0 video_row">
                <iframe id="video" src="http://www.youtube.com/embed/bCIXMvE5nL4?enablejsapi=1&amp;html5=1&amp;rel=0&amp;fs=0&amp;loop=1&amp;showinfo=0&amp;disablekb=0&amp;controls=1&amp;color=white&amp;playlist=bCIXMvE5nL4&amp;autoplay=1"></iframe>
                <div class="overlay" id="video_overlay">
                    <div class="overlay_bg"></div>
                    <div class="play_pause row m0">
                       <!--  <i class="fa fa-play" aria-hidden="true" id="play_btn"></i>
                        <i class="fa fa-pause" aria-hidden="true" id="pause_btn"></i> -->
                        <div class="video_content">
                            <h4>{{  __('register.find_perfect_match') }} </h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Video Area =================-->

        <!-- ============== Pricing Membership =================== -->


             <!--pricing--table -->
        <div class="wrapper-pricing">
            @if($plans->isNotEmpty())
                @foreach($plans as $plan)
                    <div class="package">
                        <div class="name">{{$plan->title}}</div>
                        <div class="price">{{$plan->scope}}</div>
                        <div class="trial">Available for {{$plan->description}}</div>
                        <hr>
                        <ul>
                            <li>
                                <strong>8</strong> team members
                            </li>
                            <li>
                                <strong>6</strong> team playlists
                            </li>
                            <li>
                                <strong>Unlimited</strong> public playlists
                            </li>
                        </ul>
                        <a href="/membership/upgrade/{{$plan->stripe_plan_id}}" class="btn btn-success  @auth @else login-check  @endauth ">{{ __('register.subscribe_now') }}</a>
                    </div>
                @endforeach
            @endif    
   		</div>
        <!-- ================= End of Pricing Membership =============== -->
        
        <!--================Testimonials Area =================-->

        <!--================End Blog slider Area =================-->
        
        <!--================Register Members slider Area =================-->
        <section class="register_members_slider">
            <div class="container">
                <div class="welcome_title">
                    <h3>{{ __('register.latest_register') }}</h3>
                    <img src="{{ asset('img/w-title-b.png') }}" alt="">
                </div>
                <div class="r_members_inner">
                    @if($users->isNotEmpty())
                        @foreach($users as $user)
                            <div class="item">
                                <a href="/user/{{$user->id}}">
                                    @if($user->getMedia('avatars')->isNotEmpty())
                                        <img src="{{$user->getMedia('avatars')->last()->getUrl()}}" height="172" width="172" />
                                    @elseif($user->gender == 'Male')
                                        <img src="{{ asset('male_dp.jpeg') }}" alt="">
                                    @else
                                        <img src="{{ asset('female_dp.jpeg') }}" alt="">
                                    @endif
                                    <h4>{{$user->name}}</h4>
                                    <h5>@if($user->dob && !empty($user->dob)) {{ Carbon\Carbon::parse($user->dob)->age}} years old @endif &nbsp;</h5>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>


@endsection