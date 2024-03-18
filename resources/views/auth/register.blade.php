@extends('users.master')
@section('pageTitle','index')
@section('content')
                                                                                                                                                  
  <div class="terms-condition-page">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="terms-banner">
            <h1>SIGN UP</h1>
          </div>                                                                                          
          <div class="sign-up">

    <div class="container">

      <form method="POST" id="registrationForm" action="{{ route('register') }}">
                        @csrf
        <div class="row">
            <div class="col-md-12 form-first">
              <div class="row">
                 <!-- <div class="col-md-6">
                  <div class="form-group">
                    <div class="input">
                      <input type="text" name="fname" class="form-control" required="" fdprocessedid="s9rl8x">
                      <label for="fname">First Name</label>
                    </div>
                  </div>
                </div> -->

                <div class="col-md-6">
                  <div class="form-group">
                    <input type="hidden" name="userType" value="3">
                      <input type="text" class="form-control" id="first_name"  name="first_name" value="{{ old('first_name') }}" placeholder="First Name">
                                @error('first_name')
                                    <span class="invalid-feedback error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div> 
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="Last Name" autocomplete="last_name">
                     @error('last_name')
                                    <span class="invalid-feedback error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                </div>  
              </div>
            </div>
            <div class="col-md-12 form-first">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email ID">                  

                                @error('email')
                                    <span class="invalid-feedback error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div> 
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control"  name="phone"  placeholder="Phone Number" value="{{ old('phone') }}" >
                    @error('phone')
                                    <span class="invalid-feedback error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                </div>  
              </div>
            </div>
            
            <div class="col-md-12 form-first">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <input type="text" class="form-control"  name="address"  placeholder="Address" value="{{ old('address') }}" >
                      @error('address')
                                    <span class="invalid-feedback error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div> 
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" name="general_layality" placeholder="General Layality" value="{{ old('general_layality') }}">
                    @error('general_layality')
                                    <span class="invalid-feedback error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                </div>  
              </div>
            </div>
            <div class="col-md-12 form-first">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <input type="text" class="form-control"  name="city" placeholder="City" value="{{ old('city') }}">
                       @error('city')
                                    <span class="invalid-feedback error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div> 
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" name="zip_code" placeholder="Zip Code" value="{{ old('zip_code') }}">
                     @error('zip_code')
                                    <span class="invalid error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                </div> 
                
                <div class="col-md-6">
                  <div class="form-group">
                      <input type="password" class="form-control"  name="password" id="password"  placeholder="Password" value="{{ old('password') }}" >
                      @error('password')
                                    <span class="invalid error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div> 
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                   <input  type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" >
                    
                  </div>
                </div> 
                <div class="col-md-12">
                  <div class="chekbox-sec">
                    <input type="checkbox" id="checkbox" name="checkbox"  value="1">
                    <label for="vehicle3"> I agree to <a href="#">Terms & Conditionst</a></label> 
                  </div>
                  @error('checkbox')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                </div>

             

                <div class="col-md-12">
                  <button type="submit" class="btn-sec button-sec btn btn-primary registerBtn btn-lg">
                                            {{ __('Register') }}
                                        </button>
                </div>
                </div>

              </div>
            </div>      
             <div class="row">
                 
              </div>       
        
      </form>
    </div>
  </div>
        </div>
      </div>
    </div>
  </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script type="text/javascript">
$("#registrationForm111").validate({    
     rules: {    
    first_name: {required: true},
    last_name: {required: true},
    email:{required:true,email:true},
    phone: {required: true},
    address: {required: true},
    general_layality: {required: true},
    city: {required: true},
    zip_code: {required: true},
    password:{required:true},
    password_confirmation: {required: true,equalTo : "#password",},
    checkbox:{required: true},
    },
    messages: {
    first_name: {required: "Please enter first name"}, 
    last_name: {required: "Please enter first name"}, 
    email: {required: "Please enter email id",email:"please enter correct email address"},
    phone: {required: "Please enter contact number"},
    address: {required: "Please enter address"},
    general_layality: {required: "Please enter general layality"},
    city: {required: "Please enter city"},
    zip_code: {required: "Please enter zip code"},
    password: {required: "Please enter password"},
    password_confirmation: {required : 'password confirmation is required',equalTo : 'Password not matching',}
     },
    submitHandler: function(form) {
      submit();
    }
    });
</script>
    @stop