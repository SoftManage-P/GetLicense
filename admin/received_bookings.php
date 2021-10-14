<?php include("received_bookings_header.php");?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Received Bookings
                <small>advanced tables</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#"><i class="fa fa-dashboard"></i>Received Bookings</a>
                </li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Received Bookings</h3>
                        </div>
                        <!-- /.box-header -->
                        <?php if ($_SESSION['user']['role'] != 'Instructor'): ?>
                            <div class="box-body">
                                <div class="col-xs-3" style="float: right">
                                    <button class="btn btn-block btn-primary" onclick="add_new_modal()"><i class="fa fa-plus"></i>&nbsp;Add New Received Booking</button>
                                </div>
                            </div>
                        <?php endif;?>
                        <div class="box-body">
                            <?php if ($_SESSION['user']['role'] == 'Instructor'): ?>
                            <table id="overview_datatable1" class="table table-bordered table-hover">
                            </table>
                            <?php else:?>
                            <table id="overview_datatable" class="table table-bordered table-hover">
                            </table>
                            <?php endif;?>
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
<div class="modal fade" id="modal-new-receive">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Received Bookings</h4>
            </div>
            <div class="modal-body">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="instructors_setdata.php" method="post" id="add_course">
                        <div class="box-body">
                            <input id="new" name="new" value="" hidden>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Booking Number</label>
                                        <input class="form-control" id="booking_number" name="create[booking_number]" placeholder="Booking Number">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Lesson Date</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="lessonDate">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone Number</label>
                                        <input class="form-control" id="phone" name="create[phone]" placeholder="Phone Number">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Postal Code</label>
                                        <input class="form-control" id="postal" name="create[postal]" placeholder="Postal Code">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Theory Test</label>
                                        <select class="form-control select2" style="width: 100%;" id="theoryTest">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
