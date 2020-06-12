<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="//moodle.uoz.edu.krd/pluginfile.php/1/theme_klassroom/favicon/1589485784/favi.ico">
        <title>IMS</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <link rel="stylesheet" href="{{asset('css/animate.css')}}">
                <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </head>
   <body>
      <header >
        <nav class="navbar navbar-default navbar-inverse navbar-fixed-top  ">
          <div class="container  ">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">IMS</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                @if (Route::has('login'))
                @auth
                <li><a href="{{ url('/home') }}">Home</a></li>
                @else
                <li><a href="{{ route('login') }}">Login</a></li>
            @endauth
           @endif
                <li><a href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCKHRMDlTQgxSHqbfpkCxbHpBnbJgBvbmPMXggQwwFTQnTrzdDfdzKgcWxnLBkLXspmHZpgB">Contact Us</a></li>
                <li><a href="http://web.uoz.edu.krd">Uoz</a></li>
                <li><a href="http://library.uoz.edu.krd/">Library</a></li>
                <li><a href="https://web.uoz.edu.krd/centers/ictsc">ICT</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->

        </nav>
        @yield('content')


      </header>
      @yield('temp')

      <!-- <footer class="fixed-top">
            <p>IMS Developed by <a href="http://facebook.com/ahmednuh.197">Ahmed</a> <span>&copy;</span> 2020</p>
      </footer> -->
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
       <script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
       <!-- Include all compiled plugins (below), or include individual files as needed -->
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" ></script>
    </body>


</html>
