<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <div class="container">
        @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif

        <form class="user" method="post" action="{{route('forget.password.post')}}">
            @csrf
                <div class="form-group">
                    <input required type="email" class="form-control form-control-user"
                    id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" autofocus>

                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                                           
                <input type="submit" class="btn1  btn-block" value="Send reset link"/> 
                                
        </form>
    </div>

    @yield('content')
    
</body>
</html>