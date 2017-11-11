<?php
	require_once('global/dbcon.php');
	$level_var=$_SESSION['lev'];
	$quer="SELECT question FROM list WHERE level=$level_var";
	$res=mysqli_query($con, $quer);
	$fnd=mysqli_fetch_array($res);
	$_SESSION['ques']=$fnd['question'];
	header('location:index.php?page=battleground');
		mysql_close($con);
?>
