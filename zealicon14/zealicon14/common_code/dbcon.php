<?php 
	global $con;
	$dbhost="localhost";
	$dbuser="z14dbuser";
	$dbpass="ZNi22le14";
	$dbname="zealicon14db";
	$con=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if ($con->connect_errno) 
	{
     echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
	}
?>
