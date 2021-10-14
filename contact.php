<?php
include"constants.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, minimal-ui">
	<title>Contact Us | Driving Test Courses | Fast Track Driving Lessons</title>
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
	<meta name="description" content="Contact Us about getting your driving license fast? fast track driving lesson Booking. Pass your driving test Faster">
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
	
	img {
     max-width: 100%;
    height: auto;
		}

	</style>
</head>

	<body class="page">
		
		<?php include"header.php"; ?>
		
		<div class="head-page">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h1 class="title-page">Contact</h1>
						<div class="breadcrumbs">
							<ul class="breadcrumbs__list">
								<li class="breadcrumbs__item">
									<a href="/" class="breadcrumbs__link">Home</a>
								</li>
								<li class="breadcrumbs__item">Contact Us</li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<br>
			
			
			
			<div class="content">
			<div class="address">
				<div class="address__city">
					<div class="container">
						<div class="filter filter_theme_white address__filter">
							<span class="filter__item filter__item_active">
								<span class="filter__item-text">Contact for United Kingdom UK</span>
							</span>							
						</div>
					</div>
				</div>
				
			</div>
			<div class="add-form">
				<div class="container">
					<h2 class="title">
						<span class="title__mark">Send </span>message:</h2>
				
						<div class="form__row row">
							<div class="form__row-mobile col-md-6">
								<div class="control-group control-group_fullwidth">
									<span class="control-remark control-group__item">
										<svg class="control-remark__icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="assets/images/icon.svg#icon_users"></use></svg>
									</span>
									<span class="inp">
										<span class="inp__box">
											<input class="inp__control" type="text" id="cname" placeholder="Enter your name" />
										</span>
									</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="control-group control-group_fullwidth">
									<span class="control-remark control-group__item">
										<svg class="control-remark__icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="assets/images/icon.svg#icon_mail"></use></svg>
									</span>
									<span class="inp">
										<span class="inp__box">
											<input class="inp__control" type="email" id="cemail" name="email" placeholder="Enter your E-Mail" />
										</span>
									</span>
								</div>
							</div>
						</div>
						<div class="form__row row">
							<div class="col-md-12">
								<textarea class="textarea textarea_fullwidth" id="cmessage" placeholder="Enter your message" name="message"></textarea>
							</div>
						</div>
						<div class="form__row row">
							<div class="col-md-12">
								<button class="btn btn_fullwidth" type="button" id="contact">
									<span class="btn__text">send</span>
								</button>
							</div>
						</div>
					
				</div>
			</div>
			
			<div id="addressMap" class="address__map"></div>
				<div class="address__data container">
					<div class="row">
						<div class="data col-md-4">
							<div class="address__data-item">
								<span class="address__data-value">Woodbury, 2 The Vale<br>Broadstairs<br>Kent<br>CT10 1RB</span>
								<span class="address__data-value">07927477769</span>
							</div>
						</div>						
					</div>
					<div class="row">
						<div class="col-md-12">
							<a href="mailto:info@getlicensefast.co.uk" class="address__mail">info@getlicensefast.co.uk</a>
						</div>
					</div>
				</div>
<br><br>
			
		<?php include"footer.php"; ?> 
		<?php include"footer2.php"; ?> 


	<script>
	
			$("#contact").click(function(){
		
										    
										    var name = $('#cname').val();
											var email = $('#cemail').val();
											var message = $('#cmessage').val();											
											
											var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		
		
							if(name.length===0)
							{
								swal({
										  title: "Error!",
										  text: "Please enter your name.",
										  icon: "error",
										  button: "Ok",
										});
										
							   
							}								
							else if(email.length===0 || !filter.test(email))
							{
								swal({
										  title: "Error!",
										  text: "Please enter a valid email address.",
										  icon: "error",
										  button: "Ok",
										});
								$('#email').focus();
								
							}
							else if(message.length===0)
							{
								swal({
										  title: "Error!",
										  text: "Please enter message.",
										  icon: "error",
										  button: "Ok",
										});
										
							   
							}
							else
							{
								
								$.ajax({
								  url: 'action.php',
								  type: 'POST',
								  data: 'type=contact&name='+name+"&email="+email+"&message="+message,
								  dataType: 'text'
							 })
							 .done(function(data){
								  //console.log(data);
								  
									    if(data.trim()=='sent')
										{
											swal({
													  title: "Message Sent!",
													  text: "Your message has been received, Our representative will be get back to you within 48 hours.",
													  icon: "success",
													  button: "Ok",
												});
												
												$('#cname').val("");
											    $('#cemail').val("");
											    $('#cmessage').val("");		
										}
                                        else
										{
											swal({
												  title: "Error!",
												  text: "something went wrong please try again. Report us with the following error message "+data,
												  icon: "error",
												  button: "Ok",
												});
										}	
								 									
								 						  
							 })
							 .fail(function(){
								  $('#fetchInformation').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
								  
							 });
								
							}	
											
		
			});
		
	</script>
	
	
</div>	
</body>
</html>