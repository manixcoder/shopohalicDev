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

          
            
            <form method="POST" id="productForm" action="{{ url('/merchant/products-management/save') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="panel panel-default">
              <div class="panel-heading"><h4>Product Details</h4></div>
              <div class="panel-body createPpanelBody">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="form-group">
                        <input class="form-control @error('product_name') is-invalid @enderror" type="text" id="product_name" name="product_name" placeholder="Product Title" value="{{old('product_name')}}" required>
                        @error('product_name')
                                        <span class="invalid" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <input class="form-control @error('product_code') is-invalid @enderror" type="text" id="product_code" name="product_code" placeholder="Product Code" value="{{old('product_code')}}" required>
                        @error('product_code')
                                        <span class="invalid" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                      </div>
                    </div>
                  
                    <div class="col-md-12 col-sm-12">
                      <div class="form-group">
                        <textarea class="form-control @error('description') is-invalid @enderror" type="text" name="description" required placeholder="Product Description" >{{old('description')}}</textarea>
                        @error('description')
                                        <span class="invalid" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <select class="form-control" name="category" id="category" required onchange="getSubCategory(this.value);" >
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" @if($category->id==old('category')) selected @endif>{{$category->category_name}}</option>
                        @endforeach
                        </select>
                        @error('category')
                                        <span class="invalid" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
                        <input class="form-control" type="text" id="quantity" name="quantity" placeholder="Quantity" required value="{{old('quantity')}}" >
                        @error('quantity')
                                        <span class="invalid" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                      </div>
                    </div>              
              </div>
              </div>
            </div>



            
          <div class="product-photosbox">

          <div class="panel panel-default">
            <div class="panel-heading"><h4>Product Photos</h4></div>
             <div class="panel-body">
                <div class="row">
                  <div class="col-md-5">
                    <label>Upload Title Photo*</label>
                    <div class="placeholder-img">
                      <img id="imgPreview" src="{{ asset('public/frontAssets/images/placeholder.png') }}" alt="img" />
                    </div>
                    <div class="placeholder-textbox">
                      <p>600 X 600 px<br /> Minimum Size in pixel</p>
                      <div class="upload-filebox ">
                          <input type="file" class="upload-box" required id="image" name="image" value="upload" >
                          <span class="upload-box">upload</span>
                          @error('image')
                                        <span class="invalid" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
                          <input type="file" class="upload-box"  id="upload_file" required name="photo_image[]" onchange="preview_image();" multiple>
                          <span class="upload-box">upload</span>
                        </div>
                      </span>
                    </div>
                  </div>
                </div>

            </div>
          </div>
            
            
          </div>
          <div class="pricinginc_box">

          <div class="panel panel-default">
            <div class="panel-heading"><h4>Pricing</h4></div>
            <div class="panel-body">
              <div class="pricinginc-input form-group">
                  <label>Normal Price</label>

                  <div class="input-group">
                    <span class="input-group-addon"><span class="doller">$</span></span>
                    <input type="text"  class="form-control" id="price" name="price" required placeholder="Price" value="{{old('price')}}">
                  </div>
                  
                    @error('price')
                        <span class="invalid" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      
                </div>
                <div class="pricinginc-input form-group">
                  <label>Special Price</label>
                  <div class="input-group">
                    <span class="input-group-addon"><span class="doller">$</span></span>
                    <input type="text"  class="form-control" id="special_price" name="special_price" placeholder="Special Price" value="{{old('special_price')}}">
                  </div>
                  
                </div>
                <div class="stock-lasts-box">
                  <label class="radio-inline"><input type="radio" name="stock_type" checked value="till_stock_last" />Till Stock Lasts</label>
                  <label class="radio-inline"><input type="radio" name="stock_type" value="date_range" />Date Range</label>

                  
                  
                  @error('stock_type')
                                      <span class="invalid" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                </div>
                <div class="date-rangebox" style="display:none;" >
                  <div class="start-date">
                  <input type="text"  class="form-control" id="start_date" name="start_date" placeholder="Start date">
                  @error('start_date')
                                      <span class="invalid" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                  </div>
                  <div class="start-date end-date">
                  <input type="text"  class="form-control" id="end_date" name="end_date" placeholder="End date">
                  @error('end_date')
                                      <span class="invalid" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                  </div>
                </div>
            </div>
          </div>
            
           
              
          </div>


          <div class="shipping-box-date">

            <div class="panel panel-default">
              <div class="panel-heading"><h4>Pickup</h4></div>
                <div class="panel-body">
                  <div class="row">
                  <div class="col-md-4">
                    <label class="radio-inline"><input type="radio" name="pickup" checked value="0" />No</label>
                    <label class="radio-inline"><input type="radio" name="pickup" value="1" />Yes</label>
                      @error('pickup')
                          <span class="invalid" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                </div>
              </div>
            </div>
              
          </div>

          <div class="shipping-box-date">
            <div class="panel panel-default">
              <div class="panel-heading"><h4>Shipping</h4></div>
              <div class="panel-body">
                <div class="row row1">
                  <div class="col-md-4">
                    <input type="text" class="form-control" name="location[]" placeholder="Location">
                  </div>
                  <div class="col-md-2">
                    <input type="text" class="form-control" name="cost[]" placeholder="Cost">
                  </div>
                  <div class="col-md-4">
                    <input type="text" class="form-control" name="delivery[]" placeholder="Delivery Expected day">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="btnbox addother-shiping">
            <a href="javascript:void(0);" class="add_button btn"><i class="fa fa-plus-circle" aria-hidden="true"></i> ADD ANOTHER SHIPPING AREA</a>
          </div>

          <div class="btn-addprod ">
            <button type="submit" class="add-prodbtn">ADD PRODUCT</button>
          </div>

          </form>
		    </div>
      </div>
    </div>
  </div>
 <script type="text/javascript">
