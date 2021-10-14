<?php
include"constants.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, minimal-ui">
	<title>Get License Fast Driving test Courses & Fast Track Driving schools Manchester & UK</title>
	<meta name="keywords" content="fast track driving licence, book driving course, intense driving course">
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
	<meta name="description" content="fast track driving licence. Take our intense driving course. Pass your driving test. Intensive Driving Courses Manchester & UK">
	
	<link href="assets/styles/app.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/styles/print.css" media="print">

<meta property="og:title" content="Get License Fast Booking"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="https://getlicensefast.co.uk/bookup"/>
<meta property="og:image" content="https://getlicensefast.co.uk/assets/images/logo.png"/>
<meta property="og:site_name" content="Get LIcense Fast"/>
<meta property="og:description" content="fast track driving licence. Take our intense driving course. Pass your driving test. Intensive Driving Courses Manchester & UK"/>

</head>

	<body class="page">
		<?php include"popups.php"; ?>
		
		<?php include"header.php"; ?>
		
			<ul>
				<li class="card-list__item">
					<div class="card card_theme_cover">
						<div class="container">
							<div class="row">
								<div class="col-md-3" style="text-align:center;">
									<figure class="card__fig">
									   
										<img src="assets/images/course/driving-lesson.jpg" alt="Driving Lessons" />
									</figure>
									<h3 class="card__name" style="color:#041E37;"><?php echo $row['title']; ?>£35 ONLY</h3>
								</div>
								<div class="col-md-9">
									<div class="card__head">
										<h3 class="card__name"><?php echo $row['name']; ?></h3>
										<div class="card__period"><?php echo $row['note']; ?></div>
									</div>
									<div class="card__body">
										<p class="desc"><?php echo $row['description']; ?></p>	
									</div>
									<div class="card__footer">
										<div class="row">
										
											<div class="card__price col-md-7 col-lg-6">
											<div class="card__price-item">
													<span class="card__price-value"></span></div>
												<div class="card__price-item">
													<span class="card__price-value">£<?php echo $row['automatic_price']; ?> </span></div>
													
											</div>
											<div class="card__btn-wrap col-md-5 col-lg-6">
												<a class="btn card__btn popup-protect-btn" id="<?php echo $row['id']; ?>">
													<span class="btn__text">Take Assessment Course</span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
			    </ul>
				
		</div>
		<br>
		
		<?php include"footer.php"; ?> 
	    	<?php include"footer2.php"; ?>
	</body>
</html>