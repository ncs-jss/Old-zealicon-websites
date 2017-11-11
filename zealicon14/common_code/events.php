<?php
	require_once("dbcon.php");
	session_start();
	if(!isset($_SESSION['society']))
	{
	 $_SESSION['pgreq']="login";
	 $_SESSION['slogerr']="Please Log In to continue";
	 header('Location:../society.php');
	}
	
	if(!isset($_POST['subinp']))
			{
				$_SESSION['pgreq']="gotoae";
				$_SESSION['severr']="Please Enter the event details.. ";
				header('Location:../society.php');
				die();
			}
			
	date_default_timezone_set("Asia/Kolkata"); 
	$name= stripslashes($_POST['name']);
	$society = $_SESSION['society'];
	$category = stripslashes($_POST['category']);
	$about= mysqli_real_escape_string($con,trim($_POST['about']));
	$desc=mysqli_real_escape_string($con,trim($_POST['desc']));
	$rules=mysqli_real_escape_string($con,trim($_POST['rules']));
	$prizes1=stripslashes($_POST['1prizes']);
	$prizes2=stripslashes($_POST['2prizes']);
	$prizes3=stripslashes($_POST['3prizes']);
	$contact1=mysqli_real_escape_string($con,trim($_POST['1contact']));
	$contact2=mysqli_real_escape_string($con,trim($_POST['2contact']));
	$date = date("y-m-d");
	$time = date("H:i:s");
	$sel = mysqli_num_rows(mysqli_query($con,"SELECT * FROM events WHERE `ename`='$name' AND society='$society'"));
	if($sel==0)
	{
		
		$events_id = $society."_".(mysqli_num_rows(mysqli_query($con,"SELECT * FROM events WHERE society='$society'"))+1);
		if($prizes3=="")
		$sql="INSERT INTO `events` (`events_id`,`ename`,`society`,`category`,`about`,`desc`,`rules`,`1prizes`,`2prizes`,`3prizes`,`1contact`,`2contact`) VALUES ('$events_id','$name','$society','$category','$about','$desc','$rules','$prizes1','$prizes2',' ','$contact1','$contact2')";
		else
		$sql="INSERT INTO `events` (`events_id`,`ename`,`society`,`category`,`about`,`desc`,`rules`,`1prizes`,`2prizes`,`3prizes`,`1contact`,`2contact`) VALUES ('$events_id','$name','$society','$category','$about','$desc','$rules','$prizes1','$prizes2','$prizes3','$contact1','$contact2')";
		
		$res=mysqli_query($con, $sql);
		if($res)
		{
			$sqln = "INSERT INTO `notify` (events_id,date,time) VALUES ('$events_id' , '$date'  , '$time')";
			$resn = mysqli_query($con, $sqln);
			if($resn)
			{
				$_SESSION['severr'] = "Entered the Event Details Successfully ... You can edit it by sending the details again with the same name!!!";
				$_SESSION['pgreq']="gotoae";
				header('Location: ../society.php');
			}
			else
			{
				$_SESSION['severr'] = "Database Error ... !!!";
				$sql="DELETE FROM events WHERE events_id = '$events_id'";
				$res = mysqli_query($con, $sql);
				$_SESSION['pgreq']="gotoae";
				header('Location: ../society.php');
			}
			
		}
		else
		 {
		 $_SESSION['severr'] = "Database Error ... !!!";
		 $_SESSION['pgreq']="gotoae";
		 header('Location: ../society.php');
		 }
	}
	else
	{
		$events_idget = mysqli_fetch_assoc(mysqli_query($con,"SELECT events_id FROM events WHERE ename='$name' AND society='$society'"));
		$events_id =  $events_idget['events_id'];
		$fnd = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM events WHERE  events_id='$events_id' ")); 
		if($prizes3=="")
		$sql="UPDATE `events` SET `category` = '$category' , `about` = '$about', `desc` ='$desc', `rules` = '$rules', `1prizes` ='$prizes1', `2prizes` ='$prizes2',`3prizes` =' ' , `1contact` ='$contact1',  `2contact` ='$contact2' WHERE `events_id`='$events_id' ";
		else
		$sql="UPDATE `events` SET `category` = '$category' , `about` = '$about', `desc` ='$desc', `rules` = '$rules', `1prizes` ='$prizes1', `2prizes` ='$prizes2', `3prizes` ='$prizes3', `1contact` ='$contact1', `2contact` ='$contact2' WHERE `events_id`='$events_id' ";
		$res=mysqli_query($con, $sql);
		if($res)
		{
			$sq = mysqli_query($con,"SELECT * FROM notify WHERE `events_id`= '$events_id'");
			if(!sq)
			$sqln = "INSERT INTO notify (events_id,date,time) VALUES ('$events_id' , '$date'  , '$time')";
			else
			$sqln = "UPDATE `notify` SET `date` = '$date' , `time` = '$time' WHERE `events_id`='$events_id' ";
			$resn = mysqli_query($con, $sqln);
			if($resn)
			{
				$_SESSION['severr'] = "Updated the Event Details Successfully ... !!!";
				$_SESSION['pgreq']="gotoae";
				header('Location: ../society.php');
			}
			else
			{
				$events_id = $fnd['events_id'];
				$category = $fnd['category'];
				$about	= $fnd['about'];
				$desc = $fnd['desc'];
				$rules = $fnd['rules'];
				$prizes1 = $fnd['1prizes'];
				$prizes2 = $fnd['2prizes'];
				$prizes3 = $fnd['3prizes'];
				$contact1 = $fnd['1contact'];
				$contact2 = $fnd['2contact'];
				$_SESSION['severr'] = "Database Error ... !!!";
				$sql="UPDATE `events` SET `category` = '$category' , `about` = '$about', `desc` ='$desc', `rules` = '$rules', `1prizes` ='$prizes1', `2prizes` ='$prizes2', `3prizes` ='$prizes3', `1contact` ='$contact1', `2contact` ='$contact2' WHERE `events_id`='$events_id' ";
				$res = mysqli_query($con, $sql);
			}
			
		}
		else
		{
		$_SESSION['severr'] = "Database Error ... !!!";
		$_SESSION['pgreq'] = "gotoae";
		header('Location: ../society.php');
		}	
	}
	mysqli_close($con);
	
?>
