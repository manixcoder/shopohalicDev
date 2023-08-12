@extends('users.master')
@section('pageTitle','index')
@section('content')
@include('users.includes.sidebar-front')

  <div class="add-new-shipping-heading">
    <div class="container">
      <div class="row">                                          
        <div class="col-md-12 col-sm-12">
          <h1 class="main-heading">My Order</h1>
        </div> 
       
 <table class="table">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>Product</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Size</th>
        <th>Color</th>
        
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $key=>$order)
      <tr>
        <td>{{$key+1}}</td>
        <td>{{$order->product_id}}</td>
        <td>{{$order->quantity}}</td>
        <td>{{$order->price}}</td>
        <td>{{$order->Size}}</td>
        <td>{{$order->color}}</td>
      
      </tr>
    @Endforeach
    </tbody>
  </table>        
      </div>
    </div>
  </div>                          

  <div class="login-page sign-up-page add-new-shipping-address">
   
  </div> 
    @stop