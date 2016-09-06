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

    <link href="/Demos/Pure PHP/css/ui-lightness/jquery-ui.css" rel="stylesheet">
    <link href="/Demos/Pure PHP/css/fullcalendar.css" rel="stylesheet">
    <link href="/Demos/Pure PHP/lib/colorpicker/css/colorpicker.css" rel="stylesheet">
    <link href="/Demos/Pure PHP/lib/validation/css/validation.css" rel="stylesheet">
    
    <link href="/Demos/Pure PHP/lib/timepicker/jquery-ui-timepicker-addon.css" rel="stylesheet">    

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

                  <a href="/calendar-2/" class="btn btn-primary pull-right" style="margin-bottom: 20px;">View Events</a>
                    
<div class="box">
        <div class="header"><h4>Add Event</h4></div>
        <div class="content pad">
          <div class="panel panel-default">   
              <div class="panel-heading">
                            Calendar Details
                        </div>         
                <div class="panel-body">
                    <form id="add_event">
                    
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
                    <div class="col-md-3">
                        <div class="form-group"> 
                        <label>Employee:</label>
                        <select name="calUsers" id="" class="form-control">
                            <option value="">All</option>
                        <?
                            $calUsers_request = ("SELECT * FROM cmsUsers WHERE ID != '1'");
                            $calUsers_result = mysql_query ($calUsers_request,$db) or die ("Query failed: $calUsers_request");
                            
                            while ($calUsers_row = mysql_fetch_array($calUsers_result)) { 
                                extract($calUsers_row);   ?>
                                <option value="<?php echo $initials ?>"><?php echo $firstName; ?> <?php echo $lastName; ?></option>
                            <? } ?>
                        </select>
                        <!-- <input type="text" class="input-small form-control" name="color" id="cp"> -->
                        </div>
                    </div>                        
                    <div class="col-md-3">
                        <div class="form-group">                         
                            <label>All Day Event:</label>
                            <select name="allDay" class="form-control">
                                <option value="true" selected>Yes</option>
                                <option value="false">No</option>
                            </select>
                        </div>
                    </div>                        
                    <div class="col-md-3">
                        <div class="form-group"> 
                            <label>Repeat:</label>
                            <select name="repeat_method" class="form-control">
                                <option value="no" selected>No</option>
                                <option value="every_day">Every Day</option>
                                <option value="every_week">Every Week</option>
                                <option value="every_month">Every Month</option>
                            </select>
                        </div>
                    </div>                        
                    <div class="col-md-3">
                        <div class="form-group"> 
                            <label>Times:</label>
                            <select name="repeat_times" class="form-control">
                                <option value="1" selected>1</option>
                                <?php
                                    for($i = 2; $i <= 30; $i++) {
                                        echo '<option value="'.$i.'">'.$i.'</option>';      
                                    }
                                ?>
                            </select>
                        </div>
                    </div>                        
                    <div class="col-md-12">
                        <div class="form-group"> 
                            <label>Url:</label>
                            <input type="text" class="input-block-level form-control" name="url" id="url" placeholder="http://www.domain.com">
                            <p class="help-block">Hint: If this event does not have url please leave blank</p>
                        </div>
                    </div>  
                      
                        
                    </form>
                </div>
           <div class="panel-footer">                               
                                <button type="submit" onclick="calendar.save()" class="btn btn-success">Add Event</button>
                        </div>                
            </div>
            
        </div> 
    </div>

                </div>
                <!-- /.col-lg-12 -->


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
    <script src="/Demos/Pure PHP/js/jquery.js"></script>
    <script src="/Demos/Pure PHP/js/bootstrap.js"></script>
    <script src="/Demos/Pure PHP/js/fullcalendar.js"></script>
    <script src="/Demos/Pure PHP/js/gcal.js"></script>
    <script src="/Demos/Pure PHP/js/jquery-ui.js"></script>
    <script src="/Demos/Pure PHP/js/jquery.calendar.js"></script>
    <script src="/Demos/Pure PHP/lib/colorpicker/bootstrap-colorpicker.js"></script>
    <script src="/Demos/Pure PHP/lib/validation/jquery.validationEngine.js"></script>
    <script src="/Demos/Pure PHP/lib/validation/jquery.validationEngine-en.js"></script>
    
    <script src="/Demos/Pure PHP/lib/timepicker/jquery-ui-sliderAccess.js"></script>
    <script src="/Demos/Pure PHP/lib/timepicker/jquery-ui-timepicker-addon.min.js"></script>
    
    <script src="/Demos/Pure PHP/js/custom.js"></script>
    
    <!-- call calendar plugin -->
    <script type="text/javascript">
        $().FullCalendarExt({
            version: 'php'
        });
    </script>


</body>

</html>
