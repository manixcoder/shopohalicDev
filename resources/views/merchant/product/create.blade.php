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
                    <input class="form-control" type="text" id="product_name" name="product_name" placeholder="Product Title" >
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <input class="form-control" type="text" id="product_code" name="product_code" placeholder="Product Code">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                  <select class="form-control text-color" name="brand">
                                <option value="">Select Brand</option>
                                <option value="Sansung">Sansung</option>
                                <option value="Nokia">Nokia</option>
                                <option value="One Plus">One Plus</option>
                            </select>
                   
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <select class="form-control" name="category">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="Red">Red</option>
                    @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <input class="form-control" type="text" id="quantity" name="quantity" placeholder="Quantity (In Number)">
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <textarea class="form-control" type="text" placeholder="Product Description"></textarea>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group inline-blockbox select-bluebox">
                    <select class="form-control" name="color">
                                <option value="N/A">Select Color</option>
                                <option value="Red">Red</option>
                                <option value="Green">Green</option>
                                <option value="Green">Black</option>
                            </select>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  
                  <div class="form-group inline-blockbox select-bluesize">
                    <select class="form-control" name="size">
                                <option value="N/A">Select Size</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
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
                  <img id="imgPreview" src="images/placeholder.png" alt="img" />
                </div>
                <div class="placeholder-textbox">
                  <p>600 X 600 px<br /> Minimum Size in pixel</p>
                  <div class="upload-filebox ">
                      <input type="file" class="upload-box" id="image" value="upload">
                      <span class="upload-box">upload</span>
                    </div>
                 
                </div>
              </div>
              <div class="col-md-5 uploadOther-photo">
                <label>Upload Other Photos</label>
                <div class="placeholder-img" id="image_preview">
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
                <input type="text" name="Price" class="form-control" id="price" name="price"  placeholder="00">
                <span class="doller">$</span>
              </div>
              <div class="pricinginc-input  form-group">
                <label>Special Price</label>
                <input type="text" name="Price" class="form-control" id="special_price" name="special_price" placeholder="00">
                <span class="doller">$</span>
              </div>
              <div class="stock-lasts-box">
                <input type="radio" name="radio_box" class="radioinput" />
                <label>Till Stock Lasts</label>
              </div>
              <div class="date-rangebox">
                <div class="form-group daterange-label">
                  <input type="radio" name="radiobox">
                  Date Range
                </div>
                <div class="start-date">
                  <select class="form-control">
                    <option selected="selected">Start Date</option>
                    <option>1</option>
                    <option>2</option>
                  </select>
                </div>
                <div class="start-date end-date">
                  <select class="form-control">
                    <option selected="selected">End Date</option>
                    <option>1</option>
                    <option>2</option>
                  </select>
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
 var total_file=document.getElementById("upload_file").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'><br>");
 }
}
        </script>
@stop