@extends('admin.master')
@section('pageTitle', 'Banner Management')
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
      <h3>Banner</h3>
      <div class="form-group">
        <a href="{{ url('admin/banner/create') }}" class="btn btn-primary bg-color  btn-section">Add New Banner</a>
      </div>
      <div class="marchent-wapperbox">
      @include('admin.includes.sidebar')
        <div class="right-marchent-wapper">
        
        
          <div class="row">
          <div class="table-responive">
            <!-- <table border="0" width="100%"> -->
            <table id="datatable-responsive1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
      <thead>
        <tr>
          <th class="no-sort">Banner Name</th>
          <th class="no-sort">Image</th>
          <th class="no-sort">Action</th>

        </tr>
      </thead>
      <tbody>
        @foreach($bannerData as $key=> $banner)
       
        <tr class="gradeX" id="row_{{$banner->id}}">
          <td>{{$banner->name}}</td>
          <td><img src="{{ asset('public/uploads/banners/'.$banner->image) }}" height="40" width="40"></td>
          <td class="actions">
            &nbsp;&nbsp;&nbsp;
            <span>
              <a href="{{URL::to('admin/banner/edit')}}/{{$banner->id}}"> <i class="fa fa-pencil bg-orange" aria-hidden="true"></i> Edit
              </a>
            </span>
            <a  style="cursor:pointer;" onclick="deleteStatus({{$banner->id}});"><i class="fa fa-trash bg-orange" aria-hidden="true"></i>
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
                url: "{{url('admin/banner/delete')}}",
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

