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
    <title>Ajax Full Featured Calendar 2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ajax Full Featured Calendar 2">
    <meta name="author" content="Paulo Regina">

    <!-- styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/smoothness/jquery-ui.css" rel="stylesheet">
    <link href="css/fullcalendar.print.css" media="print" rel="stylesheet">
    <link href="css/fullcalendar.css" rel="stylesheet">
    <link href="lib/spectrum/spectrum.css" rel="stylesheet">    
    <link href="lib/timepicker/jquery-ui-timepicker-addon.css" rel="stylesheet">
      
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
<body>
    
	<div class="navbar navbar-default navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="navbar-brand" href="index.php">Ajax Full Featured Calendar</a>
				<!-- search (required if you want to have search) -->
				<form class="pull-right form-inline" style="margin-top: 8px; margin-left: 20px;" id="search">
					<div class="form-group">
						<input class="form-control" type="text">
						<button class="btn" type="button">Search</button>
					</div>
				</form>
			</div>
		</div>
	</div><!-- .navbar -->
  	
	<div class="container" style="margin-top: 80px;">
		      
      <h1>Content Area</h1>

    </div> <!-- /container -->
  
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
    