<?php
	session_start();
		require_once('global/dbcon.php');
	$_SESSION['err']="Invalid Details";
	if (!$con)
	{
		header('location:index.php?page=login');
		
	}
	else
	{
		if(isset($_POST['button_login'])) 
	{
		// Checking null values in message.
	 	if (empty($_POST["email"])||empty($_POST["password"]))	
		{
				$_SESSION['err']="Please Fill The Complete Details";
				$errors = 1;
				header("location:index.php?page=login");
		} 
 		if($errors==0)
		{
	$eml=stripslashes($_POST['email']);
	$sql= "SELECT * FROM persons WHERE Email='$eml' AND Password='$_POST[password]' LIMIT 1";
	$res=mysqli_query($con, $sql);
	if(mysqli_num_rows($res)>0)
	{
		while($fnd = mysqli_fetch_array($res))
	{
		$_SESSION['user']=$fnd['FirstName']." ".$fnd['LastName'];
		$_SESSION['email']=$fnd['Email'];
		$_SESSION['lev']=$fnd['level'];
		$_SESSION['err']="";
		$_SESSION['current']=".content";
	}
	header("location:fetch.php");
	}
	else
	{
	header("location:index.php?page=login");
	}
	}
	}
	}
	mysqli_close($con);
?>

