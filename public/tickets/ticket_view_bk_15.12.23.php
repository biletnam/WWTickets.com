<?
	// Configure site
	$root = $_SERVER['DOCUMENT_ROOT']; 
	$private = str_replace("public","private",$root);
	include_once("$private/config.php");

// Verify login
include_once("$root/lc.php");

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
	
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
            $showTicketID = sprintf('%05d',$ticketID);
        }


####################################
# Special Variable Characters
#
####################################

        $ticketDate = date("m/j/Y",strtotime($ticketDate)); if ($ticketDate == '11/30/-0001') {$ticketDate = ''; } if ($ticketDate == '12/31/1969') {$ticketDate = ''; }
        $ticketOrdDate = date("m/j/Y",strtotime($ticketOrdDate)); if ($ticketOrdDate == '11/30/-0001') {$ticketOrdDate = ''; } if ($ticketOrdDate == '12/31/1969') {$ticketOrdDate = ''; }
        $ticketDateM = date("m/j/Y",strtotime($ticketDateM)); if ($ticketDateM == '11/30/-0001') {$ticketDateM = ''; } if ($ticketDateM == '12/31/1969') {$ticketDateM = ''; }
        $ticketColum = date("m/j/Y",strtotime($ticketColum)); if ($ticketColum == '11/30/-0001') {$ticketColum = ''; } if ($ticketColum == '12/31/1969') {$ticketColum = ''; }
        $ticketInstall = date("m/j/Y",strtotime($ticketInstall)); if ($ticketInstall == '11/30/-0001') {$ticketInstall = ''; } if ($ticketInstall == '12/31/1969') {$ticketInstall = ''; }
        $leadTestEmpDate = date("m/j/Y",strtotime($leadTestEmpDate)); if ($leadTestEmpDate == '11/30/-0001') {$leadTestEmpDate = ''; } if ($leadTestEmpDate == '12/31/1969') {$leadTestEmpDate = ''; }
        $pamDate = date("m/j/Y",strtotime($pamDate)); if ($pamDate == '11/30/-0001') {$pamDate = ''; } if ($pamDate == '12/31/1969') {$pamDate = ''; }
        $testDate = date("m/j/Y",strtotime($testDate)); if ($testDate == '11/30/-0001') {$testDate = ''; } if ($testDate == '12/31/1969') {$testDate = ''; }
        $renoDate = date("m/j/Y",strtotime($renoDate)); if ($renoDate == '11/30/-0001') {$renoDate = ''; } if ($renoDate == '12/31/1969') {$renoDate = ''; }
        $paidDate = date("m/j/Y",strtotime($paidDate)); if ($paidDate == '11/30/-0001') {$paidDate = ''; } if ($paidDate == '12/31/1969') {$paidDate = ''; }
        $prepSent = date("m/j/Y",strtotime($prepSent)); if ($prepSent == '11/30/-0001') {$prepSent = ''; } if ($prepSent == '12/31/1969') {$prepSent = ''; }
        $appDate = date("m/j/Y",strtotime($appDate)); if ($appDate == '11/30/-0001') {$appDate = ''; } if ($appDate == '12/31/1969') {$appDate = ''; }
        $finalDate = date("m/j/Y",strtotime($finalDate)); if ($finalDate == '11/30/-0001') {$finalDate = ''; } if ($finalDate == '12/31/1969') {$finalDate = ''; }
        $downDate = date("m/j/Y",strtotime($downDate)); if ($downDate == '11/30/-0001') {$downDate = ''; } if ($downDate == '12/31/1969') {$downDate = ''; }
        $dateInstalled = date("m/j/Y",strtotime($dateInstalled)); if ($dateInstalled == '11/30/-0001') {$dateInstalled = ''; } if ($dateInstalled == '12/31/1969') {$dateInstalled = ''; }
        $diyDate = date("m/j/Y",strtotime($diyDate)); if ($diyDate == '11/30/-0001') {$diyDate = ''; } if ($diyDate == '12/31/1969') {$diyDate = ''; }
        $diyReceived = date("m/j/Y",strtotime($diyReceived)); if ($diyReceived == '11/30/-0001') {$diyReceived = ''; } if ($diyReceived == '12/31/1969') {$diyReceived = ''; }
        $diyOrdered = date("m/j/Y",strtotime($diyOrdered)); if ($diyOrdered == '11/30/-0001') {$diyOrdered = ''; } if ($diyOrdered == '12/31/1969') {$diyOrdered = ''; }   
   
        $soldDate = date("m/j/Y",strtotime($soldDate));  if ($soldDate == '11/30/-0001') {$soldDate = ''; }   if ($soldDate== '12/31/1969') {$soldDate= '';  }
    

        $ticketSSold = date("m/j/Y",strtotime($ticketSSold)); if ($ticketSSold == '12/31/1969') {$ticketSSold = ''; } if ($ticketSSold == '11/30/-0001') { $ticketSSold = ''; }
        $ticketSOrdered = date("m/j/Y",strtotime($ticketSOrdered)); if ($ticketSOrdered == '12/31/1969') {$ticketSOrdered = ''; } if ($ticketSOrdered == '11/30/-0001') { $ticketSOrdered = ''; }
        $ticketSReceived = date("m/j/Y",strtotime($ticketSReceived)); if ($ticketSReceived == '12/31/1969') {$ticketSReceived = ''; } if ($ticketSReceived == '11/30/-0001') { $ticketSReceived = ''; }
        $ticketSInstalled = date("m/j/Y",strtotime($ticketSInstalled)); if ($ticketSInstalled == '12/31/1969') {$ticketSInstalled = ''; } if ($ticketSInstalled == '11/30/-0001') { $ticketSInstalled = ''; }
        $ticketSInvoiced = date("m/j/Y",strtotime($ticketSInvoiced)); if ($ticketSInvoiced == '12/31/1969') {$ticketSInvoiced = ''; } if ($ticketSInvoiced == '11/30/-0001') { $ticketSInvoiced = ''; }
        $ticketSPaid = date("m/j/Y",strtotime($ticketSPaid)); if ($ticketSPaid == '12/31/1969') {$ticketSPaid = ''; } if ($ticketSPaid == '11/30/-0001') { $ticketSPaid = ''; }




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

                    <div style="float:right;padding:5px 10px;margin-bottom:20px;">
    
                                            <a href="/tickets/ticket_edit.php?ticketID=<?php echo $ticketID; ?>&custID=<?php echo $custID; ?>"><button type="submit" name="submit" class="btn btn-warning btn-default" value="Save Changes" >Edit</button></a>
