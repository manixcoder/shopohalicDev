@extends('merchant.master')
@section('pageTitle','Product Management')
@section('content')
@section('pageCss')

@stop
<style>
    .errors{display:none;}
    </style>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-body">
                @if(Session::has('status'))
                <div class="alert alert-{{ Session::get('status') }}">
                    <i class="ti-user"></i> {{ Session::get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                @endif
                <form class="edit-form" method="POST" action="{{ route('account.update',$user_id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label">Current Password</label>
                                    <input type="text" class="form-control form-control-danger " id="oldpassword" name="oldpassword" placeholder="Current Password"  />
                                    <span class="errors eoldpassword" style="margin-left: 5px;">Old Password is required</span>

                                  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">New Password</label>
                                    <input type="text" class="form-control form-control-danger " id="newpassword" name="newpassword" placeholder="New Password"  />
                                    <span class="errors enewpassword" style="margin-left: 5px;">New Password is required</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label">Confirm New Password</label>
                                    <input type="text" class="form-control  form-control-danger" id="cpassword" name="cpassword" placeholder="Confirm Password" />
                                    <span class="errors ecpassword" style="margin-left: 5px;">Confirm Password is required</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-info waves-effect waves-light  cus-submit save-btn" onclick="return Validate()"><i class="fa fa-save" aria-hidden="true"></i> Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script>
   function Validate() {
        var oldpassword = $('#oldpassword').val();
        var newpassword = $('#newpassword').val();
        var cpassword = $('#cpassword').val();
        var error = '';
       
        if (oldpassword == "") {
            $(".eoldpassword").addClass('error_show').removeClass('errors');
             error +='false';
        }else{
          $(".eoldpassword").addClass('errors').removeClass('error_show');
        }
        if (newpassword == "") {
            $(".enewpassword").addClass('error_show').removeClass('errors');
             error +='false';
        }else{
          $(".enewpassword").addClass('errors').removeClass('error_show');
        }
        if (cpassword == "") {
            $(".ecpassword").addClass('error_show').removeClass('errors');
             error +='false';
        }else if(newpassword != cpassword) {
            $(".ecpassword").addClass('error_show').removeClass('errors').html('Confirm password not match from password');
             error +='false';
        }else{
          $(".ecpassword").addClass('errors').removeClass('error_show');
        }
        
        
        if (error) {
          return false;
        }else{
          return true;
        }
       
 }
</script>
@stop