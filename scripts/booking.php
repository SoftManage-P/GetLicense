<script>

		
	var course;
	var res;
		
	var Popup = { this: $('.popup'), wrapper: $('.popup__wrapper'), close: $('.popup__close'), bg: $('.popup__bg')},
			body = $('body'),
			w = $(window);
			
			
	function abs(object) {
			$(this).removeAttr('href');
			var scrollTop = w.scrollTop(),
			height = body.height();
			object.css('padding-top', scrollTop+20).fadeIn(500).height(height-scrollTop-20);
		}
			
			
			$('#radio-1').click(function() {
				$('#manual1Price').hide();
				$('#automaticPrice').show();
				
			});
			
			$('#radio-2').click(function() {
				$('#manual1Price').show();
				$('#automaticPrice').hide();
				
			});
			
			
			
			
		$('#selectCourse').change(function() 
		{
			
			var courseid = $('#coursePopup').val();
			course = $('#coursePopup').val();
			
			
			$.ajax({
											  url: 'action.php',
											  type: 'POST',
											  data: 'type=get&id='+courseid,
											  dataType: 'html'
										 })
										 .done(function(data){
											  //console.log(data);
											  var flag = data.search("Warning"); //don't show anything in case of warning || error
											  if(flag<1){
											  $('#fetchInformation').html(data); // load here  
											  }	
											 else
											  {
												   $('#fetchInformation').html(""); // load here 
											  }	
										 })
										 .fail(function(){
											  $('#fetchInformation').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
											  
										 });

		
		});
		
	
			
	$('.popup-protect-btn').click(function() {
			$(this).removeAttr('href');
			abs($('.popup_protect'));
			
			$('#payment').hide();
			$('#bookingForm').show();
			$('#bookingButton').show();
											
			$('#fetchInformation').html("");
			$('#selectCourse').show();
			course = $(this).attr('id'); //selected course
			
			
			  var courseid = $(this).attr('id');
			  if(courseid!=undefined)
			  {
				  $('#selectCourse').hide();
				  $('#selectCourse').val("");//reset course
				  
							$.ajax({
											  url: 'action.php',
											  type: 'POST',
											  data: 'type=get&id='+$(this).attr('id'),
											  dataType: 'html'
										 })
										 .done(function(data){
											  //console.log(data);
											  $('#fetchInformation').html(data); // load here  
																	  
										 })
										 .fail(function(){
											  $('#fetchInformation').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
											  
										 });
										 
			  }
			  else
			  {
				  course = $('#selectCourse').val();
			  }
			
			
			});
			
	
	
		
		//Validation
         
		$("#bookingButton").click(function(){
		
	
		var name = $('#name').val();
		var email = $('#email').val();
		var phone = $('#phone').val();
		var postal = $('#postal').val();
		var transmission = $('#transmission').val();
		var expectedDate = $('#expectedDate').val();
		var bookingNumber = $('#bookingNumber').val();
		
		
		
		var practicalTest = $( "input[type=checkbox][name=test]:checked" ).val();
		var theoryTest = $( "input[type=checkbox][name=test2]:checked" ).val();
		
		
		var transmission = $('input[name=transmission]:checked').val();
		// var theory = $('#theory').val()
		// var practical = $('#practical').val()
		
		var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		
		
			
		if(course.length===0)
		{
			swal({
					  title: "Error!",
					  text: "Please select driving lesson.",
					  icon: "error",
					  button: "Ok",
					});
					
		   
		}	
		else if(name.length===0)
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
		else if(phone.length===0)
		{
			swal({
					  title: "Error!",
					  text: "Please enter your phone.",
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
			//post to next page....
            //window.location="book/?email="+
            if(course.length===0)
			{
				selectedCourse = popupCourse.val();
			}
			else
			{
				selectedCourse = course;
			}
			
				$.ajax({
								  url: 'action.php',
								  type: 'POST',
								  data: 'type=addBooking&name='+name+"&email="+email+"&phone="+phone+"&postal="+postal+"&date="+expectedDate+"&transmission="+transmission+"&theoryTest="+theoryTest+"&practicalTest="+practicalTest+"&course="+selectedCourse+"&bookingNumber="+bookingNumber,
								  dataType: 'text'
							 })
							 .done(function(data){
								  //console.log(data);
								  res = data.split("|");
								  
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
            			
		    
		}			
			
		
	});
	
		$("#bankButton").click(function(){
			swal({
					title: "Lloyds Bank",
					text: "Account Details - Sort Code: 30-96-93 Acoount No. 00478848 Please use your booking Number for payment description. Your Booking number is "+res[1],
					icon: "info",
					button: "Ok",
				});
		});
 		
		//End Validation
		
	Popup.close.click(function() {
			Popup.this.fadeOut(500);
		});
		
		Popup.bg.click(function() {
			Popup.this.fadeOut(500);
		});
			
			
			
			
	</script>