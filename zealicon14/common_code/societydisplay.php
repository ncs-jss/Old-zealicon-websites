
<!-- For The Admin-->

<?php
	require_once ('dbcon.php');
	$sql="SELECT * FROM events";
	$result = mysqli_query($con , $sql);
	if(!$result)
		echo "database error";
	else
	{
	
	$count = mysqli_num_rows($result);
	echo "<table cellpadding='10' align='center'><tr><th class=\"dec_th\">Event id </th><th class=\"dec_th\">Event Name</th><th class=\"dec_th\">Society</th><th class=\"dec_th\">Status</th></tr>";
	while ($count>0)
	{
		$fnd=mysqli_fetch_array($result);
		echo"<tr><td class=\"dec_td\">".$fnd['events_id']."</td><td class=\"dec_td\">".$fnd['ename']."</td><td class=\"dec_td\">".$fnd['society']."</td>";
		$chk = $fnd['uploaded'];
		if($chk == 1)
		echo "<td class=\"dec_td\"> <font color=\"#12CC11\"> Uploaded </font></td></tr>";
		else
		if($chk == 0)
		echo "<td class=\"dec_td\"> <font color=\"#AB8888\"> Pending </font></td></tr>";
		else
		echo "<td class=\"dec_td\"> <font color=\"#AB1212\"> Rejected </font> </td></tr>";
		$count--;
	}
	echo "</table>";
}
	mysqli_close($con);
?>

