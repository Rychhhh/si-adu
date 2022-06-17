<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />

    <link rel="icon" href="images/icons/favicon.png">
        
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        a {
            text-decoration: none;
            font-weight: 500;
            animation: 0.5s
        }
        a:hover {
            font-weight: bold;            
        }
    </style>
    <title>Login - Ajukla</title>
</head>
<body>
    <div class="limiter">
        <div class="container-login100">
          <div class="wrap-login100">
            <form  method="POST" action="{{ route('register') }}" class="login100-form validate-form">
              @csrf
             
              @if ($errors->any())
                  @foreach ($errors->all() as $error)
                   <span class="btn btn-danger container mb-5"> {{ $error }} </span> 
                  @endforeach
              @endif
    
              <span class="login100-form-title p-b-43">Register</span>
    
              <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                <input class="input100" type="text" name="name" autofocus />
                <span class="focus-input100"></span>
                <span class="label-input100">Name</span>
              </div>

              <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                <input class="input100" type="text" name="email" autofocus />
                <span class="focus-input100"></span>
                <span class="label-input100">Email</span>
              </div>
    
              <div class="wrap-input100 validate-input" data-validate="Password is required">
                <input class="input100" type="password" name="password" required/>
                <span class="focus-input100"></span>
                <span class="label-input100">Password</span>
              </div>

              <div class="wrap-input100 validate-input" data-validate="Password is required">
                <input class="input100" type="password" name="password_confirmation" required/>
                <span class="focus-input100"></span>
                <span class="label-input100">Password Confirmation</span>
              </div>
    
              <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn">Register</button>
              </div>
    
             
              <div class="text-center p-t-46 p-b-20">
                <p>Already Account ? </p>

                <span class="txt2"> <a href={{ url('/login') }}>Sign In </a> </span>
              </div>
    
              <div class="login100-form-social flex-c-m p-t-20">
    
                <a href="https://github.com/Ryhann" class="login100-form-social-item flex-c-m bg2 m-r-5">
                  <i class="fa fa-github" aria-hidden="true"></i>
                </a>
    
              </div>
            </form>
    
            <div class="login100-more" style="background-image: url('images/bg-01.jpg')"></div>
          </div>
        </div>
      </div>
    
      <!--===============================================================================================-->
      <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
      <!--===============================================================================================-->
      <script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
      <!--===============================================================================================-->
      <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
      <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
      <!--===============================================================================================-->
      <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
      <!--===============================================================================================-->
      <script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
      <script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
      <!--===============================================================================================-->
      <script src="{{ asset('vendor/countdowntime/countdowntime.js') }}"></script>
      <!--===============================================================================================-->
      <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
