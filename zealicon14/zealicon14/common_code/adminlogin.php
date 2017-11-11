<?php
	require_once("dbcon.php");
	session_start();	
	if(isset($_SESSION['admin']))
	header ('Location:../adminnotify.php');
	$login= new admin;
	$login->get($con);
	class admin
	{
		public function check($username,$password)
		{
			if ($username==NULL || $password==NULL) 
			{
				$_SESSION["error"]="Details Entered are Wrong ....!!!";
				header('Location: ../admin.php');
			}
			else
			{
				$_SESSION['error'] = "";
				return $password;
			}
		}
		public function get($con)
		{
			$username=stripslashes($_POST['username']);
			$password=stripslashes($_POST['password']);
			
			$pass=$this->check($username,$password);
			$sql="SELECT * FROM admin WHERE username='$username' AND password='$pass'";
			$res=mysqli_query($con,$sql);
			$fnd = mysqli_num_rows($res);
			if($fnd==1)
			{
				$_SESSION['error']="";
				header('Location: ../adminlogin.php');
				$_SESSION['admin']="Administrator";	
			}
			else 
			if($fnd ==0)
			{
			$_SESSION['error']= "Enter Correct Details";
			header('Location: ../admin.php');
			}
			
		}
	}
	mysqli_close($con);
?>
