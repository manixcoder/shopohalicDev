@extends('admin.master')
@section('pageTitle', 'User Management')
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
      <h3>User Management</h3>
      <div class="marchent-wapperbox">
      @include('admin.includes.sidebar')
        <div class="right-marchent-wapper">
          <div class="row">
          <div class="table-responive">
            <!-- <table border="0" width="100%"> -->
            <table id="datatable-responsive1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

<thead>
    <tr>
        <th class="no-sort">Users ID</th>
        <th class="no-sort">User Name</th>
        <th class="no-sort">Email</th>
        <th class="no-sort">Phone Number</th>
        <th class="no-sort">Date of Registration</th>
        <th class="no-sort">Status</th>
        <th class="no-sort">Actions</th>
    </tr>
</thead>
<tbody>
    @foreach($usersData as $key=> $users)
    <tr id='row_{{$users->id}}'>
        <td>
            {{$key+1}}
        </td>
        <td>
            <img src="{{ asset('public/adminAssets/images/circle.jpg') }}" alt="circle" width="50px">
            {{$users->name}}
        </td>
        <td> {{$users->email}}</td>
        <td>{{$users->mobile}}</td>
        <td>{{ date('d M Y', strtotime($users->created_at)) }}</td>
        <td>
            <label class="switch right-click">
                    <input type="checkbox" id="checkbox" @if($users->status=='1') checked @endif  onclick="changeStatus({{$users->id}},{{$users->status}});">
                    <span class="slider round"></span>
            </label>
            <span id='statustype'>@if($users->status=='1')  Active @else In-Active @endif</span>

        </td>
        <td>
            <small class="delete-icon">
                    <img src="{{ asset('public/adminAssets/images/delete.svg') }}" alt="icon" onclick="deleteStatus({{$users->id}});">
            </small>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    function changeStatus(id,status){
        var status=($('#statustype').text());
        $.ajax({
                url: "{{url('admin/users-management/active-inactive')}}",
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
                url: "{{url('admin/users-management/delete')}}",
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