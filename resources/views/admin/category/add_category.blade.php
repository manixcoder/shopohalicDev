@extends('admin.master')
@section('pageTitle','Add Category Management')
@section('content')
<div class="dashboard-marchent">
    <div class="container">
      <h3>Add New Product</h3>
      <div class="marchent-wapperbox">
      @include('admin.includes.sidebar')
<div class="right-marchent-wapper">
          <div class="product-detailform">
            <h4>Add Category </h4>
            <form method="POST" action="{{ url('admin/category/save-category') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
               
                <div class="col-md-6 col-sm-6">
                <select class="form-control text-color" name="parent_cat">
                                <option value="N/A">Select Category</option>
                                @foreach($categoryData as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                  <input type="text" name="category_name" class="form-control text-color" id="emaillogin" aria-describedby="emailHelp" placeholder="Category Name">
                  </div>
                </div>
              </div>
          </div>
          <div class="btn-addprod ">
            <button type="submit" class="add-prodbtn">ADD CATEGORY</button>
          </div>
          </form>
		    </div>
      </div>
    </div>
  </div>
 
        
@stop