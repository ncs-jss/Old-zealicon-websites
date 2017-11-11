<!doctype html>
<html class=bg>
<head>
	<title>Errata Login</title>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/base.css"/>
</head>
	<body>
	<div class="header">
		<div class="imgt"><img src="img/zealicon.png" style="max-width:200px;max-height:200px;"/></div><div class="hdng">ERRATA - The Treasure Hunt</div>
	</div>
			<div class="main">
				<div class="Part-1">
				<?php
					include_once('code/sidebar.php');
				?>
				</div>
				<div class="part-2"><h1>Login</h1>
				
				<form action="code/login.php" method="post">
				<table style="width:400px; height:100px;">
				<tr><td></td><td></td><td>
				<?php
					if(isset($_SESSION['error']))
					{
					echo "<font color=red> ".$_SESSION['error']."</font>";
					unset($_SESSION['error']);
					}
				?>
				</td></tr>
				<tr>
				<td>Email </td><td>:</td>
				<td><input type="email" name="email"></td>
				</tr>
				<tr>
				<td>Password </td><td>:</td>
				<td><input type="password" name="pass"></td>
				</tr>
				<tr><td></td><td></td>
				<td><input class="button small" type="submit" value="Login" style=""></td>
				</tr>
				</table>
				</form>
			</div>
				
			</div>
	</body>

</html>