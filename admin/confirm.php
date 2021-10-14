<?php include("connect_db.php");

    $id = $_POST['id'];

    $sql = "UPDATE bookings SET payment_status='pending on instructor' WHERE id=".$id;

    if ($conn->query($sql) === TRUE) {
        $result = 1;
    } else {
        $result = 0;
    }

    $sql = "SELECT a.*, c.name course_name
        FROM bookings a 
        JOIN `courses` c ON c.id = a.course
        WHERE a.id = ".$id;
    $result = $conn->query($sql);
    $data = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
    }
    $data = $data[0];

    $e_local = explode(' ', $data['postal']);
    $sql = "SELECT * FROM user WHERE role= 'Instructor' ";

    if (!empty($e_local)){
        $sql .= " AND (";
//        for ($i = 0; $i < count($e_local); $i++){
//            if ($i == count($e_local) - 1)
                $sql .= " " . " postal like '%" . $e_local[0] . "%')";
//            else
//                $sql .= " " . " postal like '%" . $e_local[$i] . "%' OR ";
//        }
    }

    $result = $conn->query($sql);
    $user = array();

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            array_push($user, $row);
        }
    }

    if (!empty($user)){
        foreach ($user as $item){

            $name = $item['first_name'] . ' ' . $item['last_name'];
            $email = $item['email'];
            $insId = $item['user_id'];

            $subject = 'Get License Fast - New Driving Course Request';
            $headers = "From: Get License Fast <info@getlicensefast.co.uk> \r\n";
            $headers .= "Reply-To: Get License Fast <info@getlicensefast.co.uk> \r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $message = "Hi ".$name.",<br><br>";
            $message .="A new driving course request details are below. <br>";
            $message .="<br><strong>Post Code: </strong>".$data['postal'];
            $message .="<br><strong>Expected date: </strong>".$data['date'];
            $message .="<br><strong>Course: </strong>".$data['course_name'];
            $message .="<br><strong>Transmission: </strong>".$data['transmission'];
            $message .="<br><strong>Theory Test: </strong>".$data['theoryTest'];
            $message .="<br><strong>Practical Test: </strong>".$data['practicalTest'];
            $message .="<br>The Business is now Under New Managment";
            $message .="<br>We are paying <strong>£25/hour</strong> for every course now";
            $message .="<br>You will be responsible for booking Theory and/or Practical tests as needed";
            $message .="<br><br><a style='color:green; font-size:16px; text-align:center;' href='https://getlicensefast.co.uk/admin/confirm_bookings?user_Id=".$insId."&booking=".$data['booking_number']."'>Click here to confirm.</a>";
            $message .="<br><br>";
            $message .="Thank you<br><br>";
            $message .="Get License Fast<br>";
            $message .="www.getlicensefast.co.uk<br><br>";

            mail($email , $subject, $message, $headers);
        }
    }

echo 1;