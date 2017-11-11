<?php 
	global $con;
	$dbhost="localhost";
	$dbuser="nibble";
	$dbpass="root@ni22le";
	$dbname="zealicon14";
	$con=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if ($con->connect_errno) 
	{
     echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
	}
?>
