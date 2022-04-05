<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" href="{{ asset('public/adminAssets/fonts/font.css') }}">
  <link rel="stylesheet" href="{{ asset('public/adminAssets/css/style.css') }}">
  <link rel="icon" href="{{ asset('public/adminAssets/images/favicon.png') }}" type="skype-img" />
  @yield('pageCss')
  <title>{{ config('app.name', 'Laravel') }} @yield('pageTitle')</title>
</head>

<body>
  <header>
    <div class="col-md-12 head-box">
      <div class="col-md-6 head ">
        <a href="{{ URL::to('/') }}">
          <img src="{{ asset('public/adminAssets/images/logo.png') }}" alt="logo" width="150px"> </a>
      </div>
      <div class=" col-md-6 logo-sec text-right">
        <ul class="text-right">
          <li><a href="#">
            <i class="fa fa-bell-o" aria-hidden="true"><span>1</span></i></a></li>
          <li class="admin-login">
            <a href="javascript:void(0);">
              @if(Auth::user()->profile_image !='')
              <img src="{{ asset('public/uploads/') }}/{{ Auth::user()->profile_image }}" alt="circled-img">
              @endif
            </a>
            <ul class="dropdown">
              <li><a href="#">My Account</a></li>
              <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </header>
  <div class="dashboard-wapper">
    @include('admin.includes.sidebar')
    <div class="Merchants-sec">
      @yield('content')
    </div>
  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      $(".logo-sec .admin-login a").click(function() {
        $(".logo-sec .admin-login").toggleClass("admin-dropdopen");
      });
    });
  </script>
</body>

</html>