@extends('admin.master')
@section('pageTitle','Order Status Management')
@section('content')
<div class="dashboard-marchent">
    <div class="container">
      <h3>Edit Order Status</h3>
      <div class="marchent-wapperbox">
      @include('admin.includes.sidebar')
<div class="right-marchent-wapper">
          <div class="product-detailform">
            <form method="POST" id="orderStatusForm" action="{{ url('/admin/orderstatus/'.$orderstatus->id.'/update') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" id="banner_id" value="{{$orderstatus->id}}">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Order Status</label>
                    <input class="form-control" type="text" required id="status_name" name="status_name" value="{{$orderstatus->status_name}}" placeholder="Order Status" >
                  </div>
                </div>
              </div>
          </div>
         
          <div class="btn-addprod ">
            <button type="submit" class="add-prodbtn">Update</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script type="text/javascript">
$("#orderStatusForm").validate({    
     rules: {    
    status_name: {required: true},
    },
    messages: {
    status_name: {required: "Please enter status name"}, 
     },
    submitHandler: function(form) {
      submit();
    }
    });
</script>
@stop