@extends('admin.master')
@section('pageTitle', 'Subscription Management')
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
<div class="dashboard-marchent">
    <div class="container">
      <h3>User Management</h3>
      <div class="marchent-wapperbox">
      @include('admin.includes.sidebar')

        <div class="right-marchent-wapper">
        <button type="submit" class="btn btn-primary bg-color  btn-section">EXPORT AS CSV</button>
        <!-- <div class="form-group">
                            <input type="search" class="form-control text-color" id="emaillogin" aria-describedby="emailHelp" placeholder="search">
                        </div> -->
                        <table class="table">
    <thead>
      <tr>
        <th><input type="checkbox" id="checkAll"></th>
        <th> Email</th>
        <th>Date of Subscription</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
       @foreach($subscriptionData as $key=> $subscription)
            <tr>
                <td><input type="checkbox"> </td>
                <td>{{$subscription->email}}</td>
                <td>{{date('d M Y', strtotime($subscription->created_at))}}</td>
                <td class="text-color-red" style="cursor:pointer;" ><small class="delete-icon">
                    <img src="http://localhost/shopohalicDev/public/adminAssets/images/delete.svg" alt="icon" onclick="deleteStatus({{$subscription->id}});">
            </small></td>
            </tr>
            @endforeach
    </tbody>
  </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  function changeStatus(id,status){
   
        var status=($('#statustype').text());
        $.ajax({
                url: "{{url('admin/subscribers/delete')}}",
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
            alert(id)
          $.ajax({
                url: "{{url('admin/subscribers/delete')}}",
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
    $(document).ready(function() {
        $("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
 }); 

var checkboxes = document.getElementsByName(chkboxName);
  var checkboxesChecked = [];
  // loop over them all
  for (var i=0; i<checkboxes.length; i++) {
     // And stick the checked ones onto an array...
     if (checkboxes[i].checked) {
        checkboxesChecked.push(checkboxes[i]);
     }
  }
        
    });
  </script>

@stop
@section('pagejs')

<script type="text/javascript">
    $(document).ready(function() {
        //Get the total rows
        $('#datatable-responsive1_wrapper').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="' + title + ' Search" />');
        });
        var table = $('table').dataTable({
            searching: true,
            paging: true,
            info: false, // hide showing entries
            ordering: true, // hide sorting
            columnDefs: [{
                orderable: false,
                targets: "no-sort"
            }],
            bLengthChange: false, // hide showing entries in dropdown
            "dom": '<"pull-left"f><"pull-right"l>tip', //align search to left
            "language": {
                "search": "_INPUT_",
                "searchPlaceholder": "Search here...",
                "paginate": {
                    previous: '&#x3c;', // or '<'
                    next: '&#x3e;' // or '>' 
                },
            }
        });

        $('#datatable-responsive1_wrapper .pull-right ').append('<div class="dataTables_length"><label for="Total Users">Total Users : ' + table.fnGetData().length + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></div>');
        $('.pull-right .dataTables_length').css({
            'font-size': '15px',
            'color': '#fff'
        });
        $('#datatable-responsive1_wrapper').
        css({
            'background': '#7CA7BB',
            'background-repeat': 'no-repeat',
            'padding': '10px 0px 0px 0px',
            'font-size': '18px',
            'color': '#fff',
            'border-radius': '8px 8px 0px 0px',
        });

        $('#datatable-responsive1').css({
            "border": "0px",
            "margin-bottom": "0px !important",
        });

        $('#datatable-responsive1_paginate').css({
            'background': '#fff'
        });

        $('.dataTables_filter input[type="search"]').
        css({
            'width': '250px'
        });
    });

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
    /* Status toggle ends */
    function editRecords(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{url('user/role/edit/')}}" + '/' + id,
            method: "POST",
            contentType: 'application/json',
            success: function(data) {
                $('#unique-model').modal('show');
                document.getElementById("ids").value = data.id;
                document.getElementById("username").value = data.username;
                document.getElementById("email").value = data.email;
                document.getElementById("password").value = data.password;
                var val = data.status;

                if (val == 1) {
                    $('input[name=status][value=' + val + ']').prop('checked', true);
                } else {
                    $('input[name=status][value=' + val + ']').prop('checked', true);
                }
                document.getElementById("submitbtn").innerText = 'UPDATE';
            }
        });
    }

    function addRecords() {
        document.getElementById("FormValidation").reset();
        document.getElementById("submitbtn").innerText = 'Save';
        $('#unique-model').modal('show');
    }

</script>
@endsection
@section('pagejs')
@stop