@extends('admin.master')
@section('pageTitle','Uses Management')
@section('content')


<div class="Merchants-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-7 heading-full">
        <h3>Category</h3>
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
              <a href="{{ url('admin/category/create') }}" class="btn btn-primary bg-color  btn-section">ADD NEW CATEGORY</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">

    <table id="datatable-responsive1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
      <thead>
        <tr>
          <th class="no-sort">Id</th>
          <th class="no-sort">Category Name</th>
          <th class="no-sort">Parent Category</th>
          <th class="no-sort">Status</th>
          <th class="no-sort">Actions</th>

        </tr>
      </thead>
      <tbody>
        @foreach($categoryData as $key=> $category)
        <?php
        if ($category->parent_id  === "N/A") {
          echo   $parentCat = '';
        } else {
          $part_catData = DB::table('category')->where('id', $category->parent_id)->first();
          // dd($part_catData->category_name);
          echo $parentCat = $part_catData->category_name;
        }


        ?>
        <tr class="gradeX">
          <td>{{$key+1}}</td>
          <td>{{$category->category_name}}</td>
          <td>{{$parentCat}}</td>
          <td>
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
          </td>
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



@stop
@section('pagejs')
<script type="text/javascript">

 /* Status toggle starts */
 $(window).load(function() {
        $('.togBtn').click(function() {
            var btnId = $(this).attr('id');
            var ret = btnId.split("_");
            var id = ret[1];
            var status = $('#' + btnId).val();
            if (status == 1) {
                var changedStatus = $(this).val('0');
                var statusNew = changedStatus.attr('value');
                $('#' + btnId).val(statusNew);
                var textStatus = $("#statusText_" + id).text("InActive");
                $("#statusText_" + id).removeClass("badge-success").addClass("badge-danger");
            } else {
                var changedStatus = $(this).val('1');
                var statusNew = changedStatus.attr('value');
                $('#' + btnId).val(statusNew);
                $('input[name=' + btnId + '][value=' + statusNew + ']').prop('checked', true);
                var textStatus = $('#statusText_' + id).text('Active');
                $("#statusText_" + id).removeClass("badge-danger").addClass("badge-success");
            }

            $.ajax({
                url: "{{url('update-user-status')}}" + '/' + id,
                method: "GET",
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    "id": id,
                    "status": statusNew
                },
                success: function(response) {
                    console.log(response);
                }
            });
        });
    });
</script>
@stop