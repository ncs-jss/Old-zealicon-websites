<script src="jquery-1.3.2.min.js"></script>
  <div class="smenu">
				<ul>
				<li onclick="window.location='index.php'" > Home</li>
                
            
<?php

				require_once('code/dbcon.php');
				session_start();
					//check if logged in then display logout
					//if not logged in then login & register
					if(!isset($_SESSION['user']))
					{
						echo '
					
							<li onclick="window.location=\'login.php\'"> Login</li>  
				
				<li onclick="window.location=\'register.php\'"> Register</li>';
					}
					else
					{
						echo '
							<li onclick="window.location=\''.$_SESSION['page'].'.php\'"> Battleground</li>
							<li onclick="window.location=\'code/logout.php\'">Logout</li>
							';
						
					}
					
				?>
	<li onclick="window.location='lead.php'">LeaderBoard</li>
	<li onclick="window.location='rules.php'">Rules</li>
	<li onclick="window.location='https://www.facebook.com/errata14'">Forum</li>
	</ul> </div>