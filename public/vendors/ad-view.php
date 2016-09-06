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
		if($vendor_total == 0) echo "<p>That vendor doesn't exist.</p>\n";
		
		while ($vendor_row = mysql_fetch_array($vendor_result)) { 
			extract($vendor_row);		
		}

        $ad_request = ("SELECT * FROM VendorAds WHERE adID= '".$_GET['adID']."'");
        $ad_result = mysql_query ($ad_request,$db) or die ("Query failed: $ad_request");
        $ad_total = mysql_num_rows($ad_result);
        if($ad_total == 0) echo "<p>That ad doesn't exist.</p>\n";
        
        while ($ad_row = mysql_fetch_array($ad_result)) { 
            extract($ad_row);
            $adstartContract = date("m/j/Y",strtotime($adstartContract)); if ($adstartContract == '12/31/1969') {$adstartContract = ''; }
            $adendContract = date("m/j/Y",strtotime($adendContract)); if ($adendContract == '12/31/1969') {$adendContract = ''; }
            $adRenewal = date("m/j/Y",strtotime($adRenewal)); if ($adRenewal == '12/31/1969') {$adRenewal = ''; }
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
                            <h4><span> Contract Details </span></h4>
                        </div>
                        <div class="panel-body">
                          <div class="col-md-12">
                                <h1><?php echo $adName; ?></h1>
                            </div>
                            <div class="col-md-6">
                                    <?php echo "<strong>Location: </strong>".$adLocation; ?><br/>
                                    <?php echo "<strong>Price: </strong>$".$adPrice; ?><br/>
                                    <?php echo "<strong>Payment Type: </strong>".$adPayment.""?><br/>
                            </div>
                            <div class="col-md-6">
                                    <?php echo "<strong>Contract Start Date: </strong>".$adstartContract.""?><br/>
                                    <?php echo "<strong>Contract End Date: </strong>".$adstartContract.""?><br/>
                                    <?php echo "<strong>Renewal Date: </strong>".$adRenewal.""?><br/>
                            </div>

                            <div class="col-md-12">
                                <h4><span>Contract Notes:</span></h4>
                                <p><?php if (!empty($adNotes)) {echo $adNotes; } ?></p>
                            </div>                          

                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <a href="/vendors/ad_edit.php?adID=<?php echo $adID; ?>&vendorID=<?php echo $vendorID; ?>"><button type="submit" name="submit" class="btn btn-primary btn-default" value="Edit" >Edit</button></a>
                        </div>
                        <!-- /.panel-footer -->
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
