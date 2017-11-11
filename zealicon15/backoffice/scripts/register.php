<?php 
	session_start();
	include '../common-code/db.php';
		addStudent();

	function addStudent(){
		$conn = dbConnect();
		$name='';$password='';$email='';$course='';$college='';$mobile='';
		if(isset($_POST['name'])) $name = $conn->real_escape_string($_POST['name']);
		if(isset($_POST['password'])) $password = $conn->real_escape_string($_POST['password']);
		if(isset($_POST['email'])) $email = $conn->real_escape_string($_POST['email']);
		if(isset($_POST['college'])) $college = $conn->real_escape_string($_POST['college']);
		if(isset($_POST['course'])) $course = $conn->real_escape_string($_POST['course']);
		if(isset($_POST['mobile'])) $mobile = $conn->real_escape_string($_POST['mobile']);

		
		$insert_query = "INSERT into registration(mobile,email, name,password, course, collegeName) VALUES('$mobile','$email','$name','$password','$course','$college')";

$run_insert_query = $conn->query($insert_query);
$select_query = "SELECT * from registration where `email` = '$email'";
$run_select_query = $conn->query($select_query);

     while($row = $run_select_query->fetch_array())
    $id= $row['id'];

$zealicon_id = "Z15s_".$id;

$update_query = "UPDATE registration SET `zealId`='$zealicon_id' where `email` = '$email'";
$run_update_query = $conn->query($update_query);

if($run_update_query){
header("Location: ../registrations.php");}
	}
?>