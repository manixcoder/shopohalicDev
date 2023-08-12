@extends('users.master')
@section('pageTitle','index')
@section('content')
<div class="banner-sec">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

            <ol class="carousel-indicators">
            @foreach(getBanner() as $key=>$banner)
                <li data-target="#carousel-example-generic" data-slide-to="{{$key}}" @if($key==0) class="active" @endif">{{$key+1}}</li>
               @endforeach
              
            </ol>

            <div class="carousel-inner" role="listbox">
            @foreach(getBanner() as $key=>$banner)
                <div class="item @if($key==0) active @endif">
                    <img src="{{ asset('public/frontAssets/images/banner_image.jpg') }}" alt="banner_image" loading="lazy">
                    <div class="carousel-caption">
                        <h3>WE ARE<br /> CONNECTED</h3>
                        <a href="#">EXPLORE</a>
                    </div>
                </div>
                @endforeach
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
                @foreach($alls as $all)
                <div class="col-md-3 col-sm-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <a href="{{URL::to('product-detail')}}/{{$all->id}}" class="arrival-content">
                        <figure>
                            <img src="{{url('/public/uploads/products')}}/{{$all->image}}" alt="i-phone-12" width="200" height="200">
                        </figure>
                        <h4>{{$all->product_name}}</h4>
                        <p>Apple</p>
                        <h5>$ {{$all->special_price}} <span>${{$all->price}}</span></h5>
                    </a>
                </div>
                @endforeach
                
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
                     @foreach($alls as $all)
                <div class="col-md-3 col-sm-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <a href="{{URL::to('product-detail')}}/{{$all->id}}" class="arrival-content">
                        <figure>
                            <img src="{{url('/public/uploads/products')}}/{{$all->image}}" alt="i-phone-12" width="200" height="200">
                        </figure>
                        <h4>{{$all->product_name}}</h4>
                        <p>Apple</p>
                        <h5>$ {{$all->special_price}} <span>${{$all->price}}</span></h5>
                    </a>
                </div>
                @endforeach
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
    @stop