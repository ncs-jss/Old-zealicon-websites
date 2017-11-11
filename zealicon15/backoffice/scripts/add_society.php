<?php 
	session_start();
	include '../common-code/db.php';
		addSociety();

	function addSociety(){
		$conn = dbConnect();
		$society_name='';$society_username='';$password='';
		if(isset($_POST['society_name'])) $society_name = $conn->real_escape_string($_POST['society_name']);
		if(isset($_POST['society_username'])) $society_username = $conn->real_escape_string($_POST['society_username']);
		if(isset($_POST['password'])) $password = $conn->real_escape_string($_POST['password']);
		$sql = "INSERT into society(societyName,username,password) VALUES('$society_name','$society_username','$password')";
		$result = $conn->query($sql);
		dbDisconnect($conn);
		if($result){
			header("location:../societies.php");
		}
		else{
			echo "Some error occured..:(";
		}
	}
?>