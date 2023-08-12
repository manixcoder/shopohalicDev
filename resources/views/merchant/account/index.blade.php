@extends('merchant.master')
@section('pageTitle','Products Management')
@section('content')
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
.error{color: red}
</style>
<div class="dashboard-marchent">
    <div class="container">
      <h3>Account 
       
      </h3>
      <div class="marchent-wapperbox">
      @include('merchant.includes.sidebar')
<div class="right-marchent-wapper">
     @if(Session::has('fail'))
          <div class="alert alert-danger">
              {{ Session::get('fail') }}
          </div>
  @endif
  @if(Session::has('success'))
          <div class="alert alert-success">
              {{ Session::get('success') }}
          </div>
  @endif
          <div class="product-box">
            <form class="change-form" id="change-form" method="POST" action="" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="row p-t-20 col-md-12">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label">First Name</label>
                                    <input type="text" class="form-control form-control-danger" id="first_name" value="{{$user->first_name}}" name="first_name" required placeholder="First Name"  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Last Name</label>
                                    <input type="text" class="form-control form-control-danger" id="last_name" name="last_name" value="{{$user->last_name}}" required placeholder="Last Name"  />
                                </div>
                            </div>
                            </div>
                            <div class="row p-t-20 col-md-12">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label">Image</label>
                                    <div class="placeholder-img">
                  <img id="imgPreview" src="{{url('/public/uploads/users/merchant')}}/{{$user->profile_image}}" alt="img" />

                </div>
                <div class="placeholder-textbox">
                  <div class="upload-filebox ">
                      <input type="file" class="upload-box" id="image" name="profile_image" value="upload" >
                    </div>
                </div>
                            <input type="hidden" name="delete_image" value="{{$user->profile_image}}">        
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Address</label>
                                    <textarea class="form-control" name="address" id="address">{{$user->address}}</textarea>
                                </div>
                            </div>
                            </div>
                            <div class="row p-t-20 col-md-12">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label">City</label>
                                    <input type="text" class="form-control form-control-danger" id="city" name="city" value="{{$user->city}}" required placeholder="First Name"  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Zip Code</label>
                                    <input type="number" class="form-control form-control-danger" id="zip_code" name="zip_code" value="{{$user->zip_code}}" required placeholder="Last Name"  />
                                </div>
                            </div>
                            </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-info waves-effect waves-light  cus-submit save-btn"><i class="fa fa-save" aria-hidden="true"></i> Create</button>
                    </div>
                </form>
           
              </div>
            </div>
          </div>
        </div>
        </div>
    </div>
  </div>
  @section('pagejs')

 
        @stop
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>  
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
// $(document).ready (function () {  
//     $.validator.addMethod(
//         "regex",
//         function(value, element, regexp) {
//             var re = new RegExp(regexp);
//             return this.optional(element) || re.test(value);
//         },
//         "Please check your input."
// );
//   $("#change-form").validate ({
//     rules: {
//              oldpassword: 'required',
//                 newpassword: {regex: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/ },                
//                 cpassword: {
//                     required: true,
//                     equalTo : "#newpassword",
//                 },
//             },
//             messages: {
//                 oldpassword: 'Current Password is required',
//                // newpassword: 'New Password is required',
//                 cpassword: {
//                     required : 'Confirm Password is required',
//                     equalTo : 'Password not matching',
//                 }
//             },
//   });  
// });  
</script> 
        @stop


