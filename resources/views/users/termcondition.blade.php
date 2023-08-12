@extends('users.master')
@section('pageTitle','index')
@section('content')
<div class="breadcrumb-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <ul>
            <li><a href="{{ URL::to('/') }}">Home</a></li>
            <li>></li>
            <li><a href="{{ URL::to('/termcondition') }}">Terms & Condition</a></li>
          </ul>
        </div>                                                                                                          
      </div>                    
    </div>                                                                           
  </div>                                                                                                                                                     
  <div class="terms-condition-page">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="terms-banner">
            <figure><img src="{{ asset('public/frontAssets/images/about_banner.png') }}" alt="about_banner"></figure>
            <h1>Shopholic Terms of Use</h1>
          </div>                                                                                          
          <div class="terms-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>   
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="why-us-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-sm-5">
          <figure><img src="{{ asset('public/frontAssets/images/why_us_image.png') }}" alt="why_us_image"></figure>
        </div>                              
        <div class="col-md-7 col-sm-7">
          <div class="why-us-content">     
          <h3>Why Us</h3>
          <ul>                                 
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing eli</li>
              <li>Lorem ipsum dolor sit amet,</li>                                 
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing eli</li>
              <li>Lorem ipsum dolor sit amet,</li>                                                                   
              <li>Lorem ipsum dolor sit amet, consectetur adipiscing eli</li>
              <li>Lorem ipsum dolor sit amet,</li>                           
              <li>consectetur Lorem ipsum dolor sit amet, consectetur adipiscing eli</li> 
          </ul>                         
        </div>
        </div>                                                
      </div>  
    </div>        
  </div>  

  <div class="our-team">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <h1>Our Team</h1>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="our-box">
            <div class="col-md-4 col-sm-4">
            <figure><img src="{{ asset('public/frontAssets/images/our-img1.png') }}" alt="our-img1"></figure>
          </div>
          <div class="col-md-8 col-sm-8">
            <div class="our-content">
              <h3>Roy L. Commishun</h3>
              <h4>Director & Founder</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="our-box">
            <div class="col-md-4 col-sm-4">
            <figure><img src="{{ asset('public/frontAssets/images/our-img2.png') }}" alt="our-img2"></figure>
          </div>
          <div class="col-md-8 col-sm-8">
            <div class="our-content">
              <h3>Teri Dactyl</h3>
              <h4>Co - Counder</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="our-box">
            <div class="col-md-4 col-sm-4">
            <figure><img src="{{ asset('public/frontAssets/images/our-img3.png') }}" alt="our-img3"></figure>
          </div>
          <div class="col-md-8 col-sm-8">
            <div class="our-content">
              <h3>Anne T. Kwayted</h3>
              <h4>HR</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="our-box">
            <div class="col-md-4 col-sm-4">
            <figure><img src="{{ asset('public/frontAssets/images/our-img4.png') }}" alt="our-img4"></figure>
          </div>
          <div class="col-md-8 col-sm-8">
            <div class="our-content">
              <h3>Chris Anthemum</h3>
              <h4>Marketing Manager</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>  
    @stop