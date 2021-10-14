<?php
session_start();
if($_POST){
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "getlicensefast";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $user = $_POST['user'];
    $password = md5($_POST["password"]);

    $sql = "SELECT * FROM user WHERE user_id = '{$user}' AND password = '{$password}'";
    $result = $conn->query($sql);

    $data = array();
    session_unset();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
        $_SESSION['user'] = $data[0];
        // output data of each row
        $result = 1;
    } else {
        $result = 2;
        $_SESSION["login_error"] = "Your user id or password incorrect!";
    }
}?>

<script>
    var result = <?=$result?>;
    if (result == 1)
        location.href = "received_bookings.php";
    else
        location.href = "login.php";
</script>