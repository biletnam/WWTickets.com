<?
	// Configure site
	$root = $_SERVER['DOCUMENT_ROOT']; 
	$private = str_replace("public","private",$root);
	include_once("$private/config.php");

// Verify login
include_once("$root/lc.php");

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
####################################
# Connect Upto Database
####################################

		$cust_request = ("SELECT * FROM customerInfo WHERE custID= '".$_GET['custID']."'");
		$cust_result = mysql_query ($cust_request,$db) or die ("Query failed: $cust_request");
		$cust_total = mysql_num_rows($cust_result);
		if($cust_total == 0) echo "<p>That customer doesn't exist.</p>\n";
		
		while ($cust_row = mysql_fetch_array($cust_result)) { 
			extract($cust_row);		
		}


        $ticket_request = ("SELECT * FROM customerTickets WHERE ticketCustID= '".$_GET['custID']."' AND ticketID = '".$_GET['ticketID']."'");
        $ticket_result = mysql_query ($ticket_request,$db) or die ("Query failed: $ticket_request");
        $ticket_total = mysql_num_rows($ticket_result);
        if($ticket_total == 0) echo "<p>That ticket doesn't exist.</p>\n";
        
        while ($ticket_row = mysql_fetch_array($ticket_result)) { 
            extract($ticket_row);
            $originalTicketID = $ticketID;
            $showTicketID = sprintf('%05d',$ticketID);
        }

####################################


####################################
# Special Variable Characters
#
####################################

    /*
    Author  : Scott DeBoer
    Date    : 15.12.16
    Comments: Brent Frey requested to change status on every view instead of going into every ticket
    */

        $dateFields = array('ticketDate', 'ticketOrdDate', 'ticketDateM', 'ticketColum', 'ticketInstall', 'leadTestEmpDate', 'finalDate', 'downDate', 'dateInstalled', 'diyReceived', 'diyOrdered', 'pamDate', 'renoDate', 'paidDate', 'testDate', 'diyDate', 'soldDate', 'ticketSSold', 'ticketSOrdered', 'ticketSReceived', 'ticketSInstalled', 'ticketSPaid', 'ticketSProposalGiven', 'ticketSIncomplete', 'ticketSPending', 'ticketSScheduled','pwMade','ticketSComplete');

        foreach ($dateFields as $field) {
            $field = convertDate($field);
            //$field = date("m/j/Y",strtotime($field)); if ($field == '12/31/1969') {$field = ''; } if ($field == '11/30/-0001') { $field = ''; }
        }


