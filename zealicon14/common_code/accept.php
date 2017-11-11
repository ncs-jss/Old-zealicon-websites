<?php
	require_once ('dbcon.php');
	session_start();
	if (!isset($_SESSION['admin']))
	header('Location:../404.html');
	$event = $_GET['id'];
	$sql = "DELETE FROM `notify` WHERE events_id = '$event'";
	$res = mysqli_query ($con , $sql);
	$fnd = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM events WHERE  events_id='$event' ")); 
	$sql="UPDATE `events` SET `uploaded` = '1' WHERE `events_id`='$event' ";
	$res=mysqli_query($con, $sql);
	$col = "SELECT $event FROM registrations;";
	$colexist = mysqli_query($con, $col);
	if(!$colexist)
	{
		$sql="ALTER TABLE `registrations` ADD $event INT(1) COLLATE utf8_general_ci DEFAULT '0'";
		$res = mysqli_query ($con , $sql);
		
	}
	$about = $fnd['about'] ; 
	$desc = $fnd['desc'];
	$rules = $fnd['rules'];
	if($fnd['3prizes']!=" ")
$prizes = "1st prize".PHP_EOL ."".$fnd['1prizes']."".PHP_EOL . "2nd prize".PHP_EOL ."".$fnd['2prizes']."".PHP_EOL . "3rd prize".PHP_EOL ."".$fnd['3prizes'];
	else
$prizes = "1st prize".PHP_EOL ."".$fnd['1prizes']."".PHP_EOL . "2nd prize".PHP_EOL ."".$fnd['2prizes'];
	$contact = PHP_EOL ."".$fnd['1contact']."".PHP_EOL . PHP_EOL ."".$fnd['2contact'];
	$fp = fopen("../events/About/".$event.".txt","w");
	fwrite($fp , $about);
	fclose($fp);
	$fp = fopen("../events/Description/".$event.".txt","w");
	fwrite($fp , $desc);
	fclose($fp);
	$fp = fopen("../events/Rules/".$event.".txt","w");
	fwrite($fp , $rules);
	fclose($fp);
	$fp = fopen("../events/Prizes/".$event.".txt","w");
	fwrite($fp , $prizes);
	fclose($fp);
	$fp = fopen("../events/Contact/".$event.".txt","w");
	fwrite($fp , $contact);
	fclose($fp);
	header('Location:../adminnotify.php');
	mysqli_close($con);
?>

