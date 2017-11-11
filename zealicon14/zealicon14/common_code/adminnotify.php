<?php
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
		$fnd=$result->fetch_array();
		$ev = $fnd['events_id'];
		$events_idget = mysqli_fetch_assoc(mysqli_query($con,"SELECT ename FROM events WHERE events_id='$ev'"));
		$event =  $events_idget['ename']; 
		echo "<li><h6><a href='showdet.php?id=".$ev."'>".$event."</a></h6></li>";
		$flag++;
		}
		}
	}
	mysqli_close($con);
?>

