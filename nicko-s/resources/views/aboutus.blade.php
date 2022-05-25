<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Inter:wght@400;900&family=Open+Sans:wght@400;700;800&display=swap" rel="stylesheet">

  <link href="/css/aboutus.css" rel="stylesheet">

  <script src="https://kit.fontawesome.com/3793c07da5.js" crossorigin="anonymous"></script>
  @if (Session::has('customerlogin'))
  <?php
      $data = session()->get('data');
      if(!array_key_exists('image', $data->toArray())) {
          $data = session()->get('data')[0];
      }
  ?>
  @endif

</head>

<body>

  <div class = "navbar-os">

    <img src="/img/placeholder-logo.png" class = "navbar-logo">

    <ul>
      <li><a href="{{url('/')}}">Home</a></li>
      <li><a href="{{url('menu')}}">Menu</a></li>
      <li><a href="{{url('catering')}}">Catering</a></li>
      <li><a href="{{url('aboutus')}}">About Us</a></li>
      @if (Session::has('customerlogin'))
      <li><a href="{{url('logout')}}">Log Out</a></li>
      @else
      <li><a href="{{url('login')}}">Login</a></li>
      @endif
    </ul>

  </div>

  <div class = "c-m">

    <div class = "c-1">

      <div class = "c-1-1">

        <i class="fa-solid fa-circle-info"></i>

        <h1>About Us</h1>

        <p>We @ Nicko's offers food catering services for all your celebrations. We specialize in Lechon Belly , Bilao's and Food Trays. Book us Now and it will be our pleasure to serve you.</p>

      </div>

      <img src="/img/aboutus/banner-1.jpg" style = "aspect-ratio: 1 / 1;">

      <div class = "c-1-2">

        <h1>Contact Us</h1>

        <ul>
          <li><i class="fa-brands fa-facebook"></i> <span>https://www.facebook.com/Nickofoodcatering/</span></li>
          <li><i class="fa-solid fa-phone"></i> <span>09429597139</span></li>
          <li><i class="fa-solid fa-map-location-dot"></i> <span>Legaspi St, Dalaguete, Cebu</span></li>
        </ul>

      </div>

      <img src="/img/aboutus/banner-5.jpg">
      
      <img src="/img/aboutus/banner-3.jpg">

    </div>

    <div class = "c-2">

      <img src="/img/aboutus/bannerimg.jpg" style = "filter: brightness(60%);">

      <div class = "c-2-1">

        <i class="fa-solid fa-timeline"></i>

        <h1>Our Story</h1>

        <h2>19XX</h2>

        <img src="/img/aboutus/timeline-2.jpg" style = "border-radius: 5px;">

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

        <h2>20XX</h2>

        <img src="/img/aboutus/timeline-3.jpg" style = "border-radius: 5px;">

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>


      </div>


    </div>



  </div>


</body>







</html>
