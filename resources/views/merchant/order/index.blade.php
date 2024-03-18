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
        <th>Order No.</th>
        <th>User</th>
        <th>Status</th>
        <th>Order Date</th>
        <th>Payment Date</th>
        <th>Order Status</th>
        <th>Detail</th>
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $order)
      <tr>
        <td>{{$order['order_no']}}</td>
        <td>{{$order['user_id']}}</td>
        <td>{{$order['status']}}</td>
        <td>{{$order['order_date']}}</td>
        <td>{{$order['payment_date']}}</td>
        <td>
          <select class="form-control" onchange="changeOrderStatus({{$order['id']}},'{{$order['order_no']}}',this.value)">
            <option value="">Select</option>
            @foreach($orderstatus as $value)
            <option value="{{$value->id}}" @if($value->id==$order['order_status']) selected @endif>{{$value->status_name}}</option>
            @endforeach
          </select>
        </td>
         <th><a href="order-management/order/{{$order['order_no']}}">Detail</a></th>
       
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
  <script type="text/javascript">
function changeOrderStatus(order_id,order_no,status_id){
             if (confirm("Do you want change status?")) {  
    $.ajax({
            url: "{{url('merchant/order-management/changeOrderStatus')}}",
            method: "GET",
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                "order_id": order_id,"status_id":status_id,"order_no":order_no             
            },
            dataType: 'json',
            success: function(response) {
            }
        });
  }
            }
            </script>
        @stop
@section('pagejs')

@stop