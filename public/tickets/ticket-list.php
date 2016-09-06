<?
	// Configure site
	$root = $_SERVER['DOCUMENT_ROOT']; 
	$private = str_replace("public","private",$root);
	include_once("$private/config.php");

// Verify login
include_once("$root/lc.php");

$term = $_GET['term'];
if (empty($term)) {$term == '%'; }

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
                    <h1 class="page-header">Tickets</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                            <div class="panel-heading" style="background-color:#333!important;">
                                <h4><i class="fa fa-file-text fa-fw"></i>Filter Tickets</h4>
                            </div>                    
                        <div style="overflow:auto;padding-top:10px;padding-bottom:20px;">
                            <form id="searchfilter" method="get" action="ticket-filter-results.php">
                               <div class="col-lg-2">
                                    <label>Store Location</label>
                                    <select class="form-control" name="ticketLocation" >
                                        <option value="">All Locations</option>
                                        <option value="Norfolk"<? if($ticketLocation== 'Norfolk') echo ' selected="selected"'; ?>>Norfolk</option>
                                        <option value="Columbus"<? if($ticketLocation== 'Columbus') echo ' selected="selected"'; ?>>Columbus</option>
                                        <option value="Sioux City"<? if($ticketLocation== 'Sioux City') echo ' selected="selected"'; ?>>Sioux City</option>

                                    </select>                                
                                </div>
                                <div class="col-lg-2">
                                    <label>Job Type</label>
                                    <select class="form-control" name="jobType" >
                                        <option value="">All Types</option>
                                        <option value="Windows"<? if($jobProduct == 'Windows') echo ' selected="selected"'; ?>>Windows</option>
                                        <option value="Siding"<? if($jobProduct == 'Siding') echo ' selected="selected"'; ?>>Siding</option>
                                        <option value="Doors"<? if($jobProduct == 'Doors') echo ' selected="selected"'; ?>>Doors</option>
                                        <option value="Window &amp; Door Repair"<? if($jobProduct == 'Window &amp; Door Repair') echo ' selected="selected"'; ?>>Window &amp; Door Repair</option>
                                        <option value="Siding Repair"<? if($jobProduct == 'Siding Repair') echo ' selected="selected"'; ?>>Siding Repair</option>
                                        <option value="Solar Zone Attic"<? if($jobProduct == 'Solar Zone Attic') echo ' selected="selected"'; ?>>Solar Zone & Attic</option>
                                    </select>                                
                                </div>                            
                                <div class="col-lg-2">
                                    <label>Ticket Status</label>
                                    <select class="form-control" name="ticketStatus" >
                                                <option value=""<? if($ticketStatus == '') echo ' selected="selected"'; ?>>All Statuses</option>
                                                <option value="Rejected"<? if($ticketStatus == 'Rejected') echo ' selected="selected"'; ?>>Rejected</option>
                                                <option value="Unscheduled"<? if($ticketStatus == 'Unscheduled') echo ' selected="selected"'; ?>>Unscheduled Estimate</option>
                                                <option value="Need Estimate"<? if($ticketStatus == 'Need Estimate') echo ' selected="selected"'; ?>>Need Estimate</option>
                                                <option value="Scheduled"<? if($ticketStatus == 'Scheduled') echo ' selected="selected"'; ?>>Scheduled Estimate</option>
                                                <option value="Proposal Given"<? if($ticketStatus == 'Proposal Given') echo ' selected="selected"'; ?>>Proposal Given</option>
                                                <option value="Sold"<? if($ticketStatus == 'Sold') echo ' selected="selected"'; ?>>Sold</option>
                                                <option value="Needs Measured"<? if($ticketStatus == 'Needs Measured') echo ' selected="selected"'; ?>>Needs Measured</option>
                                                <option value="Ordered"<? if($ticketStatus == 'Ordered') echo ' selected="selected"'; ?>>Ordered</option>
                                                <option value="Received"<? if($ticketStatus == 'Received') echo ' selected="selected"'; ?>>Received</option>
                                                <option value="Went To Columbus"<? if($ticketStatus == 'Went To Columbus') echo ' selected="selected"'; ?>>Went To Columbus</option>
                                                <option value="Ready to Install"<? if($ticketStatus == 'Ready to Install') echo ' selected="selected"'; ?>>Ready to Install</option>
                                                <option value="Installed"<? if($ticketStatus == 'Installed') echo ' selected="selected"'; ?>>Installed</option>
                                                <option value="Pending Wrap"<? if($ticketStatus == 'Pending Wrap') echo ' selected="selected"'; ?>>Pending Wrap</option>
                                                <option value="Incomplete"<? if($ticketStatus == 'Incomplete') echo ' selected="selected"'; ?>>Incomplete</option>
                                                <option value="Complete"<? if($ticketStatus == 'Complete') echo ' selected="selected"'; ?>>Complete</option>
                                                <option value="Invoiced"<? if($ticketStatus == 'Invoiced') echo ' selected="selected"'; ?>>Invoiced</option>
                                                <option value="Paid"<? if($ticketStatus == 'Paid') echo ' selected="selected"'; ?>>Paid</option>
                                                <option value="Gift Sent"<? if($ticketStatus == 'Gift Sent') echo ' selected="selected"'; ?>>Gift Sent</option>
                                      ?>
                                    </select>
                              
                                </div>
                                <div class="col-lg-2">
                                    <label>Ticket City</label>
                                    <select class="form-control" name="ticketCity" >
                                        <option value="">All Cities</option>

                                        <?php 

                                        $citySearch = $ticketCity;
                                            $post_request = ("SELECT ticketCity FROM customerTickets GROUP BY ticketCity DESC ORDER BY ticketCity ASC");
                                            $post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
                                            
                                            while ($post_row = mysql_fetch_array($post_result)) { 
                                                extract($post_row);
                                                $ticketSearchCity = $post_row['ticketCity'];?>
                                                    <option value="<?php echo $ticketCity ?>"<? if($ticketCity == $citySearch) echo ' selected="selected"'; ?>><?php echo $ticketCity; ?></option>
                                            <? } ?>
                                    </select>
                                </div>     
                                <div class="col-lg-2">
                                    <label>Ticket Assigned</label>
                                    <select class="form-control" name="ticketAssign" >
                                        <option value="">All Installers</option>
                                        
                                        <?
                                            $emp_request = ("SELECT ID,firstName,lastname from cmsUsers ORDER BY firstName ASC");
                                            $emp_result = mysql_query ($emp_request,$db) or die ("Query failed: $emp_request");
                                            
                                            while ($emp_row = mysql_fetch_array($emp_result)) { 
                                                extract($emp_row);
                                                $empName = $firstName;
                                                if ($empName == 'Power') {}
                                                else{
                                                echo '<option value="'.$empName.'"'.($empName == $ticketAssign ? ' selected="selected"' : '').'>'.$empName.'</option>'."\r";
                                                }
                                            }
                                        ?>

                                    </select>
                                </div>  
                                         <div class="col-md-2">
                                            <label for="">&nbsp;</label>
                                            <br/>
                                            <button class="btn btn-primary" type="submit"><i class="fa  fa-search fa-fw"></i> </button>
                                        </div>                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>

                    <div class="heading">
                        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4><i class="fa fa-file-text fa-fw"></i>Tickets</h4>
                            </div>
                            <div class="panel-body" style="background-color:#fffeed;">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead><?php include $root.'/tickets/_shared/table_head_index.php'; ?></thead>
                                        <tbody>
                                            <?php 

                                                $cust_request = ("SELECT * FROM customerInfo LEFT JOIN customerTickets ON customerInfo.custID = customerTickets.ticketCustID WHERE custFName LIKE '{$term}%' OR custLName LIKE '{$term}%' ORDER BY ticketID DESC");
                                                $cust_result = mysql_query ($cust_request,$db) or die ("Query failed: $cust_request");

                                                $ticketcount = 0;
                                                while ($cust_row = mysql_fetch_array($cust_result)) { 
                                                    extract($cust_row);
                                                    $ticketDate = date("m/j/Y",strtotime($ticketDate)); if ($ticketDate == '12/31/1969') {$ticketDate = ''; }
                                                    $showTicketID = sprintf('%05d',$ticketID);
                                                    include $root.'/tickets/_shared/table_index_loop.php'; 
                                             } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                        </p>
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