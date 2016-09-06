<?
	// Configure site
	$root = $_SERVER['DOCUMENT_ROOT']; 
	$private = str_replace("public","private",$root);
	include_once("$private/config.php");

// Verify login
include_once("$root/lc.php");

$taskEmp = $_GET['taskEmp'];

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
                    <h1 class="page-header">"<?php echo $taskEmp; ?>" Task Status</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-file-text fa-fw"></i>Task
                            </div>
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>Name</th>
                                            <th>Notes</th>
                                            <th>Status</th>
                                            <th>Due Date</th>
                                        </tr>

                                            <?php //include $root.'/filters/_shared/location_head_index.php'; ?>
                                        </thead>
                                        <tbody>
                                        <?php 

                                            $pri_request = ("SELECT * FROM customerInfo");
                                            $pri_result = mysql_query ($pri_request,$db) or die ("Query failed: $pri_request");
                                            
                                            while ($pri_row = mysql_fetch_array($pri_result)) { 
                                                extract($pri_row);        

                                                $cust_request = ("SELECT * FROM customerTickets LEFT JOIN ticketTask ON customerTickets.ticketID = ticketTask.taskticketID WHERE customerTickets.ticketCustID = '$custID' AND ticketTask.taskEmp = '$firstName' AND ticketTask.taskStatus = 'Processing' ORDER BY customerTickets.ticketID DESC");
                                                $cust_result = mysql_query ($cust_request,$db) or die ("Query failed: $cust_request");

                                                $ticketcount = 0;
                                                while ($cust_row = mysql_fetch_array($cust_result)) { 
                                                    extract($cust_row);
                                                    $ticketDate = date("m/j/Y",strtotime($ticketDate)); if ($ticketDate == '12/31/1969') {$ticketDate = ''; } 
                                                    $completeBy = date("m/j/Y",strtotime($completeBy)); if ($completeBy == '12/31/1969') {$completeBy = ''; }if ($completeBy == '11/30/-0001') {$completeBy = ''; } ?>


                                                    <tr class="odd">
                                                        <td>
                                                            <?php if ($ticketRedFlag == 'Yes') {?> <img src="/_images/redflag.gif" alt=""><? } else{echo '&nbsp;';} ?>
                                                        </td>
                                                        <td><a href="/tickets/ticket_view.php?ticketID=<?php echo $ticketID; ?>&custID=<?php echo $custID; ?>"><?php echo $custFName; ?> <?php echo $custLName; ?></td>
                                                        <td><?php echo $taskNotes; ?></td>
                                                        <td><?php echo $taskStatus; ?></td>
                                                        <td><?php echo $completeBy; ?></td>

                                                    </tr>


                                                <?php // include $root.'/filters/_shared/location_data_loop.php'; ?>

                                            <? }
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include $root.'/_shared/footer.php'; ?>

</body>

</html>
