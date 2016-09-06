<?php 

// Include the calendar class
include('includes/loader.php'); 

// Retrieve Current Page Data
$info = $calendar->retrieve($_GET['page']);

?>
<?
	// Configure site
	$root = $_SERVER['DOCUMENT_ROOT']; 
	$private = str_replace("public","private",$root);
	include_once("$private/config.php");

// Verify login
include_once("$root/lc.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="<?php echo $siteAuthor; ?>">

    <title><?php echo $siteName; ?></title>

    <?php include $root.'/_shared/head.php'; ?>

    <link href="/calendar-2/css/ui-lightness/jquery-ui.css" rel="stylesheet">
    <link href="/calendar-2/css/fullcalendar.css" rel="stylesheet">
    <link href="/calendar-2/lib/colorpicker/css/colorpicker.css" rel="stylesheet">
    <link href="/calendar-2/lib/validation/css/validation.css" rel="stylesheet">
    
    <link href="/calendar-2/lib/timepicker/jquery-ui-timepicker-addon.css" rel="stylesheet">    

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background-color:#004ca9;">
        
		<?php include $root.'/_shared/header-nav.php'; ?>

		<?php include $root.'/_shared/sidebar-nav.php'; ?>

        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Calendar</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                       <a href="index.php" class="btn btn-success pull-right" style="margin-bottom: 20px;">View Events</a>
                            
                          <div class="clearfix"></div>
                            
                          <div class="box">
                            <div class="header"><h4>Edit Event</h4></div>
                            <div class="content pad"> 
<div class="panel panel-default">   
              <div class="panel-heading">
                            Calendar Details
                        </div>         
                <div class="panel-body">                                
                                <form id="edit_event" method="post">
                                
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Title:</label>
                            <input type="text" class="validate[required] input-block-level form-control" name="title" placeholder="Event Title" id="title">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">                    
                            <label>Description:</label>
                            <textarea class="input-block-level form-control" name="description" id="description" placeholder="Event Description"></textarea>
                        </div>
                    </div>
                                    
                    <div class="col-md-3">
                        <div class="form-group">  
                            <label>Start Date:</label>
                            <input type="text" name="start_date" class="validate[required] form-control" id="datepicker">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">  
                        <label>Start Time:</label>
                        <input type="text" class="input-small form-control" name="start_time" placeholder="HH:MM" id="tp1">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">                      
                            <label>End Date:</label>
                            <input type="text" name="end_date" class="form-control" id="datepicker2">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">                      
                        <label>End Time:</label>
                        <input type="text" class="input-small form-control" name="end_time" placeholder="HH:MM" id="tp2">
                        </div>
                    </div>
                        
                    <input type="hidden" id="rep_id" value="<?php echo $info['repeat_id']; ?>" />
                                    
                                
                                    
                                </form>
                                
                            </div> 
                       <div class="panel-footer">                               
                            <a href="#" onclick="calendar.update(<?php echo $info['id']; ?>)" class="btn btn-success">Save Changes</a>            
                        </div>                
                    </div>
                </div>
                </div>
                <!-- /.col-lg-12 -->
                
              <!-- Modal Delete Prompt -->
                <div id="cal_prompt" class="modal hide fade">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-danger" data-option="remove-this">Delete this</a>
                        <a href="#" class="btn btn-danger" data-option="remove-repetitives">Delete all</a>
                        <a href="#" class="btn" data-dismiss="modal">Close</a>
                    </div>
                </div>
                
                <!-- Modal Edit Prompt -->
                <div id="cal_edit_prompt_save" class="modal hide fade">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body-custom"></div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-info" data-option="save-this">Save this</a>
                        <a href="#" class="btn btn-info" data-option="save-repetitives">Save all</a>
                        <a href="#" class="btn" data-dismiss="modal">Close</a>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include $root.'/_shared/footer.php'; ?>

        
    <!-- javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/calendar-2/js/jquery.js"></script>
    <script src="/calendar-2/js/bootstrap.js"></script>
    <script src="/calendar-2/js/fullcalendar.js"></script>
    <script src="/calendar-2/js/gcal.js"></script>
    <script src="/calendar-2/js/jquery-ui.js"></script>
    <script src="/calendar-2/js/jquery.calendar.js"></script>
    <script src="/calendar-2/lib/colorpicker/bootstrap-colorpicker.js"></script>
    <script src="/calendar-2/lib/validation/jquery.validationEngine.js"></script>
    <script src="/calendar-2/lib/validation/jquery.validationEngine-en.js"></script>
    
    <script src="/calendar-2/lib/timepicker/jquery-ui-sliderAccess.js"></script>
    <script src="/calendar-2/lib/timepicker/jquery-ui-timepicker-addon.min.js"></script>
    
    <script src="/calendar-2/js/custom.js"></script>
    
    <!-- call calendar plugin -->
    <script type="text/javascript">
        $().FullCalendarExt({
            version: 'php'
        });
    </script>


</body>

</html>