####################################

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



    <link href="/calendar/css/smoothness/jquery-ui.css" rel="stylesheet">
    <link href="/calendar/css/fullcalendar.print.css" media="print" rel="stylesheet">
    <link href="/calendar/css/fullcalendar.css" rel="stylesheet">
    <link href="/calendar/lib/spectrum/spectrum.css" rel="stylesheet">    
    <link href="/calendar/lib/timepicker/jquery-ui-timepicker-addon.css" rel="stylesheet">


    <style>


    .modal-dialog{width:90%;height:90%;}
    .modal-body{height:70%;}
    .modal-body iframe{height:600px;width:100%;}


    </style>

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
                    <p>&nbsp;</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <?php include $root.'/_shared/customer-profile.php'; ?>
                    </div>
                    <!-- /.panel -->

                </div> 
            </div>

            <div class="row">
                <div class="col-lg-12">

                    <?php 

                        $warranty_request = ("SELECT * FROM warrantyTransfer WHERE ticketID = '$ticketID'");
                        $warranty_result = mysql_query ($warranty_request,$db) or die ("Query failed: $warranty_request");

                        while ($warranty_row = mysql_fetch_array($warranty_result)) { 
                            extract($warranty_row);   
                            $warrantyDate = date("m/j/Y",strtotime($warrantyDate)); if ($warrantyDate == '12/31/1969') {$warrantyDate = ''; }
                        if($newShow == 0) echo " ";

                        else{ ?>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4><span>Warranty Transfer</span></h4>
                                </div>
                                <div class="panel-body">
                                        <div class="col-md-3">
                                           <p><strong>Name: </strong><?php echo $newName; ?></p>
                                        </div>
                                        <div class="col-md-3">
                                           <p> <strong>Phone: </strong> <?php echo $newPhone; ?></p>
                                        </div>
                                        <div class="col-md-3">
                                            <p><strong>Email: </strong> <a href="mailto:<?php echo $newEmail ?>"><?php echo $newEmail; ?></a></p>
                                        </div>
                                        <div class="col-md-3">
                                            <p><strong>Date: </strong> <?php echo $warrantyDate; ?></p>
                                        </div>                                        
                                        <div class="col-md-12">
                                               <p><strong>Notes: </strong><?php echo $newNotes; ?></p>
                                        </div>

                                </div>
                                <div class="panel-footer">
                                    <a href="/tickets/warranty/edit.php?warrantyID=<?php echo $warrantyID; ?>&ticketID=<?php echo $ticketID; ?>&custID=<?php echo $custID; ?>"><button type="submit" name="submit" class="btn btn-warning btn-default" value="Save Changes" >Edit</button></a>
                                </div>
                                <!-- /.panel-footer -->    
                            </div> 


                        <? } 

                        } ?>

