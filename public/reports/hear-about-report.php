<?
	// Configure site
	$root = $_SERVER['DOCUMENT_ROOT']; 
	$private = str_replace("public","private",$root);
	include_once("$private/config.php");

// Verify login
include_once("$root/lc.php");

$marketRefOne = $_POST['marketRefOne'];
$marketRefTwo = $_POST['marketRefTwo'];
$referralType = $_POST['referralType'];
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

              <?php 
                    if (!empty($marketRefOne) || !empty($marketRefTwo)) {$headingOne = " - ".$marketRefOne." - ".$marketRefTwo; }
                    else{$headingOne = "- All Records";}

                    echo $headingOne;
              ?>        

        <div id="page-wrapper">
            <!-- Page Title -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Report - Marketing Referrals?</h1>
                    <a href="/reports/" class="btn btn-success pull-right" type="button" style="margin-top:-45px;"><i class="fa fa-arrow-circle-left fa-fw"></i> Back to Reports</a>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!-- Referral Report -->
            <div class="row">
                <div class="col-md-12">
                    <form role="form" method="post" action="/reports/hear-about-report.php">
                        <div class="well">
                            <h4><span>Report - Marketing Referrals?</span></h4>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control" name="referralType" >
                                        <option value="" <?php if($adName == '') echo' selected="selected"';?>>Choose One</option>
                                        <?
                                            $market_request = ("SELECT * FROM Vendors LEFT JOIN VendorAds ON VendorAds.adVendorID = Vendors.vendorID WHERE VendorAds.adName != '' ORDER BY Vendors.vendorName ASC");
                                            $market_result = mysql_query ($market_request,$db) or die ("Query failed: $market_request");
                                            
                                            while ($market_row = mysql_fetch_array($market_result)) { 
                                                extract($market_row);
                                                //$output = $adName;
                                                $output = $vendorName.' - '.$adName;
                                                ?>
                                                <option value="<?php echo $adName;?>"<?php if($adName == $referralType) echo' selected="selected"';?>><?php echo $output;?></option>
                                          <? }
                                        ?>
                                    </select>
                                </div> 
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select class="form-control" name="marketRefOne" >
                                      <?php 
                                      $month_list = array('All','January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
                                      foreach ($month_list as $month) { $value = $month; if ($month == 'All') {$value = '%'; }?>
                                        <option value="<?php echo $value; ?>" <? if($month== $marketRefOne) echo ' selected="selected"'; ?>><?php echo $month ?></option>
                                      <? } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select class="form-control" name="marketRefTwo" >
                                      <?php 

                                      $year_list = array('2024', '2023', '2022', '2021', '2020', '2019', '2018', '2017', '2016', '2015');
                                      foreach (array_reverse($year_list) as $year) { ?>
                                        <option value="<?php echo $year; ?>" <? if($year== $marketRefTwo) echo ' selected="selected"'; ?>><?php echo $year ?></option>
                                      <? } ?>
                                    </select>
                                </div>
                            </div>                    
                            <div class="col-md-2">
                                <button class="btn btn-primary" type="submit"><i class="fa  fa-search fa-fw"></i> </button>
                            </div>
                            <div class="clearfix" > </div >
                        </div>
                    </form>
                </div>
            </div>            

            <div class="row">
                <div class="col-lg-12">          
                  <?php $thisYear = date('Y'); ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><i class="fa fa-bar-chart fa-fw"></i>Report - 
                              <?php
                                if (empty($referralType) && $marketRefOne = '%') {$headingOne = $referralType." All/".$marketRefTwo; }
                                elseif (!empty($referralType) && $merketRefOne = '%') {$headingOne = $referralType." - All/".$marketRefTwo; }
                                elseif (!empty($referralType)) {$headingOne = $referralType." ".$marketRefOne."/".$marketRefTwo; }
                                elseif (!empty($marketRefOne) || !empty($marketRefTwo)) {$headingOne = $marketRefOne."/".$marketRefTwo; }
                                else{$headingOne = "All";}
                                echo $headingOne;?>
                            </h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <!-- Query up to the database -->
                            <?
                              if (!empty($referralType)) { $WHERE = "WHERE marketReferred != '' AND marketRefOne LIKE '$marketRefOne' AND marketRefTwo='$marketRefTwo' AND referralType = '$referralType'"; }
                              elseif (!empty($marketRefOne) || !empty($marketRefTwo)) {$WHERE = "WHERE marketReferred != '' AND marketRefOne LIKE '$marketRefOne' AND marketRefTwo='$marketRefTwo'"; }
                              else{$WHERE = "WHERE marketReferred != ''"; }
                                $market_request = ("SELECT * FROM customerInfo $WHERE ORDER BY custID ASC");
                                $market_result = mysql_query ($market_request,$db) or die ("Query failed: $market_request");
                                $ref_total = mysql_num_rows($market_result);
                                echo "<div class='text-center' style='padding:10px;font-size:24px;'>".$headingOne." - Counts: \"".$ref_total."\"</div>";?>

                            <!-- Info Table -->
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                                    <?php 

                                      $month_list = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

                                      $thisMonth = date('F', strtotime('0 month'));
                                      $lastMonth = date('F', strtotime('-1 month'));
                                      $threeMonth = date('F', strtotime('-2 month'));
                                      $thisYear = date('Y');

                                     ?>

                                    <thead>
                                        <tr>
                                            <th>Marketing</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Month</th>
                                            <th>Year</th>
                                            <!-- <th>Paid?</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?
                                      while ($market_row = mysql_fetch_array($market_result)) { 
                                        extract($market_row); ?>

                                          <tr>
                                              <td><?php echo $referralType; ?></td>
                                              <td><?php echo $custFName; ?></td>
                                              <td><?php echo $custLName; ?></td>
                                              <td><?php echo $marketRefOne; ?></td>
                                              <td><?php echo $marketRefTwo; ?></td>
                                          </tr>

                                      <? } ?>
                                          
                            
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
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include $root.'/_shared/footer.php'; ?>

</body>

</html>
