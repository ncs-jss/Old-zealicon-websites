<?php 
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
	$_SESSION['user'] = '';
	$_SESSION['loggedIn'] = false;
	header("location:../login.php");
?>