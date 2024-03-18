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
.error{color: red}
</style>
<div class="dashboard-marchent">
    <div class="container">
      <h3>Account 
       
      </h3>
      <div class="marchent-wapperbox">
      @include('merchant.includes.sidebar')
<div class="right-marchent-wapper">
     @if(Session::has('fail'))
          <div class="alert alert-danger">
              {{ Session::get('fail') }}
          </div>
  @endif
  @if(Session::has('success'))
          <div class="alert alert-success">
              {{ Session::get('success') }}
          </div>
  @endif
          <div class="product-box">
            <form class="change-form" id="change-form" method="POST" action="{{ route('account.update',$user_id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label">Current Password</label>
                                    <input type="text" class="form-control form-control-danger " id="oldpassword" name="oldpassword" required placeholder="Current Password"  />
                                   

                                  
                                </div>
                            </div>
                             </div>
                               <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">New Password</label>
                                    <input type="text" class="form-control form-control-danger " id="newpassword" name="newpassword" required placeholder="New Password"  />
                                  
                                </div>
                            </div>
                            </div>
                             <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label">Confirm New Password</label>
                                    <input type="text" class="form-control  form-control-danger" id="cpassword" name="cpassword" required placeholder="Confirm Password" />
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-info waves-effect waves-light  cus-submit save-btn btn-lg"><i class="fa fa-save" aria-hidden="true"></i> Create</button>
                    </div>
                </form>
           
              </div>
            </div>
          </div>
        </div>
        </div>
    </div>
  </div>
  @section('pagejs')

 
        @stop
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>  
<script>  
$(document).ready (function () {  
    $.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "Please check your input."
);
  $("#change-form").validate ({
    rules: {
             oldpassword: 'required',
                newpassword: {regex: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/ },                
                cpassword: {
                    required: true,
                    equalTo : "#newpassword",
                },
            },
            messages: {
                oldpassword: 'Current Password is required',
               // newpassword: 'New Password is required',
                cpassword: {
                    required : 'Confirm Password is required',
                    equalTo : 'Password not matching',
                }
            },
  });  
});  
</script>  
        @stop


