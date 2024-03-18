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
      <h3></h3>
      <form method="POST"  action="{{ route('register') }}">
                        @csrf
        <div class="row">
            <div class="col-md-12 form-first">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="hidden" name="userType" value="2">
                      <input type="text" class="form-control border-color @error('first_name') is-invalid @enderror" id="emaillogin" aria-describedby="emailHelp" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" autocomplete="first_name" autofocus>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div> 
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="emaillogin" value="{{ old('last_name') }}" aria-describedby="emailHelp" placeholder="Last Name" autocomplete="last_name" autofocus>
                     @error('last_name')
                                    <span class="invalid-feedback" role="alert">
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
                      <input type="email" class="form-control border-color   @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" name="email" id="emaillogin" aria-describedby="emailHelp" placeholder="Email ID">                  

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div> 
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="Number" class="form-control @error('email') is-invalid @enderror"  name="phone" id="emaillogin" aria-describedby="emailHelp" placeholder="Phone Number" value="{{ old('phone') }}" >
                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                </div>  
              </div>
            </div>
            
            <div class="col-md-12 form-first">
                Address
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <input type="text" class="form-control  @error('address') is-invalid @enderror"  name="address" id="emaillogin" aria-describedby="emailHelp" placeholder="Address" value="{{ old('address') }}" >
                      @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div> 
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control @error('general_layality') is-invalid @enderror" name="general_layality" id="emaillogin" aria-describedby="emailHelp" placeholder="General Layality" value="{{ old('general_layality') }}">
                    @error('general_layality')
                                    <span class="invalid-feedback" role="alert">
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
                      <input type="text" class="form-control @error('city') is-invalid @enderror"  name="city" id="emaillogin" aria-describedby="emailHelp" placeholder="City" value="{{ old('city') }}">
                       @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div> 
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" id="emaillogin" aria-describedby="emailHelp" placeholder="Zip Code" value="{{ old('zip_code') }}">
                     @error('zip_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                </div>  
              </div>
            </div>  

            <div class="col-md-12 form-first">
                 Bank Detail
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <input type="text" class="form-control  @error('bank_name') is-invalid @enderror"  name="bank_name" id="emaillogin" aria-describedby="emailHelp" placeholder="Bank Name" value="{{ old('bank_name') }}" >
                      @error('bank_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div> 
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control @error('account_no') is-invalid @enderror" name="account_no" id="emaillogin" aria-describedby="emailHelp" placeholder="Account Number" value="{{ old('account_no') }}">
                    @error('account_no')
                                    <span class="invalid-feedback" role="alert">
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
                      <input type="text" class="form-control @error('gst') is-invalid @enderror"  name="gst" id="emaillogin" aria-describedby="emailHelp" placeholder="GST Number" value="{{ old('gst') }}">
                      
                  </div> 
                </div>
              </div>
            </div>       
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <input type="password" class="form-control  @error('password') is-invalid @enderror"  name="password" id="emaillogin" aria-describedby="emailHelp" placeholder="Password" value="{{ old('password') }}" >
                      @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div> 
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Confirm Password" name="password_confirmation"  autocomplete="current-password">
                    
                  </div>
                </div>  
              </div>     
         <div class="col-md-12">
          <div class="chekbox-sec">
            <input type="checkbox" id="checkbox" name="checkbox"  value="1">
            @error('checkbox')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
             <label for="vehicle3"> I agree to <a href="#">Terms & Conditionst</a></label> 
          </div>
         </div>
         <button type="submit" class="col-md-12 btn-sec button-sec">
                                    {{ __('Register') }}
                                </button>
          
        </div>
      </form>
    </div>
  </div>
        </div>
      </div>
    </div>
  </div>

  
    @stop