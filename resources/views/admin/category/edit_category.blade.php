@extends('admin.master')
@section('pageTitle','Category Management')
@section('content')
<div class="dashboard-marchent">
    <div class="container">
      <h3>Add New Product</h3>
      <div class="marchent-wapperbox">
      @include('admin.includes.sidebar')
<div class="right-marchent-wapper">
          <div class="product-detailform">
            <h4>Edit Category </h4>
            <form method="POST" id="categoryForm" action="{{ url('admin/category/'.$categoryD->id.'/update') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="category_id" value="{{$categoryD->id}}">
            <div class="row">
               
                <div class="col-md-6 col-sm-6">
                <select class="form-control text-color" name="parent_cat">
                                <option value="N/A">Select Category</option>
                                @foreach($categoryData as $category)
                                <option value="{{$category->id}}" {{ ( $category->id == $categoryD->parent_id) ? 'selected' : '' }}>{{$category->category_name}}</option>
                                @endforeach
                            </select>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                  <input type="text" name="category_name" class="form-control text-color" value="{{$categoryD->category_name}}" id="emaillogin" aria-describedby="emailHelp" placeholder="Category Name">
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
$("#categoryForm").validate({    
     rules: {    
    category_name: {required: true},
    },
    messages: {
    category_name: {required: "Please enter category name"}, 
     },
    submitHandler: function(form) {
      submit();
    }
    });
</script>
       
@stop