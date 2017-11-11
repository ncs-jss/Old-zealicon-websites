<?php
	require_once ('dbcon.php');
	if (session_id() == "")
	 session_start();
	if(!isset($_SESSION['society']))
	{
	 $_SESSION['pgreq']="login";
	 $_SESSION['slogerr']="Please Log In to continue";
	 header('Location:../society.php');
	}
	else
	$society=$_SESSION['society'] ;
	$sql="SELECT * FROM events WHERE society = '$society'";
	$result = mysqli_query($con , $sql);
	if(!$result)
		echo "database error";
	else
	{
		$flag=1;
		$sel = mysqli_num_rows($result);
		if($sel==0)
		{
			$_SESSION['error']= "No events details uploaded yet";
		}
		else
		{
		while($flag<=$sel)
		{			
		$fnd=mysqli_fetch_array($result);
		$ev = $fnd['events_id'];
		$event =  $fnd['ename']; 
		echo "<option value=".$ev.">".$event."</option>";
		$flag++;
		}
		}
	}
	//mysqli_close($con);
?>



