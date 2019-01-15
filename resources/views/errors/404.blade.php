@extends('layouts.front')

@section('content')
        <section class="banner_area">
            <div class="container">
                <div class="banner_content">
                    <h3 title="404 Error"><img class="left_img" src="img/banner/t-left-img.png" alt="">404 Error<img class="right_img" src="img/banner/t-right-img.png" alt=""></h3>
                    <a href="/">Home</a>
                    <a href="/">Pages</a>
                    <a href="/">404 Error</a>
                </div>
            </div>
        </section>
        <!--================End Banner Area =================-->
        
        <!--================Error Area =================-->
        <section class="error_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="error_text">
                            <h6>Error</h6>
                            <h3>404</h3>
                            <h5>Page Not Found</h5>
                            <a class="register_angkar_btn" href="/">Go to Home Page</a>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </section>
        <!--================End Error Area =================-->

        @endsection