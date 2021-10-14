<?php include("instructors_header.php");?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Instructors
                <small>advanced tables</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#"><i class="fa fa-dashboard"></i>Instructors</a>
                </li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Instructors</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-xs-3" style="float: right">
                                <button class="btn btn-block btn-primary" onclick="add_new_modal()"><i class="fa fa-plus"></i>&nbsp;Add New Instructors</button>
                            </div>
                        </div>
                        <div class="box-body">
                            <table id="overview_datatable" class="table table-bordered table-hover">
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<!-- modal -->
<div class="modal fade" id="modal-new-instructor">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" >Add New Instructors</h4>
            </div>
            <div class="modal-body">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="instructors_setdata.php" method="post" id="add_course" enctype="multipart/form-data">
                        <div class="box-body">
                            <input id="new" name="new" value="" hidden>
                            <input id="c_image" name="c_image" value="" hidden>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">First Name</label>
                                        <input class="form-control" id="first_name" name="create[first_name]" placeholder="Enter First Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">User ID</label>
                                        <input class="form-control" id="user_id" name="create[user_id]" placeholder="User ID" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Password</label>
                                        <input class="form-control" id="password" type="password" name="create[password]" placeholder="Password" required>
                                    </div>
                                    <div class="form-group inst">
                                        <label for="exampleInputEmail1">Details</label>
                                        <input class="form-control" id="details" name="create[details]" placeholder="Details" required>
                                    </div>
                                    <div class="form-group inst">
                                        <label for="exampleInputEmail1">Postal Code</label>
                                        <input class="form-control" id="postal" name="create[postal]" placeholder="Postal Code" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Last Name</label>
                                        <input class="form-control" id="last_name" name="create[last_name]" placeholder="Enter Last Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" id="email" name="create[email]" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Role</label>
                                        <select class="form-control select2" style="width: 100%;" onchange="set_dialog()" id="role" name="create[role]">
                                            <option value="Instructor">Instructor</option>
<!--                                            <option value="Admin">Admin</option>-->
                                        </select>
                                    </div>
                                    <div class="form-group inst">
                                        <label for="exampleInputEmail1">Account Type</label>
                                        <select class="form-control select2" style="width: 100%;" id="account_type" name="create[account_type]">
                                            <option value="Bank">Bank</option>
                                            <option value="Paypal">Paypal</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 inst">
                                    <div class="col-md-4">
                                        <label for="exampleInputEmail1">Certificate</label>
                                        <div class="form-group">
                                            <input type="file" name="certificate" id="certificate">
                                        </div>
                                    </div>
<!--                                    <div class="col-md-8">-->
<!--                                        <img id="image_source">-->
<!--                                    </div>-->
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" >Save</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-image">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Show Image</h4>
            </div>
            <div class="modal-body">
                <div style="text-align: center">
                    <img id="image_source" style="width: 100%; height: 100%">
                </div>
                <!-- /.box -->
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php include("common_footer.php");?>

