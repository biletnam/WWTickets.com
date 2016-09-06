<?php
	include('includes/loader.php');
	$_SESSION['token'] = time();
    if($_SESSION['username'] == 'jerry'){
        $_SESSION['condition'] = "calUsers LIKE '%Jerry%'";
    }
    // Configure site
    $root = $_SERVER['DOCUMENT_ROOT'];
    $private = str_replace("public","private",$root);
    include_once("$private/config.php");


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

    <!-- styles -->
    <?php include $root.'/_shared/head.php'; ?>
    <link href="css/smoothness/jquery-ui.css" rel="stylesheet">
    <link href="css/fullcalendar.print.css" media="print" rel="stylesheet">
    <link href="css/fullcalendar.css" rel="stylesheet">
    <link href="lib/spectrum/spectrum.css" rel="stylesheet">
    <link href="lib/timepicker/jquery-ui-timepicker-addon.css" rel="stylesheet">

    <style>
        .modal-body{white-space: initial!important;}
        .fc-event, .fc-event:hover, .ui-widget .fc-event {
    color: #000;
}
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
<body>

   <!-- Calendar Modal -->
    <div class="modal fade" id="calendarModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 id="details-body-title"></h4>
          </div>
          <div class="modal-body">

            <div class="loadingDiv"></div>

            <!-- QuickSave FORM
            <form id="quicksave-form-body">
                <p>
                    <label>Title: </label>
                    <input class="form-control" name="title" value="" type="text">
                </p>
                <p>
                    <label>Description: </label>
                    <textarea class="form-control" name="description"></textarea>
                </p>
                <p>
                    <label>Category: </label>
                    <select name="categorie" class="form-control">
                        <?php
                            foreach($calendar->getCategories() as $categorie)
                            {
                                echo '<option value="'.$categorie.'">'.$categorie.'</option>';
                            }
                        ?>
                    </select>
                </p>
                <p>
                     <label>Event Color:</label><br />
                     <input type="text" class="form-control input-sm" value="#587ca3" name="color" id="colorp">
                </p>
                <div class="pull-left mr-10">
                    <p id="repeat-type-select">
                    <label>Repeat:</label>
                    <select id="repeat_select" name="repeat_method" class="form-control">
                        <option value="no" selected>No</option>
                        <option value="every_day">Every Day</option>
                        <option value="every_week">Every Week</option>
                        <option value="every_month">Every Month</option>
                    </select>
                    </p>
                </div>
                <div class="pull-left">
                    <p id="repeat-type-selected">
                    <label>Times:</label>
                    <select id="repeat_times" name="repeat_times" class="form-control">
                        <option value="1" selected>1</option>
                        <?php
                            for($i = 2; $i <= 30; $i++) {
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                        ?>
                    </select>
                    </p>
                </div>
                <div class="clearfix"></div>
                <p id="event-type-select">
                    <label>Type: </label>
                    <select id="event-type" name="all-day" class="form-control">
                        <option value="true">Make event 24H (all day)</option>
                        <option value="false">Make event as I wish</option>
                    </select>
                </p>
                <div id="event-type-selected">
                    <div class="pull-left mr-10">
                        <p>
                        <label>Start Date:</label>
                        <input type="text" name="start_date" class="form-control input-sm" placeholder="Y-M-D" id="startDate">
                        </p>
                    </div>
                    <div class="pull-left">
                        <p>
                        <label>Start Time:</label>
                        <input type="text" class="form-control input-sm" name="start_time" placeholder="HH:MM" id="startTime">
                        </p>
                    </div>
                    <div class="clearfix"></div>
                    <div class="pull-left mr-10">
                        <p>
                        <label>End Date:</label>
                        <input type="text" class="form-control input-sm" name="end_date" placeholder="Y-M-D" id="endDate">
                        </p>
                    </div>
                    <div class="pull-left">
                        <p>
                        <label>End Time:</label>
                        <input type="text" class="form-control input-sm" name="end_time" placeholder="HH:MM" id="endTime">
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div><br />
            </form> -->

            <!-- Modal Details -->
            <div id="details-body">
                <div id="details-body-content"></div>
            </div>



          </div>
          <div class="modal-footer">
              <button type="button" style="float: left" id="mapit-event" class="btn btn-success">Map It</button>
              <!-- <button type="button" id="export-event" class="btn btn-warning">Export</button> -->
            <button type="button" id="delete-event" class="btn btn-danger">Delete</button>
            <a href="edit_event.php?id=<?php echo $c;?>" class="btn btn-info" id="edit-event">Edit <?php echo $c; ?></a>
            <!-- <button type="button" id="edit-event" class="btn btn-info">Edit</button> -->
            <!-- <button type="button" id="add-event" class="btn btn-primary">Add</button> -->
            <!-- <button type="button" id="save-changes" class="btn btn-primary">Save</button> -->
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Delete Prompt -->
    <div id="cal_prompt" class="modal fade">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body"></div>
        <div class="modal-footer">
            <a href="#" class="btn btn-danger" data-option="remove-this">Delete this</a>
            <!-- <a href="#" class="btn btn-danger" data-option="remove-repetitives">Delete all</a> -->
            <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
        </div>
        </div>
        </div>
    </div>

    <!-- Modal Edit Prompt -->
    <div id="cal_edit_prompt_save" class="modal fade">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body-custom"></div>
        <div class="modal-footer">
            <a href="#" class="btn btn-info" data-option="save-this">Save this</a>
            <a href="#" class="btn btn-info" data-option="save-repetitives">Save all</a>
            <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
        </div>
        </div>
        </div>
    </div>

    <!-- Import Modal -->
    <div id="cal_import" class="modal fade">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-body-import" style="white-space: normal;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4>Import Event</h4>

            <p class="help-block">Copy & Paste the event code from your .ics file, open it using an text editor</p>
            <textarea class="form-control" rows="10" id="import_content" style="margin-bottom: 10px;"></textarea>
            <input type="button" class="pull-right btn btn-info" onClick="calendar.calendarImport()" value="Import" />
        </div>
        </div>
        </div>
    </div>
    
    <input type="hidden" name="cal_token" id="cal_token" value="<?php echo $_SESSION['token']; ?>" />
    
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background-color:#004ca9;">
        
        <?php include $root.'/_shared/header-nav.php'; ?>

        <?php include $root.'/_shared/sidebar-nav.php'; ?>

        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12" style="margin-bottom: 20px; border-bottom: 1px solid #eee;">
                  	<a href="add_event.php" class="btn btn-success pull-right" style="margin-right: 10px;margin-top: 4px;">New Entry</a>
                    <?php if($_SESSION['username'] != 'jerry'): ?>
                    <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            <input type="text" class="form-control" id="search-input" placeholder="Search By Town" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button" id="search-button">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                        </div>
                    </div>
                    <?php endif; ?>
                    <h1 class="page-header" style="border:none; margin-bottom: 0; display: inline-block">Calendar</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div id="calendar"></div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<script type="text/javascript">
    var username = '<?php echo $_SESSION['username']?>';
</script>
	<script src="lib/moment.js"></script>
    <script src="lib/jquery.js"></script>
    <script src="lib/jquery-ui.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/fullcalendar.js"></script>
    <script src="js/lang-all.js"></script>
    <script src="js/jquery.calendar.js"></script>
	<script src="lib/spectrum/spectrum.js"></script>
    
    <script src="lib/timepicker/jquery-ui-sliderAccess.js"></script>
    <script src="lib/timepicker/jquery-ui-timepicker-addon.min.js"></script>
    
    <script src="js/g.map.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    
    <script src="js/custom.js"></script>
    
    <!-- call calendar plugin -->
    <script type="text/javascript">
		$().FullCalendarExt({
			calendarSelector: '#calendar',
			lang: 'en',
		});
	</script>
    
</body>
</html>