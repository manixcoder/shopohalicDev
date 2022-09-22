@extends('merchant.master')
@section('pageTitle','Products Management')
@section('content')

<div class="dashboard-marchent">
    <div class="container">
      <h3>Dashboard 
        <span class="pull-right"><a href="#" class="addproduct-btn">ADD NEW PRODUCT</a></span>
      </h3>
      <div class="marchent-wapperbox">
      @include('merchant.includes.sidebar')
<div class="right-marchent-wapper">
          <div class="product-box">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#products_all" aria-controls="products_all" role="tab" data-toggle="tab">All</a></li>
              <li role="presentation"><a href="#mobile" aria-controls="mobile" role="tab" data-toggle="tab">Mobile</a></li>
              <li>
                <span>Fashion <i class="fa fa-angle-down" aria-hidden="true"></i></span>
                <ul class="tebhover-box">
                  <li role="presentation"><a href="#girl_Fashion" aria-controls="girl_Fashion" role="tab" data-toggle="tab">Girl Fashion</a></li>
                  <li role="presentation"><a href="#man_Fashion" aria-controls="man_Fashion" role="tab" data-toggle="tab">Man Fashion</a></li>
                </ul>
              </li>
              <li role="presentation"><a href="#grocery" aria-controls="grocery" role="tab" data-toggle="tab">Grocery</a></li>
              <li role="presentation"><a href="#beauty" aria-controls="beauty" role="tab" data-toggle="tab">Beauty</a></li>
              <li role="presentation"><a href="#toys" aria-controls="toys" role="tab" data-toggle="tab">Toys</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="products_all">
                <div class="products-tebcant">
                  <table id="example" class="display" cellspacing="0" width="100%">
                    <thead style="display: none;">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
             
                    <tbody>
                      <tr>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">i Phone 12 (128gb)</p>
                                <span class="orengetext">Apple</span>
                                <h4 class="count-heading">$ 300 <small>$350</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 9</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 150 <small>$155</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 8</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 180 <small>$195</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="images/arrival-img6.png" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Huawei 10</p>
                                <span class="orengetext">Huawei</span>
                                <h4 class="count-heading">$ 250 <small>$260</small></h4>
                              </span>
                            </h6>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">i Phone 12 (128gb)</p>
                                <span class="orengetext">Apple</span>
                                <h4 class="count-heading">$ 300 <small>$350</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 9</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 150 <small>$155</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 8</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 180 <small>$195</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="images/arrival-img6.png" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Huawei 10</p>
                                <span class="orengetext">Huawei</span>
                                <h4 class="count-heading">$ 250 <small>$260</small></h4>
                              </span>
                            </h6>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">i Phone 12 (128gb)</p>
                                <span class="orengetext">Apple</span>
                                <h4 class="count-heading">$ 300 <small>$350</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 9</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 150 <small>$155</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 8</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 180 <small>$195</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="images/arrival-img6.png" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Huawei 10</p>
                                <span class="orengetext">Huawei</span>
                                <h4 class="count-heading">$ 250 <small>$260</small></h4>
                              </span>
                            </h6>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">i Phone 12 (128gb)</p>
                                <span class="orengetext">Apple</span>
                                <h4 class="count-heading">$ 300 <small>$350</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 9</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 150 <small>$155</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 8</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 180 <small>$195</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="images/arrival-img6.png" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Huawei 10</p>
                                <span class="orengetext">Huawei</span>
                                <h4 class="count-heading">$ 250 <small>$260</small></h4>
                              </span>
                            </h6>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">i Phone 12 (128gb)</p>
                                <span class="orengetext">Apple</span>
                                <h4 class="count-heading">$ 300 <small>$350</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 9</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 150 <small>$155</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 8</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 180 <small>$195</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="images/arrival-img6.png" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Huawei 10</p>
                                <span class="orengetext">Huawei</span>
                                <h4 class="count-heading">$ 250 <small>$260</small></h4>
                              </span>
                            </h6>
                          </td>
                      </tr>
                  </tbody>
                </table>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="mobile">
                <div class="products-tebcant">
                  <table id="example" class="display" cellspacing="0" width="100%">
                    <thead style="display: none;">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
             
                    <tbody>
                      <tr>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">i Phone 12 (128gb)</p>
                                <span class="orengetext">Apple</span>
                                <h4 class="count-heading">$ 300 <small>$350</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 9</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 150 <small>$155</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 8</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 180 <small>$195</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="images/arrival-img6.png" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Huawei 10</p>
                                <span class="orengetext">Huawei</span>
                                <h4 class="count-heading">$ 250 <small>$260</small></h4>
                              </span>
                            </h6>
                          </td>
                      </tr>
                  </tbody>
                </table>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="girl_Fashion">
                <div class="products-tebcant">
                  <table id="example" class="display" cellspacing="0" width="100%">
                    <thead style="display: none;">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
             
                    <tbody>
                      <tr>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">i Phone 12 (128gb)</p>
                                <span class="orengetext">Apple</span>
                                <h4 class="count-heading">$ 300 <small>$350</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 9</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 150 <small>$155</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 8</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 180 <small>$195</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="images/arrival-img6.png" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Huawei 10</p>
                                <span class="orengetext">Huawei</span>
                                <h4 class="count-heading">$ 250 <small>$260</small></h4>
                              </span>
                            </h6>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">i Phone 12 (128gb)</p>
                                <span class="orengetext">Apple</span>
                                <h4 class="count-heading">$ 300 <small>$350</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 9</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 150 <small>$155</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 8</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 180 <small>$195</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="images/arrival-img6.png" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Huawei 10</p>
                                <span class="orengetext">Huawei</span>
                                <h4 class="count-heading">$ 250 <small>$260</small></h4>
                              </span>
                            </h6>
                          </td>
                      </tr>
                      
                  </tbody>
                </table>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="man_Fashion">
                <div class="products-tebcant">
                  <table id="example" class="display" cellspacing="0" width="100%">
                    <thead style="display: none;">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
             
                    <tbody>
                      <tr>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">i Phone 12 (128gb)</p>
                                <span class="orengetext">Apple</span>
                                <h4 class="count-heading">$ 300 <small>$350</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 9</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 150 <small>$155</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 8</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 180 <small>$195</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="images/arrival-img6.png" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Huawei 10</p>
                                <span class="orengetext">Huawei</span>
                                <h4 class="count-heading">$ 250 <small>$260</small></h4>
                              </span>
                            </h6>
                          </td>
                      </tr>
                  </tbody>
                </table>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="grocery">
                <div class="products-tebcant">
                  <table id="example" class="display" cellspacing="0" width="100%">
                    <thead style="display: none;">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
             
                    <tbody>
                      <tr>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">i Phone 12 (128gb)</p>
                                <span class="orengetext">Apple</span>
                                <h4 class="count-heading">$ 300 <small>$350</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 9</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 150 <small>$155</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 8</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 180 <small>$195</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="images/arrival-img6.png" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Huawei 10</p>
                                <span class="orengetext">Huawei</span>
                                <h4 class="count-heading">$ 250 <small>$260</small></h4>
                              </span>
                            </h6>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">i Phone 12 (128gb)</p>
                                <span class="orengetext">Apple</span>
                                <h4 class="count-heading">$ 300 <small>$350</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 9</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 150 <small>$155</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 8</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 180 <small>$195</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="images/arrival-img6.png" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Huawei 10</p>
                                <span class="orengetext">Huawei</span>
                                <h4 class="count-heading">$ 250 <small>$260</small></h4>
                              </span>
                            </h6>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">i Phone 12 (128gb)</p>
                                <span class="orengetext">Apple</span>
                                <h4 class="count-heading">$ 300 <small>$350</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 9</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 150 <small>$155</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 8</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 180 <small>$195</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="images/arrival-img6.png" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Huawei 10</p>
                                <span class="orengetext">Huawei</span>
                                <h4 class="count-heading">$ 250 <small>$260</small></h4>
                              </span>
                            </h6>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">i Phone 12 (128gb)</p>
                                <span class="orengetext">Apple</span>
                                <h4 class="count-heading">$ 300 <small>$350</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 9</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 150 <small>$155</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 8</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 180 <small>$195</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="images/arrival-img6.png" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Huawei 10</p>
                                <span class="orengetext">Huawei</span>
                                <h4 class="count-heading">$ 250 <small>$260</small></h4>
                              </span>
                            </h6>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">i Phone 12 (128gb)</p>
                                <span class="orengetext">Apple</span>
                                <h4 class="count-heading">$ 300 <small>$350</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 9</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 150 <small>$155</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 8</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 180 <small>$195</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="images/arrival-img6.png" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Huawei 10</p>
                                <span class="orengetext">Huawei</span>
                                <h4 class="count-heading">$ 250 <small>$260</small></h4>
                              </span>
                            </h6>
                          </td>
                      </tr>
                  </tbody>
                </table>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="beauty">
                <div class="products-tebcant">
                  <table id="example" class="display" cellspacing="0" width="100%">
                    <thead style="display: none;">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
             
                    <tbody>
                      <tr>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">i Phone 12 (128gb)</p>
                                <span class="orengetext">Apple</span>
                                <h4 class="count-heading">$ 300 <small>$350</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 9</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 150 <small>$155</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 8</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 180 <small>$195</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="images/arrival-img6.png" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Huawei 10</p>
                                <span class="orengetext">Huawei</span>
                                <h4 class="count-heading">$ 250 <small>$260</small></h4>
                              </span>
                            </h6>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">i Phone 12 (128gb)</p>
                                <span class="orengetext">Apple</span>
                                <h4 class="count-heading">$ 300 <small>$350</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 9</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 150 <small>$155</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 8</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 180 <small>$195</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="images/arrival-img6.png" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Huawei 10</p>
                                <span class="orengetext">Huawei</span>
                                <h4 class="count-heading">$ 250 <small>$260</small></h4>
                              </span>
                            </h6>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">i Phone 12 (128gb)</p>
                                <span class="orengetext">Apple</span>
                                <h4 class="count-heading">$ 300 <small>$350</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 9</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 150 <small>$155</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 8</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 180 <small>$195</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="images/arrival-img6.png" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Huawei 10</p>
                                <span class="orengetext">Huawei</span>
                                <h4 class="count-heading">$ 250 <small>$260</small></h4>
                              </span>
                            </h6>
                          </td>
                      </tr>
                  </tbody>
                </table>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="toys">
                <div class="products-tebcant">
                  <table id="example" class="display" cellspacing="0" width="100%">
                    <thead style="display: none;">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
             
                    <tbody>
                      <tr>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">i Phone 12 (128gb)</p>
                                <span class="orengetext">Apple</span>
                                <h4 class="count-heading">$ 300 <small>$350</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 9</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 150 <small>$155</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 8</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 180 <small>$195</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="images/arrival-img6.png" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Huawei 10</p>
                                <span class="orengetext">Huawei</span>
                                <h4 class="count-heading">$ 250 <small>$260</small></h4>
                              </span>
                            </h6>
                          </td>
                      </tr>
                      <tr>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">i Phone 12 (128gb)</p>
                                <span class="orengetext">Apple</span>
                                <h4 class="count-heading">$ 300 <small>$350</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 9</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 150 <small>$155</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="{{ asset('public/merchantassets/images/arrival-img1.png') }}" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Real me 8</p>
                                <span class="orengetext">Realme</span>
                                <h4 class="count-heading">$ 180 <small>$195</small></h4>
                              </span>
                            </h6>
                          </td>
                          <td>
                            <h6 class="product-editbox">
                              <span class="product-edit-img">
                                <img src="images/arrival-img6.png" alt="img">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </span>  
                              <span class="product-detailcont">
                                <p class="product-mobilename">Huawei 10</p>
                                <span class="orengetext">Huawei</span>
                                <h4 class="count-heading">$ 250 <small>$260</small></h4>
                              </span>
                            </h6>
                          </td>
                      </tr>
                      
                  </tbody>
                </table>
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