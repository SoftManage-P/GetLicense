<?php include("profile_header.php");?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Profile
                <small>advanced tables</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#"><i class="fa fa-dashboard"></i>Profile</a>
                </li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Change My Profile</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form action="profile_setdata.php" id="save_profile" method="post" enctype="multipart/form-data">
                            <input id="new" name="new" value="" hidden>
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
                                        <input class="form-control" id="password" name="create[password]" type="password" placeholder="Password" required>
                                    </div>
                                    <?php if ($_SESSION['user']['role'] == 'Instructor'): ?>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Details</label>
                                        <input class="form-control" id="details" name="create[details]" placeholder="Details" required>
                                    </div>
                                    <?php endif;?>
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
                                        <select class="form-control select2" style="width: 100%;" id="role" name="create[role]">
                                            <option value="Admin">Admin</option>
                                            <option value="Instructor">Instructor</option>
                                        </select>
                                    </div>
                                    <?php if ($_SESSION['user']['role'] == 'Instructor'): ?>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Account Type</label>
                                        <select class="form-control select2" style="width: 100%;" id="account_type" name="create[account_type]">
                                            <option value="Bank">Bank</option>
                                            <option value="Paypal">Paypal</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Postal</label>
                                        <input class="form-control" id="postal" name="create[postal]" placeholder="Enter Postal" required>
                                    </div>
                                    <?php endif;?>
                                </div>
                            </div>
                            <?php if ($_SESSION['user']['role'] == 'Instructor'): ?>
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <label for="exampleInputEmail1">Certificate</label>
                                    <div class="form-group">
                                        <input type="file" name="certificate" id="certificate">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <img style="width: 100%; height: 70%" src="<?=$_SESSION['user']['certificate'];?>">
                                </div>
                            </div>
                            <?php endif;?>
                            <!-- /.box-body -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" style="margin-right: 23px; margin-top: 1em">Save</button>
                            </div>
                            </form>
                        </div>

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
<?php include("common_footer.php");?>
<?php
    $user = $_SESSION['user'];
?>
<script>
//    $('.select2').select2();

jQuery(document).ready(function() {
//    var user = JSON.parse(<?//= json_encode($user);?>//);

    $('#new').val("<?=$user['id']?>");
    $('#first_name').val("<?=$user['first_name']?>");
    $('#user_id').val("<?=$user['user_id']?>");
    $('#password').val("<?=$user['password']?>");
    $('#last_name').val("<?=$user['last_name']?>");
    $('#email').val("<?=$user['email']?>");
    $('#role').val("<?=$user['role']?>");

    if ("<?=$user['role']?>" == 'Instructor'){
        $('#account_type').val("<?=$user['account_type']?>");
        $('#details').val("<?=$user['details']?>");
        $('#postal').val("<?=$user['postal']?>");
    }
});

function add_new() {
    if ("<?=$user['role']?>" == 'Instructor'){
        if (($('#first_name').val() == "") || ($('#user_id').val() == "") || ($('#password').val() == "")
            || ($('#last_name').val() == "") || ($('#email').val() == "")  || ($('#account_type').val() == "")  || ($('#details').val() == "")){
            swal({
                title: "",
                text: "You must insert your profile",
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
    }else{
        if (($('#first_name').val() == "") || ($('#user_id').val() == "") || ($('#password').val() == "")
            || ($('#last_name').val() == "") || ($('#email').val() == "")){
            swal({
                title: "",
                text: "You must insert your profile",
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
    }

    swal({
            title: "",
            text: "Are you sure your operation?",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#EF5350",
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(isConfirm){
            if (isConfirm) {
                if ("<?=$user['role']?>" == 'Instructor'){
                    $.post("profile_setdata.php",
                        {
                            new: $('#new').val(),
                            first_name: $('#first_name').val(),
                            user_id: $('#user_id').val(),
                            password: $('#password').val(),
                            last_name: $('#last_name').val(),
                            email: $('#email').val(),
                            role: $('#role').val(),
                            account_type: $('#account_type').val(),
                            details: $('#details').val(),
                        },
                        function(data, status){
                            location.reload();
                        }
                    );
                }else{
                    $.post("profile_setdata.php",
                        {
                            new: $('#new').val(),
                            first_name: $('#first_name').val(),
                            user_id: $('#user_id').val(),
                            password: $('#password').val(),
                            last_name: $('#last_name').val(),
                            email: $('#email').val(),
                            role: $('#role').val(),
                        },
                        function(data, status){
                            location.reload();
                        }
                    );
                }
            }
        });
}
</script>
