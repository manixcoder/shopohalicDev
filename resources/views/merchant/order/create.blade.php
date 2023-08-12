@extends('merchant.master')
@section('pageTitle','Products Management')
@section('content')

<div class="dashboard-marchent">
    <div class="container">
      <h3>Add New Product</h3>
      <div class="marchent-wapperbox">
      @include('merchant.includes.sidebar')
<div class="right-marchent-wapper">
          <div class="product-detailform">
            <h4>Product Details</h4>
            <form method="POST" action="{{ url('/merchant/products-management/save') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <input class="form-control" type="text" id="product_name" name="product_name" placeholder="Product Title" required>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <input class="form-control" type="text" id="product_code" name="product_code" placeholder="Product Code" required>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <input class="form-control" type="text" id="quantity" name="quantity" placeholder="Quantity (In Number)" required>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <textarea class="form-control" type="text" placeholder="Product Description" required></textarea>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <select class="form-control" name="category" id="category" onchange="getSubCategory(this.value),getBrand('category',this.value);" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <select class="form-control" name="sub_category_id" id="sub_category_id" onchange="getBrand('sub_category',this.value);">
                    <option value="">Select Sub Category</option>
                  
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <select class="form-control" name="brand" id="brand_id" onchange="getSize(this.value);" required>
                    <option value="">Select Brand</option>
                   
                    </select>
                  </div>
                </div>

                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <select class="form-control" multiple  name="size[]" id="size" required>
                    <option value="">Select Size</option>
                    </select>
                  </div>
                </div>
                 <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <select class="form-control" name="color[]" id="color" multiple required>
                    <option value="">Select Color</option>
                    @foreach($colors as $color)
                    <option value="{{$color->id}}">{{$color->color_name}}</option>
                    @endforeach
                    </select>
                  </div>
                </div>               
          </div>
          <div class="product-photosbox">
            <h4>Product Photos</h4>
            <div class="row">
              <div class="col-md-5">
                <label>Upload Title Photo*</label>
                <div class="placeholder-img">
                  <img id="imgPreview" src="{{ asset('public/frontAssets/images/placeholder.png') }}" alt="img" />
                </div>
                <div class="placeholder-textbox">
                  <p>600 X 600 px<br /> Minimum Size in pixel</p>
                  <div class="upload-filebox ">
                      <input type="file" class="upload-box" id="image" name="image" value="upload" required>
                      <span class="upload-box">upload</span>
                    </div>
                 
                </div>
              </div>
              <div class="col-md-5 uploadOther-photo">
                <label>Upload Other Photos</label>
                <div class="placeholder-img" id="image_preview">
                <span class="photobox-img"><img src="{{ asset('public/frontAssets/images/placeholder.png') }}" alt="img" /></span>
                <span class="photobox-img"><img src="{{ asset('public/frontAssets/images/placeholder.png') }}" alt="img" /></span>
                <span class="photobox-img"><img src="{{ asset('public/frontAssets/images/placeholder.png') }}" alt="img" /></span>
                <span class="photobox-img"><img src="{{ asset('public/frontAssets/images/placeholder.png') }}" alt="img" /></span>
                
                </div>
                <div class="placeholder-textbox">
                  <span class="pull-left">
                    <p>Maximum 4 Photos <br/>can be uploaded</p>
                  </span>
                  <span class="pull-right">
                    <div class="upload-filebox ">
                      <input type="file" class="upload-box"  id="upload_file" name="photo_image[]" onchange="preview_image();" multiple required>
                      <span class="upload-box">upload</span>
                    </div>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="pricinginc_box">
            <h4>Pricing <small>(Inclusive GST)</small></h4>
           
              <div class="pricinginc-input form-group">
                <label>Normal Price</label>
                <input type="text"  class="form-control" id="price" name="price"  placeholder="00" required>
                <span class="doller">$</span>
              </div>
              <div class="pricinginc-input  form-group">
                <label>Special Price</label>
                <input type="text"  class="form-control" id="special_price" name="special_price" placeholder="00" required>
                <span class="doller">$</span>
              </div>
              <div class="stock-lasts-box">
                <input type="radio" name="stock_type" value="till_stock_last" />
                <label>Till Stock Lasts</label>
                <input type="radio" name="stock_type" value="date_range" />
                <label>Date Range</label>
              </div>
              <div class="date-rangebox" style="display:none;" >
                <div class="start-date">
                <input type="text"  class="form-control" id="start_date" name="start_date" placeholder="Start date">
                </div>
                <div class="start-date end-date">
                <input type="text"  class="form-control" id="end_date" name="end_date" placeholder="End date">
                </div>
              </div>
           
          </div>
          <div class="shipping-box-date">
            <h4>Shipping</h4>
            <div class="row">
              <div class="col-md-6">
                <select class="form-control" name="shipping" required>
                  <option>Shipping Area</option>
                  @foreach($shippings as $shipping)
                  <option value="{{$shipping->id}}">{{$shipping->location}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <select class="form-control" name="expected" required>
                  <option selected="selected">Expected Delivery Days</option>
                  <option value="Expected Delivery Days 1">Expected Delivery Days 1</option>
                  <option value="Expected Delivery Days 2">Expected Delivery Days 2</option>
                </select>
              </div>
            </div>
          </div>
          <div class="btn-addprod ">
            <button type="submit" class="add-prodbtn">ADD PRODUCT</button>
          </div>
          </form>
		    </div>
      </div>
    </div>
  </div>
 
        <script>
            $(document).ready(() => {
                $("#image").change(function () {
                    const file = this.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $("#imgPreview")
                              .attr("src", event.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            });
            function preview_image() 
              {
                $('#image_preview').html(''); 
              var total_file=document.getElementById("upload_file").files.length;
             if(total_file<5)
             {
              for(var i=0;i<total_file;i++)
              {
                $('#image_preview').append("<span class='photobox-img'><img src='"+URL.createObjectURL(event.target.files[i])+"'></span>");
              }
            }else{
              alert('More than 4 images not allowed');
            }
              }
        </script>
        
        <link href=
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/
ui-lightness/jquery-ui.css'
        rel='stylesheet'>
    <script src=
"https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
    </script>
    <script>
        $(document).ready(function() {
          
            $(function() {
                $( "#start_date").datepicker({
                  dateFormat:"yy-mm-dd",
                });
                $( "#end_date").datepicker({
                  dateFormat:"yy-mm-dd",
                });
                $("input[name='stock_type']").click(function(){
             if($(this).val()=='till_stock_last')
             {
              $('.date-rangebox').css('display','none');
             }
             else if($(this).val()=='date_range')
             {
              $('.date-rangebox').css('display','block');
             }
        });
            });
      });
        
    </script>
   <script>
$(function(){ // DOM ready

  // ::: TAGS BOX
var arr=[];
  $("#brand_tags #brand").on({
    focusout : function() {
      var txt = this.value.replace(/[^a-z0-9\+\-\.\#]/ig,''); // allowed characters
   // alert(txt);
     arr.push(txt);
     
      if(txt) $("<span/>", {text:txt.toLowerCase(), insertBefore:this});
      this.value =  "";

      $('#brandtext').val(arr.toString());
    },
    keyup : function(ev) {
      // if: comma|enter (delimit more keyCodes with | pipe)
      if(/(188|13)/.test(ev.which)) $(this).focusout(); 
    }
  });
  $('#brand_tags').on('click', 'span', function() {
    if(confirm("Remove "+ $(this).text() +"?")) $(this).remove(); 
    arr.splice($.inArray($(this).text(),arr), 1);
$('#brandtext').val(arr.toString());

  });

});
</script>
<script>
$(function(){ // DOM ready

  // ::: TAGS BOX
var arr=[];
  $("#color_tags #color").on({
    focusout : function() {
      var txt = this.value.replace(/[^a-z0-9\+\-\.\#]/ig,''); // allowed characters
   // alert(txt);
     arr.push(txt);
     
      if(txt) $("<span/>", {text:txt.toLowerCase(), insertBefore:this});
      this.value =  "";

      $('#colortext').val(arr.toString());
    },
    keyup : function(ev) {
      // if: comma|enter (delimit more keyCodes with | pipe)
      if(/(188|13)/.test(ev.which)) $(this).focusout(); 
    }
  });
  $('#color_tags').on('click', 'span', function() {
    if(confirm("Remove "+ $(this).text() +"?")) $(this).remove(); 
    arr.splice($.inArray($(this).text(),arr), 1);
$('#colortext').val(arr.toString());

  });

});
</script>
<script>
$(function(){ // DOM ready

  // ::: TAGS BOX
var arr=[];
  $("#size_tags #size").on({
    focusout : function() {
      var txt = this.value.replace(/[^a-z0-9\+\-\.\#]/ig,''); // allowed characters
   // alert(txt);
     arr.push(txt);
     
      if(txt) $("<span/>", {text:txt.toLowerCase(), insertBefore:this});
      this.value =  "";

      $('#sizetext').val(arr.toString());
    },
    keyup : function(ev) {
      // if: comma|enter (delimit more keyCodes with | pipe)
      if(/(188|13)/.test(ev.which)) $(this).focusout(); 
    }
  });
  $('#size_tags').on('click', 'span', function() {
    if(confirm("Remove "+ $(this).text() +"?")) $(this).remove(); 
    arr.splice($.inArray($(this).text(),arr), 1);
$     ('#sizetext').val(arr.toString());

  });

});
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
            function getSize(brand_id){
            var category = $('#category').val();
            var sub_category_id = $('#sub_category_id').val();
           
    $.ajax({
            url: "{{url('get-size')}}",
            method: "GET",
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {                
                "brand_id": brand_id,
                "category_id": category,
                "sub_category_id": sub_category_id,              
            },
            dataType: 'json',
            success: function(response) {
            var html='<option value="">select</option>';              
               if(response)
               {
               $.each(response, function(index,value){
              html+='<option value="'+value.id+'">'+value.size_name+'</option>';
                });
               }
               $('#size').html(html);
            }
        });
            }
</script>
@stop