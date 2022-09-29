@extends('merchant.master')
@section('pageTitle','Products Management')
@section('content')
<div class="dashboard-marchent">
    <div class="container">
      <h3>Edit New Product</h3>
      <div class="marchent-wapperbox">
      @include('merchant.includes.sidebar')
<div class="right-marchent-wapper">
          <div class="product-detailform">
            <h4>Product Details</h4>
            <form method="POST" action="{{ url('/merchant/products-management/'.$product->id.'/update') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" id="check_stock_type" value="{{$product->stock_type}}">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <input class="form-control" type="text" id="product_name" name="product_name" value="{{$product->product_name}}" placeholder="Product Title" >
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <input class="form-control" type="text" id="product_code" name="product_code" value="{{$product->product_code}}" placeholder="Product Code">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                  <select class="form-control text-color" name="brand">
                                <option value="">Select Brand</option>
                                <option value="Sansung" @if($product->brand=='Sansung') selected @endif>Sansung</option>
                                <option value="Nokia" @if($product->brand=='Nokia') selected @endif>Nokia</option>
                                <option value="One Plus" @if($product->brand=='One Plus') selected @endif>One Plus</option>
                            </select>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <select class="form-control" name="category">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($product->category==$category->id) selected @endif>{{$category->category_name}}</option>
                    @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <input class="form-control" type="text" id="quantity" name="quantity" value="{{$product->quantity}}" placeholder="Quantity (In Number)">
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <textarea class="form-control" type="text" name="description" placeholder="Product Description">{{$product->description}}</textarea>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group inline-blockbox select-bluebox">
                    <select class="form-control" name="color">
                                <option value="N/A">Select Color</option>
                                <option value="Red" @if($product->color=='Red') selected @endif>Red</option>
                                <option value="Green" @if($product->color=='Green') selected @endif>Green</option>
                                <option value="Black" @if($product->color=='Black') selected @endif>Black</option>
                            </select>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  
                  <div class="form-group inline-blockbox select-bluesize">
                    <select class="form-control" name="size">
                                <option value="N/A">Select Size</option>
                                <option value="1" @if($product->size=='1') selected @endif>1</option>
                                <option value="2" @if($product->size=='2') selected @endif>2</option>
                                <option value="3" @if($product->size=='3') selected @endif>3</option>
                                <option value="4" @if($product->size=='4') selected @endif>4</option>
                                <option value="5" @if($product->size=='5') selected @endif>5</option>
                                <option value="6" @if($product->size=='6') selected @endif>6</option>
                                <option value="7" @if($product->size=='7') selected @endif>7</option>
                                <option value="8" @if($product->size=='8') selected @endif>8</option>
                                <option value="9" @if($product->size=='9') selected @endif>9</option>
                                <option value="10" @if($product->size=='10') selected @endif>10</option>
                            </select>
                  </div>
                </div>
              </div>
           
          </div>
          <div class="product-photosbox">
            <h4>Product Photos</h4>
            <div class="row">
              <div class="col-md-5">
                <label>Upload Title Photo*</label>
                <div class="placeholder-img">
                  <img id="imgPreview" src="{{url('/public/uploads/products')}}/{{$product->image}}" alt="img" />
                </div>
                <div class="placeholder-textbox">
                  <p>600 X 600 px<br /> Minimum Size in pixel</p>
                  <div class="upload-filebox ">
                      <input type="file" class="upload-box" id="image" name="image" value="upload">
                      <span class="upload-box">upload</span>
                    </div>
                 
                </div>
              </div>
              <div class="col-md-5 uploadOther-photo">
                <label>Upload Other Photos</label>
                <div class="placeholder-img" id="image_preview">
                  @foreach($photoimages as $photoimage)
                <span class="photobox-img"><img src="{{url('/public/uploads/product_image')}}/{{$photoimage->product_image}}" alt="img" /></span>
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
            <h4>Pricing <small>(Inclusive GST)</small></h4>
           
              <div class="pricinginc-input form-group">
                <label>Normal Price</label>
                <input type="text"  class="form-control" id="price" name="price"  value="{{$product->price}}" placeholder="00">
                <span class="doller">$</span>
              </div>
              <div class="pricinginc-input  form-group">
                <label>Special Price</label>
                <input type="text"  class="form-control" id="special_price" name="special_price" value="{{$product->special_price}}" placeholder="00">
                <span class="doller">$</span>
              </div>
              <div class="stock-lasts-box">
                <input type="radio" name="stock_type" @if($product->stock_type) checked @endif value="till_stock_last" />
                <label>Till Stock Lasts</label>
                <input type="radio" name="stock_type" @if($product->stock_type) checked @endif value="date_range" />
                <label>Date Range</label>
              </div>
              <div class="date-rangebox" style="display:none;" >
                <div class="start-date">
                <input type="text"  class="form-control" id="start_date" name="start_date" value="{{$product->start_date}}" placeholder="Start date">
                </div>
                <div class="start-date end-date">
                <input type="text"  class="form-control" id="end_date" name="end_date" value="{{$product->end_date}}" placeholder="End date">
                </div>
              </div>
           
          </div>
          <div class="shipping-box-date">
            <h4>Shipping</h4>
            <div class="row">
              <div class="col-md-6">
                <select class="form-control">
                  <option selected="selected">Shipping Area</option>
                  <option>Shipping 2</option>
                  <option>Shipping 3</option>
                </select>
              </div>
              <div class="col-md-6">
                <select class="form-control">
                  <option selected="selected">Expected Delivery Days</option>
                  <option>Expected Delivery Days 2</option>
                  <option>Expected Delivery Days 3</option>
                </select>
              </div>
            </div>
          </div>
          <div class="btn-addprod ">
            <button type="submit" class="add-prodbtn">UPDATE PRODUCT</button>
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
          if($('#check_stock_type').val()=='date_range')
          {
            $('.date-rangebox').css('display','block');
          }else{
            $('.date-rangebox').css('display','none');
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
             }
             else if($(this).val()=='date_range')
             {
              $('.date-rangebox').css('display','block');
             }
        });
            });

            
      });
    </script>
@stop