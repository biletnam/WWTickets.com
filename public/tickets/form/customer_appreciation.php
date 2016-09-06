<?
	// Configure site
	$root = $_SERVER['DOCUMENT_ROOT']; 
	$private = str_replace("public","private",$root);
	include_once("$private/config.php");

// Verify login
include_once("$root/lc.php");

	
        $ticket_request = ("SELECT * FROM customerTickets WHERE ticketCustID= '".$_GET['custID']."' AND ticketID = '".$_GET['ticketID']."'");
        $ticket_result = mysql_query ($ticket_request,$db) or die ("Query failed: $ticket_request");
        $ticket_total = mysql_num_rows($ticket_result);
        if($ticket_total == 0) echo "<p>That ticket doesn't exist.</p>\n";
        
        while ($ticket_row = mysql_fetch_array($ticket_result)) { 
            extract($ticket_row);  
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
                    <h1 class="page-header">Customer Appreciation</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><span>Customer Appreciation Details</span></h4>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="/tickets/form/app-mod.php">
                            	<input type="hidden" name="type" value="edit" />
								<?php include $root.'/tickets/form/app-fields.php'; ?>
                            </form>
                        </div>
                        <!-- /.panel-body -->
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
