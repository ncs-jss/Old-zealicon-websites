<?php
echo '      <ul class="dropdown-menu dropdown-user">
              <li><a href="password.php"><i class="fa fa-gear fa-fw"></i> Change Password</a>
              </li>
              <li class="divider"></li>';
              if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'])
              	echo '<li><a href="common-code/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>';
              else
              	echo '<li><a href="login.php"><i class="fa fa-sign-in fa-fw"></i> Login</a></li>';
          echo '</ul>';
?>