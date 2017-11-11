<?php 
	session_start();
	include '../common-code/db.php';
		addContact();

	function addContact(){
		$conn = dbConnect();
		$name='';$email='';$mobile='';$position='';
		if(isset($_POST['name'])) $name = $conn->real_escape_string($_POST['name']);
		if(isset($_POST['email'])) $email = $conn->real_escape_string($_POST['email']);
		if(isset($_POST['mobile'])) $mobile = $conn->real_escape_string($_POST['mobile']);
		if(isset($_POST['position'])) $position = $conn->real_escape_string($_POST['position']);
		$sql = "INSERT into contactus(name,position,email,mobile) VALUES('$name','$position','$email','$mobile')";
		$result = $conn->query($sql);
		dbDisconnect($conn);
		if($result){
			header("location:../contact.php");
		}
		else{
			echo "Some error occured..:(";
		}
	}
?>