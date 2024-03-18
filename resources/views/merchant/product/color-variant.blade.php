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
      <h3>{{$product->product_name}} 
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
        <th>Color Name</th>
         <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($colors as $color)
      <tr>
        <td>{{$color['color_name']}}</td>
        <td><a href="{{url('merchant/products-management/'.$product_id.'/'.$color['id'].'/manage-store')}}"><i class="fa fa-pencil bg-orange" aria-hidden="true"></i> Manage Store</a></td>
        <th></th>
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