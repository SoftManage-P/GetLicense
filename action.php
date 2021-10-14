<?php
session_start();
include("config.php");


if($_POST['type']=='contact')
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	
	$completeMessage = $name." has sent the following message ".$message. " Email ID is ".$email;
	mail("info@getlicensefast.co.uk","GLF Online Contact Query",$completeMessage,"From:no-reply@getlicensefast.co.uk");
	echo "sent";
}



if($_POST['type']=='instructor')
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	
	$completeMessage = "Interested person name is ".$name." and his Email ID is ".$email;
	mail("info@getlicensefast.co.uk","GLF Online Instructor Query",$completeMessage,"From:no-reply@getlicensefast.co.uk");
	echo "sent";
}



if($_POST['type']=='get')
{
	
		$id = intval($_REQUEST['id']);
		$query = "SELECT * FROM courses WHERE id=:id";
		$stmt = $con->prepare( $query );
		$stmt->execute(array(':id'=>$id));
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);

		 $bookingNumber = "GLF-".rand(000000,999999);
		 
		 $_SESSION['bookingNumber']=$bookingNumber;
		 $_SESSION['courseid']=$id;
		 

 
?>



<div class="popup_protect__def row">
										<div class="popup_protect__def__img col">
											<h3 id="manual1Price" style="font-size:20px; font-weight:bold; margin-top:25px;">&pound; <?php echo $manual_price;?></h3>
											<h3 id="automaticPrice" style="font-size:20px; font-weight:bold; margin-top:25px; display:none;">&pound; <?php echo $automatic_price;?></h3>
										</div>
										<div class="popup_protect__def__text col" >
										<div id="selectedItem" class="popup_protect__def__title"><?php echo $name; ?></div>
										<div class="popup_protect__def__days"><?php echo $note; ?></div>	
									
										</div>
									    <input type="hidden" name="course_name" id="course" value="<?php echo $id; ?>">
										<input type="hidden" id="bookingNumber" value="<?php echo $bookingNumber; ?>">		
</div>
<p class="desc"><?php echo $description; ?></p>

 <?php } //end if type get ?>
 
 
 <?php 
     if($_POST['type']=='addBooking')
	    { //end if type add 
	          
			  if($_POST['theoryTest']=="undefined"){
			  $theoryTest = "No";
			  }else{
				  $theoryTest = "Yes"; 
			  }
			  if($_POST['practicalTest']=="undefined"){
			  $practicalTest = "No";
			  }else{
				  $practicalTest = "Yes"; 
			  }
	      
              $stmt = $con->prepare("INSERT INTO bookings(booking_number,course, name, email,phone,postal,lessonDate,transmission,theoryTest,practicalTest) 
									VALUES (:bookingNumber,:course, :name, :email,:phone,:postal,:lessonDate,:transmission,:theoryTest,:practicalTest)");
			 
			$stmt->bindParam(':bookingNumber', $_POST['bookingNumber']);
			$stmt->bindParam(':course', $_POST['course']);
			$stmt->bindParam(':name', $_POST['name']);	
			$stmt->bindParam(':email', $_POST['email']);
			$stmt->bindParam(':phone', $_POST['phone']);
			$stmt->bindParam(':postal', $_POST['postal']);
			$stmt->bindParam(':lessonDate', $_POST['date']);
			$stmt->bindParam(':transmission', $_POST['transmission']);	
			$stmt->bindParam(':theoryTest', $theoryTest);
			$stmt->bindParam(':practicalTest', $practicalTest);
	
	$stmt->execute();

	echo "bookingAdded|".$_POST['bookingNumber'];
    
	//Extract Course Name for Email :)
	$query = "SELECT * FROM courses WHERE id=:id";
	$stmt = $con->prepare( $query );
	$stmt->execute(array(':id'=>$_POST['course']));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	extract($row);
	$course_name = $name;
		
	//Tests Included
	$theoryTest = 0;
	$practicalTest = 0;
	
	if($_POST['theoryTest']!='undefined')
	{
		$theory_test_included = "Theory Test";
        $theory_test_fee = "Theory Test Fee: <strong><span>&#163;</span>30</strong>";
		$theoryTest = 30;
       		
	}
	if($_POST['practicalTest']!='undefined')
	{
		$practical_test_included = "Practical Test";
		$practical_test_fee = "Practical Test Fee: <strong><span>&#163;</span>90</strong>";	
		$practicalTest = 90;
		
	}
	
	$final_fee = 0;
	
	if($_POST['transmission']=='manual')
	{
		$final_fee = $manual_price;
		$fee = $manual_price;
	}
	if($_POST['transmission']=='automatic')
	{
		$final_fee = $automatic_price;
		$fee = $automatic_price;
	}
	
	$normalFee = ($final_fee * 10)/100;
	$normalFee = $final_fee + $normalFee;
	
	$final_fee = $final_fee + $theoryTest + $practicalTest;
	
	$total_fee = '<h3 align="center" style="color:red;">Total Fee: <span>&#163;</span>'.$final_fee.'</h3>';
	
    //Send email now
    include("booking_email.php");	
   
 
 ?>
 
 <?php } //end if type add ?>
 
 