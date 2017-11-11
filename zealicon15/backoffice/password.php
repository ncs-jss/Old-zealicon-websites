<?php
include('common-code/login.php');
  if(!LoggedIn())
    header("location:login.php");
$conn = dbConnect();
?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Zealicon 2015</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">
  
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
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
          
            
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                     <?php include_once "common-code/topbar.php"; ?>
                
             </li>  
    </ul>

            <!-- /.navbar-top-links -->

            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <?php include_once "common-code/left-sidebar.php"; ?>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Change Password</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                  
                            <div class="row">
                                    <form role="form" action="" method="post">
                                        <div class="form-group">
                                            <label>Current Password</label>
                                            <input class="form-control" type="password" name="current_password">
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" name="new_password">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input class="form-control" type="password" name="confirm_password">
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-warning">Change Password</button>
                                    </form>
                                
                                
                                <?php
                        if (isset($_POST['submit'])) {
                                $password = $_REQUEST['current_password'];
                                $new_password = $_REQUEST['new_password'];
                                $confirm_password = $_REQUEST['confirm_password'];
                                $societyId = $_SESSION['user']['id'];
                                   $query = "SELECT * FROM society where `id`='$societyId'";
                                        $result = $conn->query($query);
                                        while($row = $result->fetch_array())
                                            $db_password = $row['password'];
                                
                                if($db_password === $password){
                                    if($new_password === $confirm_password){
                                        $query = "UPDATE society set `password` = '$new_password' where `id`='$societyId'";
                                        $result = $conn->query($query);
                                            echo '<script type="text/javascript">alert("Password Changed Successfully");</script>';}
                                    else{
                                        echo '<script type="text/javascript">alert("Your New and Confirm Password do not Match");</script>';
                                    }}
                                else{
                                echo '<script type="text/javascript">alert("You have entered wrong password");</script>';
                                }}
                                        ?>
                                        
                                     
                                       
                                <!-- /.col-lg-6 (nested) -->
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->


    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>

</body>

</html>
