
@extends('layouts.front')

@section('content')

        <!--Banner Area -->
        <section class="banner_area">
            <div class="container">
                <div class="banner_content">
                    <h3 title="Contact us"><img class="left_img" src="img/banner/t-left-img.png" alt="">{{ __('header.contact_us_title') }}<img class="right_img" src="img/banner/t-right-img.png" alt=""></h3>
                    <a href="/">{{ __('header.home_title') }}</a>
                    <a href="/contact">{{ __('header.contact_us_title') }}</a>
                </div>
            </div>
        </section>
        <!--End Banner Area -->
        
        <!--Contact Address-->
        <section class="address_details">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-sm-4">
                        <div class="address_item">
                            <img src="img/soul-icon/address-1.png" alt="">
                            <h3>{{ __('contact.address') }}</h3>
                            <h4>Makily Duchaine</h4>
                            <h4>15 voie de la grange des prés<br> 60260 Lamorlaye, France</h4>
                        </div>
                    </div> -->




                    <div class="col-sm-6">
                        <div class="address_item">
                            <img src="img/soul-icon/address-2.png" alt="">
                            <h3>{{ __('contact.phone')  }}</h3>
                            <h4>+(33) 628912394</h4>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="address_item">
                            <img src="img/soul-icon/address-3.png" alt="">
                            <h3>{{ __('register.email') }}</h3>
                            <h4>Brownshugarmale@outlook.fr</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Contact Address-->
        <!--Contact Form Area-->
        <section class="contact_form_area">
            <div class="container">
                <div class="welcome_title">
                @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                    <h3>{{ __('contact.getintouch') }}</h3>
                    <img src="img/w-title-b.png" alt="">
                </div>
                <div class="row">
                    <form action="/contact" method="post" id="contactForm" class="form_inner">
                    @csrf
                        <div class="col-md-6">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('contact.name') }}" required> 
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="{{ __('register.email') }}" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="{{ __('contact.subject') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <textarea id="comment" placeholder="{{ __('contact.message') }}" id="message" name="message" rows="1"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" value="LogIn" class="btn form-control login_btn">{{ __('contact.submit') }}</button>
                        </div>
                    </form>
                    <div id="success">
                        <p>{{ __('contact.success_msg') }}</p>
                    </div>
                    <div id="error">
                        <p>{{ __('contact.err_msg') }}</p>
                    </div>
                </div>
            </div>
        </section>

        @endsection