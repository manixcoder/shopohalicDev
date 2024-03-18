@extends('users.master')
@section('pageTitle','index')
@section('content')

<link href="{{ asset('public/frontAssets/css/prettydropdowns.css') }}" rel="stylesheet">
<div class="breadcrumb-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li>></li>
          <li><a href="#">Cart</a></li>
        </ul>
      </div>                                                                              
    </div>                    
  </div>                                                                           
</div>                                                                                                                                                                                                                                                                          
<div class="cart-page">
  <div class="container">
   <form method="POST" action="{{ url('/placeorder/') }}" enctype="multipart/form-data">
     {{ csrf_field() }}
     <div class="row">
      <div class="col-md-12 col-sm-12">
        <h1>Your Cart</h1>
        @if(countUserItem()==0)
        <h2>cart is empty please add item</h2>
        @endif
      </div>
      <div class="col-md-8 col-sm-8">
        <div class="cart-detail">
          <div class="table-responsive">
            <table class="table">
              <tbody> 
               @php
               $total = 0;
               @endphp
               @foreach($products as $product)
               @php
               if($product['special_price']==Null || $product['special_price']==0)
               {
                $price=$product['price'];
                $total  = $total+$product['price'];
              }
              else{
                $price=$product['special_price'];
                $total  = $total+$product['special_price'];
              }
              if($product['delivery_type']=='Pickup')
              {
                $delivery_type='Pickup';
              }
              @endphp
              <tr id="delete_tr_{{$product['cart_id']}}" class="product_cart">
                <td>
                  <div class="cart-product">
                    <figure><img src="{{url('/public/uploads/products')}}/{{$product['image']}}" alt="i-phone-12"></figure>
                    <div class="cart-contant">
                      <input type="hidden" name="product_id[]"  value="{{$product['product_id']}}">
                      <input type="hidden" name="color[]" value="{{$product['color']}}">
                      <input type="hidden" name="size[]" value="{{$product['size']}}">
                      <input type="hidden" name="shipping[]" value="{{$product['shipping']}}">
                      <input type="hidden" id="left_product_{{$product['product_id']}}" value="{{leftItem($product['product_id'])}}">
                      <input type="hidden" name="shipping_cost[]" value="{{$product['cost']}}">
                      <input type="hidden" name="price[]" @if($product['special_price']!='') value="{{$product['special_price']}}" @else value="{{$product['price']}}"@endif >
                      <span style="cursor: pointer; color: red,text-align:right;" onclick="deleteProduct({{$product['cart_id']}})"><b>X</b></span>
                      <h2>{{$product['product_name']}}</h2> 
                      <h3>{{$product['category_name']}}</h3>
                      <ul>
                        <li>
                          <div style="display: inline-block;width: 20px;height: 20px;background:{{$product['color_code']}};border-radius: 2px;vertical-align: middle;"></div>

                        </li>
                      </ul>

                      <p>Delivery By: {{$product['expected']}}</p>
                      <p id="deliveryAddressShow_{{$product['product_id']}}"></p>
                      @if($product['delivery_type']=='Pickup')
                       <input type="hidden" name="deliveryAddress[]" id="deliveryAddress_{{$product['product_id']}}" value="Pickup">

                       <input type="hidden" name="deliveryAddressId[]"  value="Pickup">
                       <p><strong>Delivery address:</strong> Pickup</p>
                       @else
                       @if(count($UserDeliveryAddress)>0)
                       <select class="form-control" name="" id="delAddress" onchange="changeShippingAddress(this.value,{{$product['product_id']}});">
                        @foreach($UserDeliveryAddress as $address)
                        <option value="{{$address['id']}}">{{$address['delivery_address']}}</option>
                       @endforeach
                       </select>
                       @endif
                      <input type="hidden" name="deliveryAddress[]" id="deliveryAddress_{{$product['product_id']}}" @if(isset($UserDeliveryAddress[0]['delivery_address'])) value="{{$UserDeliveryAddress[0]['delivery_address']}}" @else value="" @endif>
                      <a href="javascript:void()" onclick="deleiveryAddress({{$product['product_id']}})" data-toggle="modal" data-target="#myModal">Add Delivery Address</a>
                      <input type="hidden" name="deliveryAddressId[]" id="deliveryAddressId_{{$product['product_id']}}"  value="{{$UserDeliveryAddress[0]['id']}}">
                     
                      @endif
                    </div>
                  </div>
                </td>
                <td>
                  <input type="number" name="quantity[]" class="product_qty" id="quantity_{{$product['cart_id']}}" value="1" min="1" required onkeyup="changeAmount({{$price}},{{$product['cart_id']}},{{$product['product_id']}})">
                  <br>
                   <div style="color:red;"><i>left Stock: {{leftItem($product['product_id'])}}<i> unit</div>
                  <!-- <select class="form-control pretty" id="quantity_{{$product['cart_id']}}" name="quantity[]" onchange="changeAmount(this.value,{{$price}},{{$product['cart_id']}},{{$product['product_id']}})">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select> -->
                </td>
                <td>

                 @if($product['special_price']==Null || $product['special_price']==0)
                 $<h6 class="special_price_val" id="special_price_{{$product['cart_id']}}"> {{$product['price']}}</h6>

                 @else
                 $<h6 class="special_price_val" id="special_price_{{$product['cart_id']}}"> {{$product['special_price']}}</h6>
                 <span>${{$product['price']}}</span>
                 @endif



               </td>
             </tr> 
             @endforeach
           </tbody>
         </table> 
       </div>                      
     </div>                         
   </div>
   @if(countUserItem()>0)
   <div class="col-md-4 col-sm-4">
    <div class="subtotal-part">
      <ul>                         
        <li>                              
          <p>Sub Total</p>
          <h3>$ <span id="total">{{$total}}</span></h3>
        </li>                                  

        <li>                                                                                   
          <p>Grand Total</p>
          <h3>$ <span id="grand_total">{{$total}}</span></h3>
        </li>
      </ul>            
      <div class="order-btn text-center">
        <h5><a href="{{ URL::to('/') }}">Continue to shopping</a></h5>
        <button>PLACE ORDER</button>
      </div>
    </div>
  </div>
  @endif
