@extends('merchant.master')
@section('pageTitle', 'Dashboard')
@section('content')
<<div class="dashboard-marchent">
    <div class="container">
      <h3>Dashboard 
      <form method="POST" action="{{ url('/merchant/') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
        <div class="pull-right range-inputbox">
          <div class="form-group">
            <input type="text"  class="form-control" id="start_date" name="start_date" placeholder="Start date">
          </div>
          <div class="form-group">
            <input type="text"  class="form-control" id="end_date" name="end_date" placeholder="End date">
          </div>
          <div class="form-group">
            <input type="submit"  class="form-control" id="submit" name="Search" >
          </div>
      </div>
</form>
      </h3>
      <div class="marchent-wapperbox">
      @include('merchant.includes.sidebar')
        <div class="right-marchent-wapper">
          <div class="row">
            <div class="col-md-6 col-xs-6 col-sm-6">
              <div class="bluebox imgmarchent-sale">
                <div class="imgmarchent-icon">
                  <img src="{{ asset('public/merchantassets/images/total_order.svg') }}" alt="icon">
                </div>
                <div class="imgmarchent-text">
                  <h4>150</h4>
                  <p>Total Order</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xs-6 col-sm-6">
              <div class="orengebox imgmarchent-sale">
                <div class="imgmarchent-icon">
                  <img src="{{ asset('public/merchantassets/images/delivered.svg') }}" alt="icon">
                </div>
                <div class="imgmarchent-text">
                  <h4>100</h4>
                  <p>Delivered</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xs-6 col-sm-6">
              <div class="pinkbox imgmarchent-sale">
                <div class="imgmarchent-icon">
                  <img src="{{ asset('public/merchantassets/images/cancelled.svg') }}" alt="icon">
                </div>
                <div class="imgmarchent-text">
                  <h4>10</h4>
                  <p>Cancelled</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xs-6 col-sm-6">
              <div class="greenbox imgmarchent-sale">
                <div class="imgmarchent-icon">
                  <img src="{{ asset('public/merchantassets/images/total_sale.svg') }}" alt="icon">
                </div>
                <div class="imgmarchent-text">
                  <h4>$ 5000</h4>
                  <p>Total Sale</p>
                </div>
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
         
            $(function() {
                $( "#start_date").datepicker({
                  dateFormat:"yy-mm-dd",
                });
                $( "#end_date").datepicker({
                  dateFormat:"yy-mm-dd",
                });
            });

            
      });
    </script>
@endsection
@section('pagejs')

        

@stop