$(document).ready(function(){    
    var maxField = 10; //Input fields increment limitation

    
    var fieldHTML = '<div class="row row1" style="margin-top:15px"><div class="col-md-4"> <input type="text" class="form-control" name="location[]" placeholder="Location"></div> <div class="col-md-2"><input type="text" class="form-control" name="cost[]" placeholder="Cost"> </div><div class="col-md-4"><input type="text" class="form-control" name="delivery[]" placeholder="Delivery Expected day"> </div></div>';
   // fieldHTML +=' <div class="col-md-2"><i class="fa fa-trash " id="DeleteRow"  aria-hidden="true"></i> </div>';
  
    
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $('.add_button').click(function(){
     
      
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
           
            $('.row1:last').after(fieldHTML); //Add field html
        }
    });
    $("body").on("click", "#DeleteRow", function () {
            $(this).parents("#row").remove();
        })
    
});
function deleteRow(id){
    if (confirm("Are you sure?")) {
          $.ajax({
                url: "{{url('merchant/shipping-management/delete')}}",
                method: "GET",
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    "id": id
                },
                dataType: 'html',
                success: function(response) {
                   if(response)
                   {
                    $('#row_'+id).hide();
                   }
                }
            });
           
            }
    }
</script>
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

            
            
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script type="text/javascript">
$("#productForm").validate({    
     rules: {    
    product_name: {required: true},
    product_code: {required: true},
    description:{required:true},
    category: {required: true},
    quantity: {required: true},
    image: {required: true},
    stock_type: {required: true},
    pickup: {required: true},
    },
    messages: {
    product_name: {required: "Please enter product name"}, 
    product_code: {required: "Please enter product code"}, 
    description: {required: "Please enter description"},
    category: {required: "Please select category"},
    quantity: {required: "Please enter quantity"},
    image: {required: "Please upload image"},
    stock_type: {required: "Please choose stock type"},
    pickup: {required: "Please choose pickup"},
     },
    submitHandler: function(form) {
      submit();
    }
    });
</script>
@stop