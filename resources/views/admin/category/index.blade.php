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

        if (is_null($category->parent_id)  > 0) {
          $parentCat = '';
        } else {
          $part_catData = DB::table('category')->where('id', $category->parent_id)->first();
          $parentCat = $part_catData->category_name;
        }


        ?>
        <tr class="gradeX">
          <td>{{$key+1}}</td>
          <td>{{$category->category_name}}</td>
          <td>{{$parentCat}}</td>
          <td>
            <p class="mb-0">
              
                <label class="switch">

                  <input type="checkbox" class="togBtn" id="togBtn" name="togBtn_" value="" />

                  <span class="slider round"></span>
                </label>
             
            </p>
          </td>
          <td class="actions">
            &nbsp;&nbsp;&nbsp;
            <span>
              <a href=""> <i class="fa fa-pencil bg-orange" aria-hidden="true"></i> Edit
              </a>
            </span>
            &nbsp;&nbsp;&nbsp;
            <a href="#" class="fa fa-plus-square bg-gra" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
            </a>

            <a href="#">Archive</a> &nbsp;&nbsp;&nbsp;



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

</script>
@stop