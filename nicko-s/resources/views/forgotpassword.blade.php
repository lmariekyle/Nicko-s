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
        <form class="user" method="post" action="{{url('forgotpassword')}}">
            @csrf
                <div class="form-group">
                    <input required type="email" class="form-control form-control-user"
                    id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email">
                </div>
                                           
                <input type="submit" class="btn1  btn-block" value="Login"/> 
                                
        </form>
    </div>


</body>
</html>