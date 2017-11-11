<?php 
  include_once $_SERVER['DOCUMENT_ROOT'].'/common-code/login.php';
  if(!LoggedIn())
    header("location:login.php");
  include_once $_SERVER['DOCUMENT_ROOT'].'/scripts/events.php';
  $events = events();
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
    *,.form-contorl:focus{
      border-radius: 0 !important;
      box-shadow: none !important;
    }
  </style>
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
        <a class="navbar-brand" href="/">Zealicon-2015</a>
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
          <h1 class="page-header">Events</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              List of Events
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <tr>
                      <th>Event</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($events as $key => $value) { ?>
                    <tr class="gradeU">
                      <td><?php echo $value['name'] ?></td>
                      <td><a href="javascript:" class="btn btn-primary edit" data-id="<?php echo $value['id'] ?>" data-event="<?php echo $value['data'] ?>" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a></td>
                      <td><a href="javascript:" title="Delete" class="btn btn-primary delete" data-id="<?php echo $value['id'] ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <a href="javascript:" class="btn btn-primary btn-lg addEvent">Add Event</a>
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Add a New Event</h4>
                </div>
                <div class="modal-body">
                 <form action="scripts/events.php" method="post" enctype="multipart/form-data">
                   <div class="form-group">
                     <label>Event-Name</label>
                     <input type="text" class="form-control" name="event_name" placeholder="Event Name" required>
                   </div>
                   <div class="form-group">
                    <label>Category</label>
                    <select name="category" class="form-control" type="text">
                     <option value="Coderz">Coderz</option>
                     <option value="Coloarlo">Coloralo</option>
                     <option value="Mechavoltz">Mechavoltz</option>
                     <option value="Z-Wars">Z-Wars</option>
                     <option value="Play it on">Play it on</option>
                     <option value="Robotiles">Robotiles</option>
                   </select></div>
                   <div class="form-group">
                    <label>About</label>
                    <textarea name="about" class="form-control"></textarea></div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="description" class="form-control"></textarea></div>
                      <div class="form-group">
                       <label>First Prize</label>
                       <input type="text" class="form-control" name="prize1" placeholder="First Prize">
                     </div>
                     <div class="form-group">
                       <label>Second Prize</label>
                       <input type="text" class="form-control" name="prize2" placeholder="Second Prize">
                     </div>
                     <div class="form-group">
                       <label>Contact Person 1</label>
                       <input type="text" class="form-control" name="contact1" placeholder="Contact Person 1">
                     </div>
                     <div class="form-group">
                       <label>Contact Person 2</label>
                       <input type="text" class="form-control" name="contact2" placeholder="Contact Person 2">
                     </div>
                     <div class="form-group">
                       <label>Link (in any)</label>
                       <input type="text" class="form-control" name="link" placeholder="Link">
                     </div>
                     <div class="form-group fileUpload">
                       <label>File (if any)</label>
                       <input type="file" class="form-control" name="file">
                     </div>
                     <label>Rule</label>
                     <div class="input_fields_wrap">
                      <div class="form-group"><input class="form-control rule1" type="text" name="rules[]"></div>
                      <button class="btn btn-danger add_field_button">Add Rule</button>
                    </div>
                    <input type="hidden" name="type" class="type" value>
                    <input type="hidden" name="id" value>
                    <input type="hidden" name="display" value>
                    <input type="hidden" name="filePath" value>
                    <input type="hidden" name="societyId" value>
                    <button type="submit" class="btn btn-primary">Add Event</button>
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
  <script src="//cdn.ckeditor.com/4.4.7/full-all/ckeditor.js"></script>
  <script src="js/sb-admin.js"></script>
  <script>

    clearForm = function(){
      $('#myModal form input').each(function(index, el) {
        $(this).val('');
      });
      $('.downloadFile').remove();
      $('#myModal form textarea').each(function(index, el) {
        $(this).val('');
      });
      $('#myModal form .moreRules').each(function(index, el) {
        $(this).remove();
      });      
    }
    $(document).ready(function() {
      $('#dataTables-example').dataTable();
        CKEDITOR.replace( 'about' );
        CKEDITOR.replace( 'description' );
    });
    $(document).on('click','.addEvent',function(){
      clearForm();
      $("#myModal").find('.type').val('add');
      $('#myModal').modal('show');
    });
    $(document).on('click','.edit',function(){
      clearForm();
      data = $(this).attr('data-event');
      data = $.parseJSON(atob(data));
      eventData = $.parseJSON(atob(data.eventData));
      $('#myModal').find("input[name='event_name']").val(data.name);
      $('#myModal').find("select[name='category']").val(data.category);
      $('#myModal').find("input[name='societyId']").val(data.societyId);
      $('#myModal').find("input[name='id']").val(data.id);
      $('#myModal').find("input[name='type']").val('edit');
      $('#myModal').find("input[name='display']").val(data.display);
      $('#myModal').find("input[name='contact1']").val(eventData.contact1);
      $('#myModal').find("input[name='contact2']").val(eventData.contact2);
      $('#myModal').find("input[name='link']").val(eventData.link);
      $('#myModal').find("input[name='prize1']").val(eventData.prize1);
      $('#myModal').find("input[name='filePath']").val(eventData.filePath);
      if(eventData.filePath != '')
        $('#myModal').find('.fileUpload').append('<a class="btn btn-primary downloadFile" href="'+eventData.filePath+'" download>Download File</a>');
      $('#myModal').find("input[name='prize2']").val(eventData.prize2);
      aboutData = $("<div/>").html(eventData.about).text();
      descData = $("<div/>").html(eventData.description).text();
      CKEDITOR.instances.about.setData(aboutData);
      CKEDITOR.instances.description.setData(descData);
      $.each(eventData.rules, function(index, val) {
          if(index == 0 ){
            $('#myModal').find('.rule1').val(val);
          }
          else{
          $('#myModal').find('.input_fields_wrap').append('<div class="form-group moreRules"><input value="'+val+'"class="form-control" type="text" name="rules[]"/><a href="#" class="remove_field">Remove</a></div>');
          }
      });
      $('#myModal').modal('show');
    });
    $(document).on('click','.delete',function(){
      elem = $(this);
      id = elem.attr('data-id');
      if(id == '')
        return;
      if(!confirm("Sure to delete ?")) return;
      data = {
        'type' : 'delete',
        'id' : id,
      };
      $.ajax({
        url:'scripts/events.php',
        type:'POST',
        data:data
      }).done(function(data){
        if(data == 1)
        {
          elem.closest('tr').fadeOut('normal',function(){ $(this).remove()});
        }
        else{
          alert('Some error occured..:(');
        }
      });
    });
  </script>
</body>
</html>
