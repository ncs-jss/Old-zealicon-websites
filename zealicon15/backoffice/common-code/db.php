<?php 

	function dbConnect(){
		$host = "localhost";
		$user = "nibble";
		$password = "root@ni22le";
		$database = "zealicon15";
		$conn = new mysqli($host, $user, $password,$database);
		if ($conn->connect_errno) {
		    echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
		    die;
		}
		return $conn;
	}

	function dbDisconnect($conn){
		$conn->close();
	}

?>