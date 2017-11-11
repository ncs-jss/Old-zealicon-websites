<?php
	if (session_id() == "")
	 session_start();
	if(!isset($_SESSION['admin']))
	{
	 header("Location: ../404.html");
	}
	require_once ('dbcon.php');
	$sql="SELECT * FROM notify";
	$result = $con->query($sql);
	if(!$result)
		echo "database error";
	else
	{
		$flag=1;
		$sel = $result->num_rows;
		if($sel==0)
		echo "<br> There are no notifications...  So relax";
		else
		{
		while($flag<=$sel)
		{			
		$fnd=mysqli_fetch_array($result);
		$ev = $fnd['events_id'];
		$events_idget = mysqli_fetch_assoc(mysqli_query($con,"SELECT ename FROM events WHERE events_id='$ev'"));
		$event =  $events_idget['ename']; 
		echo "<a href='showdet.php?id=".$ev."'> <font class=\"adm_not\"> ".$event." </font>  </a> </br> </br>";
		$flag++;
		}
		}
	}
	mysqli_close($con);
?>

