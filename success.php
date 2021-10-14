<?php
include"constants.php";
?>
<!DOCTYPE html>
<html>
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
	<meta name="description" content="Need to get your driving license fast? Take our intensive driving course. Pass your driving test for as little as £190. Book now!">
	<link href="assets/styles/app.css" rel="stylesheet">
	
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
	</style>
</head>

	<body class="page">
		<?php include"popups.php"; ?>
		
		<?php include"header.php"; ?>
		
		<div class="head-page">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h1 class="title-page">Success</h1>
						<div class="breadcrumbs">
							<ul class="breadcrumbs__list">
								<li class="breadcrumbs__item">
									<a href="/" class="breadcrumbs__link">Home</a>
								</li>
								<li class="breadcrumbs__item">Thank You</li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="text text_bottom-m_no">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<br /><br />
							<h1 style="font-size:18px; color:black;">Thank you for your deposit. You will receive a confirmation email from paypal shortly.</h1>
<h2>We will now try to allocate you a driving Instructor to carry out your choosen course</h2>
<h2>You will receive further details by Email when we have done this</h2>				
							<br /><br /><br /><br /><br /><br /><br /><br />
						
						</div>
					</div>
					
					
					
				</div>
				
				
				
			</div>
			
		<?php include"footer.php"; ?> 
		
		
		
	

	 <div class="dev">
			<div class="container">
				<div class="dev__item">
					<a href="/" class="dev__link">Copyright © <?php echo date("Y"); ?> Get License Fast Pvt Ltd.</a>
				</div>
			</div>
		</div>
	<script>
		
		// When the user scrolls down 20px from the top of the document, show the button
			window.onscroll = function() {scrollFunction()};

			function scrollFunction() {
				if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
					document.getElementById("myBtn").style.display = "block";
				} else {
					document.getElementById("myBtn").style.display = "none";
				}
			}

			// When the user clicks on the button, scroll to the top of the document
			function topFunction() {
				document.body.scrollTop = 0; // For Safari
				document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
			} 
			
			
	</script>
	
	<script src="assets/scripts/jquery-3.1.0.min.js"></script>
	<script src="assets/scripts/jquery.formstyler.js"></script>
	<script src="assets/scripts/jquery.magnific-popup.min.js"></script>
	<script src="assets/scripts/swiper.min.js"></script>
	<script src="assets/scripts/jquery.knob.js"></script>
	<script src="assets/scripts/rome.min.js"></script>
	<script src="assets/scripts/imagesloaded.min.js"></script>
	<script src="assets/scripts/isotope.pkgd.min.js"></script>
	<script src="assets/scripts/sweetAlert.js"></script>
	<script src="assets/scripts/app.js"></script>

	<?php include("scripts/booking.php"); ?>
	
	
	
</body>
</html>