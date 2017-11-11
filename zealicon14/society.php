<html class=bg>
<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Zealicon 2K14</title>
        <BASE href="http://www.zealicon.in">
        <meta name="description" content="Zealicon twenty14 the annual techno cultural fest of jssate">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/reset-min.css">
        <link rel="stylesheet" href="assets/css/spanel.css">

       <script type="text/javascript" src="assets/js/jquery-1.11.0.min.js"> </script>
	   <script src="assets/js/animation.js"></script>
        <script src="assets/js/events.js"></script>
        <script src="assets/js/team.js"></script>        
        <script src="assets/js/nav.js"></script>
    </head>
    <body>      
        <div id="site">
<!-- Navigation buttons -->            
            <div id="nav">
			  <div>
				<?php 
				session_start();
				$pgrq="";
				if(isset($_SESSION['pgreq']))
				 {
				  $pgrq = $_SESSION['pgreq'];
				  unset($_SESSION['pgreq']);
				 }
				if(!(isset($_SESSION['society'])))
				echo"
				<script> $(document).ready(function() 
				{
				 $('#$pgrq').click();
				});
				</script>
                <span>Login</span>
                <a title=\"login\" href=\"#login-header\">L</a>
				";
				else
				{
				 echo"
				<script> $(document).ready(function() 
				{
				 $('#$pgrq').click();
				 $('#login-header').hide();
				 $('#login-panel').hide();
				});
				</script>";
				 echo'
				 <span>Home</span>
                <a title="logout" href="#site">H</a>
                <span>Event Details</span>
                <a title="socdb" id="gotoae" href="#add_e">E</a>
				<span>Upload Extra Details</span>
                <a title="socdb" id="gotoup" href="#upl_pdf">F</a>
				<span>Uploaded Information</span>
                <a title="socdb" id="gotouple" href="#ent_det">D</a>';
				if(isset($_SESSION['getlist']))
				{echo"
				<span>Registered List</span>
                <a title=\"socdb\" id=\"getlist\" href=\"#stu_list\">R</a>
				";
				}
				echo '<span>Logout</span>
                <a title="logout" href="common_code/logout.php">L</a>
				';
				}
				?>
			  </div>
            </div>
<!-- Navigation buttons -->
<!-- central logo-->            
            <div id=underlay>
                <div id="logo">
                    <img src="assets/img/z/z_white.png">
                    <div class="scroll-hint"></div>
					<?php
				if(isset($_SESSION['society']))
				echo "<font class='hdng'><b>Welcome ".$_SESSION['societyname']."</b></font>";
			?>
                </div>
            </div>
			
<!-- central logo-->
            
<!--register forms-->            
            <div class="vertical-line"></div>
