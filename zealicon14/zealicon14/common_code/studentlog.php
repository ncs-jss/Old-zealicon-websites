<?php
	require_once("dbcon.php");
	session_start();	
	if(isset($_SESSION['student']))
	header ('Location:../studentloggedin.php');
	$login= new student;
	$login->get($con);
	class student
	{
		public function get($con)
		{
			$email=stripslashes($_POST['email']);
			$pass=stripslashes($_POST['pass']);
			$sql="SELECT * FROM `registrations` WHERE `email` = '$email' AND `password` = '$pass'";
			$res=mysqli_query($con,$sql);
			$fnd = mysqli_num_rows($res);
			if($fnd==1)
			{
				$studentname= mysqli_fetch_assoc(mysqli_query($con,"SELECT `name` FROM `registrations` WHERE `email` = '$email'"));
				$student =  $studentname['name'];
				$_SESSION['student'] = $student; 
				$_SESSION['error']="";
				header('Location: ../studentloggedin.php');
			}
			else 
			{
			$_SESSION['error']= "Enter Correct Details";
			header('Location: ../studentlog.php');
			}
			
		}
	}
	mysqli_close($con);
?>
