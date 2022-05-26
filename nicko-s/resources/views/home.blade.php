<html>

    <head>
        <meta charset="utf-8">
        <title>Home Page</title>
        <link href="/css/home.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Forum&family=Open+Sans&family=Quicksand:wght@300&family=Satisfy&family=Work+Sans:wght@300&display=swap" rel="stylesheet">
        <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

        @if (Session::has('customerlogin'))
        <?php 
            $data = session()->get('data'); 
            if(!array_key_exists('image', $data->toArray())) {
                $data = session()->get('data')[0]; 
            }
        ?>
        @endif
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Forum&family=Open+Sans&family=Satisfy&family=Work+Sans:wght@300&display=swap" rel="stylesheet">

    </head>

    <body>
        <div class="nav-style">
            <nav>
                <ul>
                    <li><a href="{{url('/')}}">HOME</a></li>

                    <li><a href="{{url('menu')}}">MENU</a></li>
                    <li><a href="{{url('catering')}}">CATERING</a></li>

                </ul>
                    <h2 class="logo">Nicko's</h2>
                    <h2 class="logo-1">Kitchen</h2>
                <ul>
                    <li><a href="{{url('aboutus')}}">ABOUT US</a></li>
                    @if (Session::has('customerlogin'))
                    <li><a href="{{url('logout')}}">LOGOUT</a></li>
                    <li><a  href="{{url('profile')}}">
                        <img src="/img/{{$data->image}}" id="avatar">
                    </a></li>
                    @else
                    <li><a href="#">CONTACT</a></li>
                    <li><a href="{{url('login')}}">LOGIN</a></li>
                    @endif
                </ul>
            </nav>
        </div>

        <div class="featured-container">
            <div class="feature-1">
                <h2 class="f-1-1">Lechon Belly,</h2>
                <h2 class="f-1-2">Bilao Fiesta</h2>
                <h2 class="f-1-3">& Food Trays</h2>
                <p class="f-1-4">It will be our pleasure to serve you.</p>
                <a href="{{url('menu')}}" class="f-1-btn1">View Menu</a>
                <a href="{{url('catering')}}" class="f-1-btn2">Book us Now</a>
            </div>

            <div class="feature-2">
                <div class="circle-2"></div>
                <img src="/img/Nicko's _1.png" class="f-2-img" alt="feature-img">
            </div>
        </div>
    </body>

    <div class="featured-container2">
        <div class="featured-header">
        @foreach($content as $cnt)
            <h1 class="fh-txt1">{{$cnt->FeaturedFoodHeader}}</h1>
            <h3 class="fh-txt2">{{$cnt->FeaturedFoodSubText}}</h3>
        @endforeach
        </div>
        <div class="featured-food">
        @foreach($food as $f)
            <div class="featured-food-box">
                <img src="{{asset('public/img/'.$f->image)}}" class="food-img">
                <h1 class="featured-food-name">{{$f->Name}}</h1>
                <p class="featured-food-desc">PHP {{$f->Price}} Tray</p>
                <a href="{{url('viewfood/'.$f->Name)}}" class="food-view">View</a>
            </div>
        @endforeach
        </div>

        <div class="featured-catering-header">
        @foreach($content as $cnt)
            <div class="ct-htxt-box">
            <h1 class="ct-htxt">{{$cnt->CateringTextHeader}}</h1>
            </div>
            <div class="ct-stxt-box">
            <h3 class="ct-stxt">{{$cnt->CateringSubText}}</h3>
            </div>
            <img src="{{asset('public/img/'.$cnt->CateringImage)}}" class="catering-food-img">
            <a href="{{url('catering')}}" class="ct-btn">Book us Now</a>
        @endforeach
        </div>

        <div class="featured-testimonials">

          <h1>Testimonials</h1>

          <div class = "t-c" id = "testimonialsContainers">

            @foreach($customers as $d)
            <div class = "t-c-card">
                <img src="{{asset('img/'.$d->image)}}">
                <h2>{{$d->firstname}} {{$d->lastname}}</h2>
                <p>{{$d->testimonial}}</p>
            </div>
            @endforeach

          </div>


        </div>

    </div>

    </body>

</html>
