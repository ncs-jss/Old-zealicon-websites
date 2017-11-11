<?php
	require_once("dbcon.php");
	session_start();	
	if(isset($_SESSION['user']))
	header ('Location:redirect.php');
	$login = new student;
	$login->get($con);
	class student
	{
		public function get($con)
		{
			$email=stripslashes($_POST['email']);
			$pass=stripslashes($_POST['pass']);
			$sql="SELECT * FROM `persons` WHERE `email` = '$email' AND `password` = '$pass'";
			
			$res=mysqli_query($con,$sql);
			$fnd = mysqli_num_rows($res);
			if($fnd==1)
			{
				$studentname= mysqli_fetch_assoc(mysqli_query($con,"SELECT `fname` ,`email`, `level` FROM `persons` WHERE `Email` = '$email'"));
				$_SESSION['user'] = $studentname['fname'];
				$_SESSION['email'] = $studentname['email'];
				$_SESSION['level'] = $studentname['level'];
				$level = $_SESSION['level'];
						$lev = mysqli_fetch_assoc(mysqli_query($con,"SELECT `page` FROM list WHERE `level` = $level"));
						$goto = $lev['page'];
						$_SESSION['page'] = $goto;
				$_SESSION['error']="";
				header('Location:../index.php');
			}
			else 
			{
			$_SESSION['error']= "Enter Correct Details";
			header('Location: ../login.php');
			}
			
		}
	}
	mysqli_close($con);
?>
