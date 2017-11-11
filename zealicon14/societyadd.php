<html class=bg>
<head>
	<title> Admin : Add a Society </title>
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
	<a href="adminnotify.php"><input type="button" value="Admin Notifications"/></a>
	<a href="societyadd.php"><input type="button" value="Add Society"/></a>
	<a href="societydisplay.php"><input type="button" value="Display Society"/></a>
    <br/><hr/><br/><br/>
	<?php
	if(isset($_SESSION['error']))
	{
		echo "<span><b style='color:red;'>".$_SESSION['error']."</b></span>";
		unset($_SESSION['error']);
	}
?>
	
<form action="common_code/societyadd.php" method="post">
				<table class="frmtable">
					<tr>	<td>Username</td><td>:</td><td><input type="text" name="username" placeholder="Username of the society" required/></td></tr>
					<tr>	<td>Password</td><td>:</td><td><input type="password" name="pass" placeholder="Password" required/></td></tr>
					<tr>	<td>Confirm Password</td><td>:</td><td><input type="password" name="cpass" placeholder="Retype Password" required/></td></tr>				
					<tr>	<td>Society</td><td>:</td><td><select name="society"/>
  													<?php
														include_once('common_code/listsociety.php');
													?>
												</select></td>
					</tr>
					<tr>	<td colspan="3" align="center"><input type="submit" value="Register"/></td></tr>
				</table>
</form>
</body>
</html>
