<?php
	session_start();

	
	require_once('global/dbcon.php');

	$eml=stripslashes($_POST[email]);
	$fnm=stripslashes($_POST[fname]);
	$lnm=stripslashes($_POST[lname]);
	$age_pg=stripslashes($_POST[college]);
	$_SESSION['mail']=$eml;
	$_SESSION['name1']=$fnm;
	$_SESSION['name2']=$lnm;
	$_SESSION['clg']=$age_pg;
	if($_POST[password]!= $_POST[conpassword])
	{
		$_SESSION['err2']="Passwords do not match";
		header("location:index.php?page=register");
	}
	else if($eml==NULL||$fnm==NULL||$lnm==NULL||$age_pg==NULL)
	{	
	$_SESSION['err2']='Please enter all the details correctly';
header("location:index.php?page=register");
	}
	else if (filter_var($_POST[email], FILTER_VALIDATE_EMAIL))
	{
	if (!$con)
	{
	$_SESSION['err2']="There was a problem in the database connection";
	header("location:index.php?page=register");
	}
	else
	{

	
	$sql= "INSERT INTO persons (FirstName, LastName, college, Email, Password, level)	VALUES ('$fnm','$lnm','$age_pg', '$eml','$_POST[password]','0')";
	$res=mysqli_query($con, $sql);
	$_SESSION['err']="Registation Successfully Completed!!! Please Login to Continue...";
	header("location:index.php?page=login");
	}
	}
//header("location:index.php?page=register");	

	mysql_close($con);
?>