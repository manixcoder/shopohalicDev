@extends('merchant.master')
@section('pageTitle','Products Management')
@section('content')
@php
$productColor=explode(',',$productData->color);
$sizeData=explode(',',$productData->size);
@endphp

<div class="dashboard-marchent">
    <div class="container">
      <h3>Add New Product</h3>
      <div class="marchent-wapperbox">
      @include('merchant.includes.sidebar')
<div class="right-marchent-wapper">
          <div class="product-detailform">
            <h4>Product Details</h4>
            <form method="POST" action="{{ url('/merchant/products-management/'.$productData->id.'/update') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <input class="form-control" type="text" id="product_name" name="product_name" placeholder="Product Title" required value="{{$productData->product_name}}">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <input class="form-control" type="text" id="product_code" name="product_code" placeholder="Product Code" required value="{{$productData->product_code}}">
                  </div>
                </div>
                
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <textarea class="form-control" type="text" name="description" placeholder="Product Description" required>{{$productData->description}}</textarea>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <select class="form-control" name="category" id="category" onchange="getSubCategory(this.value),getBrand('category',this.value);" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($productData->category==$category->id) selected @endif>{{$category->category_name}}</option>
                    @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <select class="form-control" name="sub_category_id" id="sub_category_id" onchange="getBrand('sub_category',this.value);">
                    <option value="">Select Sub Category</option>
                    @foreach($sub_categories as $sub_category)
                    <option value="{{$sub_category->id}}" @if($productData->sub_category_id==$sub_category->id) selected @endif>{{$sub_category->category_name}}</option>
                    @endforeach                  
                    </select>
                  </div>
                </div>
                
 <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <input class="form-control" type="text" id="quantity" name="quantity" placeholder="Quantity" required value="0">
                    <span style="color:green"><strong>Left Quantity: {{$leftItem}}</strong></span>
                  </div>
                 
                </div>
                
                               
          </div>
          <div class="product-photosbox">
            <h4>Product Photos</h4>
            <div class="row">
              <div class="col-md-5">
                <label>Upload Title Photo*</label>
                <div class="placeholder-img">
                  <img id="imgPreview" src="{{url('/public/uploads/products')}}/{{$productData['image']}}" alt="img" />
                </div>
                <div class="placeholder-textbox">
                  <p>600 X 600 px<br /> Minimum Size in pixel</p>
                  <div class="upload-filebox ">
                      <input type="file" class="upload-box" id="image" name="image" value="upload" >
                      <span class="upload-box">upload</span>
                    </div>
                </div>
              </div>
              <div class="col-md-5 uploadOther-photo">
                <label>Upload Other Photos</label>
                <div class="placeholder-img" id="image_preview">
                  @foreach($photoimage as $image)
                <span class="photobox-img"><img src="{{url('/public/uploads/product_image/'.$productData->product_name)}}/{{$image['product_image']}}" alt="img" /></span>
               @endforeach
                
                </div>
                <div class="placeholder-textbox">
                  <span class="pull-left">
                    <p>Maximum 4 Photos <br/>can be uploaded</p>
                  </span>
                  <span class="pull-right">
                    <div class="upload-filebox ">
                      <input type="file" class="upload-box"  id="upload_file" name="photo_image[]" onchange="preview_image();" multiple>
                      <span class="upload-box">upload</span>
                    </div>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="pricinginc_box">
            <h4>Pricing</h4>
           
              <div class="pricinginc-input form-group">
                <label>Normal Price</label>
                <input type="text"  class="form-control" id="price" name="price"  placeholder="Price" required value="{{$productData->price}}">
                <span class="doller">$</span>
              </div>
              <div class="pricinginc-input  form-group">
                <label>Special Price</label>
                <input type="text"  class="form-control" id="special_price" name="special_price" placeholder="Special Price"  value="{{$productData->special_price}}">
                <span class="doller">$</span>
              </div>
              <div class="stock-lasts-box">
                <input type="radio" name="stock_type"  id="radio_1" @if($productData->stock_type=='till_stock_last') checked @endif value="till_stock_last" />
                <label>Till Stock Lasts</label>
                <input type="radio" name="stock_type" id="radio_2" @if($productData->stock_type=='date_range') checked @endif value="date_range"  />
                <label>Date Range</label>
              </div>
              <div class="date-rangebox" style="display:none;" >
                <div class="start-date">
                <input type="text"  class="form-control" id="start_date" name="start_date" placeholder="Start date" value="{{$productData->start_date??''}}">
                </div>
                <div class="start-date end-date">
                <input type="text"  class="form-control" id="end_date" name="end_date" placeholder="End date" value="{{$productData->end_date??''}}">
                </div>
              </div>
           
          </div>
             <div class="shipping-box-date">
            <h4>Pickup</h4>
              <div class="col-md-4">
               <input type="radio" name="pickup" @if($productData->pickup==0) checked @endif value="0" />
                <label>No</label>
                <input type="radio" name="pickup" @if($productData->pickup==1) checked @endif value="1" />
                <label>Yes</label>
              </div>
          </div>
          <div class="shipping-box-date">
            <h4>Shipping</h4>
            <div class="row-table">
               @foreach($shippings as $shipping)
               @php
               if($shipping->location=='Pickup')
               continue;
               @endphp
            <div class="row">
              <div class="col-md-4">
                <input type="text" class="form-control" name="location[]" value="{{$shipping->location}}" placeholder="Location">
                
              </div>
              <div class="col-md-2">
                <input type="text" class="form-control" name="cost[]" value="{{$shipping->cost}}" placeholder="Cost">
              </div>
              <div class="col-md-4">
      <input type="text" class="form-control" name="delivery[]" value="{{$shipping->expected}}" placeholder="Delivery Expected day">
              </div>
            </div>
            @endforeach
          </div>
          </div>
          <div class="btnbox addother-shiping">
              <a href="javascript:void(0);" class="add_button btn"><i class="fa fa-plus-circle" aria-hidden="true"></i> ADD ANOTHER SHIPPING AREA</a>
            </div>
          <div class="btn-addprod ">
            <button type="submit" class="add-prodbtn">UPDATE PRODUCT</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
 <script type="text/javascript">
$(document).ready(function(){    
    var maxField = 10; //Input fields increment limitation

    
    var fieldHTML = '<div class="row" id="row"><div class="col-md-4"> <input type="text" class="form-control" name="location[]" placeholder="Location"></div> <div class="col-md-2"><input type="text" class="form-control" name="cost[]" placeholder="Cost"> </div><div class="col-md-4"><input type="text" class="form-control" name="delivery[]" placeholder="Delivery Expected day"> </div></div>';
   // fieldHTML +=' <div class="col-md-2"><i class="fa fa-trash " id="DeleteRow"  aria-hidden="true"></i> </div>';
  
    
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $('.add_button').click(function(){
     
      
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
           
            $('.row-table').after(fieldHTML); //Add field html
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
          
if($("#radio_1").prop("checked"))
{
  $('.date-rangebox').css('display','none');
   $('.date-rangebox').val('');
}
if($("#radio_2").prop("checked"))
{
  $('.date-rangebox').css('display','block');
}

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
              $('.date-rangebox').val('');
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