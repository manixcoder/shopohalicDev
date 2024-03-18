@extends('merchant.master')
@section('pageTitle', 'Shipping Cost')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.0/bootstrap-table.min.css"></script>
<<div class="dashboard-marchent">
    <div class="container">
      <h3>Dashboard 
      
      </h3>
      <div class="marchent-wapperbox">
      @include('merchant.includes.sidebar')
      <div class="right-marchent-wapper">
          <div class="shipping-costspg">
          <form class="edit-form" method="POST" action="{{ url('/merchant/shipping-management/save') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
            <div class="table-responsive">
              <table id="mytable">
                <thead>
                  <tr>
                    <th style="width: 70%">Location</th>
                    <th style="width: 100px">Cost</th>
                    <th style="width: 80px">Action</th>
                  </tr>
                </thead>
                <tbody>
              
                        @if(count($shippings)==0)
                  <tr>
                    <td>
                    <input type="text" class="form-control" id="" name="location[]" placeholder=""  />                      
                    </td>
                    <td>
                    <input type="text" class="form-control" id="" name="cost[]" placeholder=""  /> 
                      
                    </td>
                    <td>
                     
                    </td>
                  </tr>
                  @else
                            @foreach($shippings as $shipping)
                            <tr id="row_{{$shipping->id}}">
                    <td>
                      <input type="text" name="location[]" placeholder="" value="{{$shipping->location}}" class="form-control">
                    </td>
                    <td>
                      <input type="text" name="cost[]" placeholder="" value="{{$shipping->cost}}" class="form-control">
                    </td>
                    <td>
                      <i class="fa fa-trash" onclick="deleteRow({{$shipping->id}});" style="cursor:pointer;" aria-hidden="true"></i>
                    </td>
                  </tr>
                  @endforeach
                            @endif
                            
                             
                </tbody>
              </table>
              <div class="form-actions">
                        <button type="submit" class="btn btn-info waves-effect waves-light  cus-submit save-btn"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
                    </div>    
            </div>
</form>
            <div class="btnbox addother-shiping">
            
              <a href="javascript:void(0);" class="add_button btn"><i class="fa fa-plus-circle" aria-hidden="true"></i> ADD ANOTHER SHIPPING AREA</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script type="text/javascript">
$(document).ready(function(){    
    var maxField = 10; //Input fields increment limitation
    var fieldHTML ='<tr id="row"><td><input type="text" name="location[]" placeholder="Pick Up" class="form-control"></td>';
    fieldHTML +='<td><input type="text" name="cost[]" placeholder="Free" class="form-control"></td>';
    fieldHTML +=' <td ><i class="fa fa-trash " id="DeleteRow"  aria-hidden="true"></i> </td></tr>';
  
    
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $('.add_button').click(function(){
      
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
           
            $('#mytable tr:last').after(fieldHTML); //Add field html
        }
    });
    $("body").on("click", "#DeleteRow", function () {
            $(this).parents("#row").remove();
        })
    
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
@endsection
@section('pagejs')

        

@stop