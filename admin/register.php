<?php
include("connect_db.php");
session_start();
if($_POST){

    if(isset($_POST['create']))
        $create = $_POST['create'];

    if (!empty($create['first_name']))
        $first_name = $create['first_name'];

    if (!empty($create['last_name']))
        $last_name = $create['last_name'];

    if (!empty($create['user_id']))
        $user_id = $create['user_id'];

    if (!empty($create['email']))
        $email = $create['email'];

    $role = "Instructor";

    if (!empty($create['password']))
        $password = $create['password'];

    if (!empty($create['account_type']))
        $account_type = $create['account_type'];

    if (!empty($create['details']))
        $details = $create['details'];

    if (!empty($create['postal']))
        $postal = $create['postal'];

    $date = date('Y-m-d H:i:s');
    $password = md5($password);

    $sql = "SELECT * from user WHERE user_id ='".$user_id."' OR email = '".$email."'";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        $result = -1;
    }
    else{
        $sql = "INSERT INTO user (first_name, last_name, user_id, email, role, password, account_type
                    , details, postal, created_at)
                    VALUES ('{$first_name}', '{$last_name}', '{$user_id}', '{$email}', '{$role}', '{$password}'
                    , '{$account_type}', '{$details}', '{$postal}', '{$date}')";
        if ($conn->query($sql) === TRUE) {
            $sql = "SELECT * FROM user WHERE user_id = '{$user_id}'";
            $result = $conn->query($sql);

            $data = array();
            session_unset();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    array_push($data, $row);
                }
                $_SESSION['user'] = $data[0];
            }
            $result = 1;
        }
        else{
            $result = 0;
        }
    }

}?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrator</title>
    <!-- Tell the browser to be responsive
    to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
          name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../assets/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../assets/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of
    downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../assets/css/sweetalert.css">
    <link rel="stylesheet" href="../assets/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media
    queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://
    -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<?php include("common_footer.php");?>
<script>
    var result = <?=$result?>;
    if (result == 1)
        location.href = "received_bookings.php";
    else {
        swal({
                title: "",
                text: "Existing User!",
                type: "warning",
                showCancelButton: false,
                confirmButtonColor: "#EF5350",
                confirmButtonText: "Cancel",
                cancelButtonText: "No",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm){
                location.href = 'signup.php';
            });
    }
</script>
