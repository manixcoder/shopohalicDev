@extends('admin.master')
@section('pageTitle','Size Management')
@section('content')
<div class="dashboard-marchent">
    <div class="container">
      <h3>Add New Size</h3>
      <div class="marchent-wapperbox">
      @include('admin.includes.sidebar')
<div class="right-marchent-wapper">
          <div class="product-detailform">
          
            <form method="POST" action="{{ url('/admin/sizes/save') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Size Name</label>
                    <input class="form-control" type="text" id="size_name" name="size_name" placeholder="Size Name">
                  </div>
                </div>
             
              <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Category Name</label>
                   <select  class="form-control" id="category_id" name="category_id" onchange="getSubCategory(this.value),getBrand('category',this.value);">
                    <option>Select</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                   </select>
                  </div>
                </div>
               
              <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Sub Category Name</label>
                    <select  class="form-control" id="sub_category_id" name="sub_category_id" onchange="getBrand('sub_category',this.value);">
                    <option value="">Select</option>                   
                   </select>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Brand Name</label>
                    <select  class="form-control" id="brand_id" name="brand_id">
                    <option value="">Select</option>                   
                   </select>
                  </div>
                </div>
              </div>               
          </div>
          
          
          
          <div class="btn-addprod ">
            <button type="submit" class="add-prodbtn">ADD SIZE</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
   <script>          
            function getSubCategory(id){              
    $.ajax({
            url: "{{url('get-subcategory')}}",
            method: "GET",
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                "id": id              
            },
            dataType: 'json',
            success: function(response) {
            var html='<option value="">select</option>';              
               if(response)
               {
               $.each(response, function(index,value){
              html+='<option value="'+value.id+'">'+value.category_name+'</option>';
                });
               }
               $('#sub_category_id').html(html);
            }
        });
            }

            function getBrand(type,category_id){


    $.ajax({
            url: "{{url('get-brand')}}",
            method: "GET",
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                "type": type,
                "category": category_id,              
            },
            dataType: 'json',
            success: function(response) {
            var html='<option value="">select</option>';              
               if(response)
               {
               $.each(response, function(index,value){
              html+='<option value="'+value.id+'">'+value.brand_name+'</option>';
                });
               }
               $('#brand_id').html(html);
            }
        });
            }
          </script>
@stop