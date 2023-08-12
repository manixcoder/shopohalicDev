@extends('users.master')
@section('pageTitle','index')
@section('content')
@include('users.includes.sidebar-front')


  <div class="add-new-shipping-heading">
    <div class="container">
      <div class="row">                                          
        <div class="col-md-12 col-sm-12">
          <h1 class="main-heading"> Personal Information</h1>
        </div> 
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

  <div class="login-page sign-up-page add-new-shipping-address">
   
  </div> 
    @stop