</form>
</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Address</h4>
      </div>
      <div class="modal-body">
        <p class="deAddress">
        </p>
      </div>
      
    </div>

  </div>
</div>
<!-- Optional JavaScript; choose one of the two! -->
<script src="{{ asset('public/frontAssets/js/jquery.prettydropdowns.js') }}"></script>
<script>                                                                      

  function changeAmount(price,cart_id,product_id){
    "use strict";
    
    var quantity=$("#quantity_"+cart_id).val();
    if(parseInt(quantity)==0)
    {
      $("#quantity_"+cart_id).val('1');
       $("#special_price_"+cart_id).text(price);
      alert('Quantity must be minimun 1');

      return false;
    }
    if(parseInt($("#left_product_"+product_id).val())<parseInt(quantity))
    {
         alert('Quantity is greater than left item');
      $("#quantity_"+cart_id).val('1');
       $("#special_price_"+cart_id).text(price);

       var qty_price = 1*price;
    // var commission =  parseInt($("#commission").text());
    $("#special_price_"+cart_id).text(qty_price);
    var total_item_value=0;
    $(".special_price_val").each(function() {
      total_item_value = total_item_value+parseInt($(this).text());
    });
    $("#total").text(total_item_value);
    var grand_total =total_item_value;
    $("#grand_total").text(grand_total);
      return false;
    }
    var qty_price = quantity*price;
    // var commission =  parseInt($("#commission").text());
    $("#special_price_"+cart_id).text(qty_price);
    var total_item_value=0;
    $(".special_price_val").each(function() {
      total_item_value = total_item_value+parseInt($(this).text());
    });
    $("#total").text(total_item_value);
    var grand_total =total_item_value;
    $("#grand_total").text(grand_total);
  }  
  function deleteProduct(id){
    if (confirm("Do you want delete item?")) {  
     var numItems = $('.product_cart').length;
     var grand_total=parseInt($("#grand_total").text());
     var special_price=parseInt($("#special_price_"+id).text());
     var quantity=parseInt($("#quantity_"+id).val());
     grand_total=grand_total-special_price;
     $("#total").text(grand_total);
     $("#grand_total").text(grand_total);
     $("#delete_tr_"+id).remove();
     var cart = numItems-1;
     $("#countUserItem").text(cart);

     $.ajax({
      url: "{{url('users/deleteItem')}}",
      method: "GET",
      contentType: 'application/json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: {
        "id": id             
      },
      dataType: 'json',
      success: function(response) {
      }
    });
   }
 }       
 function deleiveryAddress(product_id){
  var table="";
  table+="<table>";
  table+="<tr><input type='text' name='name' id='name' required placeholder='Name' class='form-control' ></tr><br>";
  table+="<tr><input type='text' name='address' required placeholder='Address' id='address' class='form-control' ></tr><br>";
  table+="<tr><input type='text' name='suburb' required placeholder='Suburb' id='suburb' class='form-control' ></tr> <br>";
  table+="<tr><input type='text' name='city' required placeholder='City' id='city' class='form-control' ></tr><br>";
   table+="<tr><input type='number' placeholder='Post Code' required name='zip_code' id='zip_code' class='form-control' ></tr> <br>";
  table+="<tr><input type='submit' class='btn btn-default' data-dismiss='modal' name='submit' onclick='submitForm("+product_id+")' value='Add Address'></tr>";
  table+="</table>";
  $('.deAddress').html(table);
}
function submitForm(product_id){
  var address=$('#name').val()+', '+$('#address').val()+', '+$('#suburb').val()+', '+$('#city').val()+','+$('#zip_code').val();
  $('#deliveryAddress_'+product_id).val(address);
   $('#deliveryAddressShow_'+product_id).html('<strong>Delivery address:</strong> '+address);
    $('#deliveryAddressId_'+product_id).val('');
 

}

function changeShippingAddress(address,product_id){
  
  $('#deliveryAddressId_'+product_id).val(address);
$('#deliveryAddress_'+product_id).val($('#delAddress option:selected').text());
$('#deliveryAddressShow_'+product_id).hide();
}
</script> 
@stop