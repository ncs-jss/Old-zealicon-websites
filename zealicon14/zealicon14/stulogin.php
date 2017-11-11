<?php
session_start();
$email = $_POST['username'];
$pass = $_POST['password'];
include_once("common_code/dbcon.php");
$res = $con->query("SELECT * FROM registrations WHERE email = '$email'");
$row = $res->fetch_assoc();
if($pass===$row['password'])
    {
    $_SESSION['umail'] = $email;	
	$_SESSION['stuname'] = $row['name'];
	$con->close();
    echo $email."+".$row['name'];
    }
else
    {
    $_SESSION['login_err'] = "*Invalid Email or Password ";
	echo $_SESSION['login_err'];	
	}
?>