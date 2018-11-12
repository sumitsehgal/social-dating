<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    <!-- Custom Styles By Sushant -->
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/style.css') }}" />

</head>
<body>
    <div id="app">
        <header>
            <div class="container">
                <div class="logo" data-aos="flip-left">
                    <h2>{{ config('app.name', 'Brown Sugar Male') }}</h2>
                </div>
                <nav data-aos="fade-up-left">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Membership</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        @if (Route::has('login'))
                            @auth
                                <li><a href="{{ url('/home') }}">Home</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                            @endauth
                        @endif
                        
                    </ul>
                </nav>
            </div>
        </header>  
        @yield('content')   
        <script src="{{ asset('js/aos.js') }}"></script>
        <script>
            $(document).ready(function()
            {
                AOS.init({
                    easing: 'ease-out-back',
                    duration: 3000,
                    delay:200
                });
            });
        </script>
    </div>
</body>
</html>
