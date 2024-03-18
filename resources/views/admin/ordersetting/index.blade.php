@extends('admin.master')
@section('pageTitle', 'Order Management')
@section('content')
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 30px;
  height: 17px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<<div class="dashboard-marchent">
    <div class="container">
      <h3>Order Status Settings
    

      </h3>
      <div class="form-group">
              <a href="{{ url('admin/order-settings/create') }}" class="btn btn-primary bg-color  btn-section">ADD NEW Setting</a>
            </div>
      <div class="marchent-wapperbox">
      @include('admin.includes.sidebar')
        <div class="right-marchent-wapper">
        <button type="submit" class="btn btn-primary bg-color  btn-section">EXPORT AS CSV</button>
        <div class="form-group">
                            <input type="search" class="form-control text-color" id="emaillogin" aria-describedby="emailHelp" placeholder="search">
                        </div>
        <div class="row">
          <div class="col-md-12">
          <div class="table-responive">
            <!-- <table border="0" width="100%"> -->
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

