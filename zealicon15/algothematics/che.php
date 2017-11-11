<?php
	require_once('global/dbcon.php');
	$level_var=$_SESSION['lev'];
	$eml=$_SESSION['email'];
	$quer="SELECT answer FROM list WHERE level=$level_var";
	$res=mysqli_query($con, $quer);
	$fnd=mysqli_fetch_array($res);
	$_SESSION['answ']=$_POST['ans'];
	if(strcasecmp($_POST['ans'],$fnd['answer'])==0)
	{	
		$_SESSION['lev']=$lev_new=$level_var+1;
		$updt="UPDATE persons SET level=$lev_new where Email='$eml'";
		$res_updt=mysqli_query($con, $updt);
		$_SESSION['err3']="Correct Answer";
		$_SESSION['answ']="";
	}
	else
	{
		$_SESSION['err3']="Incorrect Answer!!! Please Try Again";
	}
	header('location:fetch.php');
	mysql_close($con);
?>
