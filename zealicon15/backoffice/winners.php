<?php 
include_once 'common-code/login.php';
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
                <h1 class="page-header">Winners</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List of Winners
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Event Name</th>
                                        <th>Winner-1</th>
                                        <th>Winner-2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php
                                 $societyId = $_SESSION['user']['id'];
                                 $query = "SELECT * FROM events where `societyId`='$societyId'";
                                 $result = $conn->query($query);
                                 while($row = $result->fetch_array()){
                                    ?>
                                    <tr class="gradeU">
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['winner1']; ?></td>
                                        <td><?php echo $row['winner2']; ?></td>
                                    </tr>
                                    <?php  }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <a href="javascript:" class="btn btn-primary showMyModal">Update Event Winner(s)</a>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Update Event Winner</h4>
                            </div>
                            <div class="modal-body">
                             <form action="scripts/update_winner.php" method="post">
                                 <div class="form-group">
                                    <label>Event Name</label>
                                    <select name="event_name" class="form-control eventName" type="text">
                                      <?php 
                                      $query = "SELECT * FROM events where `societyId`='$societyId'";
                                      $result = $conn->query($query);
                                      while($row = $result->fetch_array()){ ?>
                                      <option data="<?php echo base64_encode(json_encode($row)) ?>" value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                      <?php } 
                                      dbDisconnect($conn);?>
                                  </select></div>
                                  <div class="form-group">
                                     <label>Winner-1</label>
                                     <input type="text" class="form-control" name="winner1" placeholder="Winner-1">
                                 </div>
                                 <div class="form-group">
                                     <label>Winner-2</label>
                                     <input type="text" class="form-control" name="winner2" placeholder="Winner-2">
                                 </div>
                                 <button type="submit" class="btn btn-primary">Update Winner</button>
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
    setData = function(data){
        winner1 = data.winner1;
        winner2 = data.winner2;
        $('#myModal').find('input[name="winner1"]').val(winner1);
        $('#myModal').find('input[name="winner2"]').val(winner2);        
    }
    $(document).on('click','.showMyModal',function(){
        data = $.parseJSON(atob($('.eventName option:selected').attr('data')));
        setData(data);
        $('#myModal').modal('show');
    });
    $('.eventName').change(function(event) {
        data = $.parseJSON(atob($(this).find('option:selected').attr('data')));
        setData(data);
    });
</script>
</body>
</html>
