<?php
include('common-code/login.php');
if(!LoggedIn())
    header("location:login.php");
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
                <a class="navbar-brand" href="index.php">Zealicon-2015</a>
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
                    <h1 class="page-header">Contact Person(s)</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of Contact Person(s)
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Contact</th>
                                            <th>E-Mail</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                       
                                       $query = "SELECT * FROM contactus";
                                       $result = $conn->query($query);
                                       while($row = $result->fetch_array()){?>
                                       <tr class="gradeU">
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['position']; ?></td>
                                        <td><?php echo $row['mobile']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><a class='deleteSociety btn btn-primary' href="scripts/delete.php?id=<?php echo $row['id']?>&type=contact">Delete</a></td>
                                    </tr>
                                    <?php  }
                                    dbDisconnect($conn);?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                    Add a New Person
                </button>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Add a New Person</h4>
                            </div>
                            <div class="modal-body">
                             <form action="scripts/add_contact.php" method="post">
                                 <div class="form-group">
                                     <label>Name</label>
                                     <input type="text" class="form-control" required name="name" placeholder="Name">
                                 </div>
                                 <div class="form-group">
                                     <label>Position</label>
                                     <input type="text" class="form-control" required name="position" placeholder="Position">
                                 </div>
                                 <div class="form-group">
                                     <label>E-Mail</label>
                                     <input type="email" class="form-control" required name="email" placeholder="E-Mail">
                                 </div>
                                 <div class="form-group">
                                     <label>Mobile</label>
                                     <input type="text" class="form-control" required pattern="\d{10}" name="mobile" placeholder="Mobile">
                                 </div> 
                                 <button type="submit" class="btn btn-primary">Add Person</button>
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
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
<script>
    $(document).on('click','.deleteSociety',function(e){
        if(!confirm("Sure to delete ?")){e.preventDefault()}
    });
</script>
</body>
</html>
