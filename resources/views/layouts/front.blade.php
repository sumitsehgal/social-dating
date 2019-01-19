<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('img/fav-icon.png" type="image/x-icon') }}" />
        <title>Brown Sugar Male - Dating Social Network Website</title>
        <link href="{{ asset('vendors/material-icon/css/materialdesignicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/linears-icon/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/revolution/css/layers.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/revolution/css/navigation.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendors/revolution/css/settings.css') }}">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/image-dropdown/dd.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/image-dropdown/flags.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/image-dropdown/skin2.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/bootstrap-selector/bootstrap-select.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/bootstrap-datepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/owl-carousel/assets/owl.carousel.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/animate-css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/bs-tooltip/jquery.webui-popover.css') }}" rel="stylesheet">
        <link href="{{ asset('vendors/jquery-ui/jquery-ui.css') }}" rel="stylesheet">
        
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

        <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
       
        <script src="{{ asset('js/map-custome.js') }}"></script> -->


    </head>
    <body>
       
       <div class="login_form_inner zoom-anim-dialog mfp-hide" id="small-dialog">
           <h4>Login</h4>
           <form method="POST" action="{{ route('login') }}" id="lgn-frm">
                @csrf
                <div id="errs"></div>
               <input type="email"  placeholder="Email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required id='lg-email'>
               @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
               <input type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required id='lg-pass'>
               @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
               <div class="login_btn_area">
                   <button type="submit" value="LogIn" class="btn form-control login_btn">LogIn</button>
                   <a class="btn btn-link forgot popup-with-zoom-anim" href="#forgot-dialog">
                        {{ __('Forgot Your Password?') }}
                    </a>
                   <div class="login_social">
                       <h5>Login With</h5>
                       <ul>
                           <!-- <li><a href="#"><i class="fa fa-facebook"></i></a></li> -->
                           <li><a href="{{ url('login/google') }}"><i class="fa fa-google-plus"></i></a></li>
                       </ul>
                   </div>
               </div>
           </form>
           <img class="mfp-close" src="{{ asset('img/close-btn.png') }}" alt="">
        </div>
       
        <div class="register_form_inner zoom-anim-dialog mfp-hide" id="register_form">
            <div class="row">
                <div class="col-md-6">
                    <div class="registration_man">
                        <img src="{{ asset('img/Registration_man.png') }}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="registration_form_s">
                        <h4>Registration</h4>
                        <form  method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control" id="reg_email" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="reg_first" placeholder="Full Name" name="name" required>
                            </div>
                            <!-- <div class="form-group">
                                <input type="text" class="form-control" id="reg_user" placeholder="Username">
                            </div> -->
                            <div class="form-group">
                                <input type="password" class="form-control" id="reg_pass" placeholder="Password" name="password" required>
                            </div>
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                            </div>
                            <div class="form-group">
                                <!-- <div class="btn-group">
                                    <button type="button" name="gender" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
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
                            <div class="form-group">
                                <div class="datepicker">
                                    <input type='text' class="form-control datetimepicker4" placeholder="Birthday" name="dob" />
                                    <span class="add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="reg_chose form-group">
                                <!-- <div class="reg_check_box">
                                    <input type="radio" id="s-option" name="selector">
                                    <label for="s-option">I`m Not Robot</label>
                                    <div class="check"><div class="inside"></div></div>
                                </div> -->
                                <button type="submit" value="LogIn" class="btn form-control login_btn">Register</button>
                            </div>
                        </form>
                        <img class="mfp-close" src="{{ asset('img/close-btn.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="login_form_inner zoom-anim-dialog mfp-hide" id="forgot-dialog">
           <h4>Forgot Password</h4>
           <form method="POST" action="{{ route('login') }}" id="lgn-frm">
                @csrf
                <div id="errs"></div>
               <input type="email"  placeholder="Email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required id='lg-email'>
               @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
               <div class="login_btn_area">
                   <button type="submit" value="LogIn" class="btn form-control login_btn">Submit</button>
               </div>
           </form>
           <img class="mfp-close" src="{{ asset('img/close-btn.png') }}" alt="">
        </div>
       
        <!--================Frist Main hader Area =================-->
        <header class="header_menu_area">
            <nav class="navbar navbar-default">
                <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img src="/images/logo1.png" alt="Logo"></a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">

                        <li class=" {{ request()->is('/') ? 'active' : '' }}">
                            <a href="/" >Home</a>
                        </li>
                        @if (Route::has('login'))
                            @auth
                                <li class="{{ request()->is('home') ? 'active' : '' }}"><a href="/home">Dashboard</a></li>
                            @endauth
                        @endif
                        <li class="{{ request()->is('about-us') ? 'active' : '' }}"><a href="/about-us">About Us</a></li>
                        <li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="/contact">Contact Us</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if (Route::has('login'))
                            @auth
                                 <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @else
                                <li><a class="popup-with-zoom-anim" href="#small-dialog"><i class="mdi mdi-key-variant"></i>Login</a></li>
                                <li><a href="#register_form" class="popup-with-zoom-anim"><i class="fa fa-user-plus"></i>Registration</a></li>

                            @endauth
                        @endif
                        
                    
                        <li class="flag_drop">
                            <div class="selector">
                                <select class="language_drop" name="countries" id="countries" style="width:300px;">
                                  <option value='yt' data-image="{{ asset('img/country-aus.png') }}" data-imagecss="flag yt" data-title="English">English</option>
                                  <option value='yt' data-image="{{ asset('img/country-fre.png') }}" data-imagecss="flag yt" data-title="English">French</option>
                                </select>
                            </div>
                        </li>
                    </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </header>
        <!--================Frist Main hader Area =================-->


        @yield('content')
        
       
        <!--================End Register Members  slider Area =================-->
        
        <!--================End Map Area =================-->
        
        <!--================Footer Area =================-->
        <footer class="footer_area">
           
            <div class="copyright">
                <div class="copyright_left">
                    <div class="copyright_text">
                        <h4>Copyright &copy; <script type="text/javascript">document.write(new Date().getFullYear());</script> Brown Sugar Male</h4>
                    </div>
                </div>
                <div class="copyright_right">
                    <div class="copyright_social">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!--================End Footer Area =================-->
        
        
        
        <div id="largeContent" style="display:none;">
            <div class="media tool_content">
                <div class="media-left">
                    <img src="{{ asset('img/map-persion.png') }}" alt="">
                </div>
                <div class="media-body">
                    <h3>Sandi Williams</h3>
                    <h5>21 years old</h5>
                    <h5>From Paris</h5>
                    <h5>Distance 16 km</h5>
                </div>
            </div>
        </div>
        

        <script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendors/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
        <script src="{{ asset('vendors/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
        <!--RS5.0 Extensions-->
        <script src="{{ asset('vendors/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
        <script src="{{ asset('vendors/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
        <script src="{{ asset('vendors/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
      
        <!-- Extra plugin js -->
        <script src="{{ asset('vendors/image-dropdown/jquery.dd.min.js') }}"></script>
        <script src="{{ asset('vendors/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/theme.js') }}"></script>
        <script src="{{ asset('js/brown.js') }}"></script>


    </body>

</html>