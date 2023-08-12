@extends('users.master')
@section('pageTitle','index')
@section('content')
<script src="{{ asset('public/frontAssets/js/js-image-zoom.js') }}"></script>
<div class="breadcrumb-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <ul>
            <li><a href="">Home</a></li>
            <li>></li>
            <li><a href="search?item={{$products->category_name}}">{{$products->category_name}}</a></li>
            @if($sub_category_name!="")
            <li>></li>
            <li><span>{{$sub_category_name}}</span></li>
            @endif
          </ul>
        </div>                                                                              
      </div>                    
    </div>                                                                           
  </div>                                                                                                         @if(Session::has('message'))
<p class="alert alert-info" id="alertMessage">{{ Session::get('message') }}</p>
@endif                                                                                                          <form method="POST" action="{{ url('/product-detail/'.$products->id) }}" enctype="multipart/form-data">                                                        
  <div class="single-product">
    <div class="container">                
      <div class="row">                                
        <div class="col-md-6 col-sm-6">
          <ul class="pgwSlider">

            <li>
              <div class="thumbnail-box">
                <div>
                <img src="{{url('/public/uploads/products')}}/{{$products->image}}" height="60" width="60">
              </div>
              </div>              
            </li>
            @foreach($product_image as $image)
            <li>
              <div class="thumbnail-box">
                <img src="{{url('/public/uploads/product_image')}}/{{$image->product_image}}" height="60" width="60">
              </div>
            </li>   
            @endforeach                
           
            
          </ul>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="product-detail">
            <h1>{{$products->product_name}} ({{$products->color}}, {{$products->size}})</h1>
            <p>Product ID:  {{$products->product_code}}</p>                                
            <h6>by<span> {{$products->category}}</span></h6>
            <div class="product-phone-color product-switch">
              <div class="row">
                <div class="col-md-3 col-sm-3">
                  <h3>Color</h3>
                </div>
                <div class="col-md-9 col-sm-9">
                  <ul>    
                    @foreach($colors as $color)   
                    <li>
                      <div class="control-checkbox">
                        <input type="radio" required name="color" value="{{$color['id']}}">
                       <h1 style="background-color:{{$color['color_code']}};width:30px;height: 20px;"></h1>
                        <div class="control-indicator"></div>
                      </div>  
                    </li>
                    @endforeach 
                  </ul>
                </div>
              </div>
            </div>
            <div class="product-size product-switch">
              <div class="row">
                <div class="col-md-3 col-sm-3">
                  <h3>Size</h3>
                </div>
                <div class="col-md-9 col-sm-9">
                  <ul>
                    
                    @foreach($sizes as  $size)
                    <li>
                      <div class="control-checkbox">
                        <input type="radio" required name="size" value="{{$size->id}}">
                        <span>{{$size->size_name}}</span>
                        <div class="control-indicator"></div>
                      </div>  
                    </li>
                    @endforeach
                  
                  </ul>
                </div>
              </div>
            </div>                                                                                                                        
            <div class="product-price">
              <ul>                                                               
                <li>                                                                                                                 
                  <h3>Normal Price</h3>
                  <h4>${{$products->price}}</h4>
                </li>                                                                                                                       
                <li>                                             
                  <h3>Special Price</h3>
                  <h2>${{$products->special_price}}</h2>
                </li>                                 
                <li>                                                                                                                       
                  <h3>Save</h3>                                          
                  <h5>${{$products->price-$products->special_price}} <span>5% off</span></h5>
                </li>
              </ul>
            </div>                            
            <div class="cart-btn">
           
            {{ csrf_field() }}
              <button>ADD TO CART</button>

              <button class="buy-btn">BUY NOW</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
      
  <div class="product-description">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <h3>Product Description</h3>
         {{$products->description}}
        </div>                                                                                                          
        <div class="col-md-12 col-sm-12 product-shipping">
          <h3>Shipping</h3>
          <div class="table-responsive">
            <table class="table">
                <thead> 
                  <tr>                                                                    
                   <th></th> <th>Location</th><th>Cost</th><th>Delivery Day</th> 
                  </tr> 
                </thead> 
              <tbody> 
                @foreach($shippings as $shipping)
                <tr>
                  <td><input type="radio" name="shipping" value="{{$shipping->id}}" required></td>
                  <td>{{$shipping->location}}</td>
                  <td>{{$shipping->cost}}</td>
                   <td>{{$shipping->expected}}</td>
                </tr> 
               @endforeach
              </tbody>
             </table> 
          </div>
        </div>
      </div>
    </div>
  </div>
  </form>  
  <!-- Optional JavaScript; choose one of the two! -->
  <script src="{{ asset('public/frontAssets/js/pgwslider.min.js') }}"></script>
    <script>
      $(document).ready(function() {
          $('.pgwSlider').pgwSlider();
      });

      setTimeout(function() {
    $('#alertMessage').fadeOut('show');
}, 2000); // <-- time in milliseconds
    </script>
    <script>
var options1 = {
    width: 400,
    zoomWidth: 500,
    offset: {vertical: 0, horizontal: 10}
};

// If the width and height of the image are not known or to adjust the image to the container of it
var options2 = {
    fillContainer: true,
    offset: {vertical: 0, horizontal: 10}
};
new ImageZoom(document.getElementById("img-container"), options2);

</script>

    @stop