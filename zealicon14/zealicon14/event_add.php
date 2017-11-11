<?php 
require("common_code/dbcon.php");
session_start();

if(isset($_SESSION['umail'])) 
    {
		$temp = $_POST['ename'] ;
		$email = $_SESSION['umail'];
		if(isset($_POST['request']))
		{
			$results = mysqli_query($con,"SELECT * FROM registrations WHERE `email` = '$email' AND `$temp` = '1'");
			if($results)
			{
			if(mysqli_num_rows($results)==1)
			{
				$_SESSION['opmsg']="Registered";
				echo $_SESSION['opmsg'];	
			}}
		}
		else if(isset($_POST['delete']))
		{
			$results = mysqli_query($con,"UPDATE `registrations` SET `$temp`= '0' WHERE `email` ='$email'");		
		}
		else
		{
		 mysqli_query($con,"UPDATE `registrations` SET `$temp`= '1' WHERE `email` ='$email'");
		 mysqli_close($con);
		 $_SESSION['opmsg']="Registered";
		 echo $_SESSION['opmsg'];	
		}
		
    } 
else 
    {
    
          echo  "Login to register for the event" ;
       
    }
?>