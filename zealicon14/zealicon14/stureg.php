<?php
session_start();

//Recieved Values
$name = stripslashes($_POST['name']);
$email = stripslashes($_POST['email']);
$tel = stripslashes($_POST['tel']);
$clgname = stripslashes($_POST['clgname']);
$branch = stripslashes($_POST['branch']);
$pass1= stripslashes($_POST['pass1']);
$pass2= stripslashes($_POST['pass2']);


	require("common_code/dbcon.php");
	$zeal_id = "zeal14_o".(mysqli_num_rows(mysqli_query($con,"SELECT * FROM `registrations`"))+1);
    $query=$con->query("SELECT * FROM `registrations` WHERE `email`= '$email'");
    $row=$query->num_rows;
    $query = $con->prepare("INSERT INTO registrations(name,email,contact,clgname,branch,password,zealicon_id) VALUES(?,?,?,?,?,?,?)");
	$chk = check($name, $email, $tel, $clgname, $branch, $pass1, $pass2, $row);
	function  check($name,$email,$tel, $clgname, $branch, $pass1, $pass2, $row)
		{
			if($name==NULL || $email==NULL ||$tel==NULL || $clgname==NULL || $branch==NULL || $pass1==NULL|| $pass2==NULL)
			{
				$_SESSION["reg_err"]="*Please enter all the details<br>";
				echo $_SESSION['reg_err'];
			}else
			if (!($pass1==$pass2))
			{
				$_SESSION["reg_err"]="*The Entered Passwords do not match<br>";
				echo $_SESSION['reg_err'];
			}else
			if (strlen($tel)!=10)
			{
				$_SESSION["reg_err"]="*The Mobile Number is Invalid<br>";
				echo $_SESSION['reg_err'];
			}
			if (strlen($pass1)<=6)
			{
				$_SESSION["reg_err"]="*The Password is too short(Must be Greator than 6 charachters)";
				echo $_SESSION['reg_err'];
			}else
			if($row==1)
			{
				$_SESSION["reg_err"]="E-mail ID already registered";
				echo $_SESSION['reg_err'];
			}
			else
			{
			return 1;
			}

		}
	if($chk==1)										//Inputs are Valid
	{
	 $pass=$pass1;
	 $query->bind_param('sssssss',$name,$email,$tel,$clgname,$branch,$pass,$zeal_id);
     $res=$query->execute();
	 if(!$res)
		{
		  $_SESSION['reg_err'] = "There was a problem in datbase connection";
		  $con->close();
		  echo $_SESSION['reg_err'];	
		}
	 else
	 {
		$con->close();
		$_SESSION['login_err']="Thank You For Registering, Please Log in to continue";
		
	 }
	}
	else
	{
		$con->close();
		
	}

	 
?>