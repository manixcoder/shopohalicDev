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
        <th>Order No.</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Order Date</th>
        <th>Payment Date</th>
         <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $key=>$order)
      <tr>
        <td>{{$key+1}}</td>
        <td>{{$order->order_no}}</td>
        <td>{{$order->amount}}</td>
        <td>{{$order->status}}</td>
        <td>{{$order->order_date}}</td>
        <td>{{$order->payment_date}}</td>
        <td><a href="{{'myorder/'.$order->order_no}}">View</a></td>
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