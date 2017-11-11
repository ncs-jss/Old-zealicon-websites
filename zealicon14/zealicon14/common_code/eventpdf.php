<?php
	require_once ('dbcon.php');
	$society=$_SESSION['society'];
	$sql="SELECT * FROM events WHERE society = '$society'";
	$result = mysqli_query($con , $sql);
	if(!$result)
		echo "database error";
	else
	{
		$flag=1;
		$sel = mysqli_num_rows($result);
		if($sel==0)
		echo "There are no event details uploaded";
		else
		{
		while($flag<=$sel)
		{			
		$fnd=mysqli_fetch_array($result);
		$ev = $fnd['events_id'];
		$event =  $fnd['name']; 
		echo "<option value=".$ev."'>".$event."</option>";
		$flag++;
		}
		}
	}
	mysqli_close($con);
?>



