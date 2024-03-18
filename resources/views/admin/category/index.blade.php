@extends('admin.master')
@section('pageTitle', 'Category Management')
@section('content')
<<div class="dashboard-marchent">
    <div class="container">
      <h3>Category Management
 <span class="pull-right"><a href="{{url('admin/category/create')}}" class="addproduct-btn">ADD NEW CATEGORY</a></span>
      </h3>
      <div class="marchent-wapperbox">
      @include('admin.includes.sidebar')
        <div class="right-marchent-wapper">
          <div class="row">
          <div class="table-responive">
            <!-- <table border="0" width="100%"> -->
           <table id="datatable-responsive1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
      <thead>
        <tr>
          <th class="no-sort">Id</th>
          <th class="no-sort">Category Name</th>
          <th class="no-sort">Parent Category</th>
         <!--  <th class="no-sort">Status</th> -->
          <th class="no-sort">Actions</th>

        </tr>
      </thead>
      <tbody>
        @foreach($categoryData as $key=> $category)
        <?php
        if ($category->parent_id  === "N/A") {
             $parentCat = '';
        } else {
          $part_catData = DB::table('category')->where('id', $category->parent_id)->first();
          // dd($part_catData->category_name);
          $parentCat = $part_catData->category_name;
        }


        ?>
        <tr class="gradeX">
          <td>{{$key+1}}</td>
          <td>{{$category->category_name}}</td>
          <td>{{$parentCat}}</td>
         <!--  <td>
            <p class="mb-0">

              <label class="switch">

                <?php
                if ($category->status == 1) {
                  $statVal = 1;
                  $checked = 'checked = checked';
                } else {
                  $statVal = 0;
                  $checked = '';
                }
                ?>
                <input type="checkbox" class="togBtn" id="togBtn_{{$category->id}}" name="togBtn_{{$category->id}}" value="{{ $statVal}}" <?php echo $checked; ?> />

                <span class="slider round"></span>
              </label>

            </p>
          </td> -->
          <td class="actions">
            &nbsp;&nbsp;&nbsp;
            <span>
              <a href="{{URL::to('admin/category/edit')}}/{{$category->id}}"> <i class="fa fa-pencil bg-orange" aria-hidden="true"></i> Edit
              </a>
            </span>
            <a href="{{URL::to('admin/category/delete')}}/{{$category->id}}"><i class="fa fa-plus-square bg-orange" aria-hidden="true"></i>
              Archive
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