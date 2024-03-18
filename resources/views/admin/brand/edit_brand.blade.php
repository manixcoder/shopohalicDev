@extends('admin.master')
@section('pageTitle','Brand Management')
@section('content')
<div class="dashboard-marchent">
    <div class="container">
      <h3>Edit Brand</h3>
      <div class="marchent-wapperbox">
      @include('admin.includes.sidebar')
<div class="right-marchent-wapper">
          <div class="product-detailform">          
            <form method="POST" id="brandForm" action="{{ url('/admin/brands/'.$brandData->id.'/update') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Brand Name</label>
                    <input class="form-control" type="text" id="brand_name" name="brand_name" placeholder="Brand Name" value="{{$brandData->brand_name}}">
                  </div>
                </div>
             
              <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Category Name</label>
                   <select  class="form-control" id="category_id" name="category_id" onchange="getSubCategory(this.value);">
                    <option>Select</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($brandData->category_id==$category->id) selected @endif>{{$category->category_name}}</option>
                    @endforeach
                   </select>
                  </div>
                </div>
               
              <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Sub Category Name</label>
                    <select  class="form-control" id="sub_category_id" name="sub_category_id">
                    <option value="">Select</option>   
                     @foreach($subcategories as $subcategory)
                    <option value="{{$subcategory->id}}" @if($brandData->sub_category_id==$subcategory->id) selected @endif>{{$subcategory->category_name}}</option>
                    @endforeach                
                   </select>
                  </div>
                </div>
              </div>               
          </div>
          
          
          
          <div class="btn-addprod ">
            <button type="submit" class="add-prodbtn">ADD BRAND</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script type="text/javascript">
$("#brandForm").validate({    
     rules: {    
    brand_name: {required: true},
    category_id: {required: true},
    sub_category_id:{required:true},
    },
    messages: {
    brand_name: {required: "Please enter brand name"}, 
    category_id: {required: "Please select category"}, 
    sub_category_id: {required: "Please select sub category"},
     },
    submitHandler: function(form) {
      submit();
    }
    });
</script>
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
          </script>
@stop