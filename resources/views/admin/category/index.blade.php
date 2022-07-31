@extends('admin.master')
@section('pageTitle','Uses Management')
@section('content')


<div class="Merchants-sec">
       <div class="container">
         <div class="row">
          <div class="col-md-7 heading-full"> <h3>Category</h3></div>
          <div class="col-md-5  select-box"> 
             <div class="row">
               <div class="col-md-5">
                <select name="abc" id="name" >
                  <option value="">All</option>
                  <option value="">All</option>
                </select>
               </div>
               <div class="col-md-7 text-right">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary bg-color  btn-section">ADD NEW CATEGORY</button>
              </div>                                                                    
               </div>
             </div>
          </div>
          </div>
          </div>
              <div class="container">
               
              <table border="0  " width="100%">
                
                <tr>
                    <th class="category-box">Category Name </th>
                    <th>Action</th>
                    <th>Status</th>
                </tr>
                <tr>
                  <td>Mobile</td>
                  <td> 
                    <span><i class="fa fa-plus-circle bg-green" aria-hidden="true"></i>Add New Subcategory</span>
                    <span><i class="fa fa-pencil bg-orange" aria-hidden="true"></i> Edit</span>
                    <span><i class="fa fa-plus-square bg-gra" aria-hidden="true"></i>Archive</span>
                  </td>
                  <td> <label class="switch right-click">
                    <input type="checkbox">
                    <span class="slider round"></span>
                  </label>
                  Active</td>
                </tr>
                <tr>
                  <td>Fashion</td>
                  <td> 
                    <span><i class="fa fa-plus-circle bg-green" aria-hidden="true"></i>Add New Subcategory</span>
                    <span><i class="fa fa-pencil bg-orange" aria-hidden="true"></i> Edit</span>
                    <span><i class="fa fa-plus-square bg-gra" aria-hidden="true"></i>Archive</span>
                  </td>
                  <td>
                    <label class="switch right-click">
                    <input type="checkbox">
                    <span class="slider round"></span>
                  </label>
                  Active</td>
                </tr>
                <tr>
                  <td class="kids-right">Men</td>
                  <td> 
                    <span><i class="fa fa-pencil bg-orange" aria-hidden="true"></i> Edit</span>
                    <span><i class="fa fa-plus-square bg-gra" aria-hidden="true"></i>Archive</span>
                  </td>
                  <td> <label class="switch right-click">
                    <input type="checkbox">
                    <span class="slider round"></span>
                  </label>
                  Active</td>
                </tr>
                <tr>
                  <td class="kids-right">Female</td>
                  <td> 
                    <span><i class="fa fa-pencil bg-orange" aria-hidden="true"></i> Edit</span>
                    <span><i class="fa fa-plus-square bg-gra" aria-hidden="true"></i>Archive</span>
                  </td>
                  <td> <label class="switch right-click">
                    <input type="checkbox">
                    <span class="slider round"></span>
                  </label>
                  Active</td>
                </tr>
                <tr>
                  <td class="kids-right">Kids</td>
                  <td> 
                    <span><i class="fa fa-pencil bg-orange" aria-hidden="true"></i> Edit</span>
                    <span><i class="fa fa-plus-square bg-gra" aria-hidden="true"></i>Archive</span>
                  </td>
                  <td> <label class="switch right-click">
                    <input type="checkbox">
                    <span class="slider round"></span>
                  </label>Active</td>
                </tr>
                <tr>
                  <td>Electronics</td>
                  <td> 
                    <span><i class="fa fa-plus-circle bg-green" aria-hidden="true"></i>Add New Subcategory</span>
                    <span><i class="fa fa-pencil bg-orange" aria-hidden="true"></i> Edit</span>
                    <span><i class="fa fa-plus-square bg-gra" aria-hidden="true"></i>Archive</span>
                  </td>
                  <td> 
                    <label class="switch right-click">
                    <input type="checkbox">
                    <span class="slider round"></span>
                  </label>
                  Active</td>
                </tr>
                <tr>
                  <td>Grocery</td>
                  <td> 
                    <span><i class="fa fa-plus-circle bg-green" aria-hidden="true"></i>Add New Subcategory</span>
                    <span><i class="fa fa-pencil bg-orange" aria-hidden="true"></i> Edit</span>
                    <span><i class="fa fa-plus-square bg-gra" aria-hidden="true"></i>Archive</span>
                  </td>
                  <td> 
                    <label class="switch right-click">
                    <input type="checkbox">
                    <span class="slider round"></span>
                  </label>
                  Active</td>
                </tr>
                <tr>
                  <td>Beauty</td>
                  <td> 
                    <span><i class="fa fa-plus-circle bg-green" aria-hidden="true"></i>Add New Subcategory</span>
                    <span><i class="fa fa-pencil bg-orange" aria-hidden="true"></i> Edit</span>
                    <span><i class="fa fa-plus-square bg-gra" aria-hidden="true"></i>Archive</span>
                  </td>
                  <td> <label class="switch right-click">
                    <input type="checkbox">
                    <span class="slider round"></span>
                  </label>
                  Active</td>
                </tr>
                <tr>
                  <td>Toys</td>
                  <td> 
                    <span><i class="fa fa-plus-circle bg-green" aria-hidden="true"></i>Add New Subcategory</span>
                    <span><i class="fa fa-pencil bg-orange" aria-hidden="true"></i> Edit</span>
                    <span><i class="fa fa-plus-square bg-gra" aria-hidden="true"></i>Unarchive</span>
                  </td>
                  <td> <label class="switch right-click">
                    <input type="checkbox">
                    <span class="slider round"></span>
                  </label>
                  Active</td>
                </tr>
            </table>
  
        </div>
      </div>



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
@stop