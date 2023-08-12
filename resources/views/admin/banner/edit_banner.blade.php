@extends('admin.master')
@section('pageTitle','Banner Management')
@section('content')
<div class="dashboard-marchent">
    <div class="container">
      <h3>Edit New Banner</h3>
      <div class="marchent-wapperbox">
      @include('admin.includes.sidebar')
<div class="right-marchent-wapper">
          <div class="product-detailform">
            <form method="POST" action="{{ url('/admin/banner/'.$bannerData->id.'/update') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" id="banner_id" value="{{$bannerData->id}}">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Banner Name</label>
                    <input class="form-control" type="text" id="name" name="name" value="{{$bannerData->name}}" placeholder="Banner Title" >
                  </div>
                </div>
              </div>
          </div>
          <div class="product-photosbox">
            <h4>Banner Photos</h4>
            <div class="row">
              <div class="col-md-5">
                <label>Upload Title Photo*</label>
                <div class="placeholder-img">
                  <img id="imgPreview" src="{{url('/public/uploads/banners')}}/{{$bannerData->image}}" alt="img" />
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
            <button type="submit" class="add-prodbtn">UPDATE BANNER</button>
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