<?php
	require_once("dbcon.php");
	session_start();	
	if(isset($_SESSION['society']))
	{
	 $_SESSION['pgreq']= "login";
	 header ('Location:../society.php');
	}
	$login= new society;
	$login->get($con);
	class society
	{
		public function get($con)
		{
			$username=stripslashes($_POST['username']);
			$pass=stripslashes($_POST['pass']);
			$sql="SELECT * FROM `society` WHERE `username` = '$username' AND `password` = '$pass'";
			$res=mysqli_query($con,$sql);
			$fnd = mysqli_num_rows($res);
			if($fnd==1)
			{
		$societynameget= mysqli_fetch_assoc(mysqli_query($con,"SELECT `society` FROM `society` WHERE `username` = '$username' AND `password` = '$pass'"));
				$societyname =  $societynameget['society'];
				$_SESSION['society'] = $societyname; 
				$societyfullname= mysqli_fetch_assoc(mysqli_query($con,"SELECT `societyname` FROM `mapping` WHERE `society` = '$societyname' "));
				$societyfname =  $societyfullname['societyname'];
				$_SESSION['societyname'] = $societyfname; 
				$_SESSION['slogerr']="";
				unset($_SESSION['pgreq']);	//To Show Zealicon Logo
				unset($_SESSION['getlist']);
				 header('Location: ../society.php');
			}
			else 
			{
			$_SESSION['slogerr']= "Username and Password do not match";
			$_SESSION['pgreq']= "login";				//To Store The Part of Society Page that shall open
			 header('Location: ../society.php');
			}
			
		}
	}
	mysqli_close($con);
?>
