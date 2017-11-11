<!doctype html>
<html class=bg>
<head>
	<title>Errata</title>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/base.css"/>
</head>
	<body>
	<div class="header">
		<div class="imgt"><img src="img/zealicon.png" style="max-width:200px;max-height:200px;"/></div><div class="hdng">ERRATA - The Treasure Hunt</div>
	</div>
			
			<div class="main">
				<div class="Part-1">
				<?php
					include_once('code/sidebar.php');
					if(!isset($_SESSION['user']))
					header('Location:index.php');
				?>
				<?php
					if($_SESSION['level']!=7)
					header('Location:'.$_SESSION['page'].'.php');
				?>
	

				</div>
				<div class="main_content">
					<form id="input" action="code/check.php" method="post">
					<table align="center">
					<tr>
						<td>
						<?php
							$q=new que;
							$q->get($con);
							class que
							{
								public function get($con)
								{
										$l=stripslashes($_SESSION['level']);
										$sql="SELECT * FROM `list` WHERE `level` = '7'";
										$res=mysqli_query($con,$sql);
										if($res)
										{
											$questionDetails= mysqli_fetch_assoc($res);
											$ques= $questionDetails['question'];
											if($ques!="")
											{
												echo "<div class='ques'>".$ques."</div>";
											}
											else
											{
												$link=$questionDetails['image'];
												echo "<img class='qimg' src ='".$link."'./>";
											} 
										}
										else
										echo("Connection Problem....");
			
								}
							}
							mysqli_close($con);
						?>
						</td>		
					</tr>
					<tr>
						<td>
						<input type="text" name="ans"><br><br>
						</td>
					</tr>
					<tr>
						<td>	
						<input class="button small" type="submit" value="Done" name="submission">
						</td>
					</tr>
					</form>
				</div>
			</div>
	</body>
</html>