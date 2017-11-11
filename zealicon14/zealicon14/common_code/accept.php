<?php
	require_once ('dbcon.php');
	$event = $_GET['id'];
	$sql = "DELETE FROM `notify` WHERE events_id = '$event'";
	$res = mysqli_query ($con , $sql);
	$fnd = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM events WHERE  events_id='$event' ")); 
	$sql="UPDATE `events` SET `uploaded` = '1' WHERE `events_id`='$event' ";
	$res=mysqli_query($con, $sql);
	$sql="CREATE TABLE IF NOT EXISTS `list_$event` (
`name` VARCHAR( 50 ) NOT NULL ,
 `email` VARCHAR( 50 ) NOT NULL ,
 `contact` VARCHAR( 10 ) NOT NULL ,
 `zealicon_id` VARCHAR( 15 ) NOT NULL ,
UNIQUE KEY  `zealicon_id` (  `zealicon_id` )
);
";
	$res = mysqli_query ($con , $sql);
	$about = $fnd['about'] ; 
	$desc = $fnd['desc'];
	$rules = $fnd['rules'];
	$prizes = $fnd['prizes'];
	$contact = $fnd['contact'];
	$fp = fopen("../events/about/".$event.".txt","w");
	fwrite($fp , $about);
	$fp = fopen("../events/description/".$event.".txt","w");
	fwrite($fp , $desc);
	$fp = fopen("../events/rules/".$event.".txt","w");
	fwrite($fp , $rules);
	$fp = fopen("../events/prizes/".$event.".txt","w");
	fwrite($fp , $prizes);
	$fp = fopen("../events/contact/".$event.".txt","w");
	fwrite($fp , $contact);
	header('Location:../adminnotify.php');
	mysqli_close($con);
?>

