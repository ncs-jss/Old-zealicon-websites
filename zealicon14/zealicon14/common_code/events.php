<?php
	require_once("dbcon.php");
	session_start();
	if(!isset($_SESSION['society']))
	header('Location:../society.php');
	date_default_timezone_set("Asia/Kolkata"); 
	$name=stripslashes($_POST['name']);
	$society = $_SESSION['society'];
	$category = stripslashes($_POST['category']);
	$about=stripslashes($_POST['about']);
	$desc=stripslashes($_POST['desc']);
	$rules=stripslashes($_POST['rules']);
	$prizes=stripslashes($_POST['prizes']);
	$contact=stripslashes($_POST['contact']);
	$date = date("y-m-d");
	$time = date("H:i:s");
	$sel = mysqli_num_rows(mysqli_query($con,"SELECT * FROM events WHERE name='$name' AND society='$society'"));
	if($sel==0)
	{
		$events_id = $society."_".(mysqli_num_rows(mysqli_query($con,"SELECT * FROM events WHERE society='$society'"))+1);
		$sql="INSERT INTO `events` (`events_id`,`ename`,`society`,`category`,`about`,`desc`,`rules`,`prizes`,`contact`) VALUES ('$events_id','$name','$society','$category','$about','$desc','$rules','$prizes','$contact')";
		$res=mysqli_query($con, $sql);
		if($res)
		{
			$sqln = "INSERT INTO `notify` (events_id,date,time) VALUES ('$events_id' , '$date'  , '$time')";
			$resn = mysqli_query($con, $sqln);
			if($resn)
			{
				$_SESSION['error'] = "Entered the Event Details Successfully ... !!!";
			}
			else
			{
				$_SESSION['error'] = "Database Error ... !!!";
				$sql="DELETE FROM events WHERE events_id = '$events_id'";
				$res = mysqli_query($con, $sql);
			}
			
		}
		else
		 $_SESSION['error'] = "Database Error ... !!!";
		header('Location: ../eventdet.php');
	}
	else
	{
		$events_idget = mysqli_fetch_assoc(mysqli_query($con,"SELECT events_id FROM events WHERE name='$name' AND society='$society'"));
		$events_id =  $events_idget['events_id'];
		$fnd = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM events WHERE  events_id='$events_id' ")); 
		$sql="UPDATE `events` SET `category` = '$category' , `about` = '$about', `desc` ='$desc', `rules` = '$rules', `prizes` ='$prizes', `contact` ='$contact' WHERE `events_id`='$events_id' ";
		$res=mysqli_query($con, $sql);
		if($res)
		{
			$sq = mysqli_query($con,"SELECT * FROM notify WHERE `events_id`= '$events_id'");
			if(!$sq)
			$sqln = "INSERT INTO notify (events_id,date,time) VALUES ('$events_id' , '$date'  , '$time')";
			else
			$sqln = "UPDATE `notify` SET `date` = '$date' , `time` = '$time' WHERE `events_id`='$events_id' ";
			$resn = mysqli_query($con, $sqln);
			if($resn)
			{
				$_SESSION['error'] = "Updated the Event Details Successfully ... !!!";
			}
			else
			{
				$events_id = $fnd['events_id'];
				$category = $fnd['category'];
				$about	= $fnd['about'];
				$desc = $fnd['desc'];
				$rules = $fnd['rules'];
				$prizes = $fnd['prizes'];
				$contact = $fnd['contact'];
				$_SESSION['error'] = "Database Error ... !!!";
				$sql="UPDATE events SET events_id='$events_id' ,category='$category' ,about= '$about',desc ='$desc',rules = '$rules',prizes = '$prizes',contact ='$contact'  WHERE name = '$name' AND society = '$society'";
				$res = mysqli_query($con, $sql);
			}
			
		}
		else
		$_SESSION['error'] = "Database Error ... !!!";
		header('Location: ../eventdet.php');
	}
	mysqli_close($con);
	
?>
