<?php
session_start();

if($_POST)
{
	 if(md5($_POST["password"])=="37f964e48e085a65628f2f8e97ebd481")
	 {
		 $_SESSION['auth']=1;
	 }
	 else
	 {
		 echo "<span style='color:red;'>Try again. wrong credentials...</span>";
	 }
}
?>
<html>
<head>
<title>GetLicenseFast - Bookings</title>

<style>
/* Absolute Center Spinner */
.loading {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: visible;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

/* Transparent Overlay */
.loading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.3);
}

/* :not(:required) hides these rules from IE9 and below */
.loading:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

.loading:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin-top: -0.5em;
  -webkit-animation: spinner 1500ms infinite linear;
  -moz-animation: spinner 1500ms infinite linear;
  -ms-animation: spinner 1500ms infinite linear;
  -o-animation: spinner 1500ms infinite linear;
  animation: spinner 1500ms infinite linear;
  border-radius: 0.5em;
  -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
  box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
}

/* Animation */

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
</style>
<link rel="stylesheet" type="text/css" href="datatable.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/dt-1.10.13/b-1.2.4/b-html5-1.2.4/b-print-1.2.4/fh-3.1.2/r-2.1.1/sc-1.4.2/datatables.min.css" />
</head>
<body>
<?php
if($_SESSION['auth']!=1)
{
?>
<div style="width:70%; margin: 0 auto;">
<br><br>
<form name="f1" method="post">
Enter password: <input type="password" name="password">
<input type="submit" value="Get Access" name="button">

</form>
</div>	
<?php } ?>
<?php 
if($_SESSION['auth']==1)
{
   include("config.php");

?>

<div id="loading" style="display:none;" class="loading">Loading&#8230;</div>

<div>
<h1>Get License Fast Received Bookings</h1><br>
<a href='view-instructors.php' target="blank" style="color:red; font-size:16px;">View Registered Instructors</a><br><br><br>
<table id="orders" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Id</th>
                <th>Date</th>
                <th>Booking Number</th>
				<th>Course</th>
				<th>Name</th>
				<th>Email</th>
			    <th>Phone</th>
				<th>Postal</th>
				<th>Transmission</th>
				<th>Theory Test</th>
				<th>Practical Test</th>
				<th style='color:red;'>Price</th>
				<th style='color:blue;'>Payment Status</th>
				<th style='color:green;'>Instructor</th>
				<th>Action</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Date</th>
                <th>Booking Number</th>
				<th>Course</th>
				<th>Name</th>
				<th>Email</th>
			    <th>Phone</th>
				<th>Postal</th>
				<th>Transmission</th>
				<th>Theory Test</th>
				<th>Practical Test</th>
				<th style='color:red;'>Price</th>
				<th style='color:blue;'>Payment Status</th>
				<th style='color:green;'>Instructor</th>
				<th>Action</th>
                
            </tr>
        </tfoot>
		<tbody>
<?php

foreach($dbh->query('SELECT * from bookings ORDER BY id DESC') as $row) {
	
	
	//Extract Course Name for Email :)
	$query = "SELECT * FROM courses WHERE id=:id";
	$stmt = $dbh->prepare( $query );
	$stmt->execute(array(':id'=>$row['course']));
	$row2=$stmt->fetch(PDO::FETCH_ASSOC);
	@extract($row2);
	$course_name = $name;

?>
        
            <tr>
                <td><?php echo $row['id']; ?></td>
		        <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['booking_number']; ?></td>
				<td><?php echo $course_name; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['phone']; ?></td>
			
				<td><?php echo $row['postal']; ?></td>
			
				<td><?php echo $row['transmission']; ?></td>
				<td><?php echo $row['theoryTest']; ?></td>
				<td><?php echo $row['practicalTest']; ?></td>
				<td style="font-weight:600; font-size:16px; color:red;">
				<?php
				if($row['transmission']=='automatic'){echo "£".$row2['automatic_price'];}
				else if($row['transmission']=='manual'){echo "£".$row2['manual_price'];}
				?>
				</th>
				<td style='color:blue;'>
				<?php 
				        echo $row['payment_status']; 
				?>
				
				</td>
				<td style='color:green;'><?php echo $row['instructor']; ?></td>
				<td>
				<?php if($row['payment_status']!='pending on instructor' && $row['payment_status']!='Confirmed by instructor')
				{ ?>
			
				<button class="btn btn-danger" id="confirm" data='<?php echo $row['id'];  ?>'>Confirm Deposit</button></td>
				
				<?php } ?>	
               
                
            </tr>
<?php } ?>
		</tbody>
</table>
</div>
<?php } ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
           
            <script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/dt-1.10.13/b-1.2.4/b-html5-1.2.4/b-print-1.2.4/fh-3.1.2/r-2.1.1/sc-1.4.2/datatables.min.js"></script>
			
			<script>
			
$(document).ready(function() {
    $('#orders').DataTable( {
      
        "searching": true,
		"order": [[ 1, "desc" ]]
       

    });
});

//confirm
$(document).on("click","#confirm",function() {
				
              				
               if(confirm("Are you sure you want to confirm? An email will be sent to all the instructors."))
				{
						 $('#loading').show();
								$.post("action.php",
								{
										type: 'confirm',																
										id: $(this).attr('data'),
								 
								}).done(function(data,status) 
								{	
								  $('#loading').hide();
								  //alert(status);
								   if(data.trim()=='Ok'){
								      window.location.reload();
								   }
								   else
								   {
									   
						               alert("Error!. Something went wrong. Please try again.");
								   }
								});
					
				}
				else{
					return false;
				}
			
	 });
			</script>
</body>
</html>