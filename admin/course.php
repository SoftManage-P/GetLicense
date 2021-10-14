<?php include("course_header.php");?>
<?php include("connect_db.php");?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Courses
            <small>advanced tables</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#"><i class="fa fa-dashboard"></i> Courses</a>
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Courses</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-xs-2" style="float: right">
                            <button class="btn btn-block btn-primary" onclick="add_new_modal()"><i class="fa fa-plus"></i>&nbsp;Add New Course</button>
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
<div class="modal fade" id="modal-new-course">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Course</h4>
            </div>
            <div class="modal-body">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="course_setdata.php" method="post" id="add_course">
                        <div class="box-body">
                            <input id="new" name="new" value="" hidden>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Type</label>
                                        <input class="form-control" id="type" name="create[type]" placeholder="Enter Course Type">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Automatic Price</label>
                                        <input class="form-control" id="automatic_price" name="create[automatic_price]" placeholder="Automatic Price" pattern="^[0-9.]+$" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input class="form-control" id="name" name="create[name]" placeholder="Enter Course Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Manual Price</label>
                                        <input class="form-control" id="manual_price" name="create[manual_price]" placeholder="Manual Price" pattern="^[0-9.]+$" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea class="form-control" id="description" name="create[description]" placeholder="Enter Course Description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Note</label>
                                        <input class="form-control" id="note" name="create[note]" placeholder="Note">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="add_new()">Save</button>
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
            // format function for row details

            $table.dataTable({
                "ordering": true,
                "info": true,
                "searching": true,
                "ajax": {
                    "type": "POST",
                    "async": true,
                    url: "course_getdata.php",
                    "data": '',
                    "dataSrc": "data",
                    "dataType": "json",
                    "cache":    false,
                },
                "columnDefs": [
                    {
                        "targets": [7],
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
                    { "title": "No", "data": "no", "class": "text-left", "width": '5%' },
                    { "title": "Course Type", "data": "type", "class": "text-left", "width":'10%'},
                    { "title": "Name", "data": "name", "class": "text-left", "width":'15%' },
                    { "title": "Description", "data": "description", "class": "text-left", "width":'20%',
                        mRender: function(data, type, row) {
                            if (data.length > 30)
                                return data.substr(0, 30) + '...';
                            return data;
                        }
                    },
                    { "title": "Automatic Price", "data": "automatic_price", "class": "text-left", "width":'8%' },
                    { "title": "Manual Price", "data": "manual_price", "class": "text-left", "width":'8%' },
                    { "title": "Note", "data": "note", "class": "text-left", "width":'20%' },
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

    function edit(id) {
        $.post("course_setdata.php",
            {
                new: id,
                order: 2
            },
            function(data, status){
                var result = JSON.parse(data);
                $('#new').val(result[0].id);
                $('#type').val(result[0].type);
                $('#name').val(result[0].name);
                $('#description').val(result[0].description);
                $('#automatic_price').val(result[0].automatic_price);
                $('#manual_price').val(result[0].manual_price);
                $('#note').val(result[0].note);

                $('#modal-new-course').modal();
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
                    $.post("course_setdata.php",
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

    function add_new_modal() {
        $('#new').val(0);
        $('#type').val("");
        $('#name').val("");
        $('#description').val("");
        $('#automatic_price').val("");
        $('#manual_price').val("");
        $('#note').val("");

        $('#modal-new-course').modal();
    }

    function add_new() {
        if (($('#type').val() == "") || ($('#name').val() == "") || ($('#description').val() == "")
            || ($('#automatic_price').val() == "") || ($('#manual_price').val() == "") || ($('#note').val() == "")){
            swal({
                title: "",
                text: "Insert full information!",
                type: "warning",
                showCancelButton: false,
                confirmButtonColor: "#EF5350",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: true,
                closeOnCancel: true
            });
            return;
        }
        $.post("course_setdata.php",
            {
                new: $('#new').val(),
                type: $('#type').val(),
                name: $('#name').val(),
                description: $('#description').val(),
                automatic_price: $('#automatic_price').val(),
                manual_price: $('#manual_price').val(),
                note: $('#note').val()
            },
            function(data, status){
                $('#modal-new-course').modal("hide");
                $table.DataTable().ajax.reload();
            }
        );
    }
</script>
