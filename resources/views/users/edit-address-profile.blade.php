@extends('users.master')
@section('pageTitle','index')
@section('content')
@include('users.includes.sidebar-front')

  <div class="add-new-shipping-heading">
     <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <h1 class="main-heading">Shipping</h1>
        </div>   
          <form method="POST" action="http://localhost/shopohalicDev/users/edit-shiiping-address" enctype="multipart/form-data">
       {{ csrf_field() }}                              
        <div class="col-md-12 col-sm-12">
          <div class="shipping-form">
            <div class="ship-switch">
              <ul>                                                
                <li>                                                                                                                     
                  Ship It                                        
                  <input type="radio" checked="checked" name="address_type" onclick="changeAddress('shipit')" value="ship_it">
                  <span class="checkmark" ></span>
                </li>                                                             
                <li>                                                                                             
                  Pick Up
                  <input type="radio" name="address_type" onclick="changeAddress('pickup')" value="pick_up">
                  <span class="checkmark"></span>
                </li>                                   
              </ul>                                                                                               
            </div>                            
                                                                                                                               
              <div class="row">
                
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <div class="input">
                      <input type="text" name="address" id="address" class="form-control" value="{{$data->address??''}}" required/>
                      <label for="address">Address</label>
                    </div>
                  </div> 
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <div class="input">
                      <input type="text" name="suburb" id="superb" class="form-control" value="{{$data->superb??''}}" required/>
                      <label for="suburb">Suburb</label>
                    </div>
                  </div> 
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <div class="input">
                      <input type="text" name="city" id="city" class="form-control" value="{{$data->city??''}}" required/>
                      <label for="city">City</label>
                    </div>
                  </div> 
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <div class="input">
                      <input type="number" name="zip_code" id="zip_code" value="{{$data->pin??''}}" class="form-control" minlength="6" maxlength="6" required/>
                      <label for="post">Post Code</label>
                    </div>
                  </div> 
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <div class="input">
                      <input type="text" name="state" id="state" class="form-control" value="{{$data->city??''}}" required/>
                      <label for="city">State</label>
                    </div>
                  </div> 
                </div>
                
                <div class="col-md-12 col-sm-12 submit-btn text-center">
                  <button type="submit" class="btn btn-default">Update</button>
                </div>
              </div>           
          </div>
        </div>
      </form>
      </div>
    </div>
    </div>
  </div>                          

  <div class="login-page sign-up-page add-new-shipping-address">
   
  </div> 
  <script>
function changeAddress(type){
  $.ajax({
            url: "{{url('users/get-shipping-address')}}",
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
              $('#address').val(response.address);
              $('#superb').val(response.superb);
              $('#city').val(response.city);
              $('#state').val(response.state);
              $('#zip_code').val(response.pin);
              //$('#country').val(response.country);
            }
        });
}
  

            
</script>
    @stop