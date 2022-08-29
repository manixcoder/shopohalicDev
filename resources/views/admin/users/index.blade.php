@extends('admin.master')
@section('pageTitle','Uses Management')
@section('content')


<div class="extrapad-wapper">
    <div class="row">
        <div class="col-md-5  heading-full">
            <h3>Users</h3>
        </div>
        <div class="col-md-5  select-box pull-right">
            <div class="row">
                <div class="col-md-5 select-sec">
                    <select name="abc" id="name">
                        <option value="">All</option>
                        <option value="">All</option>
                    </select>
                </div>
                <div class="col-md-7 search-bar">
                    <div class="form-group">
                        <input type="search" class="form-control text-color" id="emaillogin" aria-describedby="emailHelp" placeholder="search">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="extrapad-wapper">
    <div class="white-boxbg">
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
                    <tr>
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
                                <a href="{{ url('admin/users-management') . '/active-inactive/' . $users->id }}">
                                   

                                        <input type="checkbox" id="checkbox" >
                                        <span class="slider round"></span>
                                </a>

                            </label>
                            Active

                        </td>
                        <td>
                            <small class="delete-icon">
                                <a href="#" class="delete-icon">
                                    <img src="{{ asset('public/adminAssets/images/delete.svg') }}" alt="icon">
                                </a>
                            </small>
                        </td>
                    </tr>



                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>



@stop
@section('pagejs')
<script type="text/javascript">
    $(document).ready(function() {
        //set initial state.
        $('#textbox1').val($(this).is(':checked'));

        $('#checkbox1').change(function() {
            $('#textbox1').val($(this).is(':checked'));
        });

        $('#checkbox1').click(function() {
            if (!$(this).is(':checked')) {
                return confirm("Are you sure?");
            }
        });
    });
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
        alert("Id ");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{url('users-management/active/')}}" + '/' + id,
            method: "GET",
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