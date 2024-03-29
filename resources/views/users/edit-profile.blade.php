@extends('users.master')
@section('pageTitle','index')
@section('content')
@include('users.includes.sidebar-front')

  <div class="add-new-shipping-heading">
    <div class="container">
      <div class="row">                                          
        <div class="col-md-12 col-sm-12">
          <h1 class="main-heading">Edit Personal Information</h1>
        </div>          
      </div>
    </div>
  </div>                          

  <div class="login-page sign-up-page add-new-shipping-address">
    <form method="POST" action="http://localhost/shopohalicDev/users/edit-account" enctype="multipart/form-data">
       {{ csrf_field() }}
        <div class="row">  
          <div class="col-md-12 text-center">
            <div class="image-upload">              
                
                <input type="file" class="upload-box" id="image" name="image" value="upload">
                <label for="logo" class="upload-field" id="file-label">
                  <div class="file-thumbnail">
                  @if($user->profile_image!='') 
                       <img id="imgPreview"  src=" {{url('/public/uploads/users')}}/{{$user->profile_image}}" alt="our-img1"><br />
                       @else
                      <img id="imgPreview"  src="{{ asset('public/frontAssets/images/our-img1.png') }}" alt="our-img1"><br />
                      @endif
                      <button>UPLOAD NEW PHOTO</button>                                     
                  </div>
                </label>
            </div>
          </div>       
          <div class="col-md-6 col-sm-6">
            <div class="form-group">
              <div class="input">                                                     
                <input type="text" name="first_name" id="first_name" value="{{$user->first_name}}" class="form-control" />
                <label for="fname">First Name</label>
              </div>                                                                
            </div>                  
          </div>
          <div class="col-md-6 col-sm-6">       
            <div class="form-group">
              <div class="input">
                <input type="text" name="last_name" id="last_name" value="{{$user->last_name}}" class="form-control" />
                <label for="lname">Last Name</label>
              </div>
            </div> 
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group">
              <div class="input">
                <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control" />
                <label for="email">Email ID</label>
              </div>
            </div> 
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="form-group">
              <div class="input">
                <input type="tel" name="mobile" id="mobile" value="{{$user->mobile}}" class="form-control" />
                <label for="phone">Phone Number</label>
              </div>
            </div> 
          </div> 
          <div class="col-md-6 col-sm-6">
            <div class="form-group">
              <div class="input">
                <input type="tel" name="address" id="address" value="{{$user->address}}" class="form-control" />
                <label for="phone">Address</label>
              </div>
            </div> 
          </div> 
          <div class="col-md-6 col-sm-6">
            <div class="form-group">
              <div class="input">
                <input type="tel" name="city" id="city" value="{{$user->city}}"  class="form-control" />
                <label for="phone">City</label>
              </div>
            </div> 
          </div>                                                              
          <div class="col-md-6 col-sm-6">
            <div class="form-group">
              <div class="input">
                <input type="tel" name="zip_code" id="zip_code" value="{{$user->zip_code}}" class="form-control" />
                <label for="phone">Zip Code</label>
              </div>
            </div> 
          </div> 
          <div class="col-md-6 col-sm-6">
            <div class="form-group">
              <div class="input">
                <input type="tel" name="general_layality" id="general_layality" value="{{$user->general_layality}}" class="form-control" />
                <label for="phone">General Layality</label>
              </div>
            </div> 
          </div> 
          <div class="col-md-6 col-sm-6">
            <div class="form-group">
              <div class="input">
                <select class="form-control" name="gender" id="gender">
                  <option value="1" @if($user->gender==1) selected @endif>Male</option>
                  <option value="2" @if($user->gender==2) selected @endif>Female</option>
                  <option value="0" @if($user->gender==0) selected @endif>Special</option>
                </select>
                <label for="phone">Gender</label>
              </div>
            </div> 
          </div> 
          <div class="col-md-12 col-sm-12 submit-btn text-center">
            <button type="submit" class="btn btn-default">SAVE</button>
          </div>
          
        </div>
      </form>
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
    @stop