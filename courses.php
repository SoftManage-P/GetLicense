<?php
include"constants.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, minimal-ui">
	<title>Fast track driving test | intensive Driving Courses | UK Driving Test Manchester</title>
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
	<meta name="description" content="At GetLicenseFast you’ll find a range of manual and automatic crash courses. Fast track driving test.">
	<link href="assets/styles/app.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/styles/print.css" media="print">
	
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
		
		<?php include"header.php"; ?>
		
		<div class="head-page">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h1 class="title-page">Courses</h1>
						<div class="breadcrumbs">
							<ul class="breadcrumbs__list">
								<li class="breadcrumbs__item">
									<a href="/" class="breadcrumbs__link">Home</a>
								</li>
								<li class="breadcrumbs__item">Courses</li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="content">
			<ul class="card-list">
			<?php 
					include("config.php"); 
					
					$sql = 'SELECT * FROM courses ORDER BY id ASC';
					
					foreach ($con->query($sql) as $row) {
						
						if($row['id']!="10")
						{
    
			?>
			
				<li class="card-list__item">
					<div class="card card_theme_cover">
						<div class="container">
							<div class="row">
								<div class="col-md-3" style="text-align:center;">
									<figure class="card__fig">
									   
										<img src="assets/images/course/driving-lesson.jpg" alt="crash course in driving test" />
									</figure>
									<h3 class="card__name" style="color:#041E37;"><?php echo $row['title']; ?>£100 DEPOSIT ONLY</h3>
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
													<span class="card__price-value">£<?php echo $row['manual_price']; ?></span>Manual</div>
												<div class="card__price-item">
													<span class="card__price-value">£<?php echo $row['automatic_price']; ?> </span>Automatic</div>
													
											</div>
											<div class="card__btn-wrap col-md-5 col-lg-6">
												<a class="btn card__btn popup-protect-btn" id="<?php echo $row['id']; ?>">
													<span class="btn__text">Book now</span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
				
				<?php }//end if
					   
					   else {
				?> 
                 
				 <li class="card-list__item">
					<div class="card card_theme_cover">
						<div class="container">
							<div class="row">
								<div class="col-md-3" style="text-align:center;">
									<figure class="card__fig">
									   
										<img src="assets/images/course/driving-lesson.jpg" alt="fast track Driving Lessons Assessment" />
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
			    
				<?php } ?>            

				<?php } //end foreach loop ?>
				
				
				</ul>
			</div>
			
		<?php include"footer.php"; ?> 
		
		
    <?php include"footer2.php"; ?> 
	
	
	
</body>
</html>