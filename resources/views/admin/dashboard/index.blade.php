@extends('admin.master')
@section('pageTitle', 'Dashboard')
@section('content')
<<div class="dashboard-marchent">
    <div class="container">
      <h3>Dashboard 
        <div class="pull-right range-inputbox">
          <div class="form-group">
            <span>Select Date Range</span>
            <select class="form-control">
              <option>01-Aug-2021</option>
              <option>02-Aug-2021</option>
              <option>03-Aug-2021</option>
            </select>
          </div>
          <div class="form-group">
            <span>To</span>
            <select class="form-control">
              <option>01-Aug-2021</option>
              <option>02-Aug-2021</option>
              <option>03-Aug-2021</option>
            </select>
          </div>
      </div>
      </h3>
      <div class="marchent-wapperbox">
      @include('admin.includes.sidebar')
        <div class="right-marchent-wapper">
          <div class="row">
            <div class="col-md-4 col-xs-4 col-sm-4">
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
            <div class="col-md-4 col-xs-4 col-sm-4">
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
            <div class="col-md-4 col-xs-4 col-sm-4">
              <div class="greenbox imgmarchent-sale">
                <div class="imgmarchent-icon">
                  <img src="{{ asset('public/merchantassets/images/total_order.svg') }}" alt="icon">
                </div>
                <div class="imgmarchent-text">
                  <h4>2</h4>
                  <p>Total Order</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4">
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
            <div class="col-md-4 col-xs-4 col-sm-4">
              <div class="pinkbox imgmarchent-sale">
                <div class="imgmarchent-icon">
                  <img src="{{ asset('public/merchantassets/images/cancelled.svg') }}" alt="icon">
                </div>
                <div class="imgmarchent-text">
                  <h4>150</h4>
                  <p>Cancelled</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4">
              <div class="orengebox imgmarchent-sale">
                <div class="imgmarchent-icon">
                  <img src="{{ asset('public/merchantassets/images/total_sale.svg') }}" alt="icon">
                </div>
                <div class="imgmarchent-text">
                  <h4>100</h4>
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
<script>

</script>
@stop