@extends('users.master')
@section('pageTitle','index')
@section('content')

 <link href="{{ asset('public/frontAssets/css/prettydropdowns.css') }}" rel="stylesheet">
<div class="breadcrumb-sec">
    <div class="container">
      <!-- <div class="row">
        <div class="col-md-12 col-sm-12">
          <ul>
            <li><a href="index.html">Home</a></li>
            <li>></li>
            <li><a href="#">Cart</a></li>
            <li>></li>
            <li><a href="#">Shipping Address</a></li>
          </ul>
        </div>                                                                              
      </div> -->                    
    </div>                                                                           
  </div>                                                                                                                                                                                                 <form method="POST" action="{{ url('/shipping-address/') }}" enctype="multipart/form-data">
            {{ csrf_field() }}                                                                  
  <div class="shipping-page">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <h1 class="main-heading">Shipping</h1>
        </div>                               
        <div class="col-md-12 col-sm-12">
          <div class="shipping-form">
            <div class="ship-switch">
              <ul>                                                
                <li>                                                                                                                     
                  Ship It                                        
                  <input type="radio"  name="address_type" onclick="changeAddress('ship_it')" value="ship_it">
                  <span class="checkmark" ></span>
                </li>                                                             
                <li>                                                                                             
                  Pick Up
                  <input type="radio" name="address_type" value="pick_up" onclick="changeAddress('pick_up')">
                  <span class="checkmark"></span>
                </li>                                   
              </ul>                                                                                               
            </div>                            
                                                                                                                               
              <div class="row">                      
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">                                            
                    <select class="form-control pretty" name="address" id="address">
                      <option value="">Select Address</option>
                    </select>                      
                  </div>                                                                                                                                                                                                           
                </div>
                <div class="col-md-12 col-sm-12">
                  <h6>Or Add New</h6>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <div class="input">
                      <input type="text" name="fname" id='fname' class="form-control" required />
                      <label for="fname">First Name</label>
                    </div>
                  </div> 
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <div class="input">
                      <input type="text" name="lname" id="lname" class="form-control" required />
                      <label for="lname">Last Name</label>
                    </div>
                  </div> 
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <div class="input">
                      <input type="text" name="other_address" id="other_address" class="form-control" required />
                      <label for="address">Address</label>
                    </div>
                  </div> 
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <div class="input">
                      <input type="text" name="suburb" id="suburb" class="form-control" required />
                      <label for="suburb">Suburb</label>
                    </div>
                  </div> 
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <div class="input">
                      <input type="text" name="city" id="city" class="form-control" required />
                      <label for="city">City</label>
                    </div>
                  </div> 
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <div class="input">
                      <input type="number" name="zip_code" id="zip_code" class="form-control" required />
                      <label for="post">Post Code</label>
                    </div>
                  </div> 
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <input type="text" name="state" class="form-control" id="state" placeholder="State" required>
                  </div>                       
                </div>
                                                    
                <div class="col-md-12 col-sm-12 signup-conditions">
                  <p><input type="checkbox">Save for future</p>
                </div>     
                
                <div class="col-md-12 col-sm-12 submit-btn text-center">
                  <button type="submit" class="btn btn-default">NEXT</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
  <!-- Optional JavaScript; choose one of the two! -->
  <script type="text/javascript">
    function changeAddress(type){

      $("#fname,#lname,#other_address,#suburb,#city,#state,#zip_code").attr("disabled", true);
      $.ajax({
            url: "{{url('get-shipping-address')}}",
            method: "GET",
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {                
                "type": type,
            },
            dataType: 'json',
            success: function(response) {
              
              var data=response.address+', '+response.superb+', '+response.city+', '+response.state+', '+response.pin;
              var html='<option value="'+data+'">'+data+'</option>';
              $('#address').html(html);
            }
        });

    }
  </script>
    @stop