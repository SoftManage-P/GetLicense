<?php

$to = $_POST['email'];
$subject = 'Get License Fast Booking';
$headers = "From: Get License Fast <info@getlicensefast.co.uk> \r\n";
$headers .= "Reply-To: Get License Fast <info@getlicensefast.co.uk> \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$headers .= "Bcc: info@getlicensefast.co.uk \r\n";

$message = '<html>
<head>
<title>Get License Fast</title>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>
<center>
<h1>Get Your Driving License Fast</h1>
<h3>Your Driving License Booking Details Are</h3>

</center>
<table style="max-width:70%;" align="center">
  <tr>
    <td width="50%"><strong>Booking Number</strong></td>
    <td>'.strip_tags($_POST['bookingNumber']).'</td>   
  </tr>
  <tr>
    <td><strong>Expected Date</strong></td>
    <td>'.strip_tags($_POST['date']).'</td>   
  </tr>
  <tr>
    <td><strong>Postal Code</strong></td>
    <td>'.strip_tags($_POST['postal']).'</td>   
  </tr>
  <tr>
    <td><strong>Driving Course</strong></td>
    <td>'.$course_name.'</td>   
  </tr>
  <tr>
    <td><strong>Transmission</strong></td>
    <td>'.strip_tags($_POST['transmission']).'</td>   
  </tr>
  <tr>
    <td><strong>Tests Included</strong></td>
    <td>'.strip_tags($theory_test_included)." ".strip_tags($practical_test_included).'</td>   
  </tr>
  <tr>
    <td><strong>Booking Date</strong></td>
    <td>'.date("m/d/Y").'</td>   
  </tr>
 
</table>
<br>
<h3 align="center">Course Fee: <strong><span>&#163;</span>'.$fee.'</strong> <strike><strong><span>&#163;</span>'.$normalFee.'</strong></strike> 10% Discount<br>
'. $practical_test_fee.'
'. $theory_test_fee.'</h3>
'. $total_fee.'

<br>
<p align="center">To confirm your booking please deposit <strong><span>&#163;</span>100</strong> (or <strong><span>&#163;</span>35</strong> in case of Assessment Course only). You can easily deposit to our bank account. Here are bank account details.</p>
<p align="center"><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=KXRL8DKXPT5Z6" title="PayPal – The safer, easier way to pay online!">Pay Deposit With Paypal</a> (no Paypal account needed)</p>
<br>
<br>
<h3 align="center">Pay by Bank Transfer<br><br>
Bank: Lloyds Bank<br>

Account No: 00478848<br>
SORT CODE: 30-98-93</h3><br><br>


<p align="center"><img src="https://www.getlicensefast.co.uk/assets/images/logo.png"><br>
Woodbury, 2 The Vale, Broadstairs, Kent. CT10 1RB<br><br>
<a href="mailto:info@getlicensefast.co.uk">info@getlicensefast.co.uk</a>
</p>
 

</body>
</html>
';

mail($to, $subject, $message, $headers);
mail("t_uk@hotmail.com", $subject, $message, $headers); //a copy for yourself

?>