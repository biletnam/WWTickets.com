<?
	// Configure site
	$root = $_SERVER['DOCUMENT_ROOT']; 
	$private = str_replace("public","private",$root);
	include_once("$private/config.php");

// Verify login
include_once("$root/lc.php");
	
		$cust_request = ("SELECT * FROM customerInfo WHERE custID= '".$_GET['ID']."'");
		$cust_result = mysql_query ($cust_request,$db) or die ("Query failed: $cust_request");
		$cust_total = mysql_num_rows($cust_result);
		if($cust_total == 0) echo "<p>That Product doesn't exist.</p>\n";
		
		while ($cust_row = mysql_fetch_array($cust_result)) { 
			extract($cust_row);		
		}

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

    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

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
            <!-- Customer Locations -->
            <div class="row">
                <div class="col-lg-12" style="margin-top:0px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><span>Customer Locations</span></h4>
                            <a href="/customers/locations/new.php?ID=<?php echo $custID; ?>" class="btn btn-success pull-right" type="button" style="margin-top:-30px;">New Location</a>
                        </div>
                        <div class="panel-body" style="background-color:#f8f8f8;">
                            <table class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Location</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Zip</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?
                                            $cust_request = ("SELECT * FROM customerLocations WHERE custLocID= '".$_GET['ID']."'");
                                            $cust_result = mysql_query ($cust_request,$db) or die ("Query failed: $cust_request");
                                            $cust_total = mysql_num_rows($cust_result);
                                            if($cust_total == 0){echo "";}
                                            else{
                                                while ($cust_row = mysql_fetch_array($cust_result)) { 
                                                    extract($cust_row); echo '';?>
                                                        <tr>
                                                            <td><a href="/customers/locations/edit.php?ID=<?php echo $custID; ?>"><?php echo $locationName; ?></a></td>
                                                            <td><?php echo $locationAddress; ?></td>
                                                            <td><?php echo $locationCity; ?></td>
                                                            <td><?php echo $locationState; ?></td>
                                                            <td><?php echo $locationZip; ?></td>
                                                        </tr>
                                            <?} 
                                            } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            &nbsp;
                        </div>
                        <!-- /.panel-footer -->                        
                    </div>
                    <!-- /.panel -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <p> <a href="/tickets/ticket_new.php?custID=<?php echo $custID; ?>" class="btn btn-primary btn-lg btn-block btn-success">New Ticket <i class="glyphicon glyphicon-plus-sign"></i></a> </p>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4> Tickets </h4>
                        </div>
                        <div class="panel-body" style="background-color:#fffeed;">
                            <div class="col-md-12">

                                    <table class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
                                        <thead>                                            <tr>
                                                <th>Ticket #</th>
                                                <th>Job Name</th>
                                                <th>Invoiced</th>
                                                <th>Status</th>
                                                <th>Hot List</th>
                        
                                            </tr></thead>
                                        <tbody>
                                            <?php

                                                $cust_request = ("SELECT * FROM customerTickets LEFT JOIN customerInfo ON customerTickets.ticketCustID=customerInfo.custID WHERE ticketCustID= '".$_GET['ID']."' ORDER BY ticketID ASC");
                                                $cust_result = mysql_query ($cust_request,$db) or die ("Query failed: $cust_request");

                                                $ticketcount = 0;
                                                while ($cust_row = mysql_fetch_array($cust_result)) { 
                                                    extract($cust_row);
                                                    $ticketDate = convertDate($ticketDate);
                                                    $showTicketID = sprintf('%05d',$ticketID); ?>


        <tr class="<?php echo $ticketcount; ?>">
            <?php 
                $name_request = ("SELECT custID,custFName,custLName FROM customerInfo WHERE custID = '$ticketCustID'");
                $name_result = mysql_query ($name_request,$db) or die ("Query failed: $name_request");
                
                while ($name_row = mysql_fetch_array($name_result)) { 
                    extract($name_row);    
                        $ticketColum = date("m/j/Y",strtotime($ticketColum));
                    $ticketColum = convertDate($ticketColum);
                }
             ?>
            <td><a href="/tickets/ticket_view.php?ticketID=<?php echo $ticketID ?>&custID=<?php echo $ticketCustID; ?>"><?php echo $showTicketID; ?></td>
                <?php include $root.'/_shared/status-colors.php'; ?>
                <?php

                    $ticketCode = date('Ymd',strtotime($ticketDate));
                    if ($soldDate != '1969-12-31') {$ticketCode = $soldDate; $ticketCode = date("Ymd",strtotime($ticketCode)); }
                    $ticketCode = str_replace("2015", "15", $ticketCode);
                    $ticketCode = str_replace("2016", "16", $ticketCode);
                    $ticketCode = str_replace("2017", "17", $ticketCode);
                    $ticketCode = str_replace("2018", "18", $ticketCode);
                    $ticketCode = str_replace("2019", "19", $ticketCode);
                    $ticketCode = str_replace("2020", "20", $ticketCode);
                    $ticketCode = str_replace("2021", "21", $ticketCode);
                    if ($ticketCode == '-00011130') {$ticketCode = '151031'; }
                    $ticketName = $ticketCode."_".$jobProduct."_".$ticketCity."_(".$ticketNORF.")";
                ?>
            <td><?php echo $ticketName; ?></td>
            <?php  $ticketSInvoiced = convertDate($ticketSInvoiced); ?>
            <td>
                <form id="myInvoice<?php echo $ticketID; ?>" method="POST" action="/tickets/form/updt-invoice.php" style="width:20px;">
                    <input type="hidden" name="ticketID" value="<?php echo $ticketID; ?>">    
                    <input style="text-align:center;" type="checkbox" id="checkboxInv<?php echo $ticketID; ?>" value="1" name="ticketInvoiced"<? if($ticketInvoiced == '1') echo ' checked="checked"'; ?> />
                </form>

                <div id="outputInv<?php echo $ticketID; ?>"></div>
                <span><?php echo $ticketSInvoiced; ?></span>

            </td>
            <td <?php echo $color; ?>>
                <? 
                /*
                Author  : Scott DeBoer
                Date    : 15.12.16
                Comments: Brent Frey requested to change status on every view instead of going into every ticket
                */

                    $dateFields = array('soldDate','ticketSSold', 'ticketSOrdered', 'ticketSReceived', 'ticketSInstalled', 'ticketSInvoiced', 'ticketSPaid', 'ticketSProposalGiven', 'ticketSIncomplete', 'ticketSPending','ticketSComplete');

                    foreach ($dateFields as $field) {
                        $field = date("m/j/Y",strtotime($field)); if ($field == '12/31/1969') {$field = ''; } if ($field == '11/30/-0001') { $field = ''; }
                    }

                ?>


                <form id="myform<?php echo $ticketID; ?>" method="POST" action="/tickets/form/updt-ticket-status.php">
                <input type="hidden" name="ticketID" value="<?php echo $ticketID; ?>">    
                    <select class="form-control" name="ticketStatus" id="dropdown<?php echo $ticketID; ?>">
                        <option value=""<? if($ticketStatus == '') echo ' selected="selected"'; ?>>Choose One</option>
                        <option value="Rejected"<? if($ticketStatus == 'Rejected') echo ' selected="selected"'; ?>>Rejected</option>
                        <option value="Unscheduled"<? if($ticketStatus == 'Unscheduled') echo ' selected="selected"'; ?>>Unscheduled Estimate</option>
                        <!-- <option value="Need Estimate"<? if($ticketStatus == 'Need Estimate') echo ' selected="selected"'; ?>>Need Estimate</option> -->
                        <option value="Scheduled"<? if($ticketStatus == 'Scheduled') echo ' selected="selected"'; ?>>Scheduled Estimate</option>
                        <option value="Proposal Given"<? if($ticketStatus == 'Proposal Given') echo ' selected="selected"'; ?>>Proposal Given <?php if ($ticketSProposalGiven != '') {echo "(".$ticketSProposalGiven.")"; } ?></option>
                        <option value="Sold"<? if($ticketStatus == 'Sold') echo ' selected="selected"'; ?>>Sold <?php if ($soldDate != '') {echo "(".$soldDate.")"; } ?> </option>
                        <option value="Needs Measured"<? if($ticketStatus == 'Needs Measured') echo ' selected="selected"'; ?>>Needs Measured</option>
                        <option value="Need to Order"<? if($ticketStatus == 'Need to Order') echo ' selected="selected"'; ?>>Need to Order</option>
                        <option value="Ordered"<? if($ticketStatus == 'Ordered') echo ' selected="selected"'; ?>>Ordered <?php if ($ticketSOrdered != '') {echo "(".$ticketSOrdered.")"; } ?></option>
                        <option value="Received"<? if($ticketStatus == 'Received') echo ' selected="selected"'; ?>>Received <?php if ($ticketSReceived != '') {echo "(".$ticketSReceived.")"; } ?></option>
                        <option value="Went To Columbus"<? if($ticketStatus == 'Went To Columbus') echo ' selected="selected"'; ?>>Went To Columbus</option>
                        <option value="Ready to Install"<? if($ticketStatus == 'Ready to Install') echo ' selected="selected"'; ?>>Ready to Install</option>
                        <option value="Scheduled to Install"<? if($ticketStatus == 'Scheduled to Install') echo ' selected="selected"'; ?>>Scheduled to Install <?php if ($ticketSScheduled != '') {echo "(".$ticketSScheduled.")"; } ?></option>
                        <option value="Installed"<? if($ticketStatus == 'Installed') echo ' selected="selected"'; ?>>Installed <?php if ($ticketSInstalled != '') {echo "(".$ticketSInstalled.")"; } ?></option>
                        <option value="Pending Wrap"<? if($ticketStatus == 'Pending Wrap') echo ' selected="selected"'; ?>>Pending Wrap <?php if ($ticketSPending != '') {echo "(".$ticketSPending.")"; } ?></option>
                        <option value="Incomplete"<? if($ticketStatus == 'Incomplete') echo ' selected="selected"'; ?>>Incomplete <?php if ($ticketSIncomplete != '') {echo "(".$ticketSIncomplete.")"; } ?></option>
                        <option value="Complete"<? if($ticketStatus == 'Complete') echo ' selected="selected"'; ?>>Complete <?php if ($ticketSComplete != '') {echo "(".$ticketSComplete.")"; } ?></option>
                        <option value="Paid"<? if($ticketStatus == 'Paid') echo ' selected="selected"'; ?>>Paid <?php if ($ticketSPaid != '') {echo "(".$ticketSPaid.")"; } ?></option>
                        <option value="Gift Sent"<? if($ticketStatus == 'Gift Sent') echo ' selected="selected"'; ?>>Gift Sent</option>
                        <!-- <option value="Rejected"<? if($ticketStatus == 'Rejected') echo ' selected="selected"'; ?>>Rejected</option> -->
                        <!-- <option value="Proposal"<? if($ticketStatus == 'Proposal') echo ' selected="selected"'; ?>>Proposal</option> -->
                        <!-- <option value="Old Proposals"<? if($ticketStatus == 'Old Proposals') echo ' selected="selected"'; ?>>Old Proposals</option> -->
                    </select>            
                </form>

                <div id="output<?php echo $ticketID; ?>"></div>

            </td>

            <td> <?php if ($ticketsHot == '1') { ?> <img src="/_images/siren.gif" alt="" style="width:15px;"> 
            <? } else{ echo ''; } ?> 
                <form id="myHot<?php echo $ticketID; ?>" method="POST" action="/tickets/form/updt-hot.php" style="width:20px;">
                    <input type="hidden" name="ticketID" value="<?php echo $ticketID; ?>">    
                    <input style="text-align:center;" type="checkbox" id="checkboxHot<?php echo $ticketID; ?>" value="1" name="ticketsHot"<? if($ticketsHot == '1') echo ' checked="checked"'; ?> />
                </form>
            </td>

            <script>
                $(document).ready(function() {
                   $('#checkboxHot<?php echo $ticketID;?>').click( function() {
                       $.ajax({ // create an AJAX call...
                           data: $('#myHot<?php echo $ticketID;?>').serialize(), // serialize the form
                           type: $('#myHot<?php echo $ticketID;?>').attr('method'), // GET or POST from the form
                           url: $('#myHot<?php echo $ticketID;?>').attr('action'), // the file to call from the form
                       });
                    }); 

                   $('#dropdown<?php echo $ticketID;?>').change( function() {
                       $.ajax({ // create an AJAX call...
                           data: $('#myform<?php echo $ticketID;?>').serialize(), // serialize the form
                           type: $('#myform<?php echo $ticketID;?>').attr('method'), // GET or POST from the form
                           url: $('#myform<?php echo $ticketID;?>').attr('action'), // the file to call from the form
                           success: function(response) { // on success..
                               $('#output<?php echo $ticketID; ?>').html(response); // update the DIV
                           }
                       });
                    });
                   $('#checkboxInv<?php echo $ticketID;?>').click( function() {
                       $.ajax({ // create an AJAX call...
                           data: $('#myInvoice<?php echo $ticketID;?>').serialize(), // serialize the form
                           type: $('#myInvoice<?php echo $ticketID;?>').attr('method'), // GET or POST from the form
                           url: $('#myInvoice<?php echo $ticketID;?>').attr('action'), // the file to call from the form
                           success: function(response) { // on success..
                               $('#outputInv<?php echo $ticketID; ?>').html(response); // update the DIV
                           }
                       });
                    }); 
                });
            </script>

        </tr>


<? } ?>
                                        </tbody>
                                    </table>

                                <!-- /.table-responsive -->                                
                            </div>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->                    
                </div>
                <div class="col-lg-6">
                    <p> <a href="/customers/task/new.php?ticketID=<?php echo $ticketID; ?>&custID=<?php echo $custID; ?>" class="btn btn-primary btn-lg btn-block btn-success">New Task <i class="glyphicon glyphicon-plus-sign"></i></a> </p>
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color:darkblue!important;">
                            <h4><span>Task List</span></h4>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">

                                <?php 
                                    $task_request = ("SELECT * FROM ticketTask WHERE taskCust = '".$_GET['ID']."' AND taskStatus != 'Complete'");
                                    $task_result = mysql_query ($task_request,$db) or die ("Query failed: $task_request");
                                    
                                    while ($task_row = mysql_fetch_array($task_result)) { 
                                        extract($task_row);
                                        $taskDate = date("m/j/Y",strtotime($completeBy)); if ($taskDate == '12/31/1969') {$taskDate = ''; }  
                                 ?>  

                                <?php if ($ticketRedFlag == 'Yes') { ?> <div class="col-md-2"> <img src="/_images/redflag.gif" alt=""> </div> <? } ?>
                                <div class="col-md-4 col-xs-4"><strong>Assigned</strong><br/><?php echo $taskEmp; ?></div>
                                <div class="col-md-4 col-xs-4"><strong>Created By</strong><br/><?php echo $createdBy; ?></div>
                                <div class="col-md-4 col-xs-4"><strong>Due Date</strong><br/><?php echo $taskDate; ?></div>


                                <div class="col-md-12">

                                    <form id="myTask<?php echo $taskID; ?>" method="POST" action="/customers/form/updt-task.php" style="width:20px;">

                                        <input type="hidden" name="taskID" value="<?php echo $taskID; ?>"> 

                                        <label for="">Status</label>
                                        <select name="taskStatus" id="taskDropdown<?php echo $taskID; ?>">
                                            <option value=""<? if($taskStatus == '') echo ' selected="selected"'; ?>>Choose One</option>
                                            <option value="Processing"<? if($taskStatus == 'Processing') echo ' selected="selected"'; ?>>Processing</option>
                                            <option value="Complete"<? if($taskStatus == 'Complete') echo ' selected="selected"'; ?>>Complete</option>
                                        </select>                 

                                    </form>

                                    <script>
                                        $(document).ready(function() {
                                           $('#taskDropdown<?php echo $taskID;?>').change( function() {
                                               $.ajax({ // create an AJAX call...
                                                   data: $('#myTask<?php echo $taskID;?>').serialize(), // serialize the form
                                                   type: $('#myTask<?php echo $taskID;?>').attr('method'), // GET or POST from the form
                                                   url: $('#myTask<?php echo $taskID;?>').attr('action'), // the file to call from the form

                                               });
                                            });
                                        });
                                    </script>

                                </div>

                                <div class="col-md-12"><br/><strong>Note</strong><br/><br/>
                                    <?php echo $taskNotes; ?><br/><a style="margin-top:10px;"href="/customers/task/edit.php?taskID=<?php echo $taskID; ?>&custID=<?php echo $custID; ?>" class="btn btn-warning">Edit</a><hr style="height:10px;display:block;"/>
                                </div>


                                <? } ?>



          
                            </div>
                        </div>
                        <div class="panel-footer">
                           <p> <a href="/customers/task/archived.php?ID=<?php echo $custID; ?>"> <button class="btn btn-success" style="margin-top:-7px;margin-left:15px;" type="button">Completed Task</button> </a></p>
                        </div>
                        <!-- /.panel-footer -->    
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

</body>

</html>
