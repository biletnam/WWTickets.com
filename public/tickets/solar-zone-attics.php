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
                    <h1 class="page-header">Tickets <span class="fa fa-angle-right"></span> Solor Zone &amp; Attics</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
 <?php $jobProduct = 'Solar Zone Attic'; ?>
            <?php include $root."/tickets/filter.php" ?>

                    <div class="heading">
                        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4><i class="fa fa-file-text fa-fw"></i>Tickets</h4>
                            </div>
                            <div class="panel-body" style="background-color:#fffeed;">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead><?php include $root.'/tickets/_shared/table_head_index_siren.php'; ?></thead>
                                        <tbody>
                                            <?php 

                                                $cust_request = ("SELECT * FROM customerTickets LEFT JOIN customerInfo ON customerTickets.ticketCustID=customerInfo.custID WHERE ticketStatus != 'Gift Sent' AND jobProduct = 'Solor Zone Attic' ORDER BY ticketID DESC");
                                                $cust_result = mysql_query ($cust_request,$db) or die ("Query failed: $cust_request");

                                                $ticketcount = 0;
                                                while ($cust_row = mysql_fetch_array($cust_result)) { 
                                                    extract($cust_row);
                                                    $ticketDate = date("m/j/Y",strtotime($ticketDate)); if ($ticketDate == '12/31/1969') {$ticketDate = ''; }
                                                    $showTicketID = sprintf('%05d',$ticketID);
                                                    include $root.'/tickets/_shared/table_index_loop_siren.php'; 

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