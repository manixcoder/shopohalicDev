@extends('admin.master')
@section('pageTitle','Order status Management')
@section('content')
<div class="dashboard-marchent">
    <div class="container">
      <h3>Add New Banner</h3>
      <div class="marchent-wapperbox">
      @include('merchant.includes.sidebar')
<div class="right-marchent-wapper">
          <div class="product-detailform">
          
            <form method="POST" action="{{ url('/admin/banner/save') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Banner Name</label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="Banner Title" >
                  </div>
                </div>
              </div>
          </div>
          <div class="product-photosbox">
            <h4>Banner Image</h4>
            <div class="row">
              <div class="col-md-5">
                <label>Upload Banner Photo*</label>
                <div class="placeholder-img">
                  <img id="imgPreview" src="{{url('/public/images/placeholder.png')}}" alt="img" />
                </div>
                <div class="placeholder-textbox">
                  <div class="upload-filebox ">
                      <input type="file" class="upload-box" id="image" name="image" value="upload">
                      <span class="upload-box">upload</span>
                    </div>
                </div>
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
          </script>
@stop