<?php 
include('common-code/login.php');
if(!LoggedIn())
    header("location:login.php");
auth();
$conn = dbConnect();
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zealicon 2015</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">

    <style>
      .onoffswitch {
        position: relative; width: 90px;
        -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
    }
    .onoffswitch-checkbox {
        display: none;
    }
    .onoffswitch-label {
        display: block; overflow: hidden; cursor: pointer;
        border: 2px solid #999999; border-radius: 20px;
    }
    .onoffswitch-inner {
        display: block; width: 200%; margin-left: -100%;
        -moz-transition: margin 0.3s ease-in 0s; -webkit-transition: margin 0.3s ease-in 0s;
        -o-transition: margin 0.3s ease-in 0s; transition: margin 0.3s ease-in 0s;
    }
    .onoffswitch-inner:before, .onoffswitch-inner:after {
        display: block; float: left; width: 50%; height: 30px; padding: 0; line-height: 30px;
        font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
        -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
    }
    .onoffswitch-inner:before {
        content: "ON";
        padding-left: 10px;
        background-color: #34A7C1; color: #FFFFFF;
    }
    .onoffswitch-inner:after {
        content: "OFF";
        padding-right: 10px;
        background-color: #EEEEEE; color: #999999;
        text-align: right;
    }
    .onoffswitch-switch {
        display: block; width: 18px; margin: 6px;
        background: #FFFFFF;
        border: 2px solid #999999; border-radius: 20px;
        position: absolute; top: 0; bottom: 0; right: 56px;
        -moz-transition: all 0.3s ease-in 0s; -webkit-transition: all 0.3s ease-in 0s;
        -o-transition: all 0.3s ease-in 0s; transition: all 0.3s ease-in 0s; 
    }
    .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
        margin-left: 0;
    }
    .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
        right: 0px; 
    }
</style>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="events.php">Zealicon-2015</a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <?php include_once "common-code/topbar.php"; ?>
                </li>  
            </ul>
            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                   <?php include_once "common-code/left-sidebar.php"; ?>
               </div>
           </div>
       </nav>
       <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Zealicon-2015 Content</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
              <?php
              $query = "select * from display where `id`=1";
              $result = $conn->query($query);
              while($row = $result->fetch_array()){?>
              <div class="row">
                <form role="form" action="" method="post">
                    <div class="form-group">
                        <label>About Zealicon</label>
                        <div class="onoffswitch">
                            <input type="checkbox" name="about" class="onoffswitch-checkbox" id="myonoffswitch0" <?php if ($row['about']==1) echo "checked"; ?>>
                            <label class="onoffswitch-label" for="myonoffswitch0">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Schedule</label>
                        <div class="onoffswitch">
                            <input type="checkbox" name="schedule" class="onoffswitch-checkbox" id="myonoffswitch1" <?php if ($row['schedule']==1) echo "checked"; ?> >
                            <label class="onoffswitch-label" for="myonoffswitch1">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Team</label>
                        <div class="onoffswitch">
                            <input type="checkbox" name="team" class="onoffswitch-checkbox" id="myonoffswitch2" <?php if ($row['team']==1) echo "checked"; ?>>
                            <label class="onoffswitch-label" for="myonoffswitch2">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Contact</label>
                        <div class="onoffswitch">
                            <input type="checkbox" name="contact" class="onoffswitch-checkbox" id="myonoffswitch3" <?php if ($row['contact']==1) echo "checked"; ?> >
                            <label class="onoffswitch-label" for="myonoffswitch3">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Registration Link</label>
                        <div class="onoffswitch">
                            <input type="checkbox" name="registration" class="onoffswitch-checkbox" id="myonoffswitch4" <?php if ($row['registration']==1) echo "checked"; } ?> >
                            <label class="onoffswitch-label" for="myonoffswitch4">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
                    </div>                    
                    <button type="submit" name="submit" class="btn btn-warning">Submit</button>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    if (isset($_POST['about'])) 
                      $about = 1;
                  else
                      $about = 0;
                  if (isset($_POST['schedule'])) 
                      $schedule = 1;
                  else
                      $schedule = 0;
                  if (isset($_POST['registration'])) 
                      $registration = 1;
                  else
                      $registration = 0;
                  if (isset($_POST['team'])) 
                      $team = 1;
                  else
                      $team = 0;
                  if (isset($_POST['contact'])) 
                      $contact = 1;
                  else
                      $contact = 0;

                  $sql = "UPDATE display SET `about`='$about',`schedule`='$schedule',`registration`='$registration',`team`='$team',`contact`='$contact' where `id`=1";

                  $result = $conn->query($sql);
                  dbDisconnect($conn); 
              }
              ?>
          </div>
      </div>
  </div>
</div>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="js/sb-admin.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
</script>

</body>

</html>
