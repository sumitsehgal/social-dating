
@extends('layouts.front')

@section('content')

        <!--Banner Area -->
        <section class="banner_area">
            <div class="container">
                <div class="banner_content">
                    <h3 title="Contact us"><img class="left_img" src="img/banner/t-left-img.png" alt="">Contact us<img class="right_img" src="img/banner/t-right-img.png" alt=""></h3>
                    <a href="/">Home</a>
                    <a href="/contact">Contact us</a>
                </div>
            </div>
        </section>
        <!--End Banner Area -->
        
        <!--Contact Address-->
        <section class="address_details">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="address_item">
                            <img src="img/soul-icon/address-1.png" alt="">
                            <h3>Address</h3>
                            <h4>Makily Duchaine</h4>
                            <h4>15 voie de la grange des prés 60260 Lamorlaye</h4>
                            <h4>France</h4>
                        </div>
                    </div>




                    <div class="col-sm-4">
                        <div class="address_item">
                            <img src="img/soul-icon/address-2.png" alt="">
                            <h3>Phone</h3>
                            <h4>+(33) 0628912394</h4>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="address_item">
                            <img src="img/soul-icon/address-3.png" alt="">
                            <h3>Email</h3>
                            <h4>neelfact1@hotmail.fr</h4>
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
                    <h3>Get in Touch With us</h3>
                    <img src="img/w-title-b.png" alt="">
                </div>
                <div class="row">
                    <form action="http://html.verodate.com/verodate/contact_process.php" method="post" id="contactForm" class="form_inner">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <textarea id="comment" placeholder="Message" id="message" name="message" rows="1"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" value="LogIn" class="btn form-control login_btn">Submit</button>
                        </div>
                    </form>
                    <div id="success">
                        <p>Your text message sent successfully!</p>
                    </div>
                    <div id="error">
                        <p>Sorry! Message not sent. Something went wrong!!</p>
                    </div>
                </div>
            </div>
        </section>

        @endsection