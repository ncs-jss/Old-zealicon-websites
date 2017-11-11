<?php 
    include_once 'common-code/login.php';
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
      .modal-dialog{
        width:80%;
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
                    <h1 class="page-header">Events-Approval</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of Event(s), with Pending Approval
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Event</th>
                                            <th>Concerned Society</th>
                                            <th>View</th>
                                            <th>Approve</th>
                                            <th>Decline</th>
                                        </tr>
                                    </thead>
                                    <tbody>          
                             <?php       
                                 $value = 0;     
                                 $query = "SELECT * FROM events where `display`='$value'";
                                        $result = $conn->query($query);
                                        while($row = $result->fetch_array()){
                                        ?>
                                        <tr class="gradeU">
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php 
                                            $societyId = $row['societyId']; 
                                            $query_for_society_name = "SELECT * FROM society where `id`=$societyId";
                                            $result1 = $conn->query($query_for_society_name);
                                            while($row1 = $result1->fetch_array())
                                                $society_name = $row1['societyName'];
                                                echo $society_name;
                                                ?></td>
                                            <td><a href="javascript:" class="btn btn-primary view" data-event='<?php echo base64_encode(json_encode($row)); ?>'>View</a></td>
                                          <?php
                                           echo '<td><a class="btn btn-primary" href="scripts/approval.php?id=' . $row['id'] . '&type='.'accept'.'">Accept</a></td>';
                                            ?>
                                          <td><a class='deleteEvent btn btn-primary' href="scripts/delete.php?id=<?php echo $row['id']?>&type=event">Delete</a></td>
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
                   
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Event Details</h4>
                </div>
                <div class="modal-body">
                  <p class="event_name"><strong>Event Name </strong>: <span></span></p>
                  <p class="category"><strong>Category </strong>: <span></span></p>
                  <div class="about"><strong>About </strong>: <div></div></div>
                  <div class="description"><strong>Description </strong>: <div></div></div>
                  <p class="prize1"><strong>First Prize </strong>: <span></span></p>
                  <p class="prize2"><strong>Second Prize </strong>: <span></span></p>
                  <p class="contact1"><strong>Contact Person 1 </strong>: <span></span></p>
                  <p class="contact2"><strong>Contact Person 2 </strong>: <span></span></p>
                  <p class="link"><strong>Link </strong>: <span></span></p>
                  <p class="fileUpload"><strong>Link </strong>: <span></span></p>
                  <div class="rules">
                    <p><strong>Rules</strong></p>
                    <ul></ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
 <script>
        $(document).on('click','.deleteEvent',function(e){
            if(!confirm("Sure to delete ?")){e.preventDefault()}
        });
$(document).on('click','.view',function(){
      data = $(this).attr('data-event');
      data = $.parseJSON(atob(data));
      eventData = $.parseJSON(atob(data.eventData));
      $('#myModal').find("p.event_name span").text(data.name);
      $('#myModal').find("p.category span").text(data.category);
      $('#myModal').find("p.contact1 span").text(eventData.contact1);
      $('#myModal').find("p.contact2 span").text(eventData.contact2);
      $('#myModal').find("p.link span").text(eventData.link);
      $('#myModal').find("p.prize1 span").text(eventData.prize1);
      if(eventData.filePath != '')
        $('#myModal').find('.fileUpload span').html('<a class="btn btn-primary" href="'+eventData.filePath+'" download>Download File</a>');
      aboutData = $("<div/>").html(eventData.about).text();
      descData = $("<div/>").html(eventData.description).text();
      $('#myModal').find("p.prize2 span").text(eventData.prize2);
      $('#myModal').find("div.about div").html(aboutData);
      $('#myModal').find("div.description div").html(descData);
      str = '';
      $.each(eventData.rules, function(index, val) {
        str+='<li>'+val+'</li>';
      });
      $('#myModal').find('.rules ul').html(str);
      $('#myModal').modal('show');
    });
</script>
</body>

</html>
