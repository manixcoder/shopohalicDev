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
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#products_all" aria-controls="products_all" role="tab" data-toggle="tab">All</a></li>
              @foreach($categories as $category)
              @if($category['parent_id']=='N/A' && $category['child']=='0')
              <li role="presentation"><a href="#{{$category['category_name']}}" aria-controls="{{$category['category_name']}}" role="tab" data-toggle="tab">{{$category['category_name']}}</a></li>
              @elseif($category['parent_id']=='N/A' && $category['child']=='1')
              <li>
                <span>{{$category['category_name']}} <i class="fa fa-angle-down" aria-hidden="true"></i></span>
                <ul class="tebhover-box">
                @foreach($categories as $category_menu)         
                @if($category['id']==$category_menu['parent_id'])
                  <li role="presentation"><a href="#{{$category_menu['category_name']}}" aria-controls="{{$category_menu['category_name']}}" role="tab" data-toggle="tab">{{$category_menu['category_name']}}</a></li>
                 @endif
                  @endforeach
                </ul>
              </li>
              @endif
              @endforeach
             
              <!-- <li>
                <span>Fashion <i class="fa fa-angle-down" aria-hidden="true"></i></span>
                <ul class="tebhover-box">
                  <li role="presentation"><a href="#girl_Fashion" aria-controls="girl_Fashion" role="tab" data-toggle="tab">Girl Fashion</a></li>
                  <li role="presentation"><a href="#man_Fashion" aria-controls="man_Fashion" role="tab" data-toggle="tab">Man Fashion</a></li>
                </ul>
              </li>
              <li role="presentation"><a href="#grocery" aria-controls="grocery" role="tab" data-toggle="tab">Grocery</a></li>
              <li role="presentation"><a href="#beauty" aria-controls="beauty" role="tab" data-toggle="tab">Beauty</a></li>
              <li role="presentation"><a href="#toys" aria-controls="toys" role="tab" data-toggle="tab">Toys</a></li> -->
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="products_all">
              @foreach($alls as $all) 
                <div class="card">
                
  <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <a href="{{ url('/merchant/products-management/'.$all->id.'/edit') }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">{{$all->product_name}}</p>
                                <span class="orengetext">{{$all->brnad}}</span>
                                <h4 class="count-heading">$ {{$all->special_price}} <small>${{$all->price}}</small></h4>
                              </span>
                            </h6>
                </div>
                @endforeach
              </div>
              <div role="tabpanel" class="tab-pane" id="mobiles">
              @foreach($alls as $all) 
                <div class="card">
                
  <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <a href="{{ url('/merchant/products-management/'.$all->id.'/edit') }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">{{$all->product_name}}</p>
                                <span class="orengetext">{{$all->brnad}}</span>
                                <h4 class="count-heading">$ {{$all->special_price}} <small>${{$all->price}}</small></h4>
                              </span>
                            </h6>
                </div>
                @endforeach
               
              </div>
              <div role="tabpanel" class="tab-pane" id="girl_Fashion">
                
              </div>
              <div role="tabpanel" class="tab-pane" id="man_Fashion">
                
              </div>
              <div role="tabpanel" class="tab-pane" id="grocery">
                
              </div>
              <div role="tabpanel" class="tab-pane" id="beauty">
               
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="toys">
                
                </div>
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