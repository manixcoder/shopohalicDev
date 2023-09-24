<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('public/frontAssets/css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontAssets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontAssets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontAssets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontAssets/css/pgwslider.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="{{ asset('public/frontAssets/images/favicon.png') }}" type="skype-img" />
     <!-- Optional JavaScript; choose one of the two! -->
     <script src="{{ asset('public/frontAssets/js/jequery-main3.5.js') }}"></script>
    <script src="{{ asset('public/frontAssets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/frontAssets/js/aos.js') }}"></script>
    @yield('pageCss')
    <title>{{ config('app.name', 'Laravel') }} @yield('pageTitle')</title>
</head>

<body>
    <header>
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-2">
                        <a class="logo" href="{{ URL::to('/') }}">
                            <img src="{{ asset('public/frontAssets/images/logo.jpg') }}" alt="logo">
                        </a>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <form class="form-inline search-form" action="{{ url('search?q=') }}" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="item" placeholder="Search">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
@if (Auth::check()) 
                    <div class="col-md-4 col-sm-4 text-right">
                        <div class="logn-part">
                            <ul>
                       <li><a href="{{ URL::to('/users') }}">Hello {{Auth::user()->first_name }}</a></li>
                    <li> <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
                              
                            </ul>
                        </div>
                        @else
                         <div class="col-md-4 col-sm-4 text-right">
                        <div class="logn-part">
                            <ul>
                                <li><a href="{{url('login')}}">LOGIN</a></li>
                                <li>/</li>
                                <li><a href="{{url('register')}}">SIGN UP</a></li>
                            </ul>
                        </div>
                        @endif
                        <a @if(countUserItem()>0) href="{{ url('cart') }}" @endif class="my-cart">
                            <div class="cart">
                                <figure><img src="{{ asset('public/frontAssets/images/shopping-cart.png') }}" alt="shopping-cart"></figure>
                                <span id="countUserItem">{{countUserItem()}}</span>
                            </div>
                            <div class="cart-price">
                                <h3>MY CART</h3>
                                <p>$ 0.00</p>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <div class="menu-part">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <nav class="navbar">

                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    @foreach(getCategory() as $category)
                                    @if($category['parent_id']=='N/A' && $category['child']=='0')
                                    <li class="active"><a href="{{url('/search?item='.$category['category_name'])}}">{{$category['category_name']}}</a></li>
                                    @elseif($category['parent_id']=='N/A' && $category['child']=='1')
                                    <li class="dropdown">
                                        <a href="{{url('/search?item='.$category['category_name'])}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$category['category_name']}}<i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu">
                                        @foreach(getCategory() as $category_menu)         
                    @if($category['id']==$category_menu['parent_id'])
                                            <li><a href="{{url('/search?item='.$category_menu['category_name'])}}">{{$category_menu['category_name']}}</a></li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </li>
                  @endif
                  @endforeach     
                                </ul>
                            </div>
                        </nav>
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
                            <a href="#" class="footer-logo">
                                <img src="{{ asset('public/frontAssets/images/footer-logo.jpg') }}" alt="footer-logo">
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <h6>WE ACCEPT</h6>
                            <ul>
                                <li><a href="#">
                                        <img src="{{ asset('public/frontAssets/images/payment-img1.jpg') }}" alt="payment-img1">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('public/frontAssets/images/payment-img2.jpg') }}" alt="payment-img2">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <h3>LINKS</h3>
                        <ul class="footer-menu">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('about')}}">About Us</a></li>
                            <li><a href="{{url('contactus')}}">Contact Us</a></li>
                            <li><a href="{{url('privacypolicy')}}">Privacy Policy</a></li>
                            <li><a href="{{url('termcondition')}}">Terms & Conditions</a></li>
                        </ul>
                    </div>
                    <div class="col-md-5 col-sm-5">
                        <div class="newsletter-part">
                            <a href="#">FREE LISTING</a>
                            <form class="form-inline" id='subscription' method="get">
                                <div class="form-group">
                                    <label>
                                        <img src="{{ asset('public/frontAssets/images/subscribe.png') }}" alt="subscribe">
                                        Subscribe to our newsletter
                                    </label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="exampleInputAmount" name="email" placeholder="Email ID">
                                        <button type="submit" class="btn btn-primary">SUBSCRIBE</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <h3>SOCIAL</h3>
                        <ul class="social-icon">
                            <li><a href="#">
                                    <i class="fa fa-facebook"> </i>
                                    Facebook
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                    Twitter
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-instagram"></i>
                                    Instagram
                                </a>
                            </li>
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
    <script>
        $(window).bind("load", function() {
            if (document.readyState === "complete") {
                // aos init
                AOS.init({
                    once: false,
                    duration: 1000,
                });
            }
        });
        

    </script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<style>
.error{
color: #FF0000; 
}
</style>
<script>
if ($("#subscription").length > 0) {
$("#subscription").validate({
rules: {
email: {
required: true,
maxlength: 50,
email: true,
},    
},
messages: {
email: {
required: "Please enter valid email",
email: "Please enter valid email",
maxlength: "The email name should less than or equal to 50 characters",
},   
},
submitHandler: function(form) {
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
// $('#submit').html('Please Wait...');
// $("#submit"). attr("disabled", true);
$.ajax({
url: "{{url('add-subscription')}}",
type: "GET",
data: $('#subscription').serialize(),
success: function( response ) {
alert(response);
document.getElementById("subscription").reset(); 
return false;
}
});
}
})
}
</script>
</body>

</html>