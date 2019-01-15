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
                            <div class="registration_form_s">
                                <h4>Registration</h4>
                                <form  method="POST" action="{{ route('register') }}" id="home-registration">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="reg_email2" placeholder="Email" name="email" value="{{ old('email') }}" required >
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="reg_first2" placeholder="Full Name" name="name" value="{{ old('name') }}" required>
                                    </div>
                                    <!-- <div class="form-group">
                                        <input type="text" class="form-control" id="reg_user2" placeholder="Username">
                                    </div> -->
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="reg_pass2" placeholder="Password"  name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="datepicker">
                                                    <input type='text' class="form-control datetimepicker4" placeholder="Birthday"  name="dob"/>
                                                    <span class="add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="reg_chose form-group">
                                        <button type="submit" value="LogIn" class="btn form-control login_btn">Register</button>
                                    </div>
                                </form>
                            </div>
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
                    <h3>Welcome to <span>Brown</span> Sugar Male</h3>
                    <img src="{{ asset('img/w-title-b.png') }}" alt="">
                </div>
                <div class="row">
                    <div class="col-sm-3 col-xs-6">
                        <div class="welcome_item">
                            <img src="{{ asset('img/welcome-icon/w-icon-1.png') }}" alt="">
                            <h4 class="counter">100</h4>
                            <h6>Total Members</h6>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="welcome_item">
                            <img src="{{ asset('img/welcome-icon/w-icon-2.png') }}" alt="">
                            <h4 class="counter">40</h4>
                            <h6>Members online</h6>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="welcome_item">
                            <img src="{{ asset('img/welcome-icon/w-icon-3.png') }}" alt="">
                            <h4 class="counter">30</h4>
                            <h6>Men online</h6>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <div class="welcome_item">
                            <img src="{{ asset('img/welcome-icon/w-icon-4.png') }}" alt="">
                            <h4 class="counter">10</h4>
                            <h6>Women online</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Welcome Area =================-->





<!--
<section class="banner-text">
    <div class="login-form">
		<div class="login-form-inner" data-aos="zoom-in-up">
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
                    <input type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
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

-->


<!--================Download Area =================-->
        <section class="download_area">
            <div class="download_full_slider">
                <div class="container">
                    <div class="row">
                        <div class="item">
                            <div class="col-md-7">
                                <div class="download_app_icon">
                                    <h3>Download <span>Brown </span><span>Sugar Male</span> app</h3>
                                    <h5>Free Available in All Store PlayStore, AppStore & Microsoft Store</h5>
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
                                        <img src="{{ asset('img/mobile-slider/mobile-1.png') }}" alt="">
                                          
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
                    <h3>Steps to Find Your Soul mate</h3>
                    <img src="{{ asset('img/w-title-b.png') }}" alt="">
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="find_soul_item">
                            <img src="{{ asset('img/soul-icon/soul-1.png') }}" alt="">
                            <h4>Create a profile</h4>
                            <p>Lorem ipsum Lorem ipsum Lorem ipsum</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="find_soul_item">
                            <img src="{{ asset('img/soul-icon/soul-2.png') }}" alt="">
                            <h4>Find matches </h4>
                            <p>Lorem Ipsum Lorem ipsum Lorem ipsum</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="find_soul_item">
                            <img src="{{ asset('img/soul-icon/soul-3.png') }}" alt="">
                            <h4>Start Dating</h4>
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
                            <h4>Find your perfect match With us </h4>
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
                        <a href="/membership/upgrade/{{$plan->stripe_plan_id}}" class="btn btn-success">Subscribe Now</a>
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
                    <h3>Latest registered members</h3>
                    <img src="{{ asset('img/w-title-b.png') }}" alt="">
                </div>
                <div class="r_members_inner">
                    <div class="item">
                        <img src="{{ asset('img/members/r_members-1.png') }}" alt="">
                        <h4>Rocky Ahmed</h4>
                        <h5>22 years old</h5>
                    </div>
                    <div class="item">
                        <img src="{{ asset('img/members/r_members-2.png') }}" alt="">
                        <h4>Alex Jones</h4>
                        <h5>23 years old</h5>
                    </div>
                    <div class="item">
                        <img src="{{ asset('img/members/r_members-3.png') }}" alt="">
                        <h4>Nancy Martin</h4>
                        <h5>25 years old</h5>
                    </div>
                    <div class="item">
                        <img src="{{ asset('img/members/r_members-4.png') }}" alt="">
                        <h4>Kavin Smith</h4>
                        <h5>20 years old</h5>
                    </div>
                    <div class="item">
                        <img src="{{ asset('img/members/r_members-5.png') }}" alt="">
                        <h4>Lena Adms</h4>
                        <h5>26 years old</h5>
                    </div>
                    <div class="item">
                        <img src="{{ asset('img/members/r_members-6.png') }}" alt="">
                        <h4>Peter Nevill</h4>
                        <h5>20 years old</h5>
                    </div>
                    <div class="item">
                        <img src="{{ asset('img/members/r_members-2.png') }}" alt="">
                        <h4>Alex Jones</h4>
                        <h5>23 years old</h5>
                    </div>
                    <div class="item">
                        <img src="{{ asset('img/members/r_members-3.png') }}" alt="">
                        <h4>Nancy Martin</h4>
                        <h5>25 years old</h5>
                    </div>
                </div>
            </div>
        </section>


@endsection