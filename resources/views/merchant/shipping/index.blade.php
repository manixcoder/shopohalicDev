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
                <form class="edit-form" method="POST" action="{{ url('/merchant/shipping-management/save') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        @if(count($shippings)==0)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Location</label>
                                    <input type="text" class="form-control form-control-danger" id="" name="location[]" placeholder=""  />
                                   
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Cost</label>
                                    <input type="text" class="form-control form-control-danger" id="" name="cost[]" placeholder=""  />
                                   
                                </div>
                            </div>
                            @else
                            @foreach($shippings as $shipping)
                            <div id="row_{{$shipping->id}}">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Location</label>
                                    <input type="text" class="form-control form-control-danger" id="" name="location[]" placeholder="" value={{$shipping->location}}  />
                              </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Cost</label>
                                    <input type="text" class="form-control form-control-danger" id="" name="cost[]" placeholder="" value={{$shipping->cost}}  />
                                 </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                 <spam onclick="deleteRow({{$shipping->id}});" style="cursor:pointer;">Delete</span>
                                </div>
                            </div>
                        </div>
                            @endforeach
                            @endif
                       <div class="field_wrapper"></div>     
                    <a href="javascript:void(0);" class="add_button" title="Add field"><img src="add-icon.png"/></a>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-info waves-effect waves-light  cus-submit save-btn"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@stop
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML ='<div class="col-md-6"> <div class="form-group"><label class="control-label">Location</label> <input type="text" class="form-control form-control-danger" id="" name="location[]" placeholder=""  /></div></div>';
     fieldHTML +='<div class="col-md-2"><div class="form-group"> <label class="control-label">Cost</label><input type="text" class="form-control form-control-danger" id="" name="cost[]" placeholder=""  /></div></div>';
    fieldHTML +='<div class="col-md-1"> <div class="form-group"> Delete </div> </div>';
    
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $('.add_button').click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
function deleteRow(id){
    if (confirm("Are you sure?")) {
          $.ajax({
                url: "{{url('merchant/shipping-management/delete')}}",
                method: "GET",
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    "id": id
                },
                dataType: 'html',
                success: function(response) {
                   if(response)
                   {
                    $('#row_'+id).hide();
                   }
                }
            });
           
            }
    }
</script>