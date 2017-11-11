<?php
			require_once("dbcon.php");
			session_start();	
			if(isset($_SESSION['admin']))
			{
				header ('Location:../admindbrd.php');	
			}
			
			if(!isset($_POST['sub_adm']))
			{
				header('Location:../404.html');
				die();
			}
			
			$username=stripslashes($_POST['username']);
			$password=stripslashes($_POST['password']);
			
			 
			$pass=check($username,$password);
			$sql="SELECT * FROM admin WHERE username='$username' AND password='$pass'";
			$res=mysqli_query($con,$sql);
			$list=mysqli_fetch_assoc($res);
			$fnd = mysqli_num_rows($res);
			if($fnd==1)
			{
				$_SESSION['adm_error']="";
				$_SESSION['admin']=$list['username'];	
				header('Location: ../admindbrd.php');
				
			}
			else 
			if($fnd ==0)
			{
			  $_SESSION['adm_error']= "Enter Correct Details";
			  header('Location: ../admin.php');
			}
			mysqli_close($con);
		function check($username,$password)
		{
			if ($username=="" || $password=="") 
			{
				$_SESSION["adm_error"]="Details Entered are Wrong ....!!!";
				header('Location: ../admin.php');
			}
			else
			{
				$_SESSION['adm_error'] = "";
				return $password;
			}
		}
?>
