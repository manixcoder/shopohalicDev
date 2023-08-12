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
                  $total  = $total+$product['special_price'];
                  @endphp
                  <tr id="delete_tr_{{$product['cart_id']}}" class="product_cart">
                    <td>
                      <div class="cart-product">
                        <figure><img src="{{url('/public/uploads/products')}}/{{$product['image']}}" alt="i-phone-12"></figure>
                        <div class="cart-contant">
                          <input type="hidden" name="product_id[]" value="{{$product['product_id']}}">
                          <input type="hidden" name="color[]" value="{{$product['color']}}">
                          <input type="hidden" name="size[]" value="{{$product['size']}}">
                          <input type="hidden" name="shipping[]" value="{{$product['shipping']}}">
                          <input type="hidden" name="shipping_cost[]" value="{{$product['cost']}}">
                           <input type="hidden" name="price[]" value="{{$product['special_price']}}">
                           <span style="cursor: pointer; color: red,text-align:right;" onclick="deleteProduct({{$product['cart_id']}})"><b>X</b></span>
                          <h2>{{$product['product_name']}}</h2> 
                          <h3>{{$product['category_name']}}</h3>
                          <ul>
                            <li>
              <div style="display: inline-block;width: 20px;height: 20px;background:{{$product['color_code']}};border-radius: 2px;vertical-align: middle;"></div>
                                <h4>{{$product['price']}}</h4>
                            </li>
                          </ul>
                          <p>{{$product['expected']}}</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <select class="form-control pretty" id="quantity_{{$product['cart_id']}}" name="quantity[]" onchange="changeAmount(this.value,{{$product['special_price']}},{{$product['cart_id']}})">
                        <option value="1">1</option>
                        <option value="2">2</option>
                         <option value="3">3</option>
                          <option value="4">4</option>
                      </select>
                    </td>
                    <td>
                      $<h6 class="special_price_val" id="special_price_{{$product['cart_id']}}"> {{$product['special_price']}}</h6>
                      <span>${{$product['price']}}</span>
                    </td>
                  </tr> 
                  @endforeach
                </tbody>
             </table> 
            </div>                      
          </div>                         
        </div>
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
              <button>PLACE ORDER</button>
            </div>
          </div>
        </div>
         </form>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->
  <script src="{{ asset('public/frontAssets/js/jquery.prettydropdowns.js') }}"></script>
    <script>                                                                      
    $(document).ready(function() {      
      $('.pretty').prettyDropdown();
    }); 
    function changeAmount(quantity,price,id){
     var qty_price = quantity*price;
    // var commission =  parseInt($("#commission").text());
     $("#special_price_"+id).text(qty_price);
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
  </script> 
    @stop