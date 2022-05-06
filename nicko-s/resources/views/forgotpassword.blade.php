<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/forgotpassword.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
   
    <title>Forgot Password</title>
</head>

<body class="bg-forgotpass">
    <div class="container">
    <a  href="{{url('login')}}">
        <i class="fas fa-fw fa-sign-out-alt"></i>
    </a>

    <h3 class="f-1 mb-4">Forgot Password</h3>
        

        <form class="user" method="post" action="{{route('forget.password.post')}}">
            @csrf

            <div class="user-details">
                <div class="input-box">
                    <h4 class="details"><span class="text-danger">EMAIL</span></h4>
                    <input required type="email" class="form-control form-control-user"
                    id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email" name="email" autofocus>

                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert" style="color:green">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    
                </div>
            </div>    

            <div class="submitbutton">
                <input type="submit" class="btn1  btn-block" value="Send reset link"/> 
            </div>
                         
        </form>
    </div>

    @yield('content')
    
</body>
</html>