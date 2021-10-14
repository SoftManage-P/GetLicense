<?php include("connect_db.php");
    // Start the session
    session_start();

    if (!empty($_GET['user_Id']))
        $user_id = $_GET['user_Id'];
    if (!empty($_GET['booking']))
        $booking = $_GET['booking'];

    if ((!empty($_SESSION['user'])) && ($_SESSION['user']['user_id'] == $user_id)){
        $sql = "SELECT a.*,
                    c.name course_name
                    FROM bookings a 
                    JOIN `courses` c ON c.id = a.course
                    WHERE a.booking_number = '{$booking}'
                    ";

        $data = array();
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                array_push($data, $row);
            }
            $booking = $data[0];
        }
        $mod = 1;
    }else{

        if (!empty($_GET['user_Id']))
            $user_id = $_GET['user_Id'];
        if (!empty($_GET['password']))
            $password = $_GET['password'];

        if (!empty($_SESSION['count']))
            $_SESSION['count'] = 1;
        else{
            session_unset();
            $_SESSION['count'] = 0;
            $_SESSION['user_Id'] = $user_id;
        }

//        $password = (!empty($password))?md5($password):'';

        if (($_SESSION['count'] == 1) && ($user_id == $_SESSION['user_Id'])){
            $sql = "SELECT * FROM user WHERE user_id = '{$user_id}' AND password = '{$password}'";

            $data = array();
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    array_push($data, $row);
                }
                $_SESSION['user'] = $data[0];

                $sql = "SELECT a.*, c.name course_name
                    FROM bookings a
                    JOIN `courses` c ON c.id = a.course
                    WHERE a.booking_number = '{$booking}'
                    ";

                $data = array();
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        array_push($data, $row);
                    }
                    $booking = $data[0];
                    $mod = 1;
                }
            }else
                $mod = 0;

        }else
            $mod = 0;

        $_SESSION['count'] = 1;
    }

    if ($mod == 1):?>
    <?php include("confirm_booking_header.php");?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Confirm Booking
                    <small>advanced tables</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="#"><i class="fa fa-dashboard"></i>Confirm Booking</a>
                    </li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Booking Information</h3>
                            </div>
                            <!-- /.box-header -->
                            <form action="confirm_booking.php" method="post">
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <input id="id" name="id" value="<?=$booking['id'];?>" hidden>
                                        <input id="instructor_id" name="instructor_id" value="<?=$user_id;?>" hidden>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Booking Number</label>
                                                <input class="form-control" id="booking_number" name="create[booking_number]" value="<?=$booking['booking_number']?>" placeholder="Booking Number">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Lesson Date</label>
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control pull-right" id="lessonDate" value="<?=$booking['lessonDate']?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Phone Number</label>
                                                <input class="form-control" id="phone" name="create[phone]" placeholder="Phone Number" value="<?=$booking['phone']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Postal Code</label>
                                                <input class="form-control" id="postal" name="create[postal]" placeholder="Postal Code" value="<?=$booking['postal']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Theory Test</label>
                                                <input class="form-control" id="theoryTest" value="<?=$booking['theoryTest']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Course</label>
                                                <input class="form-control" id="course" value="<?=$booking['course_name']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input class="form-control" id="name" name="create[name]" placeholder="Name" value="<?=$booking['name']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input class="form-control" id="email" name="create[email]" placeholder="Email" value="<?=$booking['email']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Transmission</label>
                                                <input class="form-control" id="transmission" value="<?=$booking['transmission']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Status</label>
                                                <input class="form-control" id="payment_status" value="<?=$booking['payment_status']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Practical Test</label>
                                                <input class="form-control" id="practicalTest" value="<?=$booking['practicalTest']?>">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" style="width: 20%; float: right" onclick="confirm()" class="btn btn-block btn-primary" id="cbutton">
                                        <?= ($booking['payment_status'] == 'confirmed by instructor')?'Confirmed by Instructor':'Confirm';?>
                                    </button>
                                </div>
                            </form>
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
        <script>
            function confirm() {
                 if ($('#payment_status').val() == 'confirmed by instructor'){
                    swal({
                        title: "",
                        text: "Current Booking has assigned other user!",
                        type: "warning",
                        showCancelButton: false,
                        confirmButtonColor: "#EF5350",
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                        closeOnConfirm: true,
                        closeOnCancel: true
                    });
                }else{
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
                                $.post("confirm_booking.php",
                                    {
                                        id : $('#id').val(),
                                        instructor : $('#instructor_id').val()
                                    },
                                    function(data, status){
                                         location.reload();
                                    });
                            }
                        });
                }
            }
        </script>
    <?php include("common_footer.php");?>
    <?php else:?>
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
            <link rel="stylesheet" href="../assets/css/sweetalert.css">
            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

            <!-- Google Font -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        </head>
        <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>Login Administrator</b></a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body" style="font-size: 1.3em">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="confirm_bookings.php", id = "sign_form">
                    <div class="errMsg" style="margin-bottom: 1rem;"></div>
                    <div class="form-group has-feedback">
                        <input class="form-control" placeholder="User ID" name="user_Id" id="user_Id">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <input type="text" class="form-control" value="<?=$_GET['booking']?>" name="booking" id="booking" style="display: none">
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-4" style="float: right">
                            <button type="button" class="btn btn-primary btn-block btn-flat" onclick="signin()">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->
        <!-- jQuery 3 -->
        <script src="../assets/scripts/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="../assets/scripts/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="../assets/scripts/icheck.min.js"></script>
        <script src="../assets/scripts/sweet_alert.min.js"></script>
        <script src="../assets/scripts/md5.min.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' /* optional */
                });
            });
            function signin(){
                $('#password').val(md5($('#password').val()));
                $('#sign_form').submit();
            }

            var msg 		= $('.errMsg');

            msg.html('<div class="alert alert-danger"><p class="m-0">Only indicated instructor can access!</p></div>');
        </script>
        </body>
        </html>

    <?php endif;?>
