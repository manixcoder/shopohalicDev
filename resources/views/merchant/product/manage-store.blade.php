@extends('merchant.master')
@section('pageTitle','Products Management')
@section('content')

<div class="dashboard-marchent">
    <div class="container">
     
      <div class="marchent-wapperbox">
      @include('merchant.includes.sidebar')
<div class="right-marchent-wapper">

          <div class="product-detailform">
             @if(Session::has('message'))
<p class="alert alert-info" id="alertMessage">{{ Session::get('message') }}</p>
@endif
            <h4>Product Name{{$product->Product_name}} Color {{$color->color_name}}</h4>
            <table class="table">
    <thead>
      <tr>
        <th>Size</th>
        <th>Total Quantity In Stock</th>
        
      </tr>
    </thead>
    <tbody>
      @foreach($storeItems as $storeItem)
      <tr>
        <td>{{$storeItem->size_name}}</td>
        <td>{{$storeItem->quantity}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

            <form method="POST" action="{{ url('/merchant/products-management/'.$product_id.'/'.$color->id.'/manage-store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
          <div class="shipping-box-date">
            <h4>Size</h4>
            <div class="row-table">
             @foreach($sizes as $size)
              
            <div class="row row1">
             
              <div class="col-md-6">
                 
             <input type="checkbox"  name="size[]" value="{{$size->id}}">{{$size->size_name}}
                    
              </div>
              <div class="col-md-4">
                 <input type="number" class="form-control"  name="quantity[]" placeholder="Quantity" value="0">
              </div>
            </div>
            @endforeach
          </div>
          </div>
         
          <div class="btn-addprod ">
            <button type="submit" class="add-prodbtn">Add Quantity</button>
          </div>
          </form>
		    </div>
      </div>
    </div>
  </div>
 <script type="text/javascript">
$(document).ready(function(){    
    var maxField = 10; //Input fields increment limitation

    
    var fieldHTML = '<div class="row row1"><div class="col-md-4"> <input type="text" class="form-control" name="location[]" placeholder="Location"></div> <div class="col-md-2"><input type="text" class="form-control" name="cost[]" placeholder="Cost"> </div><div class="col-md-4"><input type="text" class="form-control" name="delivery[]" placeholder="Delivery Expected day"> </div></div>';
   // fieldHTML +=' <div class="col-md-2"><i class="fa fa-trash " id="DeleteRow"  aria-hidden="true"></i> </div>';
  
    
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $('.add_button').click(function(){
     
      
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
           
            $('.row1:last').after(fieldHTML); //Add field html
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
        <script>
            $(document).ready(() => {
                $("#image").change(function () {
                    const file = this.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $("#imgPreview")
                              .attr("src", event.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            });
            function preview_image() 
              {
                $('#image_preview').html(''); 
              var total_file=document.getElementById("upload_file").files.length;
             if(total_file<5)
             {
              for(var i=0;i<total_file;i++)
              {
                $('#image_preview').append("<span class='photobox-img'><img src='"+URL.createObjectURL(event.target.files[i])+"'></span>");
              }
            }else{
              alert('More than 4 images not allowed');
            }
              }
        </script>
        
        <link href=
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/
ui-lightness/jquery-ui.css'
        rel='stylesheet'>
    <script src=
"https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
    </script>
    <script>
        $(document).ready(function() {
          
            $(function() {
                $( "#start_date").datepicker({
                  dateFormat:"yy-mm-dd",
                });
                $( "#end_date").datepicker({
                  dateFormat:"yy-mm-dd",
                });
                $("input[name='stock_type']").click(function(){
             if($(this).val()=='till_stock_last')
             {
              $('.date-rangebox').css('display','none');
             }
             else if($(this).val()=='date_range')
             {
              $('.date-rangebox').css('display','block');
             }
        });
            });
      });
        
    </script>
   <script>
$(function(){ // DOM ready

  // ::: TAGS BOX
var arr=[];
  $("#brand_tags #brand").on({
    focusout : function() {
      var txt = this.value.replace(/[^a-z0-9\+\-\.\#]/ig,''); // allowed characters
   // alert(txt);
     arr.push(txt);
     
      if(txt) $("<span/>", {text:txt.toLowerCase(), insertBefore:this});
      this.value =  "";

      $('#brandtext').val(arr.toString());
    },
    keyup : function(ev) {
      // if: comma|enter (delimit more keyCodes with | pipe)
      if(/(188|13)/.test(ev.which)) $(this).focusout(); 
    }
  });
  $('#brand_tags').on('click', 'span', function() {
    if(confirm("Remove "+ $(this).text() +"?")) $(this).remove(); 
    arr.splice($.inArray($(this).text(),arr), 1);
$('#brandtext').val(arr.toString());

  });

});
</script>
<script>
$(function(){ // DOM ready

  // ::: TAGS BOX
var arr=[];
  $("#color_tags #color").on({
    focusout : function() {
      var txt = this.value.replace(/[^a-z0-9\+\-\.\#]/ig,''); // allowed characters
   // alert(txt);
     arr.push(txt);
     
      if(txt) $("<span/>", {text:txt.toLowerCase(), insertBefore:this});
      this.value =  "";

      $('#colortext').val(arr.toString());
    },
    keyup : function(ev) {
      // if: comma|enter (delimit more keyCodes with | pipe)
      if(/(188|13)/.test(ev.which)) $(this).focusout(); 
    }
  });
  $('#color_tags').on('click', 'span', function() {
    if(confirm("Remove "+ $(this).text() +"?")) $(this).remove(); 
    arr.splice($.inArray($(this).text(),arr), 1);
$('#colortext').val(arr.toString());

  });

});
</script>
<script>
$(function(){ // DOM ready

  // ::: TAGS BOX
var arr=[];
  $("#size_tags #size").on({
    focusout : function() {
      var txt = this.value.replace(/[^a-z0-9\+\-\.\#]/ig,''); // allowed characters
   // alert(txt);
     arr.push(txt);
     
      if(txt) $("<span/>", {text:txt.toLowerCase(), insertBefore:this});
      this.value =  "";

      $('#sizetext').val(arr.toString());
    },
    keyup : function(ev) {
      // if: comma|enter (delimit more keyCodes with | pipe)
      if(/(188|13)/.test(ev.which)) $(this).focusout(); 
    }
  });
  $('#size_tags').on('click', 'span', function() {
    if(confirm("Remove "+ $(this).text() +"?")) $(this).remove(); 
    arr.splice($.inArray($(this).text(),arr), 1);
$     ('#sizetext').val(arr.toString());

  });

});
 function getSubCategory(id){
              
    $.ajax({
            url: "{{url('get-subcategory')}}",
            method: "GET",
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                "id": id              
            },
            dataType: 'json',
            success: function(response) {
            var html='<option value="">select</option>';              
               if(response)
               {
               $.each(response, function(index,value){
              html+='<option value="'+value.id+'">'+value.category_name+'</option>';
                });
               }
               $('#sub_category_id').html(html);
            }
        });
            }

            function getBrand(type,category_id){


    $.ajax({
            url: "{{url('get-brand')}}",
            method: "GET",
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                "type": type,
                "category": category_id,              
            },
            dataType: 'json',
            success: function(response) {
            var html='<option value="">select</option>';              
               if(response)
               {
               $.each(response, function(index,value){
              html+='<option value="'+value.id+'">'+value.brand_name+'</option>';
                });
               }
               $('#brand_id').html(html);
            }
        });
            }
            function getSize(brand_id){
            var category = $('#category').val();
            var sub_category_id = $('#sub_category_id').val();
           
    $.ajax({
            url: "{{url('get-size')}}",
            method: "GET",
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {                
                "brand_id": brand_id,
                "category_id": category,
                "sub_category_id": sub_category_id,              
            },
            dataType: 'json',
            success: function(response) {
            var html='<option value="">select</option>';              
               if(response)
               {
               $.each(response, function(index,value){
              html+='<option value="'+value.id+'">'+value.size_name+'</option>';
                });
               }
               $('#size').html(html);
            }
        });
            }
</script>
@stop