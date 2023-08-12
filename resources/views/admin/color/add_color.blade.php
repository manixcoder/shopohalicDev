@extends('admin.master')
@section('pageTitle','Order status Management')
@section('content')
<div class="dashboard-marchent">
    <div class="container">
      <h3>Add New Color</h3>
      <div class="marchent-wapperbox">
      @include('merchant.includes.sidebar')
<div class="right-marchent-wapper">
          <div class="product-detailform">
          
            <form method="POST" action="{{ url('/admin/colors/save') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Color Name</label>
                    <input class="form-control" type="text" id="color_name" name="color_name" placeholder="Color Title" required >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Color Code</label>
                    <input class="form-control" type="text" id="color_code" name="color_code" placeholder="Color Code" required >
                  </div>
                </div>
              </div>
          </div>
         
          
          
          <div class="btn-addprod ">
            <button type="submit" class="add-prodbtn">ADD Color</button>
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