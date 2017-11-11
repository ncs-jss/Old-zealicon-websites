<?php
	require_once("dbcon.php");
	session_start();
	if(!isset($_SESSION['society']))
	header('Location:../eventdet.php');
	$name = $_POST['name'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$clgname = $_POST['clgname'];
	$branch = $_POST['branch'];
	$pass= $_POST['pass'];
	$gender= $_POST['gender'];
	$cpass= $_POST['cpass'];
	if($pass==$cpass)
	{
		$sel = mysqli_num_rows(mysqli_query($con,"SELECT * FROM registrations WHERE email='$email'"));
		if($sel==0)
	{
		$zeal_id = "zeal14_".(mysqli_num_rows(mysqli_query($con,"SELECT * FROM registrations WHERE 1=1"))+1);
		$sql="INSERT INTO `registrations` (`name`,`email`,`contact`,`clgname`,`branch`,`password`,`gender`,`zealicon_id`) VALUES('$name','$email','$tel','$clgname','$branch','$pass', '$gender','$zeal_id')";
		$res=mysqli_query($con, $sql);
		if($res)
			$_SESSION['error'] = "Registered the Student Successfully ... !!!";
		else
			$_SESSION['error'] = "Database Error ... !!!";
		header('Location: ../studentreg.php');
	}
	else
		$_SESSION['error'] = "Email Already registered ... !!!";
	}
	else
	$_SESSION['error'] = "Password do not match ... !!!";
	header('Location: ../studentreg.php');
	mysqli_close($con);
	
?>
