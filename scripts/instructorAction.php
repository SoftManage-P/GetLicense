<script>


			$("#instructor").click(function(){
				
				var iName = $('#instructorName').val();
				var iEmail = $('#instructorEmail').val();
		
		
				var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		
		
			if(iName.length===0)
			{
				swal({
						  title: "Error!",
						  text: "Please enter your name.",
						  icon: "error",
						  button: "Ok",
						});
						
			   
			}	
			else if(iEmail.length===0 || !filter.test(iEmail))
			{
				swal({
						  title: "Error!",
						  text: "Please enter a valid email address.",
						  icon: "error",
						  button: "Ok",
						});
				
			}
			else
			{
				
				$.ajax({
								  url: 'action.php',
								  type: 'POST',
								  data: 'type=instructor&name='+iName+"&email="+iEmail,
								  dataType: 'text'
							 })
							 .done(function(data){
								  //console.log(data);
								  
									    if(data.trim()=='sent')
										{
											swal({
													  title: "Success!",
													  text: "Application has been received, Our representative will be get back to you within 48 hours.",
													  icon: "success",
													  button: "Ok",
												});
												
												$('#instructorName').val("");
											    $('#instructorEmail').val("");
											    	
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