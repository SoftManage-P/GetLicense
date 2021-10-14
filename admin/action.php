<?php
session_start();
include("config.php");
include("instructors.php");

if($_POST['type']=='confirm')
{
	
	$bookingID = $_POST['id'];
	
	

					$stmt = $dbh->prepare("update bookings set payment_status='pending on instructor' where id=:id");
					$stmt->bindParam(':id', $bookingID);
					if($stmt->execute())
					 {
						 $stmt2 = $dbh->prepare("SELECT * FROM bookings WHERE id=:id" );
						 $stmt2->bindParam(':id', $bookingID);
						 $stmt2->execute();	
						 $row= $stmt2->fetch(PDO::FETCH_ASSOC);
						 //get requried details for the course
						
						 //Extract Course Name for Email :)
						$query = "SELECT * FROM courses WHERE id=:id";
						$stmt3 = $dbh->prepare( $query );
						$stmt3->execute(array(':id'=>$row['course']));
						$row2=$stmt3->fetch(PDO::FETCH_ASSOC);
						@extract($row2);
						$course_name = $name;
						
						 //send email to all the instructors.
						 foreach($instructors as $ins)
						 {
							
                                $name = $ins['name'];
                                $email = $ins['email'];
                                $insId = $ins['insId'];

                                $subject = 'Get License Fast - New Driving Course Request';
                                $headers = "From: Get License Fast <info@getlicensefast.co.uk> \r\n";
                                $headers .= "Reply-To: Get License Fast <info@getlicensefast.co.uk> \r\n";
                                $headers .= "MIME-Version: 1.0\r\n";
                                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                                $message = "Hi ".$name.",<br><br>";
                                $message .="A new driving course request details are below. <br>";
                                $message .="<br><strong>Post Code: </strong>".$row['postal'];
                                $message .="<br><strong>Expected date: </strong>".$row['date'];
                                $message .="<br><strong>Course: </strong>".$course_name;
                                $message .="<br><strong>Transmission: </strong>".$row['transmission'];
                                $message .="<br><strong>Theory Test: </strong>".$row['theoryTest'];
                                $message .="<br><strong>Practical Test: </strong>".$row['practicalTest'];
                                $message .="<br>The Business is now Under New Managment";
                                $message .="<br>We are paying <strong>�25/hour</strong> for every course now";
                                $message .="<br>You will be responsible for booking Theory and/or Practical tests as needed";
                                $message .="<br><br><a style='color:green; font-size:16px; text-align:center;' href='https://getlicensefast.co.uk/confirm?insId=".$insId."&booking=".$row['booking_number']."'>Click here to confirm.</a>";
                                $message .="<br><br>";
                                $message .="Thank you<br><br>";
                                $message .="Get License Fast<br>";
                                $message .="www.getlicensefast.co.uk<br><br>";

                                mail($email , $subject, $message, $headers);
						 }
						 echo "Ok";
					 }
					 
}

?>