<?php
if(isset($_SESSION['society']))
{
	echo '
            <div id="add_e" class="header">
			  <h1>
					<div class="en">Add</div>
				</h1>    
                <div class="bg bg-1">
                    <img src="assets/img/header/register-1.png">
                </div>
                <div class="bg bg-2">
                    <img src="assets/img/header/register-2.png">
                </div>
            </div>
<div id="addevents">';								//First Division of the page (in case logged in)
if(isset($_SESSION['severr']))
	{
		echo "<span><b style='color:red;'>".$_SESSION['severr']."</b></span>";
		unset($_SESSION['severr']);
	}
echo '	
<div id="get-detail">
		<form action="common_code/events.php" method="post">
				<div class="etitle">
				<font class="flabel" ><b> Event Name </b></font> <input style="width:540px;	margin:10px; height:40px;" type="text" name="name" placeholder="Name of the Event" required>
				</div>
				<div class="media">
				<font class="flabel">Category</font> </br>
						<select style="width:540px;	margin:10px; height:40px;" name="category"/>
  									<option value="COLORALO">COLORALO</option>
  									<option value="Z-WARS">Z-WARS</option>
  									<option value="PLAY IT ON">PLAY IT ON</option>
 									<option value="ROBOTILES">ROBOTILES</option>
 									<option value="CODERZ">CODERZ</option>
 									<option value="MECHAVOLTZ">MECHAVOLTZ</option>
						</select> </br>
					<font class="flabel">About</font> </br>
						<textarea name="about" class="fip" placeholder="Short Detail" required></textarea>
					<font class="flabel">Description</font> </br>
						<textarea name="desc" class="fip" placeholder="Description about Rounds"  required></textarea>
					<font class="flabel">Rules</font> </br>
						<textarea name="rules" class="fip" placeholder="Short Detail" required></textarea>	</br>
						<input type="submit" style="margin:30px 0px 0px 10px;height:40px;width:200px;" name="subinp" value="Upload Details"/>
                </div>
            
            <div class="credits">
					
					<font class="flabel">1st Prize</font> </br>
						<textarea class="fip" name="1prizes" placeholder="1st Prize to be won"  required></textarea>
						</br>
					<font class="flabel">2nd Prize</font> </br>
						<textarea class="fip" name="2prizes" placeholder="2nd Prize to be won"  required></textarea>
						</br>
					<font class="flabel">3rd Prize (Optional) </font> </br>
						<textarea class="fip" name="3prizes" placeholder="3rd Prize to be won"></textarea>
						</br>
                	<font class="flabel">1st Contact Detail</font> </br>
						<textarea name="1contact" class="fip" placeholder="1st Contact detail" required></textarea>
                              </br>
							  <font class="flabel">2nd Contact Detail</font> </br>
						<textarea name="2contact" class="fip" placeholder="2nd Contact detail" required></textarea>
                              </br>
			
				
            </div>    
        </div>
	</form> 
	</div>
	</div> </br>
';
echo '<div class="vertical-line"></div> </br>				
		<div class="vertical-line"></div>
			<div id="upl_pdf" class="header">
			  <h1>
					<div class="en">Upload PDF</div>
				</h1>    
                <div class="bg bg-1">
                    <img src="assets/img/header/register-1.png">
                </div>
                <div class="bg bg-2">
                    <img src="assets/img/header/register-2.png">
                </div>
            </div>';									//Second Segment Of The Page(logged in)
	if(isset($_SESSION['fuperr']))
	{
		echo "<span><b style='color:red;'>".$_SESSION['fuperr']."</b></span>";
		unset($_SESSION['fuperr']);
	}	
	echo '<form id="input" action="common_code/uploadpdf.php" method="post" enctype="multipart/form-data">
					<table  align="center" class="frmtable">
					<tr><td>Event </td><td>:&nbsp &nbsp</td><td>
					<select name="eventpdf">';
						include_once("common_code/eventshow.php");
	echo '			</select> </td>
					</tr>
					<tr><td>File </td><td>: &nbsp &nbsp</td><td><input type="text" id="filename" name="file"></td></tr>
					<tr> <td></td> <td style="text-align:center"><input type="file" id="selectedFile" name="file" style="display:none;" />
					<input type="button" value="Browse" onclick="document.getElementById(\'selectedFile\').click();" /></td>
					<td><input type="submit" value="Upload"></td></tr>
					</table>
				</form>
				<script>
					document.getElementById(\'selectedFile\').onchange = uploadOnChange;
					function uploadOnChange() {
					var filename = this.value;
					document.getElementById(\'filename\').value = filename;}
				</script>';
	echo '<div class="vertical-line"></div> </br>
			<div id="ent_det" class="header">
			  <h1>
					<div class="en">Uploads</div>
				</h1>    
                <div class="bg bg-1">
                    <img src="assets/img/header/register-1.png">
                </div>
                <div class="bg bg-2">
                    <img src="assets/img/header/register-2.png">
                </div>
            </div>';							//Third Segment Of the Page (Logged In)
	include_once("common_code/society_da.php");
}

if(isset($_SESSION['getlist']))
{echo '<div class="vertical-line"></div> </br>
			<div id="stu_list" class="header">
			  <h1>
					<div class="en">Registered</div>
				</h1>    
                <div class="bg bg-1">
                    <img src="assets/img/header/register-1.png">
                </div>
                <div class="bg bg-2">
                    <img src="assets/img/header/register-2.png">
                </div>
            </div>';							//Fourth Segment Of the Page (Logged In)
	include_once("common_code/createlist.php");
}
?>
            <div id="login-header" class="header">
			  <h1>
					<div class="en">Login</div>
				</h1>    
                <div class="bg bg-1">
                    <img src="assets/img/header/spanel/register-1.png">
                </div>
                <div class="bg bg-2">
                    <img src="assets/img/header/spanel/login.png">
                </div>
            </div>
<div id="login-panel">	
<p class="hdng">Zealicon 14 : Society Panel</p>
</br>
<form action="common_code/soc_login.php" method="post">
<div id="rbase">
		<div id="rform">
<?php
	if(isset($_SESSION['slogerr']))
	{
		echo "<span><b style='color:red;'>".$_SESSION['slogerr']."</b></span>";
		unset($_SESSION['slogerr']);
	}
?>
			<table  align="center" class="frmtable">
					<tr><td>Login-ID </td><td>:&nbsp &nbsp </td> 
						<td>	<input type="text" name="username" required/> </td>
					</tr>
					<tr><td>Password </td><td>: &nbsp &nbsp </td><td> <input type="password" name="pass" class="frmin" required/> </td></tr>
					<tr><td colspan="3" style="text-align:center"> <input type="submit" value="Login" ></td></tr>
					
			</br> </br> </font>
		</form>
		
</div>
</div>
</div>
</body>
</html>