<?php
include"constants.php";
include"config.php";
include"admin/instructors.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, minimal-ui">
	<title>Get License Fast | Driving Courses | Fast Track Driving Courses</title>
	<meta name="imagetoolbar" content="no">
	<meta name="msthemecompatible" content="no">
	<meta name="cleartype" content="on">
	<meta name="HandheldFriendly" content="True">
	<meta name="format-detection" content="telephone=no">
	<meta name="format-detection" content="address=no">
	<meta name="theme-color" content="#ffffff">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<link href="assets/images/icons/favicon.ico" rel="icon">
	<meta name="description" content="Need to get your driving license fast? Take our fast track driving lessons. Pass your driving test for as little as £190. Book now!">
	<link href="assets/styles/app.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/styles/app.css" media="print">
	
	<style>
	.swal-modal
	{
		z-index:1500 !important;
	}
	.error
	{
		border: 1px solid red;
	}
	
	.i-am-centered { margin: auto; max-width: 75px;}
	
	img {
     max-width: 100%;
    height: auto;
		}

	</style>
</head>

	<body class="page">
		<?php include"popups.php"; ?>
		
		<?php include"header.php"; ?>
		
		<div class="head-page">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h1 class="title-page">Confirmed Instructor check</h1>
						<div class="breadcrumbs">
							<ul class="breadcrumbs__list">
								<li class="breadcrumbs__item">
									<a href="/" class="breadcrumbs__link">Home</a>
								</li>
								<li class="breadcrumbs__item">Confirmed Instructor check</li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<br>
			
			
			<div class="text">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							
							
							<?php
									$bookingId = $_REQUEST['booking'];
									$insId = $_REQUEST['insId'];
							        $instructorName = "";
									foreach($instructors as $inst)
									{
										if($inst['insId']==$insId)
										{
											$instructorName = $inst['name'];
											break;
										}
									}
						            
									if($instructorName != "")
									{
										
									$query = "SELECT * FROM bookings WHERE booking_number='$bookingId' AND instructor Is Null";
									$stmt = $con->prepare($query);
									$stmt->execute();
									$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
									
									
										if(count($row)<1)
										{
											echo "<h1 style='color:blue; font-weight:600;'> The course request has already been confirmed by an other instructor. The more quickly you will confirm, the more chances you will have to get bookings. Good Luck with the next booking request.</h1>";
											
											
										}
										else
										{
											
											$query = "UPDATE bookings SET instructor=:ins,payment_status='Confirmed by instructor' WHERE booking_number=:bid";
											$stmt = $con->prepare($query);
											$stmt->bindParam(':ins',$instructorName);
											$stmt->bindParam(':bid',$bookingId);
											$stmt->execute();
											
											echo "<h1 style='color:blue; font-weight:600;'> Congratulations! The course request has been assigned to you. Further details will be sent to you via email once the Booking has been paid in full</h1>";
										}
									}
									else
									{
										echo "<h1 style='color:red; font-weight:600;'> Non - Authorize instructor. You are not registered to our system. </h1>";
									}
									
							?>
						</div>
					</div>
				</div>
			</div>
			
			

			
		<?php include"footer.php"; ?> 
		<?php include"footer2.php"; ?> 


	
</body>
</html>