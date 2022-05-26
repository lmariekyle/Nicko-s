<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans&display=swap" rel="stylesheet">
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link href="/css/customer_profile.css" rel="stylesheet">

    <title>CustomerDashboard</title>
    <?php
        session_start();
        $data = session()->get('data');
        if(!array_key_exists('image', $data->toArray())) {
            $data = session()->get('data')[0];
        }
    ?>




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


    <h3 class="p-1 mb-4">Profile</h3>
        <div class="table-responsive">
            <div class="container">

            <div class="container-2" style="text-align: center; ">
                    <form enctype="multipart/form-data" method="post" action="{{url('profile')}}">
                        @csrf
                        <img src="/img/{{$data->image}}" id="profileimage">
                        <h2 class="prof_name">{{$data->firstname}} {{$data->lastname}}</h2>
                        <h5 class="upload_prof_img">Upload Profile Image</h5>
                        <input type="file" class="btn1 btn-block" name="image" class="b-1"/>
                        <input type="hidden" name="_token" value="{{csrf_token()}}" class="b-1">
                        <input type="submit" class="btn1 btn-block" class="b-1"/>
                    </form>
            </div>





                <form method="#" action="{{url('customer/editprofile')}}">
                @csrf

                <div class="p_box">
                    <div class="userdetails">
                    <h1>Personal Information</h1>



                        <h2>First Name</h2>
                        <span class="data">{{$data->firstname}}</span>

                        <h2>Middle Name</h2>
                        <span class="data">{{$data->middlename}}</span>

                        <h2>Last Name</h2>
                        <span class="data">{{$data->lastname}}</span>

                        <h2>Email</h2>
                        <span class="data">{{$data->email}}</span>

                        <h2>Phone Number</h2>
                        <span class="data">{{$data->phone}}</span>

                        <h1>My Address</h1>
                        <div class="container-3">
                            <span class="address_data">{{$data->firstname}} {{$data->lastname}}</span>
                            <span class="address_data">{{$data->phone}}</span>
                            <span class="address_data">{{$data->house_number}} {{$data->street_name}} {{$data->barangay}} {{$data->municipality}} {{$data->city}} {{$data->zip_code}}</span>
                        </div>

                        <h1>Testimonial</h1>
                        <div class="container-3">
                            <span class="testimonial_data">{{$data->testimonial}}</span>
                        </div>

                        <div class="editbutton">
                            <input type="hidden" name="ref" value="front"/>
                            <input type="submit" class="btn01 btn-block" value="Edit Profile"/>
                        </div>

                    </div>
                </div>

                </form>


        </div>
    </div>
</body>
</html>
