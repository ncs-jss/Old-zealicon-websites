<html class=bg>
<head>
	<title> Society : Login </title>
	<link rel="stylesheet" href="assets/css/spanel.css">
</head>
<body>
<a href="common_code/logout.php">Logout</a>
	<?php
	session_start();
	if(!isset($_SESSION['society']))
	header ('Location:404.html');
	?>
	<?php
	if(isset($_SESSION['error']))
	{
		echo "<span><b style='color:red;'>".$_SESSION['error']."</b></span>";
		unset($_SESSION['error']);
	}
?>
	<a href="eventdet.php"><input type="button" value="Add Event"/></a>
	<a href="pdfupload.php"><input type="button" value="Upload Pdf"/></a>
</body>
</html>