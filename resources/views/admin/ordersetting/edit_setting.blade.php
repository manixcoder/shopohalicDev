@extends('admin.master')
@section('pageTitle','Order status Management')
@section('content')
<div class="dashboard-marchent">
    <div class="container">
      <h3>Edit Order Tracking</h3>
      <div class="marchent-wapperbox">
      @include('admin.includes.sidebar')
<div class="right-marchent-wapper">
          <div class="product-detailform">
           
            <form method="POST" action="{{ url('admin/order-settings/'.$orderSettingData->id.'/update') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="order_setting_id" value="{{$orderSettingData->id}}">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                <input type="text" name="order_tracking" required class="form-control text-color" value="{{$orderSettingData->order_tracking}}" id="emaillogin" aria-describedby="emailHelp" placeholder="Order Tracking">
                </div>
              </div>
          </div>
          <div class="btn-addprod ">
            <button type="submit" class="add-prodbtn">Update </button>
          </div>
          </form>
		    </div>
      </div>
    </div>
  </div>
 
        
@stop