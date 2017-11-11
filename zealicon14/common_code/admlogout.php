<?php
	session_start();	
	if(isset($_SESSION['admin']))
	{
	 unset($_SESSION['admin']);
	 header('Location:../admin.php');
	}
	else
	{
	 header("Location: ../404.html");
	}
?>