</div>

                    <?php 

                    if ($prepLetter == 'Yes') { ?> <p class="pull-right" style="margin-right:30px;"><i class="fa fa-paper-plane fa-fw"></i>  Prep Letter Sent - <?php echo $prepSent; ?></p> <? } 
                    else{ ?> <p style="margin-right:30px;"> <a href="send-prep-letter.php?ticketID=<?php echo $ticketID; ?>&custID=<?php echo $ticketCustID; ?>"><button class="pull-right"><i class="fa fa-paper-plane fa-fw"></i> Send Prep Letter</button></a> </p> <? } ?>

                    <h2>
                        <?php if (!empty($ticketLat) && !empty($ticketLong)) { ?>
                        <!-- Button trigger modal -->
                        <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-map-marker fa-fw"></i></a>
                        <!-- Modal --> 
                        <?  } ?>

                        <?php if ($ticketsHot == '1') { ?>
                            <img src="/_images/siren.gif" alt="" title="" />
                        <? } ?>
                        Ticket #<?php echo $showTicketID; ?></h2>

                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color:red!important;">
                            <?php 
                            if ($warranty_total == 0) { ?>
                                <a href="/tickets/warranty/edit.php?ticketID=<?php echo $ticketID; ?>&custID=<?php echo $custID; ?>&activateID=1"><button class="btn btn-success pull-right" type="button" >Add Warranty Transfer</button></a>
                            <? } ?>
                            <h4><span>Ticket Details</span></h4>
                        </div>

                        <div class="panel-body">

                            <div class="col-md-12">

                                <div class="col-md-6">
                                            <p>

                                                <?php 


