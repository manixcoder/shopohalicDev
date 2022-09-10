@extends('admin.master')
@section('pageTitle','Uses Management')
@section('content')
<style>
    .form-control {
        display: block;
        width: 25% !important;
        height: 34px;
    }
</style>

<div class="Merchants-sec merchantspg add-new">
    <div class="category">
        <div class="container">
            <div class="row">
                <div class="col-md-8 add-new-category ">
                    <h3>Add new setting</h3>
                </div>
                <div class="col-md-4 socical-img text-right">
                    <img src="{{ asset('public/adminAssets/images/images/reject.svg')}}" alt="reject" width="20px">
                </div>

            </div>
            <div class="row">
                <form method="POST" action="{{ url('admin/order-settings/save-setting') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12 add-form ">
                        <div class="form-group">
                            <input type="text" name="order_tracking" required class="form-control text-color" id="emaillogin" aria-describedby="emailHelp" placeholder="Order Setting">
                        </div>
                    </div>
                    <div class="col-md-12 btn-sec">
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary bg-color">ADD</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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