<html class=bg>
<!DOCTYPE html>
<head>
	<title> Admin : Login </title>
	<link rel="stylesheet" href="assets/css/spanel.css">
	<BASE href="http://www.zealicon.in">
</head>
<body>
	<?php
	session_start();
	if(isset($_SESSION['admin']))
	 header ('Location:admindbrd.php');
	?>
<form name="admlform" action="common_code/adminlogin.php" method="post">
<center>
<?php
	if(isset($_SESSION['adm_error']))
	{
		echo "<span><b style='color:red;'>".$_SESSION['adm_error']."</b></span></br>";
		unset($_SESSION['adm_error']);
	}
?>
<table class="frmtable">
<tr><td>Username</td><td>:</td><td><input type="text" name="username"/></td></tr>
<tr><td>Password</td><td>:</td><td><input type="password" name="password"/> </td></tr>
<tr><td colspan="3" style="text-align:center"><input type="submit" name="sub_adm"/></td></tr>
</table>
<center>
</form>
</body>
</html>