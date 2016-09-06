<?
	// Configure site
	$root = $_SERVER['DOCUMENT_ROOT']; 
	$private = str_replace("public","private",$root);
	include_once("$private/config.php");

// Verify login
include_once("$root/lc.php");

$hearMonth = $_GET['hearMonth'];
$hearYear = $_GET['hearYear'];
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

    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background-color:#004ca9;">
        
      		<?php include $root.'/_shared/header-nav.php'; ?>

      		<?php include $root.'/_shared/sidebar-nav.php'; ?>
        </nav>

              <?php if ($hearMonth == '%') {$headingOne = "All/".$hearYear; }
                    elseif (!empty($hearMonth) || !empty($hearYear)) {$headingOne = " - ".$hearMonth." - ".$hearYear; }
                    else{$headingOne = "- All Records";}

                    echo $headingOne;
              ?>        

        <div id="page-wrapper">
            <!-- Page Title -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Report - Referrals?</h1>
                    <a href="/reports/download.php" class="btn btn-warning" type="button" ><i class="fa fa-download fa-fw"></i> Export Report in Excel</a>
                    <a href="/reports/" class="btn btn-success" type="button" style="float:right;"><i class="fa fa-arrow-circle-left fa-fw"></i> Back to Reports</a>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!-- Referral Report -->
            <div class="row">
                <div class="col-md-12">
                    <form role="form" method="get" action="/reports/referral-report.php">
                        <div class="well">
                            <h4><span>Report - How did you hear about us?</span></h4>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <select class="form-control" name="hearMonth" >
                                      <?php 
                                      $month_list = array('All','January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
                                      foreach ($month_list as $month) { $value = $month; if ($month == 'All') {$value = '%'; }?>
                                        <option value="<?php echo $value; ?>"<? if($month== $hearMonth) echo ' selected="selected"'; ?>><?php echo $month ?></option>
                                      <? } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <select class="form-control" name="hearYear" >
                                      <?php 

                                      $year_list = array('2024', '2023', '2022', '2021', '2020', '2019', '2018', '2017', '2016', '2015','All');
                                      foreach (array_reverse($year_list) as $year) { $value = $year; if ($year== 'All') {$value = '%'; } ?>
                                        <option value="<?php echo $value; ?>"<? if($year== $hearYear) echo ' selected="selected"'; ?>><?php echo $year ?></option>
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

              <?php if ($hearMonth == '%' && $hearYear == '%') {$headingOne = "All"; }
                    elseif ($hearMonth == '%') {$headingOne = "All/".$hearYear; }
                    elseif (!empty($hearMonth) || !empty($hearYear)) {$headingOne = $hearMonth."/".$hearYear; }
                    else{$headingOne = "- All Records";}
                    echo $headingOne;
              ?>   
                            </h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <!-- Query up to the database -->
                            <?
                              if (!empty($hearMonth) || !empty($hearYear)) {$WHERE = "WHERE refMonth LIKE '$hearMonth' AND refYear LIKE '$hearYear'"; }
                              else{$WHERE = ""; }
                                $referral_request = ("SELECT * FROM referralTable $WHERE ORDER BY refID ASC");
                                $referral_result = mysql_query ($referral_request,$db) or die ("Query failed: $referral_request");
                                $ref_total = mysql_num_rows($referral_result);
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
                                            <th>Referral First Name</th>
                                            <th>Referral Last Name</th>
                                            <th>Customer First Name</th>
                                            <th>Customer Last Name</th>
                                            <th>Month</th>
                                            <th>Year</th>
                                            <th>Paid?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?
                                      while ($referral_row = mysql_fetch_array($referral_result)) { 
                                        extract($referral_row); ?>

                                          <tr>
                                              <td><?php echo $refFName; ?></td>
                                              <td><?php echo $refLName; ?></td>
                                              <td><a href="/customers/cust_view.php?ID=<?php echo $refCustLink;?>"><?php echo $refCustFName; ?></a></td>
                                              <td><a href="/customers/cust_view.php?ID=<?php echo $refCustLink;?>"><?php echo $refCustLName; ?></a></td>
                                              <td><?php echo $refMonth; ?></td>
                                              <td><?php echo $refYear; ?></td>
                                              <td>
                                                  <form id="myRef<?php echo $refID;?>" method="POST" action="/reports/form/updt-referral.php" style="width:20px;">
                                                    <input type="hidden" name="refID" value="<?php echo $refID ?>">    
                                                    <input style="text-align:center;" type="checkbox" id="myRefChecked<?php echo $refID; ?>" value="1" name="refChecked"<? if($refChecked == '1') echo ' checked="checked"'; ?> />
                                                  </form>

                                                  <script>
                                                    $(document).ready(function() {
                                                       $('#myRefChecked<?php echo $refID;?>').click( function() {
                                                           $.ajax({ // create an AJAX call...
                                                               data: $('#myRef<?php echo $refID;?>').serialize(), // serialize the form
                                                               type: $('#myRef<?php echo $refID;?>').attr('method'), // GET or POST from the form
                                                               url: $('#myRef<?php echo $refID;?>').attr('action'), // the file to call from the form
                                                           });
                                                        });      
                                                    });
                                                  </script>
                                              </td>
                                          </tr>

                                      <? } ?>
                                          
                            
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <!-- /.row -->
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
