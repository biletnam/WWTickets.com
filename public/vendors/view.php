<?
	// Configure site
	$root = $_SERVER['DOCUMENT_ROOT']; 
	$private = str_replace("public","private",$root);
	include_once("$private/config.php");

// Verify login
include_once("$root/lc.php");

	
		$vendor_request = ("SELECT * FROM Vendors WHERE vendorID= '".$_GET['vendorID']."'");
		$vendor_result = mysql_query ($vendor_request,$db) or die ("Query failed: $vendor_request");
		$vendor_total = mysql_num_rows($vendor_result);
		if($vendor_total == 0) echo "<p>That Product doesn't exist.</p>\n";
		
		while ($vendor_row = mysql_fetch_array($vendor_result)) { 
			extract($vendor_row);		
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
                    <p>&nbsp;</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <?php include $root.'/vendors/_shared/vendor-profile.php'; ?>
                    </div>
                    <!-- /.panel -->

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Contracts</h4>
                            <a href="/vendors/ad_new.php?vendorID=<?php echo $vendorID; ?>"><button class="btn btn-success pull-right" type="button" style="margin-top:-30px;">New Contract</button></a>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead><?php include $root.'/vendors/_shared/vendor_head.php'; ?></thead>
                                        <tbody>
                                            <?php 
                                                $vendor_request = ("SELECT * FROM VendorAds WHERE adVendorID= '".$_GET['vendorID']."'");
                                                $vendor_result = mysql_query ($vendor_request,$db) or die ("Query failed: $vendor_request");
                                                $vendor_total = mysql_num_rows($vendor_result);
                                                if($vendor_total == 0) echo "<p>No ad exist.</p>\n";
                                                
                                                $ticketcount = 0;
                                                while ($vendor_row = mysql_fetch_array($vendor_result)) { 
                                                    extract($vendor_row);
                                                    $adContract = date("m/j/Y",strtotime($adContract)); if ($adContract == '12/31/1969') {$adContract = ''; }
                                                    $adstartRenewal = date("m/j/Y",strtotime($adstartRenewal)); if ($adstartRenewal == '12/31/1969') {$adstartRenewal = ''; }
                                                    $adendRenewal = date("m/j/Y",strtotime($adendRenewal)); if ($adendRenewal == '12/31/1969') {$adendRenewal = ''; }
                                                    include $root.'/vendors/_shared/vendor_list_loop.php';
                                                } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->                                
                            </div>

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
