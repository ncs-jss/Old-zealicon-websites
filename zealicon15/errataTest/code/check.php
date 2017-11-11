<?php
	require_once('dbcon.php');
	session_start();
	if(isset($_POST['submission'])  && isset($_POST['ans']) && $_POST['ans']!='')
	{
	
		$level = $_SESSION['level'];
		$eml = $_SESSION['email'];
		$ans = mysqli_real_escape_string ($con , $_POST['ans']);
		$chkl = mysqli_fetch_assoc(mysqli_query($con , "SELECT `level` FROM `persons` WHERE `email` = '$eml'"));
		$chkans=mysqli_fetch_assoc(mysqli_query($con , "SELECT `answer` FROM `list` WHERE `level` = '$level'"));
		$orans=$chkans['answer'];
		$getl = $chkl ['level'];
	
		if($getl !=  $level)
			header('Location:../index.php');
		else
			{
			$query = "SELECT * FROM `list` WHERE `level` = '$level' AND `answer` = '$ans'";
			$res = mysqli_query($con , $query);
			if($res)
				{
				if(strcasecmp($ans,$orans)==0)
				{
				//echo $level." ".$_POST['ans']." ".$orans." ".$_SESSION['page'];
				$_SESSION['level']=$levelnew=$level+1;
				$updt="UPDATE `persons` SET `level`='$levelnew' WHERE `email`='$eml'";
				$res_updt=mysqli_query($con, $updt);
				$lev = mysqli_fetch_assoc(mysqli_query($con,"SELECT `page` FROM list WHERE `level` = $levelnew"));
				$goto = $lev['page'];
				$_SESSION['page']=$goto;
				header('Location:../'.$_SESSION['page'].'.php');
				}
				else
				{
					header('Location:../'.$_SESSION['page'].'.php');
				}
				}
			}
		
		}
		else
		{
		header('Location:../'.$_SESSION['page'].'.php');
		}
	
	mysqli_close($con);
	
?>
