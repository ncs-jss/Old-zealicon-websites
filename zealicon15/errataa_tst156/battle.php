<?php
require_once('code/dbcon.php');
session_start();

if(!isset($_SESSION['user']))
{
	header('Location:index.php');
}
else
{
	$level = $_SESSION['level'];
	$lev = mysqli_fetch_assoc(mysqli_query($con,"SELECT `page` FROM list WHERE `level` = $level"));
	$goto = $lev['page'];
	header('Location:'.$goto);
}

?>