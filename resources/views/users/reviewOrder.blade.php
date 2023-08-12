@extends('users.master')
@section('pageTitle','index')
@section('content')

 <div class="breadcrumb-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <ul>
            <li><a href="index.html">Home</a></li>
            <li>></li>
            <li><a href="#">Cart</a></li>
            <li>></li>
            <li><a href="#">Shipping Address</a></li>
            <li>></li>
            <li><a href="#">Review Order </a></li>
          </ul>
        </div>                                                                              
      </div>                    
    </div>                                                                           
  </div>                                                                                                                                                                                                  <form method="POST" action="{{ url('/pay-now/') }}" enctype="multipart/form-data">
            {{ csrf_field() }}                                                                         
  <div class="cart-page review-order">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <h1>Review Order</h1>
        </div>
        <div class="col-md-8 col-sm-8">
          <div class="cart-detail">
            <h1>Items</h1>
            <div class="table-responsive">
              <table class="table">
                <tbody> 
                   @php
                  $total = 0;
                  $cost=0;                 
                   @endphp
                  @foreach($product_orders as $product)
                  @php
                  $total  = $total+($product['special_price']*$product['quantity']);
                  $cost  = $cost+($product['shipping_cost']*$product['quantity']);
                  @endphp 

                  <tr>
                    <td>
                      <div class="cart-product">
                        <figure><img src="{{url('/public/uploads/products')}}/{{$product['image']}}" alt="{{$product['image']}}"></figure>
                        <div class="cart-contant">
                          <h2>{{$product['product_name']}}</h2>
                          <h3>{{$product['category_name']}}</h3>
                          <ul>
                            <li>
                              <div style="display: inline-block;width: 20px;height: 20px;background:{{$product['color_code']}};border-radius: 2px;vertical-align: middle;"></div>
                              <h4>{{$product['color_name']}}</h4>
                            </li>
                            <li>                             
                              <h5><small>128</small> Size</h5>
                            </li>
                          </ul>                                                   
                          <!--<div class="seller">Seller XYZSeller</div>-->
                          <p>Delivered by {{$product['expected']}}</p>
                          <div class="shipping-text">Shipping cost - ${{$product['shipping_cost']}}</div>
                        </div>                     
                      </div>             
                    </td>
                    <td>
                      <div class="quantity">
                        Qty. {{$product['quantity']}}
                       
                      </div>
                    </td>
                    <td>
                      <h6>$ {{$product['special_price']}}</h6>
                      <span>${{$product['price']}}</span>
                    </td>
                  </tr> 
                 @endforeach
                </tbody>
             </table> 
            </div>                      
          </div>  
          <div class="row shipping-address">
            <div class="col-md-6 col-sm-6">
              <h3>Shipping Address</h3>
              <address>
                {{$address->name}}
               <br />  {{$address->suburb}} <br /> {{$address->city}} <br /> {{$address->state}},  {{$address->zip_code}}<br /> 
               
              </address>
            </div>
              
          </div>                       
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="subtotal-part">
            <h1>Order Total</h1>
            <ul>                         
              <li>                              
                <p>Product Total</p>
                <h3>$ {{$total}}</h3>
              </li>                                  
              <li>
                <p>Shipping</p>
                <h3>$ {{$cost}}</h3>
              </li>
              <li>                                                                                   
                <p>GST({{$commission.'%'}})</p>
                <h3>$ {{($total+$cost)*$commission/100}}</h3>
              </li>
              <li>
                <p>Final Payment</p>
                <h3>$ {{$total+$cost+(($total+$cost)*$commission/100)}}</h3>
              </li>
            </ul>            
            <div class="order-btn text-center">
              <input type="hidden" name="total_amount" value="{{$total+$cost+(($total+$cost)*$commission/100)}}">
              <button>PAY NOW</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
  <!-- Optional JavaScript; choose one of the two! -->
  <script src="{{ asset('public/frontAssets/js/jquery.prettydropdowns.js') }}"></script>
    <script>                                                                      
    $(document).ready(function() {      
      $('.pretty').prettyDropdown();
    }); 
    function changeAmount(quantity,price,id){
     var qty_price = quantity*price;
     var commission =  parseInt($("#commission").text());
     $("#special_price_"+id).text(qty_price);
      var total_item_value=0;
     $(".special_price_val").each(function() {
      total_item_value = total_item_value+parseInt($(this).text());
});
      $("#total").text(total_item_value);
      var grand_total =total_item_value+commission;
      $("#grand_total").text(grand_total);
    }                       
  </script> 
    @stop