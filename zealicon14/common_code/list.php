<?php
	session_start();
	$eventid = $_GET['list'];
	$chk = explode('_' , $eventid);
	$soc = $_SESSION['society'];
	if($chk[0]==$soc)
	{
	$_SESSION['getlist']=$_GET['list'];
	$_SESSION['pgreq']="getlist";
	header('Location:../society.php');
	}
	else
	header('Location:../404.html');
?>