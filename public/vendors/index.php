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
                    <h1 class="page-header">Vendors</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><i class="fa fa-share-alt fa-fw"></i>Vendors</h4>
                            <a href="/vendors/vend_new.php"><button class="btn btn-success pull-right" type="button" style="margin-top:-30px;">New Vendor</button></a>
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead><?php include $root.'/vendors/_shared/table_head.php'; ?></thead>
                                    <tbody>
                                        <?php 

                                            $cust_request = ("SELECT * FROM Vendors ORDER BY vendorName ASC");
                                            $cust_result = mysql_query ($cust_request,$db) or die ("Query failed: $cust_request");
                                            
                                            $ticketcount = 0;
                                            while ($cust_row = mysql_fetch_array($cust_result)) { 
                                                extract($cust_row);
                                                include $root.'/vendors/_shared/table_data_loop.php'; 
                                         } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->  
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Contracts</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><i class="fa fa-copy fa-fw"></i>Contracts</h4>
                </div>
                <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                        <tr>
                                            <th>Contract</th>
                                            <th>Location</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Renewal Date</th>
                                            <th>Price</th>
                                        </tr>                                    
                                </thead>
                                <tbody>
                                    <?php 
                                        $vendor_request = ("SELECT * FROM VendorAds");
                                        $vendor_result = mysql_query ($vendor_request,$db) or die ("Query failed: $vendor_request");
                                        $vendor_total = mysql_num_rows($vendor_result);
                                        if($vendor_total == 0) echo "<p>No ticket exist.</p>\n";
                                        
                                        $ticketcount = 0;
                                        while ($vendor_row = mysql_fetch_array($vendor_result)) { 
                                            extract($vendor_row);
                                            $adstartContract = date("m/j/Y",strtotime($adstartContract)); if ($adstartContract == '12/31/1969') {$adstartContract = ''; }
                                            $adendContract = date("m/j/Y",strtotime($adendContract)); if ($adendContract == '12/31/1969') {$adendContract = ''; }
                                            $adRenewal = date("m/j/Y",strtotime($adRenewal)); if ($adRenewal == '12/31/1969') {$adRenewal = ''; }
                                           $ticketcount = ($ticketcount == '0') ? 'odd' : 'even'; ?>

                                            <tr class="<?php echo $ticketcount; ?>">
                                                <td><a href="/vendors/ad-view.php?adID=<?php echo $adID; ?>&vendorID=<?php echo $adVendorID; ?>"><?php echo $adName; ?></a></td>
                                                <td><?php echo $adLocation; ?></td>
                                                <td><?php echo $adstartContract; ?></td>
                                                <td><?php echo $adendContract; ?></td>
                                                <td><?php echo $adRenewal; ?></td>
                                                <td>$<?php echo $adPrice; ?></td>
                                            </tr>

                                            <?php $ticketcount = ($ticketcount == '1') ? '0' : '1';
                                        } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->                                
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->          
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

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
