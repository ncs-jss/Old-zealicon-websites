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
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <style>
    *,.form-control:focus{
      border-radius: 0 !important;
      box-shadow: none;
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
          <h1 class="page-header">Team</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              List of Team Members
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Category</th>
                      <th>Title</th>
                      <th>View</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = "SELECT * FROM team";
                    $result = $conn->query($query);
                    while($row = $result->fetch_array()){?>
                    <tr class="gradeU">
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['category']; ?></td>
                      <td><?php echo $row['title']; ?></td>
                      <td><a href="javascript:" class="view btn btn-primary" data="<?php echo base64_encode(json_encode($row));?>">View</a></td>
                      <td><a class='deleteTeam btn btn-primary' href="scripts/delete.php?id=<?php echo $row['id']?>&type=team">Delete</a></td>
                    </tr>
                    <?php } 
                    dbDisconnect($conn);?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
            Add a Team Member
          </button>
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Add a Team Member</h4>
                </div>
                <div class="modal-body">
                 <form action="scripts/add_team_member.php" method="post" enctype="multipart/form-data">
                   <div class="form-group">
                     <label>Name</label>
                     <input type="text" class="form-control" name="name" placeholder="Name">
                   </div>
                   <div class="form-group">
                     <label>Category</label>
                     <select class="form-control" name="category">
                      <option value="Lead">Lead</option>
                      <option value="Developer">Developer</option>
                      <option value="Designer">Designer</option>
                    </select>
                  </div>
                  <div class="form-group">
                   <label>Title</label>
                   <input type="text" class="form-control" name="title" placeholder="Title">
                 </div>
                 <div class="form-group">
                   <label>Long Description</label>
                   <textarea class="form-control" name="long_desc" placeholder="Long Description"></textarea>
                 </div>
                 <div class="form-group">
                   <label>Short Description</label>
                   <input type="text" class="form-control" name="short_desc" placeholder="Short Description">
                 </div>
                 <div class="form-group">
                   <label>File (if any)</label>
                   <input type="file" class="form-control" name="file">
                 </div>
                 <div class="form-group">
                   <label>Facebook Profile Link</label>
                   <input type="text" class="form-control" name="fb_link" placeholder="Facebook Link">
                 </div>
                 <div class="form-group">
                   <label>LinkedIn Profile Link</label>
                   <input type="text" class="form-control" name="l_link" placeholder="LinkedIn Link">
                 </div>
                 <button type="submit" class="btn btn-primary">Add</button>
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
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Team Member Details</h4>
      </div>
      <div class="modal-body">
        <p class="name"><strong>Name </strong>: <span></span></p>
        <p class="category"><strong>Category </strong>: <span></span></p>
        <p class="title"><strong>Title </strong>: <span></span></p>
        <p class="long_desc"><strong>Long Description </strong>: <span></span></p>
        <p class="short_desc"><strong>Short Description </strong>: <span></span></p>
        <p class="fb_link"><strong>Facebook Link </strong>: <span></span></p>
        <p class="l_link"><strong>LinkedIn Link </strong>: <span></span></p>
        <p class="teamMemPic"></p>
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
  $(document).on('click','.view',function(){
    data = $.parseJSON(atob($(this).attr('data')));
    $('#myModal2').find("p.name span").text(data.name);
    $('#myModal2').find("p.category span").text(data.category);
    $('#myModal2').find("p.title span").text(data.title);
    if(data.img != '')
      $('#myModal2').find("p.teamMemPic").html('<img src="'+data.img+'" class="img-responsive" alt="">');
    desc = $.parseJSON(data.description);
    links = $.parseJSON(data.links);
    $('#myModal2').find("p.long_desc span").text(desc.long_desc);
    $('#myModal2').find("p.short_desc span").text(desc.short_desc);
    $('#myModal2').find("p.fb_link span").text(links.fb_link);
    $('#myModal2').find("p.l_link span").text(links.l_link);
    $('#myModal2').modal('show');
  });
</script>
<script>
  $(document).on('click','.deleteTeam',function(e){
    if(!confirm("Sure to delete ?")){e.preventDefault()}
  });
</script>

</body>

</html>
