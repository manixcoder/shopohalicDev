@extends('admin.master')
@section('pageTitle','Order status Management')
@section('content')
<div class="dashboard-marchent">
    <div class="container">
      <h3>Add New Setting</h3>
      <div class="marchent-wapperbox">
      @include('admin.includes.sidebar')
<div class="right-marchent-wapper">
          <div class="product-detailform">
           
            <form method="POST" action="{{ url('admin/order-settings/save-setting') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6 col-sm-6">
                <input type="text" name="order_tracking" required class="form-control text-color" id="emaillogin" aria-describedby="emailHelp" placeholder="Order Setting">
                </div>
              </div>
          </div>
          <div class="btn-addprod ">
            <button type="submit" class="add-prodbtn">ADD </button>
          </div>
          </form>
		    </div>
      </div>
    </div>
  </div>
 
        
@stop