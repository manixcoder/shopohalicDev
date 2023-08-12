@extends('users.master')
@section('pageTitle','index')
@section('content')
<link href="{{ asset('public/frontAssets/css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontAssets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontAssets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontAssets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="icon" href="./images/favicon.png" type="skype-img"/>
 <div class="breadcrumb-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <ul>
            <li><a href="index.html">Home</a></li>
            <li>></li>
            <li class="active"><a href="#">Mobiles</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="accessories-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <h1>Mobile & Accessories</h1>
        </div>
        <div class="col-md-3 col-sm-3">
          <div class="filter-part">
            <h3>Filter & Sorting</h3>
            <div class="number-type">
              <label>Sort by</label>
              <select class="form-control" onchange="sortRange(this.value)">
                <option value="">--select--</option>
                <option value="100">100</option>
                <option value="200">200</option>
                <option value="300">300</option>
                <option value="400">400</option>
                <option value="500">500</option>
                <option value="1500">1000</option>
                <option value="1500">1500</option>
                <option value="2000">2000</option>
              </select>
            </div>

            <hr>

            <div class="range-slider">
              <h4>Price Range</h4>
              <div class="top-row">
                <div class="col-sm-12">
                  <div id="slider-range"></div>
                </div>
              </div>
              <div class="row slider-labels">
                <div class="col-xs-6 caption">
                  <strong></strong> <span id="slider-range-value1"></span>
                </div>
                <div class="col-xs-6 text-right caption">
                  <strong></strong> <span id="slider-range-value2"></span>
                </div>
              </div>
            </div>

            <hr>  

            <div class="multiselect-box">                        
              <h4>Brand</h4>
              <select class="js-select2" multiple="multiple">
                <option value="O1" data-badge="">Apple</option>
                <option value="O2" data-badge="">Samsung</option>
                <option value="O3" data-badge="">Xiaomi</option>
                <option value="O4" data-badge="">Huawei</option>
                <option value="O5" data-badge="">Lenovo</option>
                <option value="O6" data-badge="">OnePlus</option>
                <option value="O7" data-badge="">LG</option>
                <option value="O1" data-badge="">Apple</option>
                <option value="O2" data-badge="">Samsung</option>
                <option value="O3" data-badge="">Xiaomi</option>
                <option value="O4" data-badge="">Huawei</option>
                <option value="O5" data-badge="">Lenovo</option>
                <option value="O6" data-badge="">OnePlus</option>
                <option value="O7" data-badge="">LG</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-sm-9">
          <div class="row" id="productDisplay">
            <div class="col-md-12 col-sm-12 text-center">
              <a href="#" class="more-btn">LOAD MORE<i class="fa fa-angle-double-down"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('public/frontAssets/js/jequery-main3.5.js') }}"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="{{ asset('public/frontAssets/js/aos.js') }}"></script>
  <script src="{{ asset('public/frontAssets/js/range-slider.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
                                                                                                                                       
    <script>
      $(window).bind("load", function () {
         if (document.readyState === "complete") {
             // aos init
             AOS.init({
               once: false,
               duration: 1000,
           });
         }
      })
    </script>

    <script>
      $(".js-select2").select2({
        closeOnSelect : false,
        placeholder : "Type to search",
        allowHtml: true,
        allowClear: true,
        tags: true // создает новые опции на лету
      });

      function iformat(icon, badge,) {
        var originalOption = icon.element;
        var originalOptionBadge = $(originalOption).data('badge');
       
        return $('<span><i class="fa ' + $(originalOption).data('icon') + '"></i> ' + icon.text + '<span class="badge">' + originalOptionBadge + '</span></span>');
      }

function sortRange(value){
$.ajax({
                url: "{{url('searchItem')}}",
                method: "GET",
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    "value1":0,"value2": value
                },
                dataType: 'html',
                success: function(response) {
                   if(response)
                   {
                    $('#productDisplay').html(response);
                   }
                }
            });
}
    </script>
    @stop