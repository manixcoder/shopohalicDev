@extends('admin.master')
@section('pageTitle', 'Commission Management')
@section('content')
<<div class="dashboard-marchent">
    <div class="container">
      <h3>Commission Management
 <!-- <span class="pull-right"><a href="#" class="addproduct-btn">ADD NEW CATEGORY</a></span> -->
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
           <th>Title </th>
           <th class="commission">%</th>
        </tr>
      </thead>
      <tbody>
        @foreach($commissiondata as $key=> $commission)
                <tr>
                  <td>{{$commission->commission_title}}</td>
                  <td class="right-text-bar" >{{$commission->commission_percentage}}%</td>
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
@endsection
@section('pagejs')
@stop