<html>
    <head>
        <meta charset="utf-8">
        <title>Home Page</title>
        <link href="/css/home.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans&display=swap" rel="stylesheet">
        <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
           
        @if (Session::has('customerlogin'))
        <?php $data = session()->get('data')[0]; ?>
        @endif

    <body>
        <div class="nav-style">
            <nav>
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">MENU</a></li>
                    <li><a href="#">CATERING</a></li>
                </ul>
                    <h2 class="logo">Nicko's</h2>
                    <h2 class="logo-1">Kitchen</h2>
                <ul>
                    <li><a href="#">OUR STORY</a></li>
                   
                    @if(Session::has('customerlogin'))
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

    <main>
        @yield('content')
    </main>
       
    </body>


</html>
