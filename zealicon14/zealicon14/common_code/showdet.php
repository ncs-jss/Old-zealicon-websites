<?php
	require_once ('dbcon.php');
	$event = $_GET['id'];
	$sql="SELECT * FROM events WHERE events_id='$event'";
	$result = mysqli_query($con , $sql);
	if(!$result)
		echo "database error";
	else
	{
		$fnd=mysqli_fetch_array($result);
		echo "<h4>Events Name</h4><br/>";
		echo $fnd['ename']."<br/>";
		echo "<h4>Society Name</h4><br/>";
		echo $fnd['society']."<br/>";
		echo "<h4>Category Name</h4><br/>";
		echo $fnd['category']."<br/>";	
		echo "<h4>About Event</h4><br/>";
		echo $fnd['about']."<br/>";		
		echo "<h4>Description</h4><br/>";
		echo $fnd['desc']."<br/>";		
		echo "<h4>Rules</h4><br/>";
		echo $fnd['rules']."<br/>";		
		echo "<h4>Prizes</h4><br/>";
		echo $fnd['prizes']."<br/>";		
		echo "<h4>Contact</h4><br/>";
		echo $fnd['contact']."<br/>";		
	}
	mysqli_close($con);
?>

