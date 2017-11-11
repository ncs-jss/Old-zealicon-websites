<!doctype html>
<html class=bg>
<head>
	<title>
		Errata Leaderboard
	</title>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/base.css"/>
</head>
	<body>
		<div class="header">
		<div class="imgt"><img src="img/zealicon.jpg" style="max-width:200px;max-height:200px;"/></div><div class="hdng">ERRATA - The Treasure Hunt</div>
	</div>
		
		<div class="main">
			<div class="part-1">
			<?php
				require_once('code/sidebar.php');
			?>
		</div>
		<div class="part-2"><h1>LeaderBoard</h1>
		<table  align="center"style="color:black;text-align:left;width:100%;" border="1" cellspacing="0" cellpadding="10">
			<th>S No.</th>
			<th>Name</th>
			<th>Level</th>
			<th>College</th>
			<?php
				require_once('code/dbcon.php');
				$sql="SELECT fname, lname,college, level FROM `errata`.persons ORDER BY Level DESC LIMIT 0,10";
				$res=mysqli_query($con, $sql);
				$i=1;
				while($ans=mysqli_fetch_array($res))
					{
						echo "<tr>";
						echo "<td>";
						echo $i;
						$i++;
						echo "</td>";
						echo "<td>";
						echo $ans['fname'];
						echo " ";
						echo $ans['lname'];
						echo "</td>";
						echo "<td>";
						echo $ans['level'];
						echo "</td>";
						echo "<td>";
						echo $ans['college'];
						echo "</td>";
						echo "</tr>";
					}
			?>
		</table>
		</div>
		</div>
	</body>
