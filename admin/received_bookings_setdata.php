<?php include("connect_db.php");

    if (!empty($_POST['new'])){
        $id = $_POST['new'];
    }

    if (!empty($_POST['order']))
        $order = $_POST['order'];

    if (!empty($_POST['booking_number'])){
        $booking_number = $_POST['booking_number'];
    }

    if (!empty($_POST['lessonDate']))
        $lessonDate = $_POST['lessonDate'];

    if (!empty($_POST['name']))
        $name = $_POST['name'];

    if (!empty($_POST['email']))
        $email = $_POST['email'];

    if (!empty($_POST['phone']))
        $phone = $_POST['phone'];

    if (!empty($_POST['transmission']))
        $transmission = $_POST['transmission'];

    if (!empty($_POST['theoryTest']))
        $theoryTest = $_POST['theoryTest'];

    if (!empty($_POST['practicalTest']))
        $practicalTest = $_POST['practicalTest'];

    if (!empty($_POST['payment_status']))
        $payment_status = $_POST['payment_status'];

    if (!empty($_POST['instructor']))
        $instructor = $_POST['instructor'];

    if (!empty($_POST['postal']))
        $postal = $_POST['postal'];

    if (!empty($_POST['course'])){
        $course = $_POST['course'];
    }

    if (!empty($order)){
        if ($order == 2){
            $sql = "SELECT * FROM bookings WHERE id=".$id;
            $result = $conn->query($sql);
            $data = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    array_push($data, $row);
                }
            }
            $result = json_encode($data);
        }else{
            $sql = "DELETE FROM bookings WHERE id=".$id;

            if ($conn->query($sql) === TRUE) {
                $result = 1;
            } else {
                $result = 0;
            }
        }
    }else{
        if (!empty($id)){
            $date = date('Y-m-d H:i:s');
            if ($id == -1){
                $sql = "INSERT INTO bookings (booking_number, course, name, email, phone, postal, lessonDate, transmission
                      , theoryTest, practicalTest, date, payment_status, instructor)
                    VALUES ('{$booking_number}', '{$course}', '{$name}', '{$email}', '{$phone}', '{$postal}', '{$lessonDate}'
                    , '{$transmission}', '{$theoryTest}', '{$practicalTest}', '{$date}', '{$payment_status}', '{$instructor}')";

                if ($conn->query($sql) === TRUE)
                    $result = 1;
                else
                    $result = 0;
            }else{
                $sql = "UPDATE bookings SET booking_number='{$booking_number}', course='{$course}', name='{$name}', email='{$email}'
                  , phone='{$phone}', postal='{$postal}', lessonDate='{$lessonDate}', transmission='{$transmission}'
                  , theoryTest='{$theoryTest}', practicalTest='{$practicalTest}', date='{$date}', payment_status='{$payment_status}'
                  , instructor='{$instructor}'
                 WHERE id=".$id;

                if ($conn->query($sql) === TRUE) {

                    if(isset($instructor) && $payment_status == "full paid"){
                        $sql = "SELECT a.first_name, a.last_name, a.email instructor_email, b.booking_number, b.name,
                        b.email, b.phone FROM user a, bookings b WHERE a.id = b.instructor and b.id = '{$id}'";

                        $result = $conn->query($sql);
                        $data = array();
                        while ($row = $result->fetch_assoc()) {
                            array_push($data, $row);
                        }

                        $instructor_name = $data[0]['first_name']." ".$data[0]['last_name'];
                        $instructor_email = $data[0]['instructor_email'];
                        $booking_number = $data[0]['booking_number'];
                        $student_name = $data[0]['name'];
                        $student_email = $data[0]['email'];
                        $phone = $data[0]['phone'];

                        $subject = 'Get License Fast - Job Confirmed';
                        $headers = "From: Get License Fast <info@getlicensefast.co.uk> \r\n";
                        $headers .= "Reply-To: Get License Fast <info@getlicensefast.co.uk> \r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                        $message = "Hi ".$instructor_name.",<br><br>";
                        $message .="Student details are below. <br>";
                        $message .="<br><strong>Name: </strong>".$student_name;
                        $message .="<br><strong>Email: </strong>".$student_email;
                        $message .="<br><strong>Phone: </strong>".$phone;
                        $message .="Get License Fast<br>";
                        $message .="www.getlicensefast.co.uk<br><br>";

                        mail($instructor_email , $subject, $message, $headers);

                        $message = "Hi ".$student_name.",<br><br>";
                        $message .="Instructor details are below. <br>";
                        $message .="<br><strong>Name: </strong>".$instructor_name;
                        $message .="<br><strong>Email: </strong>".$instructor_email;
                        $message .="Get License Fast<br>";
                        $message .="www.getlicensefast.co.uk<br><br>";

                        mail($student_email , $subject, $message, $headers);
                    }

                    $result = 1;
                } else {
                    $result = 0;
                }
            }
        }

        if ((!empty($_POST['instructor'])) && ($_POST['instructor'] == 1)){
            $instructor = $_POST['instructor'];

            $sql = "SELECT * FROM user WHERE role= 'Instructor'";
            $result = $conn->query($sql);
            $data = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    array_push($data, $row);
                }
            }
            $temp['instructor'] = $data;

            $sql = "SELECT * FROM courses";
            $result = $conn->query($sql);
            $data = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    array_push($data, $row);
                }
            }
            $temp['course'] = $data;
            $result = json_encode($temp);
        }
    }
    echo $result;