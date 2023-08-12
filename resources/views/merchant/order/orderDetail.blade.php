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
</style>
<div class="dashboard-marchent">
    <div class="container">
      <h3>Dashboard</h3>
      <div class="marchent-wapperbox">
      @include('merchant.includes.sidebar')
<div class="right-marchent-wapper">
          <div class="product-box">
            <!-- Nav tabs -->
            
            <!-- Tab panes -->
           <table class="table">
    <thead>
      <tr>
        <th>Product Name</th>
         <th>Quantity</th>
        <th>Price</th>
        <th>Color</th>
         <th>Size</th>
         
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $order)
      <tr>
        <td>{{$order->product_name}}</td>
        <td>{{$order->quantity}}</td>
        <td>{{$order->price}}</td>
        <td>{{$order->color}}</td>
        <td>{{$order->size}}</td> 
      </tr>
      @endforeach
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