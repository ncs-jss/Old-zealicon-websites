<?php
	require_once ('dbcon.php');
	if (session_id() == "")
	 session_start();
	if(!isset($_SESSION['admin']))
	{
	 
	 header('Location:../404.html');
	}
	else
	$sql="SELECT * FROM mapping";
	$result = mysqli_query($con , $sql);
	if(!$result)
		echo "database error";
	else
	{
		$flag=1;
		$sel = mysqli_num_rows($result);
		if($sel==0)
		{
			$_SESSION['error']= "No societies present";
		}
		else
		{
		while($flag<=$sel)
		{			
		$fnd=mysqli_fetch_array($result);
		$soc = $fnd['societyname'];
		$socname = $fnd['society'] ; 
		echo "<option value=".$socname.">".$soc."</option>";
		$flag++;
		}
		}
	}
	//mysqli_close($con);
?>



