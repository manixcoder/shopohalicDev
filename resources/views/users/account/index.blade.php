@extends('merchant.master')
@section('pageTitle','Products Management')
@section('content')

<div class="dashboard-marchent">
    <div class="container">
      <h3>Dashboard 
        <span class="pull-right"><a href="{{url('merchant/products-management/create')}}" class="addproduct-btn">Edit</a></span>
      </h3>
      <div class="marchent-wapperbox">
      @include('users.includes.sidebar')
<div class="right-marchent-wapper">
          <div class="product-box">
            <!-- Nav tabs -->
            
            <!-- Tab panes -->
           <table class="table">
    
    <tbody>
      <tr>
        <td>Name</td>
        <td>{{$user->first_name}} {{$user->last_name}}</td>
      </tr>
      <tr>
        <td>Profile Image</td>
        <td>{{$user->profile_image}}</td>
      </tr>
      <tr>
        <td>Address</td>
        <td>{{$user->address}}</td>
      </tr>
       <tr>
        <td>City</td>
        <td>{{$user->city}}</td>
      </tr>
       <tr>
        <td>Zip Code</td>
        <td>{{$user->zip_code}}</td>
      </tr>
       <tr>
        <td>General Layality</td>
        <td>{{$user->general_layality}}</td>
      </tr>
       <tr>
        <td>Gender</td>
        <td>{{$user->gender}}</td>
      </tr>
       <tr>
        <td>Mobile</td>
        <td>{{$user->mobile}}</td>
      </tr>
       <tr>
        <td>Email</td>
        <td>{{$user->email}}</td>
      </tr>
    </tbody>
  </table>
              </div>
            </div>
          </div>
        </div>
        </div>
    </div>
  </div>
        @stop
@section('pagejs')


@stop