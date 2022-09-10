@extends('admin.master')
@section('pageTitle','Uses Management')
@section('content')
<style>
    .form-control {
        display: block;
        width: 25% !important;
        height: 34px;
    }
</style>

<div class="Merchants-sec merchantspg add-new">
    <div class="category">
        <div class="container">
            <div class="row">
                <div class="col-md-8 add-new-category ">
                    <h3>Edit Order Tracking</h3>
                </div>
                <div class="col-md-4 socical-img text-right">
                    <img src="{{ asset('public/adminAssets/images/images/reject.svg')}}" alt="reject" width="20px">
                </div>
              
            </div>
            <div class="row">
                <form method="POST" action="{{ url('admin/order-settings/'.$orderSettingData->id.'/update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="order_setting_id" value="{{$orderSettingData->id}}">
                    <div class="col-md-12 add-form ">
                        <div class="form-group">
                            <input type="text" name="order_tracking" required class="form-control text-color" value="{{$orderSettingData->order_tracking}}" id="emaillogin" aria-describedby="emailHelp" placeholder="Order Tracking">
                        </div>
                    </div>
                    <div class="col-md-12 btn-sec">
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary bg-color">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@section('pagejs')

@stop