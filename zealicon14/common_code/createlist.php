<?php
	if (session_id() == "")
	header('Location:../404.html');
	require_once ('dbcon.php');
	$eventid = $_SESSION['getlist'];
	$name = "SELECT * FROM registrations WHERE `$eventid`='1'";
	$getlist = mysqli_query($con,$name);
				if($getlist)
				$count = mysqli_num_rows($getlist);
				else
				$count = 0;
				$event = mysqli_fetch_array(mysqli_query($con,"SELECT ename FROM events WHERE events_id = '$eventid'"));
				echo "<span class='hdng'>Student Registered For ".$event['ename']."<br/></span>";
				echo "<table class=\"list_ev\" align='center'><tr><th class=\"dec_th\">Name </th><th class=\"dec_th\">E-mail</th><th class=\"dec_th\">Contact</th><th class=\"dec_th\">Zealicon-id</th></tr>";
					
				if($count==0)
			{
				echo '<tr><td colspan=4 align=center>There are no registrations Yet</td></tr>';
			}	
	else			
	{
	while ($count>0)
	{
		$fnd=mysqli_fetch_array($getlist);
		echo"<tr><td class=\"dec_td\">".$fnd['name']."</td><td class=\"dec_td\">".$fnd['email']."</td><td class=\"dec_td\">  ".$fnd['contact']." </td><td class=\"dec_td\"> ".$fnd['zealicon_id']." </td></tr>";
		$count--;
	}
	}
	echo "</table>";
	mysqli_close($con);
?>

