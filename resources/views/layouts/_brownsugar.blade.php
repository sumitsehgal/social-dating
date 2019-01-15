<!DOCTYPE html>
<html>
<head>
  <title>Brown Sugar Male</title>
  <link rel="stylesheet" href="{{ asset('css/aos.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/forgot-password.css') }}" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<body>

  <header>
    <div class="container">
      <div class="logo" data-aos="flip-left">
        <h2>Brown Sugar Male</h2>
      </div>
      <nav data-aos="fade-up-left">
        <ul>
          <li><a href="/neel">Home</a></li>
          <li><a href="#">Membership</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Contact Us</a></li>
          <li><a href="/login">Login</a></li>
        </ul>
      </nav>
    </div>
  </header>
  @yield('content')
  <footer>
    <p>Copyright &copy2018. All rights reserved.</p>
  </footer>
  <script src="js/aos.js"></script>
  <script>
    AOS.init({
      easing: 'ease-out-back',
      duration: 3000,
      delay:200
    });
  </script>
</body>
</html>
