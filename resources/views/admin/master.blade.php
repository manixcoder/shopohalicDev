<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/adminAssets/css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('public/adminAssets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/adminAssets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('public/adminAssets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/adminAssets/fonts/fonts.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
   
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.0/bootstrap-table.min.css">
    <script src="{{ asset('public/adminAssets/js/jequery-main3.5.js') }}"></script>
  <script src="{{ asset('public/adminAssets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('public/adminAssets/js/aos.js') }}"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.0/bootstrap-table.min.css"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
  <link rel="icon" href="{{ asset('public/adminAssets/images/favicon.png') }}" type="skype-img" />
  @yield('pageCss')
  <title>{{ config('app.name', 'Laravel') }} @yield('pageTitle')</title>
  </head>

  <body>

  <header>
  
    <div class="top-header">
      <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-3 text-center">
            <a href="{{ URL::to('/admin') }}">
          <img src="{{ asset('public/adminAssets/images/logo.png') }}" alt="logo" width="150px"> </a>
            </div>                          

            <div class="col-md-10 col-sm-9">
              <ul class="marchent-menu">
                <li>
                <a href="#" class="bell-icon">
                <img src="{{ asset('public/merchantassets/images/bell.png') }}" alt="bell-icon">
            </a>
              
              </li>
                <li class="marchent-dropmenu-sec">
                  <a href="#" class="dropdown-headmenu">
                    <img src="{{ asset('public/merchantassets/images/favicon.png') }}" alt="icon">
                  </a>
                  <ul class="submenu-drop">
                    <li><a href="#">My Account</a></li>
                    <li> <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form></li>
                  </ul>
                </li>
              </ul>
            </div> 

        </div>  
      </div>
    </div> 
  </header>  
  @yield('content')
  <footer>
    <div class="top-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <div class="payment-part">
              <a href="#" class="footer-logo"><img src="{{ asset('public/adminAssets/images/footer-logo.jpg') }}" alt="footer-logo"></a>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <h6>WE ACCEPT</h6>
              <ul>
                <li><a href="#"><img src="./images/payment-img1.jpg" alt="payment-img1"></a></li>
                <li><a href="#"><img src="./images/payment-img2.jpg" alt="payment-img2"></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-2 col-sm-2">
            <h3>LINKS</h3>
            <ul class="footer-menu">
              <li><a href="#">Home</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Terms & Conditions</a></li>
            </ul>
          </div>
          <div class="col-md-5 col-sm-5">
            <div class="newsletter-part">
              <a href="#">FREE LISTING</a>
              <form class="form-inline">
                <div class="form-group">
                  <label><img src="{{ asset('public/adminAssets/images/subscribe.png') }}" alt="subscribe">Subscribe to our newsletter adadsadsa</label>
                  <div class="input-group">
                    <input type="email" class="form-control" id="exampleInputAmount" placeholder="Email ID">
                    <button type="submit" class="btn btn-primary">SUBSCRIBE</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-2 col-sm-2">
            <h3>SOCIAL</h3>
            <ul class="social-icon">
              <li><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
              <li><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
              <li><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="bottom-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 text-center">
            <p>© 2022, Shopaholicsale</p>
          </div>
        </div>
      </div>
    </div>
  </footer>


  
  <!-- Optional JavaScript; choose one of the two! -->
               
    <script>
      $(window).bind("load", function () {
         if (document.readyState === "complete") {
             // aos init
             AOS.init({
               once: false,
               duration: 1000,
           });
         }
         $('.login-sec .form-group .form-control').click(function () {
            $(this).parent().addClass('inputlabel-up');
          }).blur(function () {
            $(this).parent().removeClass('inputlabel-up');
          });
      })
    </script>
   <script>
    $(document).ready(function(){ 
        $('.marchent-dropmenu-sec').click(function(){
        $("ul.marchent-menu .submenu-drop").toggleClass("openmenu-box");
        });
    });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
  </body>
</html>