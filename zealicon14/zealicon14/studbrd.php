<?php
    session_start();
    require("common_code/dbcon.php");

	if(isset($_SESSION['stuname'])) 
    {
    echo "<p style='font-size:24px; '><b>Welcome  " .$_SESSION['stuname']." </b></p></br>";
    } 
$uid = $_SESSION['umail'];
$result = $con->query("SELECT * FROM `registrations` WHERE `email` = '$uid'") or die("Error in Database Connection : Try Again Later");
?>
    
 <?php
echo "<table border='0' align='left' cellpadding='10'>";


while($row = $result->fetch_array())
  {
  echo "<tr>
  <td> <b> Your Contact Number: </b> </td>
  <td>" . $row['contact'] . "</td>";
 

  echo "<td> <b> Your Zeal ID: </b></td><td>" . $row['zealicon_id'] . "</td>";
  echo "<td> <b> Your College: </b></td><td>" . $row['clgname'] . "</td>";
  
  echo "</tr>";
  }
echo "</table>";

$ev = mysqli_query($con,"SELECT * FROM `registrations` WHERE `email` = '$uid'");
$count = mysqli_num_fields($ev);
$i=8;
 echo"<p style='font-size:20px; '><b>Events you've registered for: </b></p>";
echo "<table><tr>";
while($i<$count)
{
	$getname = mysqli_fetch_fields($ev);
	$eventid = $getname[$i]->name;
	
	$evr = mysqli_fetch_assoc(mysqli_query($con , "SELECT `$eventid` FROM `registrations` where `email` = '$uid'"));
	
	if($evr[$eventid] == 1)
	{
		$evname = mysqli_fetch_assoc(mysqli_query($con,"SELECT `ename` FROM `events` WHERE `events_id` = '$eventid'"));
		echo "<td>".$evname['ename']."</td>";
	}
	$i++;
	if($i%3==2)
	{
		echo "</tr><tr>";
	}
}
echo "</tr></table>";
$con->close();
?>