@extends('admin.master')
@section('pageTitle','Uses Management')
@section('content')


<div class="Merchants-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-7 heading-full">
        <h3>Order Status Settings</h3>
      </div>
      <div class="col-md-5  select-box">
        <div class="row">
          <div class="col-md-5">
            <select name="abc" id="name">
              <option value="">All</option>
              <option value="">All</option>
            </select>
          </div>
          <div class="col-md-7 text-right">
            <div class="form-group">
              <a href="{{ url('admin/order-settings/create') }}" class="btn btn-primary bg-color  btn-section">ADD NEW Setting</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  
  
    <table id="datatable-responsive1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
      <thead>
        <tr>
          <th class="no-sort">Order Tracking Status</th>
          <th class="no-sort">Status</th>
          <th class="no-sort">Action</th>

        </tr>
      </thead>
      <tbody>
        @foreach($orderSettingData as $key=> $setting)
       
        <tr class="gradeX" id="row_{{$setting->id}}">
          <td>{{$setting->order_tracking}}</td>
          <td>
                            <label class="switch right-click">
                                    <input type="checkbox" id="checkbox" @if($setting->status=='1') checked @endif  onclick="changeStatus({{$setting->id}},{{$setting->status}});">
                                    <span class="slider round"></span>
                            </label>
                            <span id='statustype'>@if($setting->status=='1')  Active @else In-Active @endif</span>

                        </td>
          <td class="actions">
            &nbsp;&nbsp;&nbsp;
            <span>
              <a href="{{URL::to('admin/order-settings/edit')}}/{{$setting->id}}"> <i class="fa fa-pencil bg-orange" aria-hidden="true"></i> Edit
              </a>
            </span>
            <a  style="cursor:pointer;" onclick="deleteStatus({{$setting->id}});"><i class="fa fa-trash bg-orange" aria-hidden="true"></i>
              Delete
            </a>
            &nbsp;&nbsp;&nbsp;
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
    </div>
  </div>


  <<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  function changeStatus(id,status){
   
        var status=($('#statustype').text());
        $.ajax({
                url: "{{url('admin/order-settings/active-inactive')}}",
                method: "GET",
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    "id": id,
                    "status": status
                },
                dataType: 'html',
                success: function(response) {
                   if(response)
                   {
                    var type=status=='Active'?'In-Active':'Active';
                    $('#statustype').text(type);
                   }
                }
            });
    }
    function deleteStatus(id){
        if (confirm("Are you sure?")) {
          $.ajax({
                url: "{{url('admin/order-settings/delete')}}",
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

@stop
@section('pagejs')

@stop