<?php

$local = false;

if($local)
{
$user = "root";
$pass = "";
$host = "localhost";
$db = "getlicensefast";
}
else
{
$user = "Getlicensefast";
$pass = "Getlicensefast2";
$host = "shareddb-n.hosting.stackcp.net";
$db = "Getlicensefast-313037cf74";
}



$dbh  = new PDO("mysql:dbname=$db;host=$host", $user, $pass);
// set the PDO error mode to exception
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
if($dbh)
{
	//echo "<h1>Connection successful!</h1>";
}
else
{
	echo "Connection is broken.";
}

?>