@extends('admin.master')
@section('pageTitle', 'Merchant Management')
@section('content')
<<div class="dashboard-marchent">
    <div class="container">
      <h3>Marchant Management</h3>
      <div class="marchent-wapperbox">
      @include('admin.includes.sidebar')
        <div class="right-marchent-wapper">
          <div class="row">
          <div class="table-responive">
            <!-- <table border="0" width="100%"> -->
            <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
        </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
$(function () {

var table = $('.data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('users.index') }}",
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'name', name: 'name'},
        {data: 'email', name: 'email'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
});

});
</script>

<script>
function changeStatus(id,status){
    var status=($('#statustype').text());
    $.ajax({
            url: "{{url('admin/marchant-management/active-inactive')}}",
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
            url: "{{url('admin/marchant-management/delete')}}",
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