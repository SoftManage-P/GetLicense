<?php
// Start the session
session_start();
session_unset();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Administrator</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../assets/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../assets/css/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="register-page">
<div class="register-box" style="width: 600px">
    <div class="register-logo">
        <b>Sign Up</b>
    </div>
    <div class="register-box-body">

        <!-- form start -->
        <form action="register.php" method="post" id="add_course" enctype="multipart/form-data">
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
                        <div class="form-group inst">
                            <label for="exampleInputEmail1">Account Type</label>
                            <select class="form-control select2" style="width: 100%;" id="account_type" name="create[account_type]">
                                <option value="Bank">Bank</option>
                                <option value="Paypal">Paypal</option>
                            </select>
                        </div>
                        <div class="form-group inst">
                            <label for="exampleInputEmail1">Postal Code</label>
                            <input class="form-control" id="postal" name="create[postal]" placeholder="Postal Code" required>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Sign Up</button>
            </div>
        </form>
    </div>
    <!-- /.box -->
</div><!-- /.register-box -->

<!-- jQuery 2.1.3 -->
<script src="../assets/scripts/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../assets/scripts/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../assets/scripts/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
