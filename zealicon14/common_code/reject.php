<?php
	require_once ('dbcon.php');
	$event = $_GET['id'];
	$sql = "DELETE FROM `notify` WHERE events_id = '$event'";
	$res = mysqli_query ($con , $sql);
	$sql1 = "UPDATE events SET `uploaded`= -1 WHERE `events_id` = '$event'";
	$res1 = mysqli_query ($con , $sql1);
	header('Location:../adminnotify.php');
	mysqli_close($con);
?>
