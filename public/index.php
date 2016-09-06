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
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row" id="dashboard-icons">
  				<?php include $root.'/_modules/homepage-icons.php'; ?>
            </div>

            <div class="row" id="customer-task">
                <!-- Customer Task - Processing -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><i class="fa fa-file-text fa-fw"></i> Customer Task - Processing</h4>
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th style="width:20px;">Red Flag</th>
                                        <th style="width:60px;">Name</th>
                                        <th style="width:100px;">Notes</th>
                                        <th style="width:70px;">Status</th>
                                        <th style="width:15px;">Date</th>
                                    </tr>

                                        <?php //include $root.'/filters/_shared/location_head_index.php'; ?>
                                    </thead>
                                    <tbody>
                                        <!-- Customer Task Processing -->
                                    <?php

                                        $cust_request = ("SELECT * FROM customerInfo LEFT JOIN ticketTask ON customerInfo.custID = ticketTask.taskCust WHERE ticketTask.taskEmp = '$firstName' AND ticketTask.taskStatus = 'Processing' ORDER BY ticketTask.taskDate DESC");
                                        $cust_result = mysql_query ($cust_request,$db) or die ("Query failed: $cust_request");

                                        $ticketcount = 0;
                                        while ($cust_row = mysql_fetch_array($cust_result)) { 
                                            extract($cust_row);
                                            $ticketDate = date("m/j/Y",strtotime($ticketDate)); if ($ticketDate == '12/31/1969') {$ticketDate = ''; }
                                            $completeBy = date("m/j/Y",strtotime($taskDate)); if ($completeBy == '12/31/1969') {$completeBy = ''; }if ($completeBy == '11/30/-0001') {$completeBy = ''; }

                                            ?>


                                            <tr class="odd">
                                                <td>
                                                    <?php if ($ticketRedFlag == 'Yes') {?> <img src="/_images/redflag.gif" alt=""><? } else{echo '&nbsp;';} ?>
                                                </td>
                                                <td><a href="/customers/cust_view.php?ID=<?php echo $custID; ?>"><?php echo $custFName; ?> <?php echo $custLName; ?></td>
                                                <td><?php echo $taskNotes; ?></td>
                                                <td>
                                                    <form id="myTask<?php echo $taskID; ?>" method="POST" action="/customers/form/updt-task.php" style="width:20px;">
                                                        <input type="hidden" name="taskID" value="<?php echo $taskID; ?>">    
                                                            <select class="form-control" name="taskStatus" id="taskDropdown<?php echo $taskID; ?>">
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
                                                </td>
                                                <td><?php echo $completeBy; ?></td>

                                            </tr>


                                            <?php // include $root.'/filters/_shared/location_data_loop.php'; ?>

                                        <? }
                                        
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
                <!-- Person To-Do List -->
                <div class="col-md-12" id="personal-task">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><i class="fa fa-file-text fa-fw"></i> <?php echo $firstName; ?> <?php echo $lastName ?> - Personal To-Do List </h4>
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Notes</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <!-- To-Do List -->
                                    <tbody>
                                    <?php 
                                        $cust_request = ("SELECT * FROM listToDo WHERE listAssign = '$firstName' AND listStatus != 'Complete'");
                                        $cust_result = mysql_query ($cust_request,$db) or die ("Query failed: $cust_request");

                                        $ticketcount = 0;
                                        while ($cust_row = mysql_fetch_array($cust_result)) { 
                                            extract($cust_row);
                                            $listDate = date("m/j/Y",strtotime($listDate)); if ($listDate == '12/31/1969') {$listDate = ''; }if ($listDate == '11/30/-0001') {$listDate = ''; }

                                            ?>
                                            <tr class="odd">
                                                <td><a href="/to-do-list/edit.php?listID=<?php echo $listID; ?>"><?php echo $listTitle; ?></td>
                                                <td><?php echo $listDetails; ?></td>
                                                <td><?php echo $listStatus; ?></td>
                                                <td><?php echo $listDate; ?></td>

                                            </tr>

                                            <?php // include $root.'/filters/_shared/location_data_loop.php'; ?>

                                        <? }
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


            <div class="row">
                <div class="col-lg-12">
