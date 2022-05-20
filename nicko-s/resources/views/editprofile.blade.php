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
    <link href="/css/edit_profile.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <title>CustomerDashboard</title>
    <?php  
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
                        <li><a href="#">MENU</a></li>
                        <li><a href="#">CATERING</a></li>
                    </ul>
                        <h2 class="logo">Nicko's</h2>
                        <h2 class="logo-1">Kitchen</h2>
                    <ul>
                        <li><a href="#">OUR STORY</a></li>      
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
                <form enctype="multipart/form-data" method="post" action="{{url('customer/profile')}}" >
                @csrf

                <input type="hidden" name="id" value="{{$data->id}}">
                    
                    <div class="photo">
                        <img src="/img/{{$data->image}}">
                    </div>
                    
                <div class="p_box">
                    <div class="userdetails">
                        <h1>Edit Personal Information</h1>    

                        @error('current')
                            <span class="invalid-feedback" role="alert">
                                <strong class="danger">{{ $message }}</strong>
                            </span>
                        @enderror

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong class="danger">{{ $message }}</strong>
                            </span>
                        @enderror

                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                            <h2>First Name</h2>
                            <input required type="text"  name="firstname" id="firstname" value="{{$data->firstname}}">
                    
                        
                            <h2>Middle Name</h2>
                            <input required type="text" name="middlename" id="middlename" value="{{$data->middlename}}">
                        

                            <h2>Last Name</h2>
                            <input required type="text"  name="lastname" id="lastname" value="{{$data->lastname}}">
                        

                            <h2>Phone Number</h2>
                            <input type="text"  name="phone" id="phone" value="{{$data->phone}}">
                    

                            <h2>Email Name</h2>
                            <input required type="email" name="email" id="email" value="{{$data->email}}">

                            <h2>Current Password</h2>
                            <input required type="password" name="current" id="current">
                        
                            <button type="button" name="c_pass" id="c_pass">Change Password</button>

                            <div id="appear">
                                <div>
                                    <h2><span class="text-danger">New Password</h2>
                                    <input type="password" name="password" id="password" class="form-control form-control-user @error('password') is-invalid @enderror">
                            
                                </div>

                                <div>
                                    <h2><span class="text-danger">Confirm Password</h2>
                                    <input  type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-user @error('password') is-invalid @enderror">
                                </div>

                                <button type="button" name="close" id="close">Close</button>
                            </div>
                            
                            

                        <h1>Edit My Address</h1>

                            <h2>House Number</h2>
                            <input  type="text" name="house_number" id="house_number" value="{{ $data->house_number }}">

                            <h2>Street Name</h2>
                            <input  type="text" name="street_name" id="street_name" value="{{ $data->street_name }}">

                            <h2>Barangay</h2>
                            <input  type="text" name="barangay" id="barangay" value="{{ $data->barangay }}">

                            <h2>Municipality</h2>
                            <input  type="text" name="municipality" id="municipality" value="{{ $data->municipality }}">

                            <h2>City</h2>
                            <input  type="text" name="city" id="city" value="{{ $data->city }}">

                            <h2>Province</h2>
                            <input  type="text" name="province" id="province" value="{{ $data->province }}">

                             
                            <h2>Zip Code</h2>
                            <input  type="text" name="zip_code" id="zip_code" value="{{ $data->zip_code }}">

                            <div class="submitbutton">
                                <input type="hidden" name="ref" value="front"/>
                                <input type="submit" class="btn1 btn-block" value="Update Changes"/>
                            </div>     

                            <div class="cancelbutton" url="{{'customer_editprofile'}}">
                                <input type="hidden" name="ref" value="front"/>
                                <button type="button" class="btn1 btn-block" onclick="window.location='{{url('profile')}}'">Cancel</button>
                            </div>  
                        
                    </div>
                </div>             
            </div> 
            
            </form>
        </div>
    </div>
 
</body>


<script type="text/javascript">
    $("#c_pass").click(
        function(){
            $("#appear").show();
        }
    );

    $("#close").click(
        function(){
            $("#appear").hide();
            document.getElementById("password").value="";
            document.getElementById("password_confirmation").value="";
        }
    );


    

</script>




</html>