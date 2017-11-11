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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
    
        $(document).ready(function() {
    var max_fields      = 50; 
    var wrapper         = $(".input_fields_wrap"); 
    var add_button      = $(".add_field_button");
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ 
        e.preventDefault();
        if(x < max_fields){ 
            x++; 
            $(wrapper).append('<div class="form-group"><input class="form-control" type="text" name="rules[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
        
    </script>
    
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
                    <h1 class="page-header">Registrations</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of Registrations
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Zealicon ID</th>
                                            <th>Name</th>
                                            <th>E-Mail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                            <?php
   
                                        
                                        
                                 $query = "SELECT * FROM registration";
                                        $result = $conn->query($query);
                                        while($row = $result->fetch_array()){

                                        ?>
                                        
                                     
                                        <tr class="gradeU">
                                            <td><?php echo $row['zealId']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                        </tr>
                                      
                <?php } 
                                         dbDisconnect($conn);?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                Register
                            </button>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Registration Form</h4>
                                        </div>
                                        <div class="modal-body">
                                           <form action="scripts/register.php" method="post">
                                               <div class="form-group">
                                               <label>Name</label>
                                                   <input type="text" class="form-control" name="name" required placeholder="Name">
                                               </div>
                                                <div class="form-group">
                                               <label>E-Mail</label>
                                                   <input type="email" class="form-control" name="email" required placeholder="E-Mail">
                                               </div>
                                                <div class="form-group">
                                               <label>Mobile</label>
                                                   <input type="text" class="form-control" name="mobile" required pattern="\d{10}" placeholder="Mobile Number" maxlength="10">
                                               </div>
                                                    <div class="form-group">
                                               <label>Password</label>
                                                   <input type="password" class="form-control" required name="password" placeholder="Password">
                                               </div>
                                                    <div class="form-group">
                                               <label>Course</label>
                                                   <input type="text" class="form-control" required name="course" placeholder="Course">
                                               </div>
                                                <div class="form-group">
                                               <label>College</label>
                                                   <input type="text" class="form-control" required name="college" placeholder="College">
                                               </div>
                                               
                                               
   

                                               
                                            <button type="submit" class="btn btn-primary">Register</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </form>
                                               </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            
            <!-- /.row -->
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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
