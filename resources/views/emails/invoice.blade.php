<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
</head>
<body>
    <h3>{{ $details['title'] }}</h3>
    <table>
        <tr style="background-color: blue; border: 1px;">
            <th>Description</th>
            <th>QTY</th>
            <th>UNIT PRICE</th>
            <th>AMOUNT</th>
        </tr>
        @php
         $total=0;
         $shipping_cost=0;

        @endphp
        @foreach($details['orderRecords'] as $order)
       
         @php
          $sum=$order->quantity*$order->price;
          $total=$total+$sum;
          $shipping_cost=$shipping_cost+$order->shipping_cost;
          @endphp
        <tr >
            <th>{{$order->product_name}}</th>
            <th>{{$order->quantity}}</th>
            <th>{{$order->price}}</th>
            <th>{{$order->quantity*$order->price}}</th>
        </tr>
        @endforeach
         <tr>
            <th> </th>
            <th> </th>
            <th> </th>
            <th> </th>
             </tr>
             <tr>
            <th> </th>
            <th> </th>
            <th> </th>
            <th> </th>
             </tr>
             <tr>
            <th> </th>
            <th> </th>
            <th> </th>
            <th> </th>
             </tr>
             <tr>
            <th> </th>
            <th> </th>
            <th> </th>
            <th> </th>
             </tr>
            <tr>
            <th>Shipping Cost</th>
            <th> </th>
            <th> </th>
            <th>{{$shipping_cost}} </th>
            </tr>
            <tr>
            <th>Total</th>
            <th> </th>
            <th> </th>
            <th>{{$total+$shipping_cost}} </th>
             </tr>
    </table>
    
   
   
    <p>Thank you</p>
</body>
</html>