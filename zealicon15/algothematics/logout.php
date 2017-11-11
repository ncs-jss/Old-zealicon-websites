<?php

	session_start();
	$_SESSION['current']=".content";
	
	if(isset($_SESSION['user'] )| isset($_SESSION['password'] ))
	{

		$_SESSION['user']=NULL;
		$_SESSION['password']=NULL;
		session_unset();
		session_destroy();
		header('location: index.php');
	}

?>