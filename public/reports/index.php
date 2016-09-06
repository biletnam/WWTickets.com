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
                    <h1 class="page-header">Reports</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!-- Widgets // How did you hear about us & referral report -->
            <div class="row">
              <div class="col-lg-12">
                <div class="col-lg-6 col-md-6 ">
                    <a href="/reports/hear-about.php">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="padding-top:10px;">
                            <div class="row center-text">
                                <div class="col-s-12 text-center"><i class="fa fa-file-text-o fa-5x"></i><br/>
                                    <span class="center-text">Market Referral?<br/>&nbsp;</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
               <div class="col-lg-6 col-md-6 ">
                    <a href="/reports/referral-report.php">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="padding-top:10px;">
                            <div class="row center-text">
                                <div class="col-s-12 text-center"><i class="fa fa-bar-chart-o fa-5x"></i><br/>
                                    <span class="center-text">Referrals<br/>&nbsp;</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
              </div>
            </div>

<!-- Drop Down Menus
<div class="row">
    <div class="col-md-6">
        <form role="form" method="get" action="/reports/hear-about.php">
            <div class="well">
                <h4><span>Report: How did you hear about us?</span></h4>
                <div class="col-md-5">
                    <div class="form-group">
                        <select class="form-control" name="hearMonth" >
                          <?php 

                          $month_list = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
                          foreach ($month_list as $month) { ?>
                            <option value="<?php echo $month; ?>"><?php echo $month ?></option>
                          <? } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <select class="form-control" name="hearYear" >
                          <?php 

                          $year_list = array('2024', '2023', '2022', '2021', '2020', '2019', '2018', '2017', '2016', '2015');
                          foreach (array_reverse($year_list) as $year) { ?>
                            <option value="<?php echo $year; ?>"><?php echo $year ?></option>
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
    <div class="col-md-6">
        <form role="form" method="get" action="/reports/referral-report.php">
            <div class="well">
                <h4><span>Report: Referrals</span></h4>
                <div class="col-md-5">
                    <div class="form-group">
                        <select class="form-control" name="referralMonth" >
                          <?php 

                          $month_list = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
                          foreach ($month_list as $month) { ?>
                            <option value="<?php echo $month; ?>"><?php echo $month ?></option>
                          <? } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <select class="form-control" name="referralYear" >
                          <?php 

                          $year_list = array('2024', '2023', '2022', '2021', '2020', '2019', '2018', '2017', '2016', '2015');
                          foreach (array_reverse($year_list) as $year) { ?>
                            <option value="<?php echo $year; ?>"><?php echo $year ?></option>
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
 -->
            <div class="row">
                <div class="col-lg-12">          

                  <?php 

                      $year_list = array('2024', '2023', '2022', '2021', '2020', '2019', '2018', '2017', '2016', '2015');

                      foreach ($year_list as $year) { 

                      $thisYear = date('Y');

                      if ($thisYear >= $year) { ?>

                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h4><i class="fa fa-bar-chart fa-fw"></i> <?php echo $year; ?> Reports</h4>
                              </div>
                              <!-- /.panel-heading -->
                        			<div class="panel-body">
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
                                                  <th>Month</th>
                                                  <th>NORF</th>
                                                  <th>COL</th>
                                                  <th>SUX</th>
                                                  <th>#AMI</th>
                                                  <th>#MI</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  <?php 

                                                  foreach ($month_list as $month) {
                                                      echo "<td>$month</td>";
                                                      echo "<td>";
                                                                                                  
                                                                    $post_request = ("SELECT SUM(ticketNORF) FROM customerTickets WHERE ticketMonth = '$month' AND ticketYear = '$year' AND ticketLocation = 'Norfolk';");
                                                                    $post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
                                                                    
                                                                    while ($post_row = mysql_fetch_array($post_result)) { 
                                                                      extract($post_row);
                                                                      echo $post_row['SUM(ticketNORF)'];
                                                                    }
                                                                  
                                                      echo"</td>";
                                                      echo "<td>";
                                                                                                  
                                                                    $post_request = ("SELECT SUM(ticketNORF) FROM customerTickets WHERE ticketMonth = '$month' AND ticketYear = '$year' AND ticketLocation = 'Columbus';");
                                                                    $post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
                                                                    
                                                                    while ($post_row = mysql_fetch_array($post_result)) { 
                                                                      extract($post_row);
                                                                      echo $post_row['SUM(ticketNORF)'];
                                                                    }
                                                                  
                                                      echo"</td>";
                                                      echo "<td>";
                                                                                                  
                                                                    $post_request = ("SELECT SUM(ticketNORF) FROM customerTickets WHERE ticketMonth = '$month' AND ticketYear = '$year' AND ticketLocation = 'Sioux City';");
                                                                    $post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
                                                                    
                                                                    while ($post_row = mysql_fetch_array($post_result)) { 
                                                                      extract($post_row);
                                                                      echo $post_row['SUM(ticketNORF)'];
                                                                    }
                                                                  
                                                      echo"</td>";                                    
                                                      echo "<td>";
                                                                                                  
                                                                    $post_request = ("SELECT SUM(ticketAMI) FROM customerTickets WHERE ticketMonth = '$month' AND ticketYear = '$year';");
                                                                    $post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
                                                                    
                                                                    while ($post_row = mysql_fetch_array($post_result)) { 
                                                                      extract($post_row);
                                                                      echo $post_row['SUM(ticketAMI)'];
                                                                    }
                                                                  
                                                      echo"</td>";
                                                      echo "<td>";
                                                                                                  
                                                                    $post_request = ("SELECT SUM(ticketMI) FROM customerTickets WHERE ticketMonth = '$month' AND ticketYear = '$year';");
                                                                    $post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
                                                                    
                                                                    while ($post_row = mysql_fetch_array($post_result)) { 
                                                                      extract($post_row);
                                                                      echo $post_row['SUM(ticketMI)'];
                                                                    }
                                                                  
                                                      echo"</td>";

                                                      if ($month == 'December') {echo "</tr>"; }
                                                      else{
                                                          echo "</tr>";
                                                          echo "<tr>";
                                                      }

                                                  }

                                                   ?>
                                        
                               
                                            <?php //include $root.'/reports/_shared/table_data_loop.php'; ?>
                                          </tbody>
                                      </table>
                                  </div>
                                  <!-- /.table-responsive -->
                              </div>
                              <!-- /.panel-body -->
                          </div>
                          <!-- /.panel -->


                      <? } 

                  } ?>

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
