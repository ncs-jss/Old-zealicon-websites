<?php
	require_once("dbcon.php");
	session_start();
	if(!isset($_SESSION['admin']))
	header('Location:../404.html');
	$username=stripslashes($_POST['username']);
	$pass = stripslashes($_POST['pass']);
	$cpass = stripslashes($_POST['cpass']);
	$society = stripslashes($_POST['society']);
	if($pass==$cpass)
	{
		$sel = mysqli_num_rows(mysqli_query($con,"SELECT * FROM society WHERE username='$username'"));
		if($sel==0)
	{
		$sql="INSERT INTO society (`username`,`password` , `society`) VALUES ('$username','$pass','$society')";
		$res=mysqli_query($con, $sql);
		if($res)
		{
			$_SESSION['error'] = "Registered the Society Successfully ... !!!";
		}
		else
			$_SESSION['error'] = "Database hello Error ... !!!";
		header('Location: ../societyadd.php');
	}
	else
		$_SESSION['error'] = "Username Already exists ... !!!";
	}
	else
	$_SESSION['error'] = "Password do not match ... !!!";
	header('Location: ../societyadd.php');
	mysqli_close($con);
	
?>
