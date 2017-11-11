<?php
session_start();
include_once("dbcon.php");
if(!isset($_POST['sub_info']))
	{
		$_SESSION['error'] = "Don't try to cheat your way to  win the game";
		header('Location:../index.php');
	}
$p1=$_POST['pass1'];
$p2=$_POST['pass2'];
if(strcmp($p1,$p2)!=0)
	{
		header('Location:../register.php');
		$_SESSION['error']="Passwords Mismatch";
	}
$fn=$_POST['fname'];
$ln=$_POST['lname'];
$em=$_POST['email'];
$ce=$_POST['cell'];
$pa=$_POST['pass1'];
$cl=$_POST['clg'];


$fname=test_input($fn);
$lname=test_input($ln);
$email=test_input($em);
$cell=test_input($ce);
$password=test_input($pa);
$college=test_input($cl);


function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_SESSION['error']))
	{
	header('Location:../register.php');
	}
else
	{
	$chk1 = "SELECT * FROM `persons` WHERE email = '$email'";
	$res1 = mysqli_num_rows(mysqli_query($con , $chk1));
	$chk2 = "SELECT * FROM `persons` WHERE cell = '$cell'";
	$res2 = mysqli_num_rows(mysqli_query($con , $chk2));
	if($res1==1)
	{
		$_SESSION['error']="Email id already registered...";
		header('Location: ../register.php');
	}
	else
	if($res2==1)
	{
		$_SESSION['error']="Contact Number already registered...";
		header('Location: ../register.php');
	}
	else
	{
		$sql=("INSERT INTO `persons` (fname,lname,college,password,email,cell,level) VALUES ('$fname','$lname','$college','$password','$email','$cell','0')");
		if (!mysqli_query($con,$sql))
		{
			$_SESSION['error']= "Database Error";
			header('Location: ../register.php');
		}
		else
		{
			$_SESSION['error'] = "Registered Successfully ... Please Login to play .... ";
			header('Location:../login.php');
		}
	}
	mysqli_close($con);
	}
?>