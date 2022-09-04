@extends('admin.master')
@section('pageTitle','Uses Management')
@section('content')


<div class="Merchants-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12  heading-full">
                <h3>Commission</h3>
            </div>

        </div>
    </div>
    <div class="container">

        

        <table border="0  " width="100%"> 
                <tr>
                    <th>Title </th>
                    <th class="commission">%</th>
                </tr> 
                @foreach($commissiondata as $key=> $commission)
                <tr>
                  <td>{{$commission->commission_title}}</td>
                  <td class="right-text-bar" >{{$commission->commission_percentage}}%</td>
                </tr>
                @endforeach
                
            </table>

    </div>
</div>



@stop
@section('pagejs')
<script type="text/javascript">
 
</script>
@stop