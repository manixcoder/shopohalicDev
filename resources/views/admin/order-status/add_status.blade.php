@extends('admin.master')
@section('pageTitle','Order status')
@section('content')
<div class="dashboard-marchent">
    <div class="container">
      <h3>Add New Order Status</h3>
      <div class="marchent-wapperbox">
      @include('merchant.includes.sidebar')
<div class="right-marchent-wapper">
          <div class="product-detailform">
          
            <form method="POST" id="orderStatusForm" action="{{ url('/admin/orderstatus/save') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Status Name</label>
                    <input class="form-control" type="text" required id="status_name" name="status_name" placeholder="Status Name" >
                  </div>
                </div>
              </div>
          </div>
          
          
          <div class="btn-addprod ">
            <button type="submit" class="add-prodbtn">ADD Status</button>
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