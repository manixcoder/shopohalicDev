@extends('merchant.master')
@section('pageTitle','Product Management')
@section('content')
@section('pageCss')
<style></style>
@stop
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
                <form class="edit-form" method="POST" action="{{ url('/merchant/products-management/save') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label">Product Title</label>
                                    <input type="text" class="form-control form-control-danger " id="product_name" name="product_name" placeholder="Product Title"  />
                                  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Product Code </label>
                                    <input type="text" class="form-control form-control-danger " id="product_code" name="product_code" placeholder="Product Code"  />
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                            <label class="control-label">Brand</label>
                            <select class="form-control text-color" name="brand">
                                <option value="">Select Brand</option>
                                <option value="Sansung">Sansung</option>
                                <option value="Nokia">Nokia</option>
                                <option value="One Plus">One Plus</option>
                            </select>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Category</label>
                                    <select class="form-control text-color" name="category">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="Red">Red</option>
                                   @endforeach
                            </select>
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="control-label">Total Quantity</label>
                                    <input type="text" class="form-control  form-control-danger" id="quantity" name="quantity" placeholder="Quantity (In Number)" />
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                            <label class="control-label">Color</label>
                            <select class="form-control text-color" name="color">
                                <option value="N/A">Select Color</option>
                                <option value="Red">Red</option>
                                <option value="Green">Green</option>
                                <option value="Green">Black</option>
                            </select>
                        </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                            <label class="control-label">Size</label>
                            <select class="form-control text-color" name="size">
                                <option value="N/A">Select Size</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group  ">
                                    <label class="control-label">Photo</label>
                                    <input type="file" class="form-control  form-control-danger" id="image" name="image"  />
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group  ">
                                    <label class="control-label">Other Photos</label>
                                    <input type="file" class="form-control form-control-danger" multiple id="photo_image" name="photo_image[]" />
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group  ">
                                    <label class="control-label">Normal Price</label>
                                    <input type="text" class="form-control form-control-danger" id="price" name="price" placeholder="Normal Price" />
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Special Price</label>
                                    <input type="text" class="form-control form-control-danger" id="special_price" name="special_price" placeholder="special price"  />
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Date Range</label>
                                    <input type="text" class="form-control form-control-danger" id="" name="" placeholder=""  />
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Shipping</label>
                                    <input type="text" class="form-control form-control-danger" id="" name="" placeholder=""  />
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-info waves-effect waves-light  cus-submit save-btn"><i class="fa fa-save" aria-hidden="true"></i> Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@stop