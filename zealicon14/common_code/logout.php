<?php
	session_start();	
	if(isset($_SESSION['society']))
	{
	session_destroy();
	header('Location:../society.php');
	}
?>
