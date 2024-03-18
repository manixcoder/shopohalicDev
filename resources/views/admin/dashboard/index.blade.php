@extends('admin.master')
@section('pageTitle', 'Dashboard')
@section('content')
@php

@endphp
<div class="dashboard-marchent">
    <div class="container">
      <h3>Dashboard 
        <div class="pull-right range-inputbox">
          <form method="GET" action="{{ url('/admin') }}" enctype="multipart/form-data">
          <div class="form-group">
            <span>Select Date Range</span>
            <input type="date" name="start_date" required id="start_date" value="{{$start_date}}">
          </div>
          <div class="form-group">
            <span>To</span>
           <input type="date" name="end_date" required id="end_date" value="{{$end_date}}">
          </div>
          <div class="form-group">
           
           <input type="submit" name="search" value="Search" class="rangeBtn">
          </div>
        </form>
      </div>
      </h3>
      <div class="marchent-wapperbox">
      @include('admin.includes.sidebar')
        <div class="right-marchent-wapper">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
              <div class="orengebox imgmarchent-sale">
                <div class="imgmarchent-icon">
                  <img src="{{ asset('public/merchantassets/images/new_user.svg') }}" alt="icon">
                </div>
                <div class="imgmarchent-text">
                  <h4>{{ $usersData }}</h4>
                  <p>New User</p>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
              <div class="bluebox imgmarchent-sale">
                <div class="imgmarchent-icon">
                  <img src="{{ asset('public/merchantassets/images/new_merchant.svg') }}" alt="icon">
                </div>
                <div class="imgmarchent-text">
                  <h4>{{ $merchantData }}</h4>
                  <p>New Merchant</p>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
              <div class="greenbox imgmarchent-sale">
                <div class="imgmarchent-icon">
                  <img src="{{ asset('public/merchantassets/images/total_order.svg') }}" alt="icon">
                </div>
                <div class="imgmarchent-text">
                  <h4>{{$totalOrder}}</h4>
                  <p>Total Order</p>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
              <div class="bluebox imgmarchent-sale">
                <div class="imgmarchent-icon">
                  <img src="{{ asset('public/merchantassets/images/delivered.svg') }}" alt="icon">
                </div>
                <div class="imgmarchent-text">
                  <h4>3</h4>
                  <p>Delivered</p>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
              <div class="pinkbox imgmarchent-sale">
                <div class="imgmarchent-icon">
                  <img src="{{ asset('public/merchantassets/images/cancelled.svg') }}" alt="icon">
                </div>
                <div class="imgmarchent-text">
                  <h4>{{$totalCancel}}</h4>
                  <p>Cancelled</p>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
              <div class="orengebox imgmarchent-sale">
                <div class="imgmarchent-icon">
                  <img src="{{ asset('public/merchantassets/images/total_sale.svg') }}" alt="icon">
                </div>
                <div class="imgmarchent-text">
                  <h4>{{$totalSale}}</h4>
                  <p>Total Sale</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('pagejs')

@stop