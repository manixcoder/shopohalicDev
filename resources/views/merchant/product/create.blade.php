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
            <form class="">
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <input class="form-control" type="text" name="Product-Title" placeholder="Product Title">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <input class="form-control" type="text" name="Product-Code" placeholder="Product Code">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <input class="form-control" type="text" name="Brand" placeholder="Brand">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <select class="form-control">
                      <option selected="selected">Select Category</option>
                      <option>Select Category 1</option>
                      <option>Select Category 2</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <input class="form-control" type="text" name="Total" placeholder="Total Quantity(in Numbers)">
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <textarea class="form-control" type="text" placeholder="Product Description"></textarea>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group inline-blockbox">
                    <div class="checkbox-clr">
                      <input type="checkbox" class="checkbox-input" name="color">
                      <span>Color</span>
                    </div>
                  </div>
                  <div class="form-group inline-blockbox select-bluebox">
                    <select class="form-control">
                      <option selected="selected">Select Color</option>
                      <option>Blue</option>
                      <option>Red</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group inline-blockbox">
                    <div class="checkbox-Ssize ">
                      <input type="checkbox" class="checkbox-input" name="color">
                      <span>Size/Variation</span>
                    </div>
                  </div>
                  <div class="form-group inline-blockbox select-bluesize">
                    <select class="form-control">
                      <option selected="selected">Select Size</option>
                      <option>20</option>
                      <option>50</option>
                    </select>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="product-photosbox">
            <h4>Product Photos</h4>
            <div class="row">
              <div class="col-md-5">
                <label>Upload Title Photo*</label>
                <div class="placeholder-img">
                  <img src="images/placeholder.png" alt="img" />
                </div>
                <div class="placeholder-textbox">
                  <p>600 X 600 px<br /> Minimum Size in pixel</p>
                  <div class="upload-filebox ">
                      <input type="file" class="upload-box" value="upload">
                      <span class="upload-box">upload</span>
                    </div>
                </div>
              </div>
              <div class="col-md-5 uploadOther-photo">
                <label>Upload Other Photos</label>
                <div class="placeholder-img">
                  <span class="photobox-img"><small class="close-icon">X</small><img src="images/placeholder.png" alt="img" /></span>
                  <span class="photobox-img"><img src="images/placeholder.png" alt="img" /></span>
                  <span class="photobox-img"><img src="images/placeholder.png" alt="img" /></span>
                  <span class="photobox-img"><img src="images/placeholder.png" alt="img" /></span>
                </div>
                <div class="placeholder-textbox">
                  <span class="pull-left">
                    <p>Maximum 4 Photos <br/>can be uploaded</p>
                  </span>
                  <span class="pull-right">
                    <div class="upload-filebox ">
                      <input type="file" class="upload-box" value="upload">
                      <span class="upload-box">upload</span>
                    </div>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="pricinginc_box">
            <h4>Pricing <small>(Inclusive GST)</small></h4>
            <form class="pricinginc_from">
              <div class="pricinginc-input form-group">
                <label>Normal Price</label>
                <input type="text" name="Price" class="form-control" placeholder="00">
                <span class="doller">$</span>
              </div>
              <div class="pricinginc-input  form-group">
                <label>Special Price</label>
                <input type="text" name="Price" class="form-control" placeholder="00">
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
            </form>
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
            <button type="button" class="add-prodbtn">ADD PRODUCT</button>
          </div>
		    </div>
      </div>
    </div>
  </div>
@stop