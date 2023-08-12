@extends('admin.master')
@section('pageTitle','Color Management')
@section('content')
<div class="dashboard-marchent">
    <div class="container">
      <h3>Edit New Color</h3>
      <div class="marchent-wapperbox">
      @include('admin.includes.sidebar')
<div class="right-marchent-wapper">
          <div class="product-detailform">
            <form method="POST" action="{{ url('/admin/colors/'.$colorData->id.'/update') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" id="banner_id" value="{{$colorData->id}}">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Color Name</label>
                    <input class="form-control" type="text" id="color_name" name="color_name" value="{{$colorData->color_name}}" placeholder="Color Name" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Color Code</label>
                    <input class="form-control" type="text" id="color_code" name="color_code" value="{{$colorData->color_code}}" placeholder="Color Code" >
                  </div>
                </div>
              </div>
          </div>
          
          <div class="btn-addprod ">
            <button type="submit" class="add-prodbtn">UPDATE COLOR</button>
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