<?php if (pagePermission()) { ?>


 <?php 

                    if ($prepLetter == 'Yes') { ?> 

                        <p class="pull-right" style="margin-right:30px;"><i class="fa fa-paper-plane fa-fw"></i>  Prep Letter Sent - <?php echo $prepSent; ?></p> 

                    <? } 

                    else{ ?> 

                        <p > <a href="send-prep-letter.php?ticketID=<?php echo $ticketID; ?>&custID=<?php echo $ticketCustID; ?>"><button class="pull-right btn btn-success"><i class="fa fa-paper-plane fa-fw"></i> Send Prep Letter</button></a></p>

                    <? } 


                    if ($newShow == 0) { ?>
                        <p ><a href="/tickets/warranty/edit.php?ticketID=<?php echo $ticketID; ?>&custID=<?php echo $custID; ?>&activateID=1"><button style="margin-right:8px;margin-top:-9px;" class="btn btn-success pull-right" type="button" >Add Warranty Transfer</button></a></p>
                    <? } if ($newShow == 1) { 
                    
                        echo '';
                    }?>

<? } ?>

                    <h2>
                        <?php if (!empty($ticketLat) && !empty($ticketLong)) { ?>
                        <!-- Button trigger modal -->
                        <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-map-marker fa-fw"></i></a>
                        <!-- Modal --> 
                        <?  } ?>

                        <?php if ($ticketsHot == '1') { ?>
                            <img src="/_images/siren.gif" alt="" title="" />
                        <? } ?>

                        <?php

                            if (empty($jobProduct)) {$jobProduct == 'x'; }

                            $ticketCode = date('Ymd',strtotime($ticketDate)); // Display when ticket was created

                            if ($ticketCode == '-00011130'){

                                $todaysDate = date('Ymd');
                                $ticketCode = $todaysDate;
                               }
                            if ($soldDate != '1969-12-31') {$ticketCode = $soldDate;$ticketCode = date('Ymd',strtotime($ticketCode));} // Display Sold Date


                            //Removes the 20 from the year
                                $ticketCode = str_replace("2015", "15", $ticketCode);
                                $ticketCode = str_replace("2016", "16", $ticketCode);
                                $ticketCode = str_replace("2017", "17", $ticketCode);
                                $ticketCode = str_replace("2018", "18", $ticketCode);
                                $ticketCode = str_replace("2019", "19", $ticketCode);
                                $ticketCode = str_replace("2020", "20", $ticketCode);
                                $ticketCode = str_replace("2021", "21", $ticketCode);



                            $ticketName = $ticketCode."_".$jobProduct."_".$ticketCity."_(".$ticketNORF.")";

                        ?>

                        <?php echo $ticketName; ?> <br/><small>Ticket# <?php echo $showTicketID; ?></small></h2>

                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">Location</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <iframe src = "https://maps.google.com/maps?q=<?php echo $ticketLat; ?>,<?php echo $ticketLong; ?>&hl=es;z=14&amp;output=embed" width="80%" height="80%"></iframe>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>                        


                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color:red!important;">
                            <h4><span>Ticket Details</span></h4>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="/tickets/form/detail-mod.php">
                                <input type="hidden" name="type" value="edit" />
                                <?php include $root.'/tickets/form/detail-fields.php'; ?>
                            </form>
         
        


                            <?php if (!empty($appLevel)) { ?>
                                 <div class="col-md-12">
                                    <div class="col-md-8">
                                        <h4><span>Customer Appreciation</span></h4>
                                        <img src="/_images/appreciation-icon.png" alt="" style="float:left;margin-right:10px;">
                                            <div class="col-md-2"><p><?php if (!empty($appLevel)) { echo "<strong>Level: </strong>".$appLevel; } ?></p></div>
                                            <div class="col-md-2"><p><?php if (!empty($appSent)) { echo "<strong>Sent: </strong>".$appSent; } ?></p></div>
                                            <div class="col-md-4"><p><?php if (!empty($appDate)) { echo "<strong>Sent Date: </strong>".$appDate; } ?></p></div>
                                    </div>
                                    <div class="col-md-4">&nbsp;</div>
          

                                </div>
                            <?  } ?>


                    <!-- Installers -->
                    <?php if (pagePermission()) { ?>
                        <div class="col-lg-12" style="padding-left:0px;">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color:silver!important;color:#000!important;">
                                    <a href="/tickets/installers/new.php?ticketID=<?php echo $ticketID; ?>&custID=<?php echo $custID; ?>"><button class="btn btn-success pull-right" type="button" >New</button></a>                            
                                    <h4><span>Installers</span></h4>
                                </div>
                                <div class="panel-body" style="padding:0px;">                        
                                    <div class="col-md-12" style="padding:0px;">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead><?php include $root.'/tickets/installers/_shared/table_head.php'; ?></thead>
                                                <tbody>
                                                    <?php 
                                                        $installer_request = ("SELECT * FROM ticketInstallers WHERE ticketID = '$ticketID'");
                                                        $installer_result = mysql_query ($installer_request,$db) or die ("Query failed: $installer_request");
                                                        
                                                        while ($installer_row = mysql_fetch_array($installer_result)) { 
                                                            extract($installer_row);
                                                            $attachDate = date("m/j/Y",strtotime($attachDate)); if ($attachDate == '12/31/1969') {$attachDate = ''; }
                                                     ?>                                                      
                                                    <?php include $root.'/tickets/installers/_shared/table_index_loop.php'; ?>

                                                    <? } ?>
                                                </tbody>
                                            </table>
                                        </div> <!-- /.table-responsive -->
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <div class="text-center">
                                         <p>
                                            <span style="margin-right:15px;"><strong>Codes</strong></span><br/>
                                            <span style="margin-right:15px;"><strong>A</strong> - Basic</span>
                                            <span style="margin-right:15px;"><strong>B</strong> - Tough</span>
                                            <span style="margin-right:15px;"><strong>C</strong> - With Wraps</span>
                                        </p>
                                    </div>
                                </div> <!-- /.panel-footer -->
                            </div>            
                        </div>
                    <? } ?>

                    <!-- Installation Info (Wraps) -->
                    <div class="col-lg-12" style="padding-left:0px;">	

                        <div class="panel panel-default">
                        <div class="panel-heading"  style="background-color:green!important;"> <h4><span>Installation Info - (Wraps)</span></h4> </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="form-group" id="wrap-needed">
                                    <label>Needed?</label>
                                    <select class="form-control" name="wrap" >
                                        <option value=""<? if($wrap == '') echo ' selected="selected"'; ?>>Choose One</option>
                                        <option value="Yes"<? if($wrap == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
                                        <option value="No"<? if($wrap == 'No') echo ' selected="selected"'; ?>>No</option>
                                    </select>
                                </div>
                            </div>
                            <div id="installation-blind"> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Completed</label>
                                        <select class="form-control" name="wrapStatus" >
                                            <option value=""<? if($wrapStatus == '') echo ' selected="selected"'; ?>>Choose One</option>
                                            <option value="Yes"<? if($wrapStatus == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
                                            <option value="No"<? if($wrapStatus == 'No') echo ' selected="selected"'; ?>>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="wrapColor">
                                        <label>Color</label>
                                        <select class="form-control" name="wrapColor" >
                                            <option value=""<? if($wrapColor == '') echo ' selected="selected"'; ?>>Choose One</option>
                                            <option value="White"<? if($wrapColor == 'White') echo ' selected="selected"'; ?>>White</option>
                                            <option value="Beige"<? if($wrapColor == 'Beige') echo ' selected="selected"'; ?>>Beige</option>
                                            <option value="American Terra"<? if($wrapColor == 'American Terra') echo ' selected="selected"'; ?>>American Terra</option>
                                            <option value="Architechal Bronze"<? if($wrapColor == 'Architechal Bronze') echo ' selected="selected"'; ?>>Architechal Bronze</option>
                                            <option value="Hudson Khaki"<? if($wrapColor == 'Hudson Khaki') echo ' selected="selected"'; ?>>Hudson Khaki</option>
                                            <option value="Desert Clay"<? if($wrapColor == 'Desert Clay') echo ' selected="selected"'; ?>>Desert Clay</option>
                                            <option value="English Red"<? if($wrapColor == 'English Red') echo ' selected="selected"'; ?>>English Red</option>
                                            <option value="Forest Green"<? if($wrapColor == 'Forest Green') echo ' selected="selected"'; ?>>Forest Green</option>
                                            <option value="Castle Grey"<? if($wrapColor == 'Castle Grey') echo ' selected="selected"'; ?>>Castle Grey</option>
                                            <option value="Black"<? if($wrapColor == 'Black') echo ' selected="selected"'; ?>>Black</option>
                                            <option value="Other"<? if($wrapColor == 'Other') echo ' selected="selected"'; ?>>Other</option>
                                        </select>
                                        <div id="secret-color">
                                            <input class="form-control" name="otherWrapColor" value="<?php echo $otherWrapColor ?>">
                                        </div>
                                    </div>    
                                </div>

                                <div class="col-md-6">          
                                    <div class="form-group">
                                        <label>Ladder Needed</label>
                                        <select class="form-control" name="jobLadder" >
                                            <option value=""<? if($jobLadder == '') echo ' selected="selected"'; ?>>Choose One</option>
                                            <option value="Yes"<? if($jobLadder == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
                                            <option value="No"<? if($jobLadder == 'No') echo ' selected="selected"'; ?>>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Date Installed</label>
                                        <input class="form-control datepicker" name="dateInstalled" value="<?php echo $dateInstalled ?>">
                                    </div>                                           
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                    <!-- End Installation -->


                    <!-- Ticket Time -->
                    <?php if (pagePermission()) { ?>
                        <div class="col-lg-12" style="padding-right:0px;">                                       
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color:olive!important;">
                                    <a href="/tickets/time/new.php?ticketID=<?php echo $ticketID; ?>&custID=<?php echo $custID; ?>"><button class="btn btn-success pull-right" type="button" >New</button></a>
                                    <h4><span>Ticket Time</span></h4>
                                </div>
                                <div class="panel-body" style="padding:0px;">
                                    <div class="col-md-12" style="padding:0px;background:#fff;">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead><?php include $root.'/tickets/time/_shared/table_head.php'; ?></thead>
                                                <tbody>
                                                    <?php 
                                                        $time_request = ("SELECT * FROM ticketTimes WHERE ticketID = '$ticketID'");
                                                        $time_result = mysql_query ($time_request,$db) or die ("Query failed: $time_request");
                                                        
                                                        while ($time_row = mysql_fetch_array($time_result)) { 
                                                            extract($time_row);
                                                            $timeDate = date("m/j/Y",strtotime($timeDate)); if ($timeDate == '12/31/1969') {$timeDate = ''; }      
                                                        
                                                     ?>                                                      
                                                    <?php include $root.'/tickets/time/_shared/table_index_loop.php'; ?>

                                                    <? } ?>
                                                </tbody>
                                            </table>
                                        </div> <!-- /.table-responsive -->
                                        <p>
                                            <strong>Total Time: </strong>
                                            <?
                                                $totalTime_request = ("SELECT SUM(timeTime) FROM ticketTimes WHERE ticketID = '$ticketID';");
                                                $totalTime_result = mysql_query ($totalTime_request,$db) or die ("Query failed: $totalTime_request");
                                                  
                                                    while ($totalTime_row = mysql_fetch_array($totalTime_result)) { 
                                                    extract($totalTime_row);
                                                        $startMinutes = $totalTime_row['SUM(timeTime)'];
                                                        $startT = $currDate . " " . gmdate("H:i", ($startMinutes * 60));
                                                        echo $startT;
                                                  }
                                            ?> 
                                        </p>            
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    &nbsp;
                                </div> <!-- /.panel-footer -->
                            </div>
                        </div> <!-- /.panel -->
                    <? } ?>
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

    <script src="/calendar/lib/moment.js"></script>
    <script src="/calendar/lib/jquery.js"></script>
    <script src="/calendar/lib/jquery-ui.js"></script>
    <script src="/calendar/js/bootstrap.js"></script>


<script>    

    $(document).ready(function () {

        $('#wrap-needed select[name="wrap"]').change(function () {
            if ($('#wrap-needed select[name="wrap"]').val() == 'Yes') {
                $('#installation-blind').show();
            } else  {
                $('#installation-blind').hide();
            }
        });



        $('#wrapColor select[name="wrapColor"]').change(function () {
            if ($('#wrapColor select[name="wrapColor"]').val() == 'Other') {
                $('#secret-color').show();
            } else  {
                $('#secret-color').hide();
            }
        });



            if ($('#wrapColor select[name="wrapColor"]').val() == 'Other') {
                $('#secret-color').show();
            } else {
                $('#secret-color').hide();
            }




        $('#propertyTypediv select[name="propertyType"]').change(function () {
            if ($('#propertyTypediv select[name="propertyType"]').val() == 'Multiple Property') {
                $('#multi').show();
            } else  {
                $('#multi').hide();

            }
        });



            if ($('#propertyTypediv select[name="propertyType"]').val() == 'Multiple Property') {
                $('#multi').show();
            } else {
                $('#multi').hide();
            }



        $('#propertyTypediv select[name="propertyType"]').change(function () {
            if ($('#propertyTypediv select[name="propertyType"]').val() == 'DIY') {
                $('#diy-main').show();
            } else {
                $('#diy-main').hide();

            }
        });

        if ($('#propertyTypediv select[name="propertyType"]').val() == 'DIY') {
            $('#diy-main').show();
        } else {
            $('#diy-main').hide();
        }







        $('#selectProduct select[name="jobProduct"]').change(function () {
            if ($('#selectProduct select[name="jobProduct"]').val() == 'Windows') {
                $('#job-windows').show();
            } else {
                $('#job-windows').hide();

            }
        });

        $('#selectProduct select[name="jobProduct"]').change(function () {
            if ($('#selectProduct select[name="jobProduct"]').val() == 'Doors') {
                $('#job-doors').show();
            } else {
                $('#job-doors').hide();

            }
        });


        $('#selectProduct select[name="jobProduct"]').change(function () {
            if ($('#selectProduct select[name="jobProduct"]').val() == 'Siding') {
                $('#job-siding').show();
            } else {
                $('#job-siding').hide();

            }
        });

        $('#selectProduct select[name="jobProduct"]').change(function () {
            if ($('#selectProduct select[name="jobProduct"]').val() == 'Window Repair') {
                $('#job-window-repair').show();
            } else {
                $('#job-window-repair').hide();

            }
        });

        $('#selectProduct select[name="jobProduct"]').change(function () {
            if ($('#selectProduct select[name="jobProduct"]').val() == 'Door Repair') {
                $('#job-door-repair').show();
            } else {
                $('#job-door-repair').hide();

            }
        });                        



        if ($('#selectProduct select[name="jobProduct"]').val() == 'Windows') {
            $('#job-windows').show();
            $('#job-doors').hide();
            $('#job-siding').hide();
            $('#job-window-repair').hide();
            $('#job-door-repair').hide();
            
        } 

        else if ($('#selectProduct select[name="jobProduct"]').val() == 'Doors') {
            $('#job-windows').hide();
            $('#job-doors').show();
            $('#job-siding').hide();
            $('#job-window-repair').hide();
            $('#job-door-repair').hide();
            
        } 

        else if ($('#selectProduct select[name="jobProduct"]').val() == 'Siding') {
            $('#job-windows').hide();
            $('#job-doors').hide();
            $('#job-siding').show();
            $('#job-window-repair').hide();
            $('#job-door-repair').hide();
            
        } 

        else if ($('#selectProduct select[name="jobProduct"]').val() == 'Window Repair') {
            $('#job-windows').hide();
            $('#job-doors').hide();
            $('#job-siding').hide();
            $('#job-window-repair').show();
            $('#job-door-repair').hide();
            
        } 

        else if ($('#selectProduct select[name="jobProduct"]').val() == 'Door Repair') {
            $('#job-windows').hide();
            $('#job-doors').hide();
            $('#job-siding').hide();
            $('#job-window-repair').hide();
            $('#job-door-repair').show();
            
        } 

        else {
            $('#job-windows').hide();
            $('#job-doors').hide();
            $('#job-siding').hide();
            $('#job-window-repair').hide();
            $('#job-door-repair').hide();
        }



        // $("#homeNum").change(function(){
        //      if(parseFloat(this.value) < 1978){
        //         $('#wrap-div').show();
        //         /*if it is*/
        //      } 
        //      else{
        //         $('#wrap-div').hide();

        //      }
        // })

        // if(parseFloat($("#homeNum").val()) < 1978) {
        //     $('#wrap-div').show();
        // }
        // else{
        //     $('#wrap-div').hide();
        // }
    });
;
</script>

    
    <script src="/calendar/js/fullcalendar.js"></script>
    <script src="/calendar/js/lang-all.js"></script>
    <script src="/calendar/js/jquery.calendar.js"></script>
    <script src="/calendar/lib/spectrum/spectrum.js"></script>
    
    <script src="/calendar/lib/timepicker/jquery-ui-sliderAccess.js"></script>
    <script src="/calendar/lib/timepicker/jquery-ui-timepicker-addon.min.js"></script>
    
    <script src="/calendar/js/g.map.js"></script>
    <script src="/calendar/http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    
    <script src="/calendar/js/custom.js"></script>


    <script src="/lightbox/jquery.lightbox.js"></script>
    <script>
        // Initiate Lightbox
        $(function() {
            $('.gallery1 a').lightbox();
        });
    </script>


</body>

</html>
