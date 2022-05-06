<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link href="/css/register.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    

</head>

<body class="bg-register">
<div class="container">

    <a  href="{{url('login')}}">
        <i class="fas fa-fw fa-sign-out-alt"></i>
    </a>


        <h3 class="r-1 mb-4">Register</h3>
        
            

    
        <form method="post" action="{{url('admin/customer')}}">
            @csrf

        <div class="user-details">
            <div class="input-box">
                <h4 class="details"><span class="text-danger">FIRST NAME</span></h4>
                <input required type="text" class="form-control form-control-user" name="firstname" id="firstname">
            </div>

            <div class="input-box">
                <h4 class="details"><span class="text-danger">MIDDLE NAME</span></h4>
                <input required type="text" class="form-control form-control-user" name="middlename" id="middlename">
            </div>

            <div class="input-box">
                <h4 class="details"><span class="text-danger">LAST NAME</span></h4>
                <input required type="text" class="form-control form-control-user" name="lastname" id="lastname">
            </div>

            <div class="input-box">
                <h4 class="details"><span class="text-danger">EMAIL</span></h4>
                <input required type="email" class="form-control form-control-user" name="email" id="email">
            </div>

            <div class="input-box">
                <h4 class="details"><span class="text-danger">PASSWORD</span></h4>
                <input required type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" id="password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong class="danger">{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="input-box">
                <h4 class="details"><span class="text-danger">RE-ENTER PASSWORD</span></h4>
                <input required type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password_confirmation" id="password_confirmation">
                
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong class="danger">{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <p class="text-success" style="text-align:center;">{{session('success')}}</p>
        </div>

        <div class="submitbutton">
            <input type="hidden" name="ref" value="front"/>
            <input type="submit" class="btn1 btn-block" />
        </div>



        </form> 

        
</div>

</body>
</html>