<!--                                    <div class="form-group">-->
<!--                                        <label for="exampleInputEmail1">Instructor</label>-->
<!--                                        <select class="form-control select2" style="width: 100%;" id="instructor">-->
<!--                                        </select>-->
<!--                                    </div>-->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input class="form-control" id="name" name="create[name]" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input class="form-control" id="email" name="create[email]" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Transmission</label>
                                        <select class="form-control select2" style="width: 100%;" id="transmission">
                                            <option value="Manual">Manual</option>
                                            <option value="Automatic">Automatic</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Status</label>
                                        <select class="form-control select2" style="width: 100%;" id="payment_status">
                                            <option value="pending">Pending</option>
                                            <option value="full paid">Full Paid</option>
                                            <option value="pending on instructor">Pending on instructor</option>
                                            <option value="confirmed by instructor">Confirmed by instructor</option>
                                            <option value="completed">Completed</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Practical Test</label>
                                        <select class="form-control select2" style="width: 100%;" id="practicalTest">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Course</label>
                                        <select class="form-control select2" style="width: 100%;" id="course">
                                        </select>
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
    //Date picker
    $('#lessonDate').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });

    $.post("received_bookings_setdata.php",
        {
            instructor: 1,
        },
        function(data, status){
            var result = JSON.parse(data);
            var html = '';

//            if (result.instructor.length > 0){
//                for (var i = 0; i < result.instructor.length; i++){
//                    html += '<option value="' + result.instructor[i].id + '">' + result.instructor[i].user_id + '</option>';
//                }
//            }
//            $('#instructor').html(html);

            html = '';
            if (result.course.length > 0){
                for (var i = 0; i < result.course.length; i++){
                    html += '<option value="' + result.course[i].id + '">' + result.course[i].type + '</option>';
                }
            }
            $('#course').html(html);
        }
    );

    var $table = $('#overview_datatable');
    var $table1 = $('#overview_datatable1');

    jQuery(document).ready(function() {
        var datatableInit = function() {
            <?php if ($_SESSION['user']['role'] == 'Instructor'):?>
            $table1.dataTable({
                "ordering": true,
                "info": true,
                "searching": true,
                "ajax": {
                    "type": "POST",
                    "async": true,
                    url: "received_bookings_getdata.php",
                    "data": {id : <?=$_SESSION['user']['id']?>},
                    "dataSrc": "data",
                    "dataType": "json",
                    "cache":    false,
                },
                "columnDefs": [ ],
                "columns": [
                    { "title": "No", "data": "no", "class": "text-left", "width":'5%' },
                    { "title": "Booking Number", "data": "booking_number", "class": "text-left", "width":"5%" },
                    { "title": "Course", "data": "course_name", "class": "text-left", "width":'10%' },
                    { "title": "Lesson Date", "data": "lessonDate", "class": "text-left", "width":'10%' },
                    { "title": "Name", "data": "name", "class": "text-left", "width":'10%' },
                    { "title": "Email", "data": "email", "class": "text-left", "width":'20%',
                        mRender: function(data, type, row) {
                            if (data.length > 15)
                                return data.substr(0, 15) + '...';
                            return data;
                        }
                    },
                    { "title": "Phone Number", "data": "phone", "class": "text-left", "width":'10%' },
                    { "title": "Transmission", "data": "transmission", "class": "text-left", "width":'5%' },
                    { "title": "Theory Test", "data": "theoryTest", "class": "text-left", "width":'5%' },
                    { "title": "Practical Test", "data": "practicalTest", "class": "text-left", "width":'5%' },
                    { "title": "Status", "data": "payment_status", "class": "text-left", "width":'10%' ,
                        mRender: function(data, type, row) {
                            if (data == 'pending')
                                return '<div class = "label label-primary" style = "font-size : 15px;" >' + data + '</div>';
                            else if (data == 'full paid')
                                return '<div class = "label label-info" style = "font-size : 15px;" >' + data + '</div>';
                            else if (data == 'pending on instructor')
                                return '<div class = "label label-success" style = "font-size : 15px;" >' + data + '</div>';
                            else if (data == 'completed')
                                return '<div class = "label label-danger" style = "font-size : 15px;" >' + data + '</div>';
                            else
                                return '<div class = "label label-warning" style = "font-size : 15px;" >' + data + '</div>';
                        }
                    },
                    { "title": "Instructor", "data": "instructor_name", "class": "text-left", "width":'10%' },
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
            <?php else:?>
            $table.dataTable({
                "ordering": true,
                "info": true,
                "searching": true,
                "ajax": {
                    "type": "POST",
                    "async": true,
                    url: "received_bookings_getdata.php",
                    "data": '',
                    "dataSrc": "data",
                    "dataType": "json",
                    "cache":    false,
                },
                "columnDefs": [
                    {
                        "targets": [12],
                        "createdCell": function (td, cellData, rowData, row, col) {
                            var html = '';

                            if (rowData.payment_status == 'pending')
                                html += '<a type="button" class="btn btn-block btn-success" onclick="confirm(' + rowData.id + ')">Confirm</a>';
                            else
                                html += '<a type="button" class="btn btn-block btn-default" disabled>Confirm</a>'

                            $(td).html(html);
                        }
                    }, {
                        "targets": [13],
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
                    { "title": "Booking Number", "data": "booking_number", "class": "text-left", "width":"5%" },
                    { "title": "Course", "data": "course_name", "class": "text-left", "width":'10%' },
                    { "title": "Lesson Date", "data": "lessonDate", "class": "text-left", "width":'10%' },
                    { "title": "Name", "data": "name", "class": "text-left", "width":'10%' },
                    { "title": "Email", "data": "email", "class": "text-left", "width":'20%',
                        mRender: function(data, type, row) {
                            if (data.length > 15)
                                return data.substr(0, 15) + '...';
                            return data;
                        }
                    },
                    { "title": "Phone Number", "data": "phone", "class": "text-left", "width":'10%' },
                    { "title": "Transmission", "data": "transmission", "class": "text-left", "width":'5%' },
                    { "title": "Theory Test", "data": "theoryTest", "class": "text-left", "width":'5%' },
                    { "title": "Practical Test", "data": "practicalTest", "class": "text-left", "width":'5%' },
                    { "title": "Status", "data": "payment_status", "class": "text-left", "width":'10%' ,
                        mRender: function(data, type, row) {
                        if (data == 'pending')
                            return '<div class = "label label-primary" style = "font-size : 15px;" >' + data + '</div>';
                        else if (data == 'full paid')
                            return '<div class = "label label-info" style = "font-size : 15px;" >' + data + '</div>';
                        else if (data == 'pending on instructor')
                            return '<div class = "label label-success" style = "font-size : 15px;" >' + data + '</div>';
                        else if (data == 'completed')
                            return '<div class = "label label-danger" style = "font-size : 15px;" >' + data + '</div>';
                        else
                            return '<div class = "label label-warning" style = "font-size : 15px;" >' + data + '</div>';
                        }
                    },
                   { "title": "Instructor", "data": "instructor_name", "class": "text-left", "width":'10%' },
                    { "title": "Confirm", "data": "payment_status", "class": "text-left", "width":'5%' },
                    { "title": "Actions", "data": "id", "class": "text-left", "width":'5%' }
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
            <?php endif;?>
        };
        $(function() {
            datatableInit();
        });
    });

    function add_new_modal() {
        $('#new').val(-1);
        $('#booking_number').val("");
        $('#name').val("");
        $('#email').val("");
        $('#phone').val("");
        $('#postal').val("");

        $('#modal-new-receive').modal();
    }

    var instructor_info, add_info, instructor_no;
    function add_new() {
        if (($('#name').val() == "") || ($('#booking_number').val() == "") || ($('#email').val() == "")
            || ($('#lessonDate').val() == "") || ($('#postal').val() == "")){
            swal({
                title: "",
                text: "Some fields are missed!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#EF5350",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: true,
                closeOnCancel: true
            });
            return;
        }

        if ((add_info == 1) && (($('#payment_status').val() == 'confirmed by instructor' || $('#payment_status').val() == 'completed' || $('#payment_status').val() == 'full paid')
            && ($('#instructor').val() != "confirmed by instructor"))){
            swal({
                    title: "",
                    text: "Are you sure?",
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
                        $.post("received_bookings_setdata.php",
                            {
                                new : $('#new').val(),
                                booking_number: $('#booking_number').val(),
                                lessonDate: $('#lessonDate').val(),
                                name: $('#name').val(),
                                email: $('#email').val(),
                                phone: $('#phone').val(),
                                transmission: $('#transmission').val(),
                                theoryTest: $('#theoryTest').val(),
                                practicalTest: $('#practicalTest').val(),
                                payment_status: $('#payment_status').val(),
                                instructor: instructor_no,
                                postal: $('#postal').val(),
                                course: $('#course').val()
                            },
                            function(data, status){
                                $('#modal-new-receive').modal("hide");
                                $table.DataTable().ajax.reload();
                            }
                        );
                    }
                });
        }else{
            $.post("received_bookings_setdata.php",
                {
                    new : $('#new').val(),
                    booking_number: $('#booking_number').val(),
                    lessonDate: $('#lessonDate').val(),
                    name: $('#name').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    transmission: $('#transmission').val(),
                    theoryTest: $('#theoryTest').val(),
                    practicalTest: $('#practicalTest').val(),
                    payment_status: $('#payment_status').val(),
//                instructor: $('#instructor').val(),
                    postal: $('#postal').val(),
                    course: $('#course').val()
                },
                function(data, status){
                    $('#modal-new-receive').modal("hide");
                    $table.DataTable().ajax.reload();
                }
            );
        }
    }

    function edit(id) {
        $.post("received_bookings_setdata.php",
            {
                new: id,
                order: 2
            },
            function(data, status){
                var result = JSON.parse(data);

                $('#new').val(result[0].id);
                $('#booking_number').val(result[0].booking_number);
                $('#lessonDate').val(result[0].lessonDate);
                $('#name').val(result[0].name);
                $('#email').val(result[0].email);
                $('#phone').val(result[0].phone);
                $('#transmission').val(result[0].transmission);
                $('#theoryTest').val(result[0].theoryTest);
                $('#practicalTest').val(result[0].practicalTest);
                $('#payment_status').val(result[0].payment_status);
                add_info = 1;
                instructor_info = result[0].payment_status;
                instructor_no = result[0].instructor;
//                $('#instructor').val(result[0].instructor);
                $('#postal').val(result[0].postal);
                $('#course').val(result[0].course);

                $('#modal-new-receive').modal();
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
                    $.post('received_bookings_setdata.php',
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

    function confirm(id) {
        swal({
                title: "",
                text: "Are you sure confirm?",
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
                    $.post('confirm.php',
                        {
                            id: id
                        },
                        function(data, status){
                            $table.DataTable().ajax.reload();
                        }
                    );
                }
            });
    }
</script>