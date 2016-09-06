<?php
	include('includes/loader.php');
    require_once('includes/Mobile_Detect.php');
    $detect = new Mobile_Detect();
	$_SESSION['token'] = time();

    if($_SESSION['username'] == 'jerry'){
        $_SESSION['condition'] = "calUsers LIKE '%Jerry%'";
    }

    if($_SESSION['username'] == 'jeff'){
        $_SESSION['condition'] = "calUsers LIKE '%Jeff%'";
    }

    if($_SESSION['username'] == 'josh'){
        $_SESSION['condition'] = "calUsers LIKE '%Josh%'";
    }

    if($_SESSION['username'] == 'scott'){
        $_SESSION['condition'] = "calUsers LIKE '%Scott%'";
    }

    if($_SESSION['username'] == 'mark'){
        $_SESSION['condition'] = "calUsers LIKE '%Mark%'";
    }

    if($_SESSION['username'] == 'tyler'){
        $_SESSION['condition'] = "calUsers LIKE '%Tyler%'";
    }

    if($_SESSION['username'] == 'stephen'){
        $_SESSION['condition'] = "calUsers LIKE '%Stephen%'";
    }

    if($_SESSION['username'] == 'mike'){
        $_SESSION['condition'] = "calUsers LIKE '%Mike%'";
    }

    if($_SESSION['username'] == 'dwayne'){
        $_SESSION['condition'] = "calUsers LIKE '%Dwayne%'";
    }

    if($_SESSION['username'] == 'jons'){
        $_SESSION['condition'] = "calUsers LIKE '%Jons%'";
    }

    if($_SESSION['username'] == 'adam'){
        $_SESSION['condition'] = "calUsers LIKE '%Adam%'";
    }

    if($detect->isMobile()){
        $_SESSION['condition'] = "calUsers LIKE '%" . $_SESSION['username'] . "%'";
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
    <?php  include $root.'/_shared/head.php'; ?>
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
    <div class="modal fade" id="calendarModal" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 id="details-body-title"></h4>
          </div>
          <div class="modal-body">

            <div class="loadingDiv"></div>

            <!-- QuickSave FORM -->
            <form id="quicksave-form-body">
              <?php include $root.("/calendar/includes/new-event-fields.php"); ?>
                <div class="clearfix"></div>
            </form>

            <!-- Modal Details-->
            <div id="details-body">
                <div id="details-body-content"></div>
            </div>

          </div>
          <div class="modal-footer">
              <button type="button" style="float: left" id="mapit-event" onclick="mapIt()" class="btn btn-success">Map It</button>

              <a style="float: left" href="/tickets/ticket_view.php?ticketID=<?php echo $calTicketID;?>&custID=<?php echo $calCustID;?>" class="btn btn-warning" id="view-ticket">View Ticket</a>

              <!-- <button type="button" id="export-event" class="btn btn-warning">Export</button> -->
              <button type="button" id="delete-event" class="btn btn-danger">Delete</button>
              <a href="edit_event.php?id=<?php echo $c;?>" class="btn btn-info" id="edit-event">Edit <?php echo $c; ?></a>
<!--             <button type="button" id="edit-event" class="btn btn-info">Edit</button>-->
             <button type="button" id="add-event" class="btn btn-primary">Add</button>
            <!-- <button type="button" id="save-changes" class="btn btn-primary">Save</button> -->
          </div>
        </div>
      </div>
    </div>



   <!-- Display Modal if url is /calendar/?id=#1656
   Get contents from /calendar/includes/event_popup_on_load.
   -->

   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
       <div class="modal-dialog" role="document">
           <div id="modal-info" class="modal-content">
               <!--    Display Content Goes Here -->
           </div>
       </div>
   </div>

   <!---->


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
                  	<a id="new-entry" class="btn btn-success pull-right" style="margin-right: 10px;margin-top: 4px;" data-toggle="modal" href="javascript:void(0)" onclick="calendar.quickModal();">New Entry</a>
                    <?php if($_SESSION['username'] != 'jerry'): ?>
                        <div id="custom-button-search-input">
<!--                            <div class="input-group col-md-12">-->
<!--                                <input type="text" class="form-control" id="search-input" placeholder="Search By Town" />-->
<!--                                <span class="input-group-btn">-->
<!--                                    <button class="btn btn-info btn-lg" type="button" id="search-button">-->
<!--                                        <i class="glyphicon glyphicon-search"></i>-->
<!--                                    </button>-->
<!--                                </span>-->
                            <button class="btn btn-success pull-right modal-popup-show">Show Search Form</button>
<!--                            </div>-->
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

   <!-- jQuery -->
   <script src="/bower_components/jquery/dist/jquery.min.js"></script>

   <!-- Bootstrap Core JavaScript -->
   <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

   <!-- Metis Menu Plugin JavaScript -->
   <script src="/bower_components/metisMenu/dist/metisMenu.min.js"></script>
   <!-- Custom Theme JavaScript -->
   <script src="/dist/js/sb-admin-2.js"></script>


   <?php // include $root.'/_shared/footer.php'; ?>

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
            timeFormat: 'h(:mm)t',
            lang: 'en',
        });
    </script>



   <div class="popup-box" id="modal-search">
        <div class="close" style="font-weight:bold;font-size:11px;color:#f18200" title="Close"></div>
        <div class="top">
            <h2>Search Form</h2>
        </div>
        <div class="bottom">
            <div class="bottom-content">
                <form id="modal-search-form">
                    <table cellspacing="0" class="form-list">
                        <tbody>
                            <tr class="first">
                                <td class="label"><label for="name">First Name</label></td>
                                <td class="value">
                                    <input type="text" id="name" name="name" class="input-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="label"><label for="lname">Last Name</label></td>
                                <td class="value">
                                    <input type="text" id="lname" name="lname" class="input-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="label"><label for="address">Address</label></td>
                                <td class="value">
                                    <input type="text" id="address" name="address" class="input-text">
                                </td>
                            </tr>
                            <tr class="first">
                                <td class="label"><label for="phone">Phone</label></td>
                                <td class="value">
                                    <input type="text" id="phone" name="phone" class="input-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="label"><label for="email">Email</label></td>
                                <td class="value">
                                    <input type="text" id="email" name="email" class="input-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="label"><label for="city">City</label></td>
                                <td class="value">
                                    <input type="text" id="city" name="city" class="input-text">
                                </td>
                            </tr>
                            <tr class="first">
                                <td class="label"><label for="state">State</label></td>
                                <td class="value">
                                    <input type="text" id="state" name="state" class="input-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="label"><label for="jobProduct">Job</label></td>
                                <td class="value">
                                    <select id="jobProduct" name="jobProduct[]" multiple="">
                                        <option value="Windows">Windows</option>
                                        <option value="Siding">Siding</option>
                                        <option value="Doors">Doors</option>
                                        <option value="Window Door Repair">Window & Door Repair</option>
                                        <option value="Siding Repair">Siding Repair</option>
                                        <option value="Solar Zone Attic">Solar Zone & Attic</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="label"><label for="ticketStatus">Status Scheduled</label></td>
                                <td class="value">
                                    <select id="ticketStatus" name="ticketStatus[]" multiple="">
                                        <option value="Scheduled">Scheduled Estimate</option>
                                        <option value="Scheduled to Install">Scheduled to Install</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="first">
                                <td class="label"><label for="notes">Notes</label></td>
                                <td class="value">
                                    <input type="text" id="notes" name="notes" class="input-text">
                                </td>
                            </tr>
                            <tr class="submit">
                                <td><button type="submit" class="btn btn-success">Submit</button></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <div id="blackout"></div>

</body>
</html>