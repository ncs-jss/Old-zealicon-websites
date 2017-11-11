
<!-- For The Society-->

<?php
	if (session_id() == "")
	header('Location:../404.html');
	require_once ('dbcon.php');
	$society = $_SESSION['society'];
	$sql="SELECT * FROM events WHERE `society` = '$society'" ;
	$result = mysqli_query($con,$sql);
	if(!$result)
		echo "database error";
	else
	{
	
	$count = mysqli_num_rows($result);
	echo "<table class=\"list_ev\" align='center'><tr><th class=\"dec_th\">Event id </th><th class=\"dec_th\">Event Name</th><th class=\"dec_th\">Status</th><th class=\"dec_th\">List</th></tr>";
	while ($count>0)
	{
		$fnd=mysqli_fetch_array($result);
		echo"<tr><b><td class=\"dec_td\">".$fnd['events_id']."</td><td class=\"dec_td\">".$fnd['ename']."</td>";
		$chk = $fnd['uploaded'];
		if($chk == 1)
		echo "<td class=\"dec_td\"> <font color=\"#12CC11\"> Uploaded </font></td><td class=\"dec_td\"> <font color=\"#12CC11\"> <a href=\"common_code/list.php?list=".$fnd['events_id']."\"> Available </a></font></td></b></tr>";
		else
		if($chk == 0)
		echo "<td class=\"dec_td\"> <font color=\"#AB8888\"> Pending </font></td><td class=\"dec_td\"><font color=\"#AB1212\"> Not Available </font></td></b></tr>";
		else
		echo "<td class=\"dec_td\"> <font color=\"#AB1212\"> Rejected </font> </td><td class=\"dec_td\"> <font color=\"#AB1212\"> Not Available </font></td></b></tr>";
		$count--;
	}
	echo "</table>";
}
if(!isset($_SESSION['getlist']))
 mysqli_close($con);
?>