if (empty($jobProduct)) {$jobProduct == 'x'; }
    $ticketCode = date('Ymd',strtotime($ticketDate));




if ($soldDate != '') {$ticketCode = $soldDate;$ticketCode = date('Ymd',strtotime($ticketCode));}


    $ticketCode = str_replace("2015", "15", $ticketCode);
    $ticketCode = str_replace("2016", "16", $ticketCode);
    $ticketCode = str_replace("2017", "17", $ticketCode);
    $ticketCode = str_replace("2018", "18", $ticketCode);
    $ticketCode = str_replace("2019", "19", $ticketCode);
    $ticketCode = str_replace("2020", "20", $ticketCode);
    $ticketCode = str_replace("2021", "21", $ticketCode);




$ticketName = $ticketCode."_".$jobProduct."_".$ticketCity."_(".$ticketNORF.")";
 ?>



                                    <strong>Job Name:</strong> <?php echo $ticketName; ?><br/>
                                                <!-- <strong>Customer Type:</strong> <?php echo $ticketRelation; ?><br/> -->

        <?php include $root.'/_shared/status-colors.php'; ?>
                                    <strong>Status: </strong><span <?php echo $color; ?>><?php echo $ticketStatus; 

if ($ticketStatus == 'Sold') {$showDate = $ticketSSold; } 
if ($ticketStatus == 'Ordered') {$showDate = $ticketSOrdered; } 
if ($ticketStatus == 'Received') {$showDate = $ticketSReceived; } 
if ($ticketStatus == 'Installed') {$showDate = $ticketSInstalled; } 
if ($ticketStatus == 'Invoiced') {$showDate = $ticketSInvoiced; } 
if ($ticketStatus == 'Paid') {$showDate = $ticketSPaid; } 
else $showDate == '';

if ($showDate != '') {
echo " ($showDate)";
}


                                    ?>


                                </span>
<br/>
<strong>Ticket Location:</strong> <?php echo $ticketLocation; ?><br/>
                                                <strong>Property Type:</strong> <?php echo $propertyType; ?>

                                                <?php if ($propertyType == 'Multiple Property') { ?>
                                                <br/>
                                                    <strong>Address </strong><?php echo $ticketAddress; ?><br/>
                                                    <strong>Second Address: </strong><?php echo $ticketSecAddress; ?><br/>
                                                    <?php echo $ticketCity ?>, <?php echo $ticketState; ?> <?php echo $ticketZip ?>
                                                <? } ?>

                                                <?php if ($propertyType == 'DIY') { ?>
                                                    <div class="col-md-4" style="padding-left:0px;">
                                                        <strong>Date Ordered:</strong> <?php echo $diyOrdered; ?>
                                                    </div>
                                                    <div class="col-md-4" style="padding-left:0px;">
                                                        <strong>Date Received:</strong> <?php echo $diyReceived; ?>
                                                    </div>
                                                    <div class="col-md-4" style="padding-left:0px;">
                                                        <strong>Date Pickup:</strong> <?php echo $diyDate; ?>
                                                    </div>
                                                <? } ?>
                                            </p>
                                            
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
                                                    <!-- <strong>PO # </strong><?php echo $showTicketID;  ?> -->
                                </div>

                                <div class="col-md-6" style="padding-left:0px;">

                                    <div class="col-md-5"><p><strong>Went to Columbus: </strong> <br/><?php echo $ticketColum;  ?></p></div>
                                    <div class="col-md-6"><p><strong>Order Date: </strong><?php echo $ticketOrdDate; ?></p></div>

                            

                                    <div class="col-md-4"><p><strong>Assigned: </strong><?php echo $ticketAssign; ?></p></div>
                                    <div class="col-md-4"><p><strong>Job: </strong><?php echo $jobProduct;  ?></p></div>
                                    <div class="col-md-4"><p><strong>Type: </strong><?php echo $ticketType; ?></p></div>

                                    <div class="col-md-6"> <strong>Year of Home: </strong><?php echo $homeYear ?><br> </div>
                                    <div class="col-md-6"> <strong>Install/P&amp;B: </strong><?php echo $ticketInstall;  ?><br/> </div>

                                </div>



                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color:green!important;">
                            <h4>Installation Info - (Wraps)</h4>
                        </div>
                        
                        <div class="panel-body">

                            <div class="col-md-12">

                                <div class="col-md-6">
                                    <p>
                                        <strong>Needed: </strong><?php if (!empty($wrap)) {echo $wrap; } ?><br/>
                                        <strong>Completed: </strong><?php if (!empty($wrapStatus)) {echo $wrapStatus; } ?><br/>
                                        <strong>Color: </strong><?php if (!empty($wrapColor)) {echo $wrapColor; } ?><?php if ($wrapColor == 'Other') {echo " - ".$otherWrapColor; } ?><br/>
                                        <strong>Ladder Needed: </strong><?php if (!empty($jobLadder)) {echo $jobLadder; } ?><br/>
                                        <strong>Date Installed: </strong><?php if (!empty($dateInstalled)) {echo $dateInstalled; } ?><br/>
                                    </p>

                                </div>
                                <div class="col-md-6" style="padding-left:0px;">
                                        <p><strong>Ticket Notes: </strong><?php echo $wrapDetails; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

