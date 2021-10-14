<?php include"constants.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, minimal-ui">
	<title>Driving Lessons & Fast Track Driving Courses Manchester</title>
	<meta name="keywords" content="driving test, driving school, driving instructor, fast track driving course, driving lessons, Manchester, UK">	
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
	<meta name="description" content="Need to get your driving license fast? Pass your UK driving test. Fast Track driving lessons. Learner Driving Course Manchester & UK">
	
	<link href="assets/styles/app.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/styles/print.css" media="print">
<meta property="og:title" content="Driving Lessons & Fast Track Driving Courses Manchester"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="https://getlicensefast.co.uk/"/>
<meta property="og:image" content="https://getlicensefast.co.uk/assets/images/tiser/tiser1.jpg"/>
<meta property="og:site_name" content="Get License Fast"/>
<meta property="og:description" content="Need to get your driving license fast? Pass your UK driving test. Fast Track driving lessons. Learner Driving Course Manchester & UK"/>
<meta name="google-site-verification" content="fBD6A4IY2cYD03iAVeOKdtw5aAe8TPbEAMGuTqt3uzQ" />


</head>

	<body class="page">
		<!-- ?php include"popups.php"; ?  -->
		
		<?php include"header.php"; ?>
		
		<div class="tiser">
			<?php include"slider.php"; ?>	
			<?php include("booking.php"); ?>
			<br><br>
		
			
		</div>
		
		<?php include"how-it-works.php"; ?>
		<?php include"features.php"; ?>
		<?php include"gallery.php"; ?> 
		
		
		<?php include"footer.php"; ?> 
		
		
		
	    <?php include"footer2.php"; ?>


		<input type='hidden' id='bookingNumberHome' value='<?php echo "GLF-".rand(000000,999999); ?>'>
	<script>
	
	$("#next").click(function(){
		

		var name = $('#nameHome').val();
		var email = $('#emailHome').val();
		var phone = $('#phoneHome').val()
		var postal = $('#postalHome').val();
		var course = $('#courseHome').val();
		var transmission = $('#transmissionHome').val();
		var expectedDate = $("input[name=dateBooking]").val();
		var theory = $('#theoryHome:checked').val();
		var practical = $('#practicalHome:checked').val();
		var bookingNumberHome = $('#bookingNumberHome').val();
		
		var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		
		
		if(name.length===0)
		{
			swal({
					  title: "Error!",
					  text: "Please enter your name.",
					  icon: "error",
					  button: "Ok",
					});
		    $('#name').focus(popups);
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
		else if(phone.length===0)
		{
			swal({
					  title: "Error!",
					  text: "Please enter your phone number.",
					  icon: "error",
					  button: "Ok",
					});
					
		   
		}		
      		else if(postal.length===0)
		{
			swal({
					  title: "Error!",
					  text: "Please enter your postal code.",
					  icon: "error",
					  button: "Ok",
					});
					
		   
		}		
		else if(course.length===0)
		{
			swal({
					  title: "Error!",
					  text: "Please select a course.",
					  icon: "error",
					  button: "Ok",
					});
					
		    
		}		
		else if(transmission.length===0)
		{
			swal({
					  title: "Error!",
					  text: "Please select transmission.",
					  icon: "error",
					  button: "Ok",
					});
					
		    
		}	
		else if(expectedDate.length===0)
		{
			swal({
					  title: "Error!",
					  text: "Please select expected date.",
					  icon: "error",
					  button: "Ok",
					});
					
		    
		}	
      else
		{
			/////////////////
			
			$.ajax({
								 type: 'post',
								  url: 'action.php',
								 data: 'type=addBooking&name='+name+"&email="+email+"&phone="+phone+"&postal="+postal+"&date="+expectedDate+"&transmission="+transmission+"&theoryTest="+theory+"&practicalTest="+practical+"&course="+course+"&bookingNumber="+bookingNumberHome,
								  dataType: 'text'
							 })
							 .done(function(data){
							//console.log(data);
							var result = data.trim();
							res = result.split("|");

							if(res[0].trim()=='bookingAdded')
							{ 
											//reset
											$('#bookingNumberResult').text("Your booking ID is "+res[1]);
		
											$('#name').val("");
											$('#email').val("");
											$('#phone').val("");
											$('#postal').val("");
											$('#transmission').val("");
											$('#expectedDate').val("");
											$('#course').val("");
											$('#coursePopup').val("");
											$('#bookingNumber').val("");
											$('#coursePopup').val("");											
											
											$(".popup-protect-btn").click(); //show modal
												
											$('#payment').show();
										
											if(course=='10')
											{
												$('#assessmentCourse').show();
												$('#normalCourse').hide();
											}
											else
											{
												$('#normalCourse').show();
												$('#assessmentCourse').hide();
											}
											
										
		
											
											
											$('#bookingForm').hide();
											$('#bookingButton').hide();
											
											//populate values for Paypal											
											$("input[name=item_name]").val($('#selectedItem').text());
											$(".paypalItemNumber").val($('#bookingNumber').val());
											$(".paypalEmail").val(email);

											 
												
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
			
			//////////////////			
		    
		}			
			
		
	});
	
	</script>
	
	
	
</body>
</html>