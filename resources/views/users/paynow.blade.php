@extends('users.master')
@section('pageTitle','index')
@section('content')

 <div class="breadcrumb-sec">
    <div class="container">
      <div class="row">
        <!-- <div class="col-md-12 col-sm-12">
          <ul>
            <li><a href="index.html">Home</a></li>
            <li>></li>
            <li><a href="#">Cart</a></li>
            <li>></li>
            <li><a href="#">Shipping Address</a></li>
            <li>></li>
            <li><a href="#">Review Order</a></li>
            <li>></li>
            <li><a href="#">payment Method</a></li>
          </ul>
        </div> -->                                                                              
      </div>                    
    </div>                                                                           
  </div>                                                                                                                                                                
  <div class="payment-method">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <h1 class="main-heading">Review Order</h1>
          <div class="select-payment">
            <ul>
              <li>
                <figure><img src="{{ asset('public/frontAssets/images/payment-icon1.png') }}" alt="payment-icon1"></figure>
                <a href="users/stripe-payment"><button>SELECT</button></a>
              </li>
              <li>
                <figure><img src="{{ asset('public/frontAssets/images/payment-icon2.png') }}" alt="payment-icon2"></figure>
                <button>SELECT</button>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div> 
    @stop