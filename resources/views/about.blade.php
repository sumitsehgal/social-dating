@extends('layouts.front')

@section('content')        
        
        <!--================Banner Area =================-->
        <section class="banner_area">
            <div class="container">
                <div class="banner_content">
                    <h3 title="About us"><img class="left_img" src="img/banner/t-left-img.png" alt="">{{ __('header.about_us_title') }}<img class="right_img" src="img/banner/t-right-img.png" alt=""></h3>
                    <a href="/">{{ __('header.home_title') }}</a>
                    <a href="/about-us">{{ __('header.about_us_title') }}</a>
                </div>
            </div>
        </section>
        <!--================End Banner Area =================-->
        
        <!--================who we are Area =================-->
        <section class="who_we_are_area">
            <div class="container">
                <div class="welcome_title">
                    <h3>{{ __('about.whoweare') }}</h3>
                    <img src="img/w-title-b.png" alt="">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="who_we_left">
                            <h4>{{ __('about.whowetitle') }}</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="who_we_right">
                             <img src="images/about-us-right.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End who we are Area =================-->
        <section class="find_soul_area">
            <div class="container">
                <div class="welcome_title">
                    <h3>{{ __('about.whypeoplechosing') }}</h3>
                    <img src="img/w-title-b.png" alt="">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="find_soul_item">
                            <img src="img/soul-icon/soul-4.png" alt="">
                            <h4>{{ __('about.worthycandidates') }}</h4>
                            <p>{{ __('about.worthycontents') }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="find_soul_item">
                            <img src="img/soul-icon/soul-5.png" alt="">
                            <h4>{{ __('about.absolutesecurity') }}</h4>
                            <p>{{ __('about.absolutecontent') }}</p>
                        </div>
                    </div>
                    <!-- <div class="col-md-4">
                        <div class="find_soul_item">
                            <img src="img/soul-icon/soul-6.png" alt="">
                            <h4>Calling</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.</p>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        <!--================Best Mate Area =================-->
        <section class="best_mate_area">
            <div class="best_bg_slider">
                <div class="rev_slider"  data-version="5.3.0.2" id="about-bg-slider">
                    <ul> 
                        <li data-transition="zoomin" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000" data-rotate="0"  data-saveperformance="off"  data-title="Ken Burns" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                            <img src="img/about-bg/about-bg-1.jpg"  alt=""  data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="150" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->
                        </li>
                        <li data-transition="zoomin" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000" data-rotate="0"  data-saveperformance="off"  data-title="Ken Burns" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                            <img src="img/about-bg/about-bg-1.jpg"  alt=""  data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->
                        </li>
                    </ul> 
                </div>
                
            </div>
            <div class="left_best_content">
                <div class="left_inner_content">
                    <div class="left_inner_right">
                        <h4>{{ __('about.bestway') }}</h4>
                        <p>{{ __('about.joinbest') }} </p>
                        <a href="/register" class="btn form-control login_btn">{{ __('about.joinnow') }}</a>
                    </div>
                </div>
                <div class="right_best_content"></div>
            </div>
        </section>
        <!--================End Best Mate Area =================-->
        <!--================Our Team Area =================-->
        <section class="our_team_area">
            <div class="container">
                <div class="welcome_title">
                    <h3>{{ __('about.meetteam') }}</h3>
                    <img src="img/w-title-b.png" alt="">
                </div>
                <div class="row team_inner_area">
                    <div class="col-md-3 col-sm-6">
                        <div class="team_items">
                            <img src="images/owner1.jpg" alt="Neel">
                            <a class="plus_zoom" href="#"></a>
                            <div class="hover_details">
                                <h4>Neel Duchaine</h4>
                                <h5>{{ __('about.founder') }}</h5>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-3 col-sm-6">
                        <div class="team_items">
                            <img src="img/members/our-team/our-team-2.jpg" alt="">
                            <a class="plus_zoom" href="#"></a>
                            <div class="hover_details">
                                <h4>Maria Watson</h4>
                                <h5>Ceo- co Founder</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="team_items">
                            <img src="img/members/our-team/our-team-3.jpg" alt="">
                            <a class="plus_zoom" href="#"></a>
                            <div class="hover_details">
                                <h4>Rocky Ahmed</h4>
                                <h5>Web Developer</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="team_items">
                            <img src="img/members/our-team/our-team-4.jpg" alt="">
                            <a class="plus_zoom" href="#"></a>
                            <div class="hover_details">
                                <h4>Maria Watson</h4>
                                <h5>Ceo- co Founder</h5>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
            <!--================End Our Team Area =================-->
@endsection            