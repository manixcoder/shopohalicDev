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

  <table border="0" width="100%">
    <tr>

      <th class="Reports">
        <div class="form-group">
          <input type="name" class="form-control text-color" id="emaillogin" aria-describedby="emailHelp" placeholder="Reports">
        </div>

      </th>
      <th>
        <div class="form-group">
          <input type="name" class="form-control text-color" id="emaillogin" aria-describedby="emailHelp" placeholder="Select Date Range">
        </div>
      </th>
      <th>
        <div class="form-group">
          <input type="date" class="form-control text-color" id="emaillogin" aria-describedby="emailHelp" placeholder="01-Aug-2021">
        </div>
      </th>
      <th>To</th>
      <th>
        <div class="form-group">
          <input type="date" class="form-control text-color" id="emaillogin" aria-describedby="emailHelp" placeholder="01-Aug-2021">
        </div>
      </th>
    </tr>
    <tr>
      <td class="text-left" colspan="2">Transaction</td>
      <td class="text-right" colspan="3">
        <div class="form-group pull-right">
          <button type="submit" class="btn btn-primary bg-color">GENERATE</button>
        </div>
      </td>
    </tr>
    <tr>
      <td class="text-left" colspan="2">Transaction</td>
      <td class="text-right" colspan="3">
        <div class="form-group pull-right">
          <button type="submit" class="btn btn-primary bg-color">GENERATE</button>
        </div>
      </td>
    </tr>
    <tr>
      <td class="text-left" colspan="2">Transaction</td>
      <td class="text-right" colspan="3">
        <div class="form-group pull-right">
          <button type="submit" class="btn btn-primary bg-color">GENERATE</button>
        </div>
      </td>
    </tr>
  </table>

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