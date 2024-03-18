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
      <h3>Dashboard 
        <span class="pull-right"><a href="{{url('merchant/products-management/create')}}" class="addproduct-btn">ADD NEW PRODUCT</a></span>
      </h3>
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
        <th>Category</th>
        <th>Image</th>
         <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <td>{{$product['product_name']}}</td>
        <td>{{$product['category_name']}}</td>
        <td><img src="{{url('/public/uploads/products')}}/{{$product['image']}}" width="80" height="80"></td>
        <th><a href="{{url('merchant/products-management/'.$product['id'].'/edit')}}"><i class="fa fa-pencil bg-orange" aria-hidden="true"></i> Edit</a></th>
        <!-- <th><a href="{{url('merchant/products-management/'.$product['id'].'/color-variant')}}"><i class="fa fa-pencil bg-orange" aria-hidden="true"></i>Color Variant</a></th> -->
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