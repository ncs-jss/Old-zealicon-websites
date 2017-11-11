<?php
	require_once ('dbcon.php');
	$event = $_GET['id'];
	$sql = "DELETE FROM `notify` WHERE events_id = '$event'";
	$res = mysqli_query ($con , $sql);
	header('Location:../adminnotify.php');
	mysqli_close($con);
?>