<?
	// Configure site
	$root = $_SERVER['DOCUMENT_ROOT']; 
	$private = str_replace("public","private",$root);
	include_once("$private/config.php");

// Verify login
include_once("$root/lc.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);
	
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
        }


####################################
# Special Variable Characters
#
####################################

        $ticketDate = date("m/j/Y",strtotime($ticketDate)); if ($ticketDate == '0000-00-00') {$ticketDate = ''; }

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

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><span>Ticket Details</span></h4>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12" style="border-bottom:2px solid #ddd;padding-bottom:15px;">
                                <div class="col-md-3">
                                    <h4>Status: <span><?php echo $ticketStatus; ?></span></h4>
                                        <p>
                                            <strong>PO # </strong><?php if (!empty($ticketPO)) {echo $ticketPO; } ?><br/>
                                            <strong>Job Type: </strong><?php if (!empty($ticketType)) {echo $ticketType; } ?><br/>
                                            <strong>Financing Available: </strong><?php if (!empty($ticketFinance)) { echo $ticketFinance;} ?><br>
                                        </p>
                                </div>                                                    
                                <div class="col-md-5" style="border-left:2px solid #ddd;">
                                    <h4><span>House Details</span></h4>
                                    <p>
                                        <strong>Year of Home: </strong><?php echo $homeYear ?><br>
                                        <strong>Lead Test: </strong> <?php echo $leadTest ?> (<?php echo $leadTestEmp; ?> ~ <?php echo $leadTestEmpDate ?>)<br/>
                                        <strong>Pamphlet Filled: </strong> <?php echo $pamfill ?> (<?php echo $pamEmpfill ?> ~ <?php echo $pamDate ?>)<br/>
                                        <strong>Test Kit Form: </strong> <?php echo $testKit ?> (<?php echo $testKitEmp; ?> ~ <?php echo $testDate ?>)<br/>
                                        <strong>Renovation Record Keeping: </strong> <?php echo $reno; ?> (<?php echo $renoEmp; ?> ~ <?php echo $renoDate ?>)<br/>
                                    </p>
                                </div>
                                <div class="col-md-4" style="border-left:2px solid #ddd;">
                                    <h4><span>Wraps - <?php echo $wrap ?></span></h4>
                                    <p>
                                        <strong>Completed: </strong><?php if (!empty($wrapStatus)) {echo $wrapStatus; } ?><br/>
                                        <strong>Color: </strong><?php if (!empty($wrapColor)) {echo $wrapColor; } ?><br/>
                                        <strong>Ladder Needed: </strong><?php if (!empty($jobLadder)) {echo $jobLadder; } ?><br/>
                                        <strong>Wrap Details: </strong><?php echo $wrapDetails; ?><br/>
                                    </p>
                                </div>  
                            </div>
                            <div class="col-md-12" style="margin-top:15px;">
                                <div class="col-md-8" style="border-right:2px solid #ddd;">
                                        <h4><span>Details</span></h4>
                                        <div class="col-md-5" style="margin-left:-15px;">
                                            <p>
                                                <strong>Order Date: </strong><?php if (!empty($ticketDate)) { echo $ticketDate;} ?><br>
                                                <strong>COL: </strong><?php if (!empty($ticketCOL)) {echo $ticketCOL; } ?><br/>
                                                <strong>NORF: </strong><?php if (!empty($ticketNORF)) {echo $ticketNORF; } ?><br/>
                                                <strong># MI: </strong><?php if (!empty($ticketMI)) {echo $ticketMI; } ?><br/>
                                                <strong>WTC: </strong><?php if (!empty($ticketWTC)) {echo $ticketWTC; } ?><br/>
                                                <strong>Install/P&amp;B: </strong><?php if (!empty($ticketWTC)) {echo $ticketWTC; } ?><br/>
                                            </p>
                                        </div>
                                        <div class="col-md-5" style="margin-left:-15px;margin-right:15px;">
                                            <p>
                                                <strong>MI Order: </strong><?php if (!empty($ticketMIOrder)) {echo $ticketMIOrder; } ?><br/>
                                                <strong># AMI: </strong><?php if (!empty($ticketAMI)) {echo $ticketAMI; } ?><br/>
                                                <strong>AMI FO#: </strong><?php if (!empty($ticketAMI)) {echo $ticketAMIFO; } ?><br/>
                                                <strong>Repairs: </strong><?php if (!empty($ticketAMI)) {echo $ticketAMIFO; } ?><br/>
                                                <strong>Wraps: </strong><?php if (!empty($ticketAMI)) {echo $ticketAMIFO; } ?><br/>
                                                <strong>Order Date: </strong><?php if (!empty($ticketDate)) { echo $ticketDate;} ?><br>
                                            </p>
                                        </div>
                                </div>                     
                                 <div class="col-md-4">
                                    <h4><span>Payment Received</span></h4>
                                     <p><img src="/_images/invoice-paid.png" alt="" style="margin-bottom:10px;"><br/>
                                     <strong>Paid: </strong><?php echo $paidDate; ?><br/>
                                     <strong>Got Check? </strong><?php echo $checkStatus; ?></p>
                                 </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a href="/customers/cust_edit.php?ID=<?php echo $custID; ?>"><button type="submit" name="submit" class="btn btn-primary btn-default" value="Save Changes" >Edit</button></a>
                        </div>
                        <!-- /.panel-footer -->    
                    </div>                

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><span>Attachments</span></h4>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                        <div class="col-md-5" style="margin-left:-15px;">
                                            <p>
                                                <strong>Type: </strong><span class="pull-right">05/28/2015</span><br>
                                                <strong>Lead Test: </strong><span class="pull-right">05/28/2015</span><br>
                                                <strong>Test Kit From: </strong><span class="pull-right">05/28/2015</span><br>
                                                <strong>Renovation Record Keeping: </strong><span class="pull-right">05/28/2015</span><br>
                                                <strong>Measure Sheet: </strong><span class="pull-right">05/28/2015</span><br>
                                                <strong>Invoice: </strong><span class="pull-right">05/28/2015</span><br>
                                            </p>
                                        </div>
                                        <div class="col-md-7">&nbsp;</div>

                                </div>                     
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a href="/customers/cust_edit.php?ID=<?php echo $custID; ?>"><button type="submit" name="submit" class="btn btn-primary btn-default" value="Save Changes" >Update</button></a>
                        </div>
                        <!-- /.panel-footer -->    
                    </div>         
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><span>Installers</span></h4>
                        </div>
                        <div class="panel-body">                        
                            <div class="col-md-12">
                                <div class="col-md-12">
                                        <div class="col-md-12" style="margin-left:-15px;">

                                            <div class="dataTable_wrapper">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>                                        <tr>
                                                            <th>Mark</th>
                                                            <th>Joe</th>
                                                            <th>Dwayne</th>
                                                            <th>Jon</th>
                                                            <th>CBUS</th>
                                                            <th>DIY</th>
                                                        </tr></thead>
                                                    <tbody>
                                                        <tr class="odd">
                                                            <td><a href="/customers/cust_view.php?ID=2">Scott DeBoer</a></td>
                                                            <td>403 South </td>
                                                            <td>Norfolk, Nebaska</td>
                                                            <td class="center">(402) 911-9111</td>
                                                            <td class="center"><a href="mailto:PrairieHills@SouthBay.com">PrairieHills@SouthBay.com</a></td>
                                                            <td class="center">1</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>
                                </div>                     
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a href="/customers/cust_edit.php?ID=<?php echo $custID; ?>"><button type="submit" name="submit" class="btn btn-primary btn-default" value="Save Changes" >Edit</button></a>
                        </div>
                        <!-- /.panel-footer -->    
                    </div>                               
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><span>Ticket Time</span></h4>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                        <div class="col-md-12" style="margin-left:-15px;">

                                            <div class="dataTable_wrapper">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>                                        <tr>
                                                            <th>Date</th>
                                                            <th>Job Duty</th>
                                                            <th>Time Amount</th>
                                                            <th>Employee</th>
                                                        </tr></thead>
                                                    <tbody>
                                                        <tr class="odd">
                                                            <td><a href="/customers/cust_view.php?ID=2">Scott DeBoer</a></td>
                                                            <td>403 South </td>
                                                            <td>Norfolk, Nebaska</td>
                                                            <td class="center">(402) 911-9111</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>
                                </div>                     
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a href="/customers/cust_edit.php?ID=<?php echo $custID; ?>"><button type="submit" name="submit" class="btn btn-primary btn-default" value="Save Changes" >Edit</button></a>
                        </div>
                        <!-- /.panel-footer -->    
                    </div>

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

</body>

</html>