<?php if ($homeYear <= '1978') { ?>

                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color:purple!important;">
                            <h4>Forms</h4>
                        </div> 
                        
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <p><?php if (!empty($leadTest)) { ?> &#9745; <? } else{ ?> &#9744; <? } ?> <strong>Lead Test</strong><br/>
                                    <?php if (!empty($pamfill)) { ?> &#9745; <? } else{ ?> &#9744; <? } ?> <strong>Pamphlet Filled</strong> <br/>
                                    <?php if (!empty($testKit)) { ?> &#9745; <? } else{ ?> &#9744; <? } ?> <strong>Test Kit Form</strong><br/>
                                    <?php if (!empty($reno)) { ?> &#9745; <? } else{ ?> &#9744; <? } ?> <strong>Renovation Record Keeping</strong><br/>
                                    <?php if (!empty($paymentReceived)) { ?> &#9745; <? } else{ ?> &#9744; <? } ?> <strong>Payment Received</strong><br/>
                                    <?php if (!empty($yardSign)) { ?> &#9745; <? } else{ ?> &#9744; <? } ?> <strong>Yard Sign</strong><br/>
                                    <?php if (!empty($certCompletion)) { ?> &#9745; <? } else{ ?> &#9744; <? } ?> <strong>Certificate of Completion</strong></p>
                                </div>
                                <div class="col-md-6">
                                    
                                <p style="color:#333;">Last modified by: <?php echo $leadTestEmp ?> - <?php echo $leadTestEmpDate; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

<? } ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color:yellow!important;color:#000!important;">
                            <h4>Order Info - <?php echo $ticketLocation; ?></h4>
                        </div>
                        
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <p><strong>PO#: </strong><?php echo $ticketPO;  ?></p>
                                </div>
                                <div class="col-md-12">
                                    <p><strong>Sold Date: </strong><?php echo $soldDate; ?></p>
                                </div>
                            
                                <div class="col-md-12">
                                    <p><strong>Qty:</strong> <?php echo $ticketNORF;  ?></p>
                                </div>
                        
                                    <div class="col-md-6">
                                        <p><strong># MI: </strong><?php echo $ticketMI;  ?></p>
                                        <p><strong># AMI: </strong><?php echo $ticketAMI;  ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>MI FO# </strong><?php echo $ticketMIOrd;  ?></p>
                                        <p><strong>AMI FO#: </strong><?php echo $ticketAMIFO;  ?></p>
                                    </div>
                            
<!--                                 <div class="col-md-6">
                                    <p><strong>Columbus</strong></p>
                                    <div class="col-md-6">
                                        <p><strong># MI: </strong><?php echo $ticketcolMI;  ?></p>
                                        <p><strong># AMI: </strong><?php echo $ticketcolAMI;  ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>MI Order: </strong><?php echo $ticketcolMIoOrd;  ?></p>
                                        <p><strong>AMI FO#: </strong><?php echo $ticketcolAMIFO;  ?></p>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>                    
                        
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color:orange!important;">
                            <h4>Payment Details</h4>
                        </div>
                        
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <p><strong>Financing Details</strong><br/><?php echo $financeStatus; ?></p>
                                    <p><strong>Payment Method</strong><br/><?php echo $paymentMethod; ?></p>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-6"><p><strong>Down Payment Amount</strong><br/>$ <?php echo $downPayment; ?></p></div>
                                    <div class="col-md-6"><p><strong>Final Payment Amount</strong><br/>$<?php echo $finalPayment; ?></p></div>
                                    <div class="col-md-6"><p><strong>Date</strong><br/><?php echo $downDate; ?></p></div>
                                    <div class="col-md-6"><p><strong>Date</strong><br/><?php echo $finalDate; ?></p></div>                                    
                                </div>
                                <div class="col-md-12">
                                    <p><strong>Payment Notes</strong><br/><?php echo $paymentNotes; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>   

       <!--              <div class="panel panel-default">
                        <div class="panel-heading" style="background-color:brown!important;">
                            <h4>Office Use Only</h4>
                        </div>
                        
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <p><strong>NORF: </strong></p>
                                </div>
                                <div class="col-md-3">
                                    <p><strong>COL: </strong><?php echo $ticketCOL;  ?></p>
                                </div>
                                <div class="col-md-3">
                                    <p><strong>SUX: </strong><?php echo $ticketSUX; ?></p>
                                </div> 
                                <div class="col-md-3">
                                    <p><strong>PO#: </strong><?php echo $ticketPO;  ?></p>
                                </div>                                
                            </div>
                        </div>
                    </div>-->



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
                        </div>  
                    </div>               
 

<div class="col-lg-4" style="padding-left: 0;">
    
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color:lightblue!important;color:#000!important;">
                            <h4><span>Attachments</span></h4>
                        </div>
                        <div class="panel-body" style="padding:0px;">
                            <div class="col-md-12" style="padding:0px;">

                                            <div class="dataTable_wrapper">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>                                        <tr>
                                                            <th>Type</th>
                                                            <th>Date</th>
                                                        </tr></thead>
                                                        <?php 

                                                                $attachment_request = ("SELECT * FROM ticketAttachments WHERE ticketID = '".$_GET['ticketID']."'");
                                                                $attachment_result = mysql_query ($attachment_request,$db) or die ("Query failed: $attachment_request");
                                                                $attachment_total = mysql_num_rows($attachment_result);
                                                                if($attachment_total == 0) echo "<p>That attachment doesn't exist.</p>\n";
                                                                
                                                                while ($attachment_row = mysql_fetch_array($attachment_result)) { 
                                                                    extract($attachment_row);  
                                                                }              


                                                        ####################################
                                                        # Special Variable Characters
                                                        #
                                                        ####################################

                                                                $leadDate = date("m/j/Y",strtotime($leadDate)); if ($leadDate == '12/31/1969' || $leadDate == '11/30/-0001') {$leadDate = ''; }
                                                                $testDate = date("m/j/Y",strtotime($testDate)); if ($testDate == '12/31/1969' || $testDate == '11/30/-0001') {$testDate = ''; }
                                                                $renoTestDate = date("m/j/Y",strtotime($renoTestDate)); if ($renoTestDate == '12/31/1969' || $renoTestDate == '11/30/-0001') {$renoTestDate = ''; }
                                                                $measDate = date("m/j/Y",strtotime($measDate)); if ($measDate == '12/31/1969' || $measDate == '11/30/-0001') {$measDate = ''; }
                                                                $invoicDate = date("m/j/Y",strtotime($invoicDate)); if ($invoicDate == '12/31/1969' || $invoicDate == '11/30/-0001') {$invoicDate = ''; }

                                                        ####################################

                                                         ?>
                                                    <tbody>
                                                        <tr class="odd">
                                                            <td> <?php if (!empty($leadTestPDF)) { ?> <a href="/_storage/lead/<?php echo $leadTestPDF ?>" target="_blank">Lead Test</a> <? }else{echo "Lead Test";} ?> </td>
                                                            <td><?php echo $leadDate ?></td>
                                                        </tr>

                                                        <tr class="even">
                                                            <td> <?php if (!empty($testKitPDF)) { ?> <a href="/_storage/test-kit/<?php echo $testKitPDF ?>" target="_blank">Test Kit Form</a> <? }else{echo "Test Kit Form";} ?> </td>
                                                            <td><?php echo $testDate ?></td>
                                                        </tr>

                                                        <tr class="odd">
                                                            <td> <?php if (!empty($renoRecPDF)) { ?> <a href="/_storage/renovation/<?php echo $renoRecPDF ?>" target="_blank">Renovation Record Keeping</a> <? }else{echo "Renovation Record Keeping";} ?> </td>
                                                            <td><?php echo $renoTestDate ?></td>
                                                        </tr>

                                                        <tr class="even">
                                                            <td> <?php if (!empty($measSheetPDF)) { ?> <a href="/_storage/measure/<?php echo $measSheetPDF ?>" target="_blank">Measure Sheet</a> <? }else{echo "Measure Sheet";} ?> </td>
                                                            <td><?php echo $measDate ?></td>
                                                        </tr>

                                                        <tr class="odd">
                                                            <td> <?php if (!empty($invoiceSheetPDF)) { ?> <a href="/_storage/invoice/<?php echo $invoiceSheetPDF ?>" target="_blank">Invoice</a> <? }else{echo "Invoice";} ?> </td>
                                                            <td><?php echo $invoicDate ?></td>
                                                        </tr>                                                                                                                                                                                                                                
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                    
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a href="/tickets/attach_edit.php?attachID=<?php echo $attachID; ?>&ticketID=<?php echo $ticketID; ?>&custID=<?php echo $custID; ?>"><button type="submit" name="submit" class="btn btn-warning btn-default" value="Save Changes" >Edit</button></a>
                        </div>
                        <!-- /.panel-footer -->    
                    </div>         
</div>
<div class="col-lg-4">
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
                                                         ?>                                                      
                                                        <?php include $root.'/tickets/installers/_shared/table_index_loop.php'; ?>

                                                        <? } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->

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

                        </div>
                        <!-- /.panel-footer -->    
                    </div>            
</div>
<div class="col-lg-4" style="padding-right: 0;">                                       
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color:olive!important;">
                            <a href="/tickets/time/new.php?ticketID=<?php echo $ticketID; ?>&custID=<?php echo $custID; ?>"><button class="btn btn-success pull-right" type="button" >New</button></a>
                            <h4><span>Ticket Time</span></h4>
                        </div>
                        <div class="panel-body" style="padding:0px;">
                            <div class="col-md-12" style="padding:0px;">


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
                                            </div>
                                            <!-- /.table-responsive -->  

                                            <p><strong>Total Time: </strong>

                                               <?


                                                 $totalTime_request = ("SELECT SUM(timeTime) FROM ticketTimes WHERE ticketID = '$ticketID';");
                                                  $totalTime_result = mysql_query ($totalTime_request,$db) or die ("Query failed: $totalTime_request");
                                                  
                                                  while ($totalTime_row = mysql_fetch_array($totalTime_result)) { 
                                                    extract($totalTime_row);

$startMinutes = $totalTime_row['SUM(timeTime)'];

$startT = $currDate . " " . gmdate("H:i", ($startMinutes * 60));

echo $startT;

                                                   // tm($totalTime_row['SUM(timeTime)'],$lz);


                                                    //echo $totalTime_row['SUM(timeTime)'];
                                                  }
                                                ?> 


                                            </p>            
                            </div>
                        </div>
                        <div class="panel-footer">
                            &nbsp;
                        </div>
                        <!-- /.panel-footer -->    
                    </div>

                    </div>
                    <!-- /.panel -->
</div>


                </div>
                <!-- /.col-lg-12 -->

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

                        
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include $root.'/_shared/footer.php'; ?>

</body>

</html>
