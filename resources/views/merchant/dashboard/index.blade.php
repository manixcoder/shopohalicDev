@extends('merchant.master')
@section('pageTitle', 'Dashboard')
@section('content')
<div class="samll-container">
  <div class="row">
    <div class="col-md-10  heading-full">
      <h3>Dashboard</h3>
    </div>
    <div class="col-md-2 select-box">
      <select name="abc" id="name">
        <option value="">All</option>
        <option value="">All</option>
      </select>
    </div>
  </div>
</div>
<div class="samll-container">

  
</div>
<div class="samll-container footer-sec">
  <div class="row">
    <div class="col-md-4 ">
      <div class="new-user new-user-bg ">
        <div class="row">
          <div class="col-md-5 login-img">
            <img src="{{ asset('public/adminAssets/images/login-logo.png') }}" alt="login" width="100px">
          </div>
          <div class="col-md-7 socical-box">
            <span class="text-number">10</span>
            <p>New User</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 ">
      <div class="new-user new-merchant">
        <div class="row">
          <div class="col-md-5 login-img">
            <img src="{{ asset('public/adminAssets/images/login-logo.png') }}" alt="login" width="100px">
          </div>
          <div class="col-md-7 socical-box">
            <span class="text-number">10</span>
            <p> New Merchant</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 ">
      <div class="new-user total-order">
        <div class="row">
          <div class="col-md-5 login-img">
            <img src="{{ asset('public/adminAssets/images/login-logo.png') }}" alt="login" width="100px">
          </div>
          <div class="col-md-7 socical-box">
            <span class="text-number">150</span>
            <p> Total Order</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 ">
      <div class="new-user delivered">
        <div class="row">
          <div class="col-md-5 login-img">
            <img src="{{ asset('public/adminAssets/images/login-logo.png') }}" alt="login" width="100px">
          </div>
          <div class="col-md-7 socical-box">
            <span class="text-number">100</span>
            <p>Delivered</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 ">
      <div class="new-user cancelled">
        <div class="row">

          <div class="col-md-5 login-img">
            <img src="{{ asset('public/adminAssets/images/login-logo.png') }}" alt="login" width="100px">
          </div>
          <div class="col-md-7 socical-box">
            <span class="text-number">10</span>
            <p> Cancelled</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 ">
      <div class="new-user total-sale-bg">
        <div class="row">
          <div class="col-md-5 login-img">
            <img src="{{ asset('public/adminAssets/images/login-logo.png') }}" alt="login" width="100px">
          </div>
          <div class="col-md-7 socical-box">
            <span class="text-number">$5000</span>
            <p>Total sale</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('pagejs')
<script>

</script>
@stop