<?php include("connect_db.php");
    if ($_POST['id']){
        $id = $_POST['id'];
        $instructor = $_POST['instructor'];
        $sql = "UPDATE bookings SET payment_status='confirmed by instructor',
        instructor = (SELECT id from user where user_id = '".$instructor."') WHERE id=".$id;
        if ($conn->query($sql) === TRUE) {

            $sql = "SELECT a.name student_name, a.email, a.booking_number, a.transmission, b.* FROM bookings a, courses b
                    where a.id = '{$id}' and a.course = b.id";
            $result  = $conn->query($sql);

            $data = array();
            while ($row = $result->fetch_assoc()) {
                array_push($data, $row);
            }

            $name = $data[0]['student_name'];
            $email = $data[0]['email'];
            $booking_number = $data[0]['booking_number'];
            $type = $data[0]['type'];
            $course_name = $data[0]['name'];
            $description = $data[0]['description'];
            $transmission = $data[0]['transmission'];
            $price = ($transmission == "Manual" ? $data[0]['manual_price'] : $data[0]['automatic_price']);
            $note = $data[0]['note'];

            $subject = 'Get License Fast - Full Payment Request';
            $headers = "From: Get License Fast <info@getlicensefast.co.uk> \r\n";
            $headers .= "Reply-To: Get License Fast <info@getlicensefast.co.uk> \r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $message = "Hi ".$name.",<br><br>";
            $message .="Course request details are below. <br>";
            $message .="<br><strong>Job Number: </strong>".$booking_number;
            $message .="<br><strong>Course Name: </strong>".$course_name;
            $message .="<br><strong>type: </strong>".$type;
            $message .="<br><strong>Description: </strong>".$description;
            $message .="<br><strong>Price: </strong>".$price;
            $message .="<br><strong>Note: </strong>".$note;
            $message .="<br>You are required to do full payment";
            $message .="Thank you<br><br>";
            $message .="Get License Fast<br>";
            $message .="www.getlicensefast.co.uk<br><br>";

            mail($email , $subject, $message, $headers);

            $result = 1;
        } else {
            $result = 0;
        }
        echo $result;
    }