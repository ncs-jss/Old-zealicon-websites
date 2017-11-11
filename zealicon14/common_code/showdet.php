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
		echo "</br> <font id=\"evd_h\">Event Name</font><br/></br>";
		echo $fnd['ename']."<br/>";
		echo "</br> <font id=\"evd_h\">Society Name</font><br/></br>";
		echo $fnd['society']."<br/>";
		echo "</br> <font id=\"evd_h\">Category Name</font><br/></br>";
		echo $fnd['category']."<br/>";	
		echo "</br> <font id=\"evd_h\">About Event</font><br/></br>";
		echo $fnd['about']."<br/>";		
		echo "</br> <font id=\"evd_h\">Description</font><br/></br>";
		echo $fnd['desc']."<br/>";		
		echo "</br> <font id=\"evd_h\">Rules</font><br/></br>";
		echo $fnd['rules']."<br/>";		
		echo "</br> <font id=\"evd_h\">1st Prize</font></br></br>";
		echo $fnd['1prizes']."<br/>";		
		echo "</br> <font id=\"evd_h\">2nd Prize</font></br></br>";
		echo $fnd['2prizes']."<br/>";	
		if($fnd['3prizes']!=" ")
		{
		echo "</br> <font id=\"evd_h\">3rd Prize</font></br></br>";
		echo $fnd['3prizes']."<br/>";		
		}
		echo "</br> <font id=\"evd_h\">1st Contact</font></br></br>";
		echo $fnd['1contact']."<br/>";		
		echo "</br> <font id=\"evd_h\">2nd Contact</font></br></br>";
		echo $fnd['2contact']."<br/>";		
	}
	mysqli_close($con);
?>

