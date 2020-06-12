@extends('layouts.master')
@section('content')
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="/image/IMG_2023.jpg" class="banner" alt="...">
      <div class="carousel-caption">
        <h2 class="animated bounceInRight" style="animation-delay:1s">University of  <span>Zakho</span> </h2>
        <p class="animated bounceInRight" style="animation-delay:3s"> <a href="http://web.uoz.edu.krd">UOZ </a> </p>
      </div>
    </div>
    <div class="item">
      <img src="/image/Humanities 01.jpg" class="banner"  alt="...">
      <div class="carousel-caption">
        <h2 class="animated bounceInRight" style="animation-delay:1s">University of  <span>Zakho</span>  </h2>
        <h3 class="animated bounceInLeft" style="animation-delay:2s">INFORMATION and COMUNICATION TECHNOLOGY </h3>
        <p class="animated bounceInRight" style="animation-delay:3s"> <a href="https://web.uoz.edu.krd/centers/ictsc">ICT </a> </p>
      </div>
    </div>

    <div class="item">
      <img src="/image/Humanities 01.jpg"  class="banner" alt="...">
      <div class="carousel-caption">
        <h2 class="animated slideInDown" style="animation-delay:1s">University of  <span>Zakho</span>  </h2>
        <h3 class="animated fadeInUp" style="animation-delay:2s">LIBRARY </h3>
        <p class="animated zoomIn" style="animation-delay:3s"> <a href="http://library.uoz.edu.krd/">LIBRARY </a> </p>
      </div>
    </div>

  
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@endsection
