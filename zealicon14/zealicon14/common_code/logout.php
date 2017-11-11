<?php
	session_start();	
	if(isset($_SESSION['admin']))
	{
	session_destroy();
	header('Location:../admin.php');
	}
	else
	if(isset($_SESSION['society']))
	{
	session_destroy();
	header('Location:../society.php');
	}
	
?>
