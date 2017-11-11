<html>
<head>
</head>
<body>
<a href="common_code/logout.php">Logout</a>
	<?php
	session_start();
	if(!isset($_SESSION['admin']))
	 header ('Location:404.html');
	?>
	
	<a href="adminnotify.php"><input type="button" value="Admin Notifications"/></a>
	<a href="societyadd.php"><input type="button" value="Add Society"/></a>
</body>
</html>