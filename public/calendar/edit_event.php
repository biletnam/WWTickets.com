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

    <link href="css/smoothness/jquery-ui.css" rel="stylesheet">
    <link href="css/fullcalendar.print.css" media="print" rel="stylesheet">
    <link href="css/fullcalendar.css" rel="stylesheet">
    <link href="lib/spectrum/spectrum.css" rel="stylesheet">    
    <link href="lib/timepicker/jquery-ui-timepicker-addon.css" rel="stylesheet">


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
                    <h1 class="page-header">Edit Calendar Entry</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Details
                        </div>
                        <div class="panel-body"> 
            
                            <form method="post" action="/calendar/event_updt.php">


                                <?

                                    $ID = $_GET['id'];

                                    $post_request = ("SELECT * FROM calendar WHERE id = '$ID'");
                                    $post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
                                    
                                    while ($post_row = mysql_fetch_array($post_result)) { 
                                        extract($post_row); 
                                        $start = explode(" ", $start);
                                        $startDate = $start[0];
                                        $startTime = $start[1];
                                        $startTimeExplode = explode(":", $startTime);
                                        $startTime = $startTimeExplode[0].":".$startTimeExplode[1];


                                        ?>
                                <div class="row">

                                    <input type="hidden" name="calendarID" value="<?php echo $id ?>">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="First Name" id="name" value="<?php echo $name; ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="lname" placeholder="Last Name" id="lname" value="<?php echo $lname; ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address" placeholder="Address" id="address" value="<?php echo $address; ?>">
                                        </div>
                                    </div>                                    

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Phone:</label>
                                            <input type="text" class="form-control" name="phone" placeholder="Phone" id="phone" value="<?php echo $phone; ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="text" class="form-control" name="email" placeholder="Email" id="email" value="<?php echo $email; ?>">
                                        </div>
                                    </div>       

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>City:</label>
                                            <input type="text" class="form-control" name="city" placeholder="City" id="city" value="<?php echo $city; ?>">
                                        </div>
                                    </div>             

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>State:</label>
                                            <input type="text" class="form-control" name="state" placeholder="State" id="state" value="<?php echo $state; ?>">
                                        </div>
                                    </div>              

                                    <div class="col-md-3">
                                        <div class="form-group"> 
                                        <label>Employee:</label>
                                        <select name="calUsers" id="" class="form-control">

                                        <?
                                            $calUsers_request = ("SELECT ID,firstName,lastName FROM cmsUsers WHERE ID != '1'");
                                            $calUsers_result = mysql_query ($calUsers_request,$db) or die ("Query failed: $calUsers_request");
                                            
                                            while ($calUsers_row = mysql_fetch_array($calUsers_result)) { 
                                                extract($calUsers_row);
                                                    $calUserID = $calUsers_row['ID'];
                                                    $calFirst = $calUsers_row['firstName'];
                                                    $calLast = $calUsers_row['lastName'];
                                                    $matchName = $firstName." ".$lastName;
                                                ?>
                                                <option value="<?php echo $calFirst ?> <?php echo $calLast; ?>"<? if($calUsers == $matchName) echo ' selected="selected"'; ?>><?php echo $matchName; ?></option>
                                            <? } ?>
                                        </select>
                                        <!-- <input type="text" class="input-small form-control" name="color" id="cp"> -->
                                        </div>
                                    </div>  

                                  <div class="col-md-6">
                                        <div id="selectProduct">
                                            <label>Job</label>
                                            <select class="form-control" name="jobProduct">
                                                    <option value="Windows"<? if($jobProduct == 'Windows') echo ' selected="selected"'; ?>>Windows</option>
                                                    <option value="Siding"<? if($jobProduct == 'Siding') echo ' selected="selected"'; ?>>Siding</option>
                                                    <option value="Doors"<? if($jobProduct == 'Doors') echo ' selected="selected"'; ?>>Doors</option>
                                                    <option value="Window Door Repair"<? if($jobProduct == 'Window Door Repair') echo ' selected="selected"'; ?>>Window &amp; Door Repair</option>
                                                    <option value="Siding Repair"<? if($jobProduct == 'Siding Repair') echo ' selected="selected"'; ?>>Siding Repair</option>
                                                    <option value="Solar Zone Attic"<? if($jobProduct == 'Solar Zone Attic') echo ' selected="selected"'; ?>>Solar Zone &amp; Attic</option>
                                            </select>
                                        </div>
                                    </div>                                    

                                     <div class="col-md-6">
                                            <label>Status <?php echo $ticketStatus; ?></label>
                                            <select class="form-control" name="ticketStatus" >
                                                <option value=""<? if($ticketStatus == '') echo ' selected="selected"'; ?>>Choose One</option>
                                                 <option value="Scheduled"<? if($ticketStatus == 'Scheduled') echo ' selected="selected"'; ?>>Scheduled Estimate</option>
                                                <option value="Scheduled to Install"<? if($ticketStatus == 'Scheduled to Install') echo ' selected="selected"'; ?>>Scheduled to Install </option>
                                        
                                            </select>
                                    </div>

                                <div id="event-type-selected" style="margin-top:20px;">
                                    <div class="col-lg-6">
                                        <div class="form-group"> 
                                            <label>Start Date:</label>
                                            <input type="text" name="start_date" class="form-control input-sm" placeholder="Y-M-D" id="startDate" value="<?php echo $startDate; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group"> 
                                            <label>Start Time:</label>
                                            <input type="text" class="form-control input-sm" name="start_time" placeholder="HH:MM" id="startTime" value="<?php echo $startTime; ?>">
                                        </div>
                                    </div>
                                </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Customers:</label>
                                            <select name="calCustomers" id="first-choice" class="form-control">
                                                <option value="">Choose One</option>
                                                <?
                                                $custInfo_request = ("SELECT custID,custFName,custLName FROM customerInfo ORDER BY custLName ASC");
                                                $custInfo_result = mysql_query ($custInfo_request,$db) or die ("Query failed: $custInfo_request");

                                                while ($custInfo_row = mysql_fetch_array($custInfo_result)) {
                                                    $calCustFName = $custInfo_row['custFName'];
                                                    $calCustLName = $custInfo_row['custLName'];
                                                    $calGetCustID = $custInfo_row['custID'];

                                                    ?>
                                                    <option value="<?php echo $calGetCustID; ?>"<? if($calGetCustID == $calCustID) echo ' selected="selected"'; ?>><?php echo $calCustLName; ?> <?php echo $calCustFName; ?></option>
                                                <? } ?>
                                            </select>
                                            <!-- <input type="text" class="input-small form-control" name="color" id="cp"> -->
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tickets:</label>
                                            <select name="calTickets" id="secondChoice" class="form-control">
                                                <option value="">Choose One From Dropdown Selection Above</option>
<?
                                                $getCustomerTicketsDropdown_request = ("SELECT ticketID,ticketCustID,ticketDate,soldDate,jobProduct,ticketCity,ticketNORF FROM customerTickets WHERE ticketCustID = '$calCustID'");
                                                $getCustomerTicketsDropdown_result = mysql_query ($getCustomerTicketsDropdown_request,$db) or die ("Query failed: $getCustomerTicketsDropdown_request");

                                                while ($getCustomerTicketsDropdown_row = mysql_fetch_array($getCustomerTicketsDropdown_result)) {
                                                extract($getCustomerTicketsDropdown_row);

                                                $ticketCode = date('Ymd',strtotime($ticketDate));

                                                if ($soldDate != '1969-12-31') {
                                                $ticketCode = $soldDate;
                                                $ticketCode = date("Ymd",strtotime($ticketCode));
                                                }

                                                $ticketCode = str_replace("2015", "15", $ticketCode);
                                                $ticketCode = str_replace("2016", "16", $ticketCode);
                                                $ticketCode = str_replace("2017", "17", $ticketCode);
                                                $ticketCode = str_replace("2018", "18", $ticketCode);
                                                $ticketCode = str_replace("2019", "19", $ticketCode);
                                                $ticketCode = str_replace("2020", "20", $ticketCode);
                                                $ticketCode = str_replace("2021", "21", $ticketCode);

                                                if ($ticketCode == '-00011130') {
                                                $ticketCode = '151031';
                                                }

                                                $ticketName = $ticketCode."_".$jobProduct."_".$ticketCity."_(".$ticketNORF.")";

                                                ?>
                                                <option value="<?php echo $ticketID;?>"<? if($ticketID == $calTicketID) echo ' selected="selected"'; ?>>Ticket # <?php echo $ticketCode ;?> - <?php echo $ticketName; ?></option>
                                                <? } ?>





                                                <!--                                            Data retrieved from getCustomerIDTickets.php-->
                                            </select>
                                            <!-- <input type="text" class="input-small form-control" name="color" id="cp"> -->
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Customer Referral:</label>
                                            <input type="text" class="form-control" name="customerReferral" placeholder="Type" id="customerReferral" value="<?php echo $customerReferral; ?>">
                                        </div>
                                    </div>                                                                                                       


                 <!--                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Title:</label>
                                            <input type="text" class="form-control" name="title" placeholder="Event Title" id="title">
                                        </div>
                                    </div> -->

                                    <div class="col-lg-12">
                                        <div class="form-group">                                
                                            <label>Notes:</label>
                                            <textarea class="form-control" name="description" id="description" placeholder="Notes"><?php echo $notes; ?></textarea>
                                        </div>
                                    </div>



                <!--                     <div class="col-lg-3">
                                        <div class="form-group">                                
                                            <label>Event Color:</label>
                                            <input type="text" class="form-control input-sm" name="edit_color" id="edit_color">
                                        </div>
                                    </div> -->



                   <!--                  <div class="col-lg-4">
                                        <div class="form-group">                                
                                            <label>All Day Event:</label>
                                            <select name="allDay" class="form-control">
                                                <option value="true">Yes</option>
                                                <option value="false"selected>No</option>
                                            </select>
                                        </div>
                                    </div> -->

                <!--                     <div class="col-lg-4">
                                        <div class="form-group">                                
                                            <label>Repeat:</label>
                                            <select name="repeat_method" class="form-control">
                                                <option value="no">No</option>
                                                <option value="every_day">Every Day</option>
                                                <option value="every_week">Every Week</option>
                                                <option value="every_month">Every Month</option>
                                            </select>
                                        </div>
                                    </div> -->

           <!--                          <div class="col-lg-4">
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
                                    </div> -->

     <!--                                <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Url:</label>
                                            <input type="text" class="form-control" name="url" id="url" placeholder="http://www.domain.com">
                                            <p class="help-block">Hint: If this event does not have url please leave blank</p>
                                            </select>
                                        </div>
                                    </div> -->

                                      <div class="col-lg-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                        
                                </div>
                                    <? } ?>
                            </form>


                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include $root.'/_shared/footer.php'; ?>

    <script src="lib/moment.js"></script>
<!--    <script src="lib/jquery.js"></script>-->
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

        <script>

//                alert($('#first-choice').val());
            $("#first-choice").change(function() {
                var calendarCustomerIDValue;
                calendarCustomerIDValue = $('#first-choice').val();
                //alert(calendarCustomerIDValue);

                $.ajax({
                    type: "GET",
                    url: "getCustomerIDTickets.php",
                    dataType: "html",
                    data: {"custTicketID":calendarCustomerIDValue},
                    success: function(data) {

                        $("#secondChoice").html(data);
                        //alert(data);
                        // alert("form submitted: "+ radio_button_value,"radio id: "+ radio_button_id);
                    }
                });



//                $("#second-choice").load("getter.php?ticketCustID=" + $("#first-choice").val());
            });
        </script>
</body>

</html>
