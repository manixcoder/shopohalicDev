<style>

.preview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }

.preview-pic {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.preview-thumbnail.nav-tabs {
  border: none;
  margin-top: 15px; display:grid; }
  .preview-thumbnail.nav-tabs li {
    width: 100%;
}
    .preview-thumbnail.nav-tabs li img {
      max-width: 100%;
      display: block; }
    .preview-thumbnail.nav-tabs li a {
      padding: 0;
      margin: 0; }
    .preview-thumbnail.nav-tabs li:last-of-type {
      margin-right: 0; }

.tab-content {
  overflow: hidden; }
.tab-content img {
  width: auto;
  height:400px;
  -webkit-animation-name: opacity;
          animation-name: opacity;
  -webkit-animation-duration: .3s;
          animation-duration: .3s; }



@-webkit-keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

@keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

</style>
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
<p class="alert alert-danger" id="alertMessage">{{ Session::get('message') }}</p>
@endif                                                                                                          <form method="POST" action="{{ url('/product-detail/'.$products->id) }}" enctype="multipart/form-data">                                                        
  <div class="single-product">
    <div class="container">                
      <div class="row">                                
        <div class="col-md-6 col-sm-6">

        <div class="preview">
          <div class="row">
          <div class="col-sm-2">
            <ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{{url('/public/uploads/products')}}/{{$products->image}}" /></a></li>
              @foreach($product_image as $key=>$image)
						  <li><a data-target="#pic-{{$key+2}}" data-toggle="tab"><img src="{{url('/public/uploads/product_image/'.$products->product_name)}}/{{$image->product_image}}" /></a></li>
						 @endforeach
						</ul>
            </div>
            <div class="col-sm-10">
            <div class="preview-pic tab-content text-center">
						  <div class="tab-pane active" id="pic-1"><img src="{{url('/public/uploads/products')}}/{{$products->image}}" /></div>
              @foreach($product_image as $key=>$image)
						  <div class="tab-pane" id="pic-{{$key+2}}"><img src="{{url('/public/uploads/product_image/'.$products->product_name)}}/{{$image->product_image}}" /></div>
              @endforeach 
						  
						</div>
            </div>
            
          </div>
						
						
						
						
					</div>
          <!-- <ul class="pgwSlider">

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
                <img src="{{url('/public/uploads/product_image/'.$products->product_name)}}/{{$image->product_image}}" height="60" width="60">
              </div>
            </li>   
            @endforeach                
           
            
          </ul> -->
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="product-detail">
            <h1>{{$products->product_name}}</h1>
            <p>Product ID:  {{$products->product_code}}</p>                                
            <h6>by<span> {{$products->category}}</span></h6>
                                                                                                                                 
            <div class="product-price">
              <ul>                                                                               @if($products->special_price==Null || $products->special_price==0)
                        <li>                                   
                  <h3>Normal Price</h3>
                  <h2>${{$products->price}}</h2>
                  <p>Tax Included | Free Shipping</p>
                </li>
                @else
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
                  <h5>${{$products->price-$products->special_price}} </h5>
                   </li>
                        @endif                                           
                   <li>
                  <h3>Stock</h3>                                          
                  <h5>@if($leftItem>0) Only {{$leftItem}} units left @else Out of Stock @endif</h5>
                   </li>                                                                                                                    
                  
               
              </ul>
            </div>  
              @if($shippings->count()>0)
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
                  <td><input type="radio" name="shipping" value="{{$shipping->id.','.$shipping->location}}" required></td>
                  <td>{{$shipping->location}}</td>
                  <td>{{$shipping->cost}}</td>
                   <td>{{$shipping->expected}}</td>
                </tr> 
               @endforeach
              
              </tbody>
             </table> 
          </div>
         
        </div>      
          @endif                    
            <div class="cart-btn">
           
            {{ csrf_field() }}
            @if($leftItem>0)
              <button>ADD TO CART</button>
              @endif

              <!-- <button class="buy-btn">BUY NOW</button> -->
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
        
      </div>
    </div>
  </div>
  </form>  
   <div class="arrival-sec featured-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h3 class="heading"><span>similar products</span></h3>
                     @foreach($alls as $all)
                      @php

                 $date1 = date("Y-m-d").''.'23:59:59';
                 $date1=strtotime($date1);

                  if($all->stock_type=='date_range' && strtotime($all->end_date.''.'23:59:59')<$date1)
                  {
                     continue;  
                  }
                  @endphp
                <div class="col-md-3 col-sm-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <a href="{{URL::to('product-detail')}}/{{$all->id}}" class="arrival-content">
                        <figure>
                            <img src="{{url('/public/uploads/products')}}/{{$all->image}}" alt="i-phone-12" width="200" height="200">
                        </figure>
                        <h4>{{$all->product_name}}</h4>
                         @if($all->special_price==Null || $all->special_price==0)
                        <h5>${{$all->price}}</h5>
                        @else
                        <h5>$ {{$all->special_price}} <span><strike>${{$all->price}}</strike></span></h5>
                        @endif
                    </a>
                </div>
                @endforeach
                </div>
               
            </div>
        </div>
    </div>
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
    

    @stop