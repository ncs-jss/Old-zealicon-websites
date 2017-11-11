<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/common-code/login.php';
if(!LoggedIn())
    header("location:login.php");
auth();
include_once $_SERVER['DOCUMENT_ROOT'].'/scripts/content.php';
    $aboutData = getFestData('about');
    $schedule = getFestData('schedule');
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
        .menuLinks{
            margin-bottom: 20px;
        }
        .schedule{
            display: none;
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
            <div class="row ">
                <div class="col-lg-12">
                    <h1 class="page-header">Zealicon-2015 Content</h1>
                    <ul class="nav nav-pills nav-justified menuLinks">
                        <li class="active"><a data-target="about" href="javascript:">About Data</a></li>
                        <li><a data-target="schedule" href="javascript:">Schedule Upload</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 about">
                    <form role="form" action="scripts/content.php" method="post">
                        <div class="form-group">
                            <label>About Zealicon</label>
                            <textarea contenteditable="true" name="about" class="form-control"><?php echo htmlspecialchars_decode($aboutData['data']) ?></textarea>
                        </div>
                        <input type="hidden" name="type" value="about">
                        <button type="submit" name="submit" class="btn btn-warning">Submit</button>
                    </form>
                </div>
                <div class="col-lg-12 schedule">
                    <form role="form" action="scripts/content.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Zealicon-2015 Schedule</label>
                            <input type="file" class="form-control" name="scheduleFile" required>
                        </div>
                        <input type="hidden" name="type" value="schedule">
                        <button type="submit" name="submit" class="btn btn-warning">Submit Schedule</button>
                    </form>
                    <div class="col-lg-12">
                          <?php if($schedule['data'] != '') {?>
                          <label>Link to download schedule(if already uploaded any)</label>
                          <a class="btn btn-danger" href="<?php echo $schedule['data'] ?>" download>Download Schedule</a>
                          <?php } ?>
                    </div>
                </div>
            </div>
        </div>
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
  <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
  <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
  <script src="//cdn.ckeditor.com/4.4.7/full-all/ckeditor.js"></script>
  <script src="js/sb-admin.js"></script>
  <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
        CKEDITOR.replace( 'about' );
    });
    $(document).on('click','.menuLinks a',function(){
        show = $(this).attr('data-target');
        hide = $('.menuLinks').find('li.active a').attr('data-target');
        $('.menuLinks').find('li.active').removeClass('active');
        $(this).parent().addClass('active');
        $('.'+hide).fadeOut('normal', function() {
            $('.'+show).fadeIn();
        });
    });
</script>

</body>

</html>
