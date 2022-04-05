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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="{{ asset('public/frontAssets/images/favicon.png') }}" type="skype-img" />
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
                        <form class="form-inline search-form">
                            <div class="input-group">
                                <input type="email" class="form-control" id="exampleInputAmount" placeholder="Search">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-4 col-sm-4 text-right">
                        <div class="logn-part">
                            <ul>
                                <li><a href="#">LOGIN</a></li>
                                <li>/</li>
                                <li><a href="#">SIGN UP</a></li>
                            </ul>
                        </div>
                        <a href="#" class="my-cart">
                            <div class="cart">
                                <figure><img src="{{ asset('public/frontAssets/images/shopping-cart.png') }}" alt="shopping-cart"></figure>
                                <span>99</span>
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
                                    <li class="active"><a href="#">Mobiles</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Fashion<i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Male</a></li>
                                            <li><a href="#">Female</a></li>
                                            <li><a href="#">Special Prices</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Electronics</a></li>
                                    <li><a href="#">Grocery</a></li>
                                    <li><a href="#">Beauty</a></li>
                                    <li><a href="#">Toys</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="banner-sec">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0">1</li>
                <li data-target="#carousel-example-generic" data-slide-to="1">2</li>
                <li data-target="#carousel-example-generic" data-slide-to="2" class="active">3</li>
                <li data-target="#carousel-example-generic" data-slide-to="3">4</li>
                <li data-target="#carousel-example-generic" data-slide-to="4">5</li>
                <li data-target="#carousel-example-generic" data-slide-to="5">6</li>
            </ol>

            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="{{ asset('public/frontAssets/images/banner_image.jpg') }}" alt="banner_image" loading="lazy">
                    <div class="carousel-caption">
                        <h3>WE ARE <br /> CONNECTED</h3>
                        <a href="#">EXPLORE</a>
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset('public/frontAssets/images/banner_image.jpg') }}" alt="banner_image" loading="lazy">
                    <div class="carousel-caption">
                        <h3>WE ARE <br /> CONNECTED</h3>
                        <a href="#">EXPLORE</a>
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset('public/frontAssets/images/banner_image.jpg') }}" alt="banner_image" loading="lazy">
                    <div class="carousel-caption">
                        <h3>WE ARE <br /> CONNECTED</h3>
                        <a href="#">EXPLORE</a>
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset('public/frontAssets/images/banner_image.jpg') }}" alt="banner_image" loading="lazy">
                    <div class="carousel-caption">
                        <h3>WE ARE <br /> CONNECTED</h3>
                        <a href="#">EXPLORE</a>
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset('public/frontAssets/images/banner_image.jpg') }}" alt="banner_image" loading="lazy">
                    <div class="carousel-caption">
                        <h3>WE ARE <br /> CONNECTED</h3>
                        <a href="#">EXPLORE</a>
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset('public/frontAssets/images/banner_image.jpg') }}" alt="banner_image" loading="lazy">
                    <div class="carousel-caption">
                        <h3>WE ARE <br /> CONNECTED</h3>
                        <a href="#">EXPLORE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="popular-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h3 class="heading"><span>Popular</span></h3>
                </div>
                <div class="col-md-6 col-sm-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <figure>
                        <img src="{{ asset('public/frontAssets/images/redmi-img.png') }}" alt="redmi-img" loading="lazy">
                    </figure>
                </div>
                <div class="col-md-6 col-sm-6 aos-init aos-animate">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                            <figure>
                                <img src="{{ asset('public/frontAssets/images/iphone-img.png') }}" alt="iphone-img" loading="lazy">
                            </figure>
                        </div>
                        <div class="col-md-6 col-sm-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                            <figure>
                                <img src="{{ asset('public/frontAssets/images/jeans-img.png') }}" alt="jeans-img" loading="lazy">
                            </figure>
                            <h4>$99</h4>
                        </div>
                        <div class="col-md-6 col-sm-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                            <figure>
                                <img src="{{ asset('public/frontAssets/images/axe-img.png') }}" alt="axe-img" loading="lazy">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="arrival-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h3 class="heading"><span>New Arrival</span></h3>
                </div>
                <div class="col-md-3 col-sm-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <a href="#" class="arrival-content">
                        <figure>
                            <img src="{{ asset('public/frontAssets/images/i-phone-12.png')}}" alt="i-phone-12">
                        </figure>
                        <h4>i Phone 12 (128gb)</h4>
                        <p>Apple</p>
                        <h5>$ 10 <span>$12</span></h5>
                    </a>
                </div>
                <div class="col-md-3 col-sm-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <a href="#" class="arrival-content">
                        <figure><img src="{{ asset('public/frontAssets/images/t-shirt-l.png') }}" alt="t-shirt-l"></figure>
                        <h4>T-Shirt - L</h4>
                        <p>Levi's</p>
                        <h5>$ 10 <span>$12</span></h5>
                    </a>
                </div>
                <div class="col-md-3 col-sm-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <a href="#" class="arrival-content">
                        <figure><img src="{{ asset('public/frontAssets/images/nivea-fresh-natual.png') }}" alt="nivea-fresh-natual"></figure>
                        <h4>Nivea Fresh Natual</h4>
                        <p>Nivea</p>
                        <h5>$ 10 <span>$12</span></h5>
                    </a>
                </div>
                <div class="col-md-3 col-sm-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <a href="#" class="arrival-content">
                        <figure><img src="{{ asset('public/frontAssets/images/marvel-legends-apocaly.png') }}" alt="marvel-legends-apocaly"></figure>
                        <h4>Marvel Legends Apocaly..</h4>
                        <p>Hasbro</p>
                        <h5>$ 10 <span>$12</span></h5>
                    </a>
                </div>
                <div class="col-md-3 col-sm-3 aos-init aos-animate text-center" data-aos="fade-up" data-aos-delay="300">
                    <a href="#" class="arrival-content">
                        <figure><img src="{{ asset('public/frontAssets/images/degree-men-advance.png') }}" alt="degree-men-advance"></figure>
                        <h4>Degree Men Advance pr..</h4>
                        <p>Degree</p>
                        <h5>$ 10 <span>$12</span></h5>
                    </a>
                </div>
                <div class="col-md-3 col-sm-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <a href="#" class="arrival-content">
                        <figure><img src="{{ asset('public/frontAssets/images/samsung-galaxy-s10.png') }}" alt="samsung-galaxy-s10"></figure>
                        <h4>Samsung Galaxy S10</h4>
                        <p>Body 2</p>
                        <h5>$ 10 <span>$12</span></h5>
                    </a>
                </div>
                <div class="col-md-3 col-sm-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <a href="#" class="arrival-content">
                        <figure><img src="{{ asset('public/frontAssets/images/diesel-blue-denim.png') }}" alt="diesel-blue-denim"></figure>
                        <h4>Diesel Blue Denim</h4>
                        <p>Diesel</p>
                        <h5>$ 10 <span>$12</span></h5>
                    </a>
                </div>
                <div class="col-md-3 col-sm-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <a href="#" class="arrival-content">
                        <figure><img src="{{ asset('public/frontAssets/images/hp-pavilion.png') }}" alt="hp-pavilion"></figure>
                        <h4>HP Pavilion 1332</h4>
                        <p>HP</p>
                        <h5>$ 10 <span>$12</span></h5>
                    </a>
                </div>
                <div class="col-md-12 col-sm-12 text-center">
                    <a href="#" class="more-btn">LOAD MORE<i class="fa fa-angle-double-down"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="arrival-sec featured-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h3 class="heading"><span>Featured Products</span></h3>
                </div>
                <div class="col-md-3 col-sm-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <div class="arrival-content">
                        <figure>
                            <img src="{{ asset('public/frontAssets/images/i-phone-12.png') }}" alt="i-phone-12">
                        </figure>
                        <h4>i Phone 12 (128gb)</h4>
                        <p>Apple</p>
                        <h5>$ 10 <span>$12</span></h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <div class="arrival-content">
                        <figure>
                            <img src="{{ asset('public/frontAssets/images/t-shirt-l.png') }}" alt="t-shirt-l">
                        </figure>
                        <h4>T-Shirt - L</h4>
                        <p>Levi's</p>
                        <h5>$ 10 <span>$12</span></h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <div class="arrival-content">
                        <figure>
                            <img src="{{ asset('public/frontAssets/images/nivea-fresh-natual.png') }}" alt="nivea-fresh-natual">
                        </figure>
                        <h4>Nivea Fresh Natual</h4>
                        <p>Nivea</p>
                        <h5>$ 10 <span>$12</span></h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <div class="arrival-content">
                        <figure>
                            <img src="{{ asset('public/frontAssets/images/marvel-legends-apocaly.png') }}" alt="marvel-legends-apocaly">
                        </figure>
                        <h4>Marvel Legends Apocaly..</h4>
                        <p>Hasbro</p>
                        <h5>$ 10 <span>$12</span></h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <div class="arrival-content">
                        <figure>
                            <img src="{{ asset('public/frontAssets/images/degree-men-advance.png') }}" alt="degree-men-advance">
                        </figure>
                        <h4>Degree Men Advance pr..</h4>
                        <p>Degree</p>
                        <h5>$ 10 <span>$12</span></h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 aos-init aos-animate text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="arrival-content">
                        <figure>
                            <img src="{{ asset('public/frontAssets/images/samsung-galaxy-s10.png') }}" alt="samsung-galaxy-s10">
                        </figure>
                        <h4>Samsung Galaxy S10</h4>
                        <p>Body 2</p>
                        <h5>$ 10 <span>$12</span></h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <div class="arrival-content">
                        <figure>
                            <img src="{{ asset('public/frontAssets/images/diesel-blue-denim.png') }}" alt="diesel-blue-denim">
                        </figure>
                        <h4>Diesel Blue Denim</h4>
                        <p>Diesel</p>
                        <h5>$ 10 <span>$12</span></h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <div class="arrival-content">
                        <figure>
                            <img src="{{ asset('public/frontAssets/images/hp-pavilion.png') }}" alt="hp-pavilion">
                        </figure>
                        <h4>HP Pavilion 1332</h4>
                        <p>HP</p>
                        <h5>$ 10 <span>$12</span></h5>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 text-center">
                    <a href="#" class="more-btn">LOAD MORE<i class="fa fa-angle-double-down"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="offer-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="offer-content">
                        <figure>
                            <img src="{{ asset('public/frontAssets/images/offer-img.png') }}" alt="offer-img">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                                    <label>
                                        <img src="{{ asset('public/frontAssets/images/subscribe.png') }}" alt="subscribe">
                                        Subscribe to our newsletter
                                    </label>
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
                        <p>© 2021, Shopaholicsale</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <!-- Optional JavaScript; choose one of the two! -->
    <script src="{{ asset('public/frontAssets/js/jequery-main3.5.js') }}"></script>
    <script src="{{ asset('public/frontAssets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/frontAssets/js/aos.js') }}"></script>

    <script>
        $(window).bind("load", function() {
            if (document.readyState === "complete") {
                // aos init
                AOS.init({
                    once: false,
                    duration: 1000,
                });
            }
        })
    </script>

</body>

</html>