<!--                     <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><i class="fa fa-group fa-fw"></i> Latest New Customers</h4>
                            <a href="/customers/cust_new.php"><button class="btn btn-success pull-right" type="button" style="margin-top:-30px;">New Customer</button></a>
                        </div>
						<div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead><?php include $root.'/customers/_shared/table_head.php'; ?></thead>
                                    <tbody>
										<?php 

											$cust_request = ("SELECT * FROM customerInfo ORDER BY custID DESC LIMIT 0,5");
											$cust_result = mysql_query ($cust_request,$db) or die ("Query failed: $cust_request");
											
											$ticketcount = 0;
											while ($cust_row = mysql_fetch_array($cust_result)) { 
												extract($cust_row);
												include $root.'/customers/_shared/table_data_loop.php'; 
										 } ?>
                                    </tbody>
                                </table>
                            </div>
                            /.table-responsive
                        </div>
                         /.panel-body
                    </div>
                    /.panel --> 

                <?php 

                    switch ($firstName) {
                        case 'Brent ': $listArray = array('Needs Measured','Incomplete','Pending Wrap');break;
                        case 'Mark ': $firstName='Brent ';$listArray = array('Needs Measured','Incomplete','Pending Wrap');break;
                        case 'Angi': $listArray = array('Paid');break;
                        case 'Karla ': $listArray = array();break;
                        case 'Jolene': $listArray = array('Unscheduled','Ordered');break;
                        case 'Jeff ': $listArray = array('Proposal Given','Sold','Scheduled','Went To Columbus');break;
                        default: $listArray = array();break;
                    }

                    if ($firstName == 'Mark ') {$firstName = 'Brent '; }

                ?>


                <?php ################################################## ?>

                <?php if ($firstName == 'Angi') { ?>
                <!--Angi List -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><i class="fa fa-file-text fa-fw"></i>"Need to Order" Tickets</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead> <?php include $root.'/tickets/_shared/table_head.php'; ?></thead>
                                    <tbody>
                                        <?php 

                                            $cust_request = ("SELECT * FROM customerTickets WHERE ticketStatus = 'Need to Order' AND ticketAssign = 'Angi' and jobProduct='Window Door Repair' ORDER BY ticketID");
                                            $cust_result = mysql_query ($cust_request,$db) or die ("Query failed: $cust_request");

                                            $ticketcount = 0;
                                           
                                            while ($cust_row = mysql_fetch_array($cust_result)) { 
                                                extract($cust_row);
                                                $showTicketID = sprintf('%05d',$ticketID);
                                                $ticketDate = date("m/j/Y",strtotime($ticketDate)); if ($ticketDate == '12/31/1969') {$ticketDate = ''; }
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
                <? } ?>


                <?php foreach ($listArray as $array): ?>
                <!-- For assigned tickets -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><i class="fa fa-file-text fa-fw"></i>"<?php echo $array ?>" Tickets</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead> <?php include $root.'/tickets/_shared/table_head.php'; ?></thead>
                                    <tbody>
                                        <?php 

                                            $cust_request = ("SELECT * FROM customerTickets WHERE ticketStatus = '$array' AND ticketAssign = '$firstName' AND (jobProduct != 'Window Door Repair' AND ticketStatus != 'Complete') ORDER BY ticketID");
                                            $cust_result = mysql_query ($cust_request,$db) or die ("Query failed: $cust_request");

                                            $ticketcount = 0;
                                           

                                            while ($cust_row = mysql_fetch_array($cust_result)) { 
                                                extract($cust_row);
                                                $showTicketID = sprintf('%05d',$ticketID);
                                                $ticketDate = date("m/j/Y",strtotime($ticketDate)); if ($ticketDate == '12/31/1969') {$ticketDate = ''; }
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
                <?php endforeach ?>

                <?php ################################################## ?>

                <?php if ($firstName == 'Karla ') { ?>
                    <!-- Assigned Karla Need to Order Tickets -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><i class="fa fa-file-text fa-fw"></i>"Need to Order" Tickets</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead> <?php include $root.'/tickets/_shared/table_head.php'; ?></thead>
                                    <tbody>
                                        <?php 

                                            $cust_request = ("SELECT * FROM customerTickets WHERE ticketStatus = 'Need to Order' AND ticketAssign = 'Karla ' and jobProduct='Windows' ORDER BY ticketID");
                                            $cust_result = mysql_query ($cust_request,$db) or die ("Query failed: $cust_request");

                                            $ticketcount = 0;
                                           

                                            while ($cust_row = mysql_fetch_array($cust_result)) { 
                                                extract($cust_row);
                                                $showTicketID = sprintf('%05d',$ticketID);
                                                $ticketDate = date("m/j/Y",strtotime($ticketDate)); if ($ticketDate == '12/31/1969') {$ticketDate = ''; }
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

                    <!-- Assigned Karla Complete Tickets -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><i class="fa fa-file-text fa-fw"></i>"Complete" Tickets</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead> <?php include $root.'/tickets/_shared/table_head.php'; ?></thead>
                                    <tbody>
                                        <?php 

                                            $cust_request = ("SELECT * FROM customerTickets WHERE ticketStatus = 'Complete' AND ticketAssign = 'Karla ' AND ticketInvoiced != '1' AND (jobProduct != 'Window Door Repair') ORDER BY ticketID");
                                            $cust_result = mysql_query ($cust_request,$db) or die ("Query failed: $cust_request");

                                            $ticketcount = 0;
                                           
                                            while ($cust_row = mysql_fetch_array($cust_result)) { 
                                                extract($cust_row);
                                                $showTicketID = sprintf('%05d',$ticketID);
                                                $ticketDate = date("m/j/Y",strtotime($ticketDate)); if ($ticketDate == '12/31/1969') {$ticketDate = ''; }
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

                    <!-- Assigned Karla Invoiced Tickets -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><i class="fa fa-file-text fa-fw"></i>"Invoiced" Tickets</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead> <?php include $root.'/tickets/_shared/table_head.php'; ?></thead>
                                    <tbody>
                                        <?php 

                                            $cust_request = ("SELECT * FROM customerTickets WHERE ticketInvoiced = '1' AND ticketStatus = 'Complete' AND (jobProduct != 'Window Door Repair') ORDER BY ticketID");
                                            $cust_result = mysql_query ($cust_request,$db) or die ("Query failed: $cust_request");

                                            $ticketcount = 0;
                                           
                                            while ($cust_row = mysql_fetch_array($cust_result)) { 
                                                extract($cust_row);
                                                $showTicketID = sprintf('%05d',$ticketID);
                                                $ticketDate = date("m/j/Y",strtotime($ticketDate)); if ($ticketDate == '12/31/1969') {$ticketDate = ''; }

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

                <!-- if it is paid and invoiced dont show on your screen and assign to angi -->

                <? } ?>


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
