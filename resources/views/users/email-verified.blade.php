@extends('users.master')
@section('pageTitle','index')
@section('content')

 <div class="breadcrumb-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
         
        </div>                                                                              
      </div>                    
    </div>                                                                           
  </div>                                                                                                                                                                
  <div class="payment-method">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
         
          <div class="select-payment">
            <ul>
              <li>
                 <div class="card-body">
                   @if($verified=='1')
                        <div class="alert alert-success" role="alert">
                         Your email has been verified. Thanks!.please <a href="{{ route('login') }}">click me</a> for login.
                         </div>
                         @else
                         <div class="alert alert-danger" role="alert">
                         Your email has been not verified, please contact admin <a href="/login">click me</a> for login.
                         </div>
                         @endif
                         
              </li>
              
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div> 
    @stop