<!DOCTYPE html>
<html class="bg">
<head>
<meta charset="utf-8">
	<title> Admin : Confirm Upload </title>
	<link rel="stylesheet" href="assets/css/spanel.css">
</head>
<body>
<?php
	session_start();
	if(!isset($_SESSION['admin']))
	header ('Location:404.html');
	$adm=$_SESSION['admin'];
	echo "Logged in as administrator : $adm";
?>
<a href="common_code/admlogout.php"><input type="button" value="Logout"></a> </br> </br>
<a href="adminnotify.php"><input type="button" value="Admin Notifications"/></a>
	<a href="societyadd.php"><input type="button" value="Add Society"/></a>
	<a href="societydisplay.php"><input type="button" value="Display Society"/></a>
	<br/><hr/><br/><br/>
<div>
<?php
	include_once("common_code/showdet.php");
?>
<br/>
<a href="common_code/accept.php?id=<?php echo $_GET['id'];?>"><input type="button" value="Accept" /></a>
<a href="common_code/reject.php?id=<?php echo $_GET['id'];?>"><input type="button" value="Reject" /></a>
</div>
</body>
</html>