<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>
<div class="back">
<div class="form-box">
<div class="button-box">
    <div id="btn"></div>
    <button type="button" class="toggle-btn" onclick="login()">LogIn</button>
    <button type="button" class="toggle-btn" onclick="register()">Register</button>
</div>
<div class="social-icon">
        <a href="{{ url('/redirect') }}" >

    <img  src="/image/google.png" alt="google.png"></a>

</div>
<form id="login" method="POST" action="{{ route('login') }}"  class="input-group">
   @csrf

<div class="form-group row">
    <div class="col-md-6">
        <input id="email" type="email" class="  form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">

    <div class="col-md-6">
        <input id="password" type="password" class="input-field form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6 offset-md-4">
        <div class="form-check">
            <input class="check-box" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="check-box" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
    </div>
</div>


        <button  class="submit-btn">
            {{ __('Login') }}
        </button>
        @if (Route::has('password.request'))
            <a class="btn btn-link " href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif

</form>
<form id="register" action="{{ route('register') }}"  class="input-group">

<div class="form-group row">
    <div class="col-md-6">
    <input type="text"  placeholder="Enter Name" class="input-field form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
     @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
             @endif
             
         </div>
                 </div>
<div class="form-group row">
    <div class="col-md-6">
    <input type="email"  placeholder="Enter Email" class="input-field form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
     @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
             @endif
             
         </div>
                 </div>
                 <div class="form-group row">
    <div class="col-md-6">
    <input type="password"  placeholder="Enter password" class="input-field form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required autofocus>
     @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
             @endif
             
         </div>
                 </div>

     <div class="form-group row">
    <div class="col-md-6">
    <input id="password-confirm" placeholder="password-confirm" type="password" class=" input-field form-control" name="password_confirmation" required>
         </div>
                 </div>
    <input type="checkbox" class="check-box"><span>Remember Password</span>
                                <button class="submit-btn">
                                    {{ __('Register') }}
                                </button>



</form>
</div>


</div>
<script>
var x=document.getElementById("login");
var y = document.getElementById("register");
var z = document.getElementById("btn");
function register(){
    x.style.left="-400px";
    y.style.left="50px";
    z.style.left = "110px";
}

    function login() {
        x.style.left = "50px";
        y.style.left = "450px";
        z.style.left = "0px";
    }
</script>
    
</body>
</html>