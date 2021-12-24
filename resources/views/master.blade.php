<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" type="text/css" href="{{asset('frontend_assests/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('frontend_assests/bootstrap/css/bootstrap.min.css')}}">
  <!-- iconfont -->
  <link rel="stylesheet" type="text/css" href="{{asset('frontend_assests/icofont/icofont.min.css')}}">
  @yield('style')
  <style type="text/css">
    #navbar {
      background-color: #333;
      position: fixed;
      top: -50px;
      width: 100%;
      display: block;
      transition: top 0.3s;
    }
  </style>
  <!-- google font -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top" id="navbar">
    <div class="container">
      <a class="navbar-brand" href="{{route('homepage')}}"><img src="{{asset('frontend_assests/img/l.png')}}" width="70px" height="70px"><span style="font-family: 'Satisfy', cursive;font-size: 30px;" class="text-primary">Alisaisai</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end " id="navbarTogglerDemo02">
      <ul class="navbar-nav justify-content-center">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('homepage')}}">HOME</a>
        </li>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle text-uppercase" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                CATEGORY
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <x-category-component></x-category-component>
            </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#newproduct">SHOP NOW</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#allcategory">LATEST</a>
        </li>
        @guest
        <li class="nav-item">
          <a class="nav-link d-inline-block text-uppercase" href="{{route('login')}}">Login</a><a class="nav-link d-inline-block text-uppercase" href="{{route('register')}}">Register</a>
        </li>
        @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle text-uppercase" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              {{-- orderhistory --}}
              <a href="{{route('orderhistory')}}" class="dropdown-item">Order History</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
        @endguest
        <li class="nav-item">
          <a href="{{route('checkout')}}" class="nav-link d-inline-block">
            <i class="icofont-shopping-cart" style="font-size: 24px;"></i><sup style="padding: 3px 6px;background-color: red;color: white;border-radius: 50%;" class="cartNoti">
          </sup></a>
        </li>
        <li class="nav-item">
            <span id="showamt" class="nav-link"></span>
        </li>
      </ul>
    </div>
  </nav>  
  @yield('content')
  <!-- footer -->
  <div class="container" id="footer" style="margin-top: 50px;margin-bottom: 30px;">
    <div class="row mb-4">
      <div class="col-12 col-md-4">
        <h1>Ashion</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud ex</p>
      </div>
      <div class="col-12 col-md-2">
        <h4 class="mb-4">QUICK LINKS</h4>
        <ul>
          <li><a href="">About</a></li>
          <li><a href="">Blogs</a></li>
          <li><a href="">Contact</a></li>
          <li><a href="">FAQ</a></li>
        </ul>
      </div>
      <div class="col-12 col-md-2">
        <h4 class="mb-4">ACCOUNT</h4>
        <ul>
          <li><a href="">My Account</a></li>
          <li><a href="">Order Trackinkg</a></li>
          <li><a href="">Checkout</a></li>
          <li><a href="">Wishlist</a></li>
        </ul>
      </div>
      <div class="col-12 col-md-4">
        <h4 class="mb-4">NEWLETTER</h4>
         <label class="sr-only" for="inlineFormInputGroupUsername2 ">Username</label>
          <div class="input-group mb-2 mr-sm-2">
            <input type="text" class="form-control user" id="inlineFormInputGroupUsername2" placeholder="Type here">
           
          </div>
          <!-- address icon -->
          <div class="icon-gp">
            <i class="icofont-facebook t"></i>
            <i class="icofont-facebook-messenger t"></i>
            <i class="icofont-instagram t"></i>
            <i class="icofont-youtube-play t"></i>
            <i class="icofont-github t"></i>
          </div>
          <!-- end icon -->
      </div>
    </div>
    <div class="text-center pt-3" style="border-top: 1px solid gray;">
      Copyright © 2020 All rights reserved | This template is made with  by Renn
    </div>
  </div>
  <!-- end fooeter -->
  <script type="text/javascript" src="{{asset('frontend_assests/bootstrap/js/jquery.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script type="text/javascript" src="{{asset('frontend_assests/bootstrap/js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('frontend_assests/style.js')}}"></script>
  @yield('script')
  <script>
    // When the user scrolls down 20px from the top of the document, slide down the navbar
    window.onscroll = function() {scrollFunction()};
    document.getElementById('navbar').style.display = 'none';
    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("navbar").style.top = "0";
        document.getElementById('navbar').style.display = 'block';
      } else {
        document.getElementById("navbar").style.top = "-150px";
      }
    }
  </script>
</body>
</html>