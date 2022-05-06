
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/resetpassword.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
   
    <title>Reset Password</title>
</head>

<main class="login-form">
<body class="bg-forgotpass">  
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="rp-1 mb-4">Reset Password </div>
                  <div class="card-body">
  
                      <form action="{{ route('reset.password.post') }}" method="POST">
                          @csrf
                          <input type="hidden" name="token" value="{{ $token }}">
  
                          <div class="user-details">
                            <div class="input-box">
                                <h4 class="details"><span class="text-danger">EMAIL</span></h4>
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                              </div>
                          
  
                          <div class="input-box">
                            <h4 class="details"><span class="text-danger">PASSWORD</span></h4>
                                  <input type="password" id="password" class="form-control" name="password" required autofocus>
                                  @if ($errors->has('password'))
                                      <span class="text-danger" style="color:red;">{{ $errors->first('password') }}</span>
                                  @endif
                          </div>
  
                          <div class="input-box">
                            <h4 class="details"><span class="text-danger">CONFIRM PASSWORD</span></h4>
                                <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>
                                  @if ($errors->has('password_confirmation'))
                                      <span class="text-danger" style="color:red;">{{ $errors->first('password_confirmation') }}</span>
                                  @endif
                          </div>
  
                          <div class="submitbutton">
                              <button type="submit" class="btn1 btn-primary">
                                  Reset Password
                              </button>
                          </div>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</body>
</main>
</html>
