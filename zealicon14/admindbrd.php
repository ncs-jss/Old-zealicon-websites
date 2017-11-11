<html class=bg>
<!DOCTYPE html>
<head>
	<title>Admin Panel : Dashboard </title>
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
	
	<?php
	if(isset($_SESSION['error']))
	{
		echo "<span><b style='color:red;'>".$_SESSION['error']."</b></span>";
		unset($_SESSION['error']);
	}
	?>
	<br/><hr/><br/><br/>
	<a href="adminnotify.php"><input type="button" value="Admin Notifications"/></a>
	<a href="societyadd.php"><input type="button" value="Add Society"/></a>
	<a href="societydisplay.php"><input type="button" value="Display Society"/></a>
</body>
</html>
