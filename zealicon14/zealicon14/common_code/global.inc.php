<?php 

	global $con;
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="zealicon14db";
	$con=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	$ROOT_FILE_PATH = $_SERVER['DOCUMENT_ROOT'].'zealicon14db'.'/';			// Variable to be used for absolute linking
	$ROOT_PATH = "localhost";
	if ($con->connect_errno) 
	{
     echo "Failed to connect to MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
	}
	if ($_SERVER['SERVER_NAME'] == "localhost")
	{
		$ROOT_PATH .= "";
	}
	elseif ($_SERVER['SERVER_NAME'] == "localhost")
	{
		$ROOT_PATH .= "localhost:8080/zealicon14db/";
	}
	else
	{
		$ROOT_PATH .= $_SERVER['SERVER_NAME']."/zealicon14db"; 				// . "/localhost";
	}

?>
