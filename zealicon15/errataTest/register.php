<!doctype html>
<html class=bg>
<head>
	<title>
		Errata Register
	</title>
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
			<div class="part-2"><font size="6rem" style="font-weight:blod;">Registration</font><br/>
				<form action="code/check_register.php" method="post">
				<table align="left" style="width:400px; height:100px;">
					<tr>		
						<td></td><td></td>
						<td>
						<?php
						if(isset($_SESSION['error'])) 
						{
						echo "<font color='red'>".$_SESSION['error']."</font>"; 
						unset($_SESSION['error']);
						}
						?>
						</td>	
					</tr>
					<tr>		
						<td>Email Id </td><td>:</td>
						<td><input type="email" name="email"required/></td>	
					</tr>
					<tr>		
						<td>First Name</td><td>:</td>
						<td><input type="text" name="fname" required/></td>
					</tr>
					<tr>		
						
						<td>Last Name</td><td>:</td>
						<td><input type="text" name="lname" required/></td>
					</tr>
					<tr>		
						<td>Password </td><td>:</td>
						<td><input type="password" name="pass1"required/></td>
					</tr>
					<tr>		
						<td>Retype</td><td>:</td> 
						<td><input type="password" name="pass2"required/></td>
					</tr>
					<tr>		
					<td>Cellphone No</td><td>:</td>
					<td> <input type="text" pattern="[1-9][0-9]{9}" name="cell"required/></td>
					</tr>
					<tr>		
						<td>College</td><td>:</td>
						 <td><input type="text" name="clg"required/></td>
					</tr>
					<tr>		
						<td>
							<input class="button small" type="submit" name="sub_info" value="Sign in"/>
						</td>
					</tr>
			</table>
			</form>		
			</div>	
			</div>
				
			
			
			<br/><br/><br/>
			
	</body>
</html>