<script>
    var $table = $('#overview_datatable');

    jQuery(document).ready(function() {

        var datatableInit = function() {
            $table.dataTable({
                "ordering": true,
                "info": true,
                "searching": true,
                "ajax": {
                    "type": "POST",
                    "async": true,
                    url: "instructors_getdata.php",
                    "data": '',
                    "dataSrc": "data",
                    "dataType": "json",
                    "cache":    false,
                },
                "columnDefs": [
                    {
                        "targets": [8],
                        "createdCell": function (td, cellData, rowData, row, col) {
                            var html = '';
                            html += '<a><i onclick="edit(' + rowData.id + ')" class=" fa fa-fw fa-pencil-square-o"></i></a>' +
                                '<span class="w-20"></span>' +
                                '<a><i onclick="del(' + rowData.id + ')" class="fa fa-fw fa-trash-o"></i></a>';

                            $(td).html(html);
                        }
                    }
                ],
                "columns": [
                    { "title": "No", "data": "no", "class": "text-left", "width":'5%' },
                    { "title": "Name", "data": "first_name", "class": "text-left", "width":'10%' ,
                        mRender: function(data, type, row) {
                            return '<span class="badge-pill badge-info">' + row.first_name + '&nbsp;&nbsp;' + row.last_name + '</span>';
                        }
                    },
                    { "title": "User ID", "data": "user_id", "class": "text-left", "width":'10%' },
                    { "title": "Email", "data": "email", "class": "text-left", "width":'10%' },
                    { "title": "Role", "data": "role", "class": "text-left", "width":'10%' },
                    { "title": "Certificate", "data": "certificate", "class": "text-left", "width":'10%'  ,
                        mRender: function(data, type, row) {
                        if (data == null)
                            return "";
                        else
                            return "<img onclick='show_image(" + row.id + ")' style='height: 2.5em; width: 6em;' src='" + data + "'>";
                    }
                    },
                    { "title": "Postal Code", "data": "postal", "class": "text-left", "width":'10%' },
                    { "title": "Created Date", "data": "created_at", "class": "text-left", "width":'10%' },
                    { "title": "Action", "data": "id", "class": "text-left", "width":'5%' },
                 ],
                "lengthMenu": [
                    [5, 10, 20, 50, 150, -1],
                    [5, 10, 20, 50, 150, "All"] // change per page values here
                ],
                "scrollY": false,
                "scrollX": true,
                "scrollCollapse": false,
                "jQueryUI": true,
                "paging": true,
                "pagingType": "full_numbers",
                "pageLength": 10, // default record count per page
                dom: '<"row"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>p',
                bProcessing: true,
        });
        };
        $(function() {
            datatableInit();
        });
    });

    function add_new_modal() {
        $('#new').val(0);
        $('#c_image').val("");
        $('#first_name').val("");
        $('#last_name').val("");
        $('#user_id').val("");
        $('#email').val("");
        $('#password').val("");
        $('#details').val("");
        $('#postal').val("");

        $('#modal-new-instructor').modal();
    }

    function edit(id) {
        $.post("instructors_setdata.php",
            {
                new: id,
                order: 2
            },
            function(data, status){
                var result = JSON.parse(data);

                $('#new').val(result[0].id);
                $('#c_image').val(result[0].certificate);
                $('#first_name').val(result[0].first_name);
                $('#last_name').val(result[0].last_name);
                $('#user_id').val(result[0].user_id);
                $('#email').val(result[0].email);
                $('#role').val(result[0].role);
                $('#password').val(result[0].password);
                $('#account_type').val(result[0].account_type);
                $('#details').val(result[0].details);
                $('#postal').val(result[0].postal);
//                $('#image_source').attr("src",result[0].certificate);


                $('#modal-new-instructor').modal();
            }
        );
    }

    function del(id) {
        swal({
                title: "",
                text: "Are you sure delete?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#EF5350",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm){
                if (isConfirm) {
                    $.post('instructors_setdata.php',
                        {
                            new: id,
                            order: 1
                        },
                        function(data, status){
                            $table.DataTable().ajax.reload();
                        }
                    );
                }
            });
    }

    function set_dialog() {
//        var role = $('#role').val();
//        if (role == 'Admin'){
//            $('.inst').hide();
//        }else
//            $('.inst').show();
    }

    function add_new() {

//        if (($('#first_name').val() == "") || ($('#last_name').val() == "") || ($('#email').val() == "")
//            || ($('#user_id').val() == "") || ($('#role').val() == "") || ($('#password').val() == "") || ($('#account_type').val() == "")
//            || ($('#details').val() == "") || ($('#postal').val() == "")){
//            swal({
//                title: "",
//                text: "You must insert your profile",
//                type: "warning",
//                showCancelButton: true,
//                confirmButtonColor: "#EF5350",
//                confirmButtonText: "Yes",
//                cancelButtonText: "No",
//                closeOnConfirm: true,
//                closeOnCancel: true
//            });
//            return;
//        }
//
//        $.post("instructors_setdata.php",
//            {
//                new: $('#new').val(),
//                first_name: $('#first_name').val(),
//                last_name: $('#last_name').val(),
//                user_id: $('#user_id').val(),
//                email: $('#email').val(),
//                role: $('#role').val(),
//                password: $('#password').val(),
//                account_type: $('#account_type').val(),
//                details: $('#details').val(),
//                postal: $('#postal').val(),
//                c_image: $('#c_image').val(),
//            },
//            function(data, status){
//                $('#modal-new-instructor').modal("hide");
//                $table.DataTable().ajax.reload();
//            }
//        );
    }

    function show_image(id) {
        $.post("instructors_setdata.php",
            {
                new: id,
                order: 2
            },
            function(data, status){
                var result = JSON.parse(data);

                $('#image_source').attr("src",result[0].certificate);
                $('#modal-image').modal();
            }
        );
    }
</script>
