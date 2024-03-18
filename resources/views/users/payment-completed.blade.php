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
          <h1 class="main-heading">Payment Status</h1>
          <div class="select-payment">
            <ul>
              <li>
                 <div class="card-body">
                     @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                         </div>
                         @endif
              </li>
              <li>
                
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div> 
    @stop