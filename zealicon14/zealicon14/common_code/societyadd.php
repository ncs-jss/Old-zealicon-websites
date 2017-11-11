<?php
	require_once("dbcon.php");
	session_start();
	if(!isset($_SESSION['society']))
	header('Location:../eventdet.php');
	$username=stripslashes($_POST['username']);
	$pass = stripslashes($_POST['pass']);
	$cpass = stripslashes($_POST['cpass']);
	$society = stripslashes($_POST['society']);
	if($pass==$cpass)
	{
		$pass=md5($pass);
		$sel = mysqli_num_rows(mysqli_query($con,"SELECT * FROM society WHERE username='$username'"));
		if($sel==0)
	{
		$sql="INSERT INTO society (`username`,`password` , `society`) VALUES ('$username','$pass','$society')";
		$res=mysqli_query($con, $sql);
		if($res)
		{
			mysqli_query($con, $sql);
			$_SESSION['error'] = "Registered the Society Successfully ... !!!";
		}
		else
			$_SESSION['error'] = "Database Error ... !!!";
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
