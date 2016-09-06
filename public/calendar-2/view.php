<?php 

// Include the calendar class
include('includes/loader.php'); 

// Retrieve Current Page Data
$info = $calendar->retrieve($_GET['page']);

if(!isset($info['id']))
{
    header('Location: index.php');
    exit(); 
}

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

                  <div class="table-bordered" style="border: 1px solid #ddd; padding: 10px;">
            
                     <a href="index.php" class="btn btn-success pull-right" style="margin-bottom: 20px;">Back to Events</a>
                    
                    <h3><?php echo ucfirst($info['title']); ?></h3>

                    <p>
                        <strong>Event Start:</strong> <?php echo date('d/m/Y H:i', strtotime($info['start'])); ?> <br />
                        <strong>Event End:</strong> <?php echo date('d/m/Y H:i', strtotime($info['end'])); ?>
                    </p>

                    <p><?php echo $embed->oembed($formater->html_format($info['description'])); ?></p>
                    
                    <input type="hidden" id="rep_id" value="<?php echo $info['repeat_id']; ?>" />

                    <a href="#" class="btn btn-danger pull-right" onclick="calendar.remove(<?php echo $info['id']; ?>)">Delete This Event</a>&nbsp;

                    <a href="edit_event.php?page=<?php echo $_GET['page']; ?>" class="btn btn-warning pull-right mr-10" style="margin-right:10px;">Edit This Event</a>
                    
                    <div class="clearfix"></div>

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
