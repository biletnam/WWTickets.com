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

    <script type='text/javascript'>
        // $(document).ready(function(){
        //     $("#search_results").slideUp();
        //     $("#button_find").click(function(event){
        //         event.preventDefault();
        //         search_ajax_way();
        //     });
        //     $("#search_query").keyup(function(event){
        //         event.preventDefault();
        //         search_ajax_way();
        //         });
        // });

        // function search_ajax_way(){
        //     $("#search_results").show();
        //     var search_this=$("#search_query").val();
        //     $.post("sioux-customer-list.php", {searchit : search_this}, function(data){
        //         $(".heading").hide();
        //         $("#display_results").html(data);
        //     })
        // }

    </script> 

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
                    <p class="text-right mgn15"><a href="/customers/index.php"><button class="btn btn-success pull-right" type="button" style="margin-top:30px;"> Norfolk/Columbus</button></a> </p>
                    <h1 class="page-header">Sioux City - Customers</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div id="alphabet" class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                            <div class="panel-heading" style="background-color:#333!important;">
                                <h4><i class="fa fa-file-text fa-fw"></i>Search Customers</h4>
                            </div>                                        
                        <div style="overflow:auto;padding:10px 20px 20px;">
                            <!-- <form id="searchform" method="post"> -->
                            <form method="get" action="/customers/sioux-results.php">

                                <div class="col-md-11">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="searchit" id="search_query" placeholder="Search Customers By Last Name or Customer Name"/>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <input type="submit" value="Go" class="btn btn-primary">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>         
            <div class="row">
                <div class="col-lg-12">
                    <ul class="alphabet">                                    
                        <li<? echo ($URI[2] == 'all') ? ' class="this-letter"' : ''; ?>><a href="/customers/sioux-city/"><? echo ($URI[2] == 'all') ? '<strong>All</strong>' : 'All'; ?></a></li>
                        <?
                            foreach(range('A','Z') as $letter) {
                                if($letter == strtoupper($URI[2])) {
                                    echo "<li class=\"this-letter\"><a href=\"/customers/sioux-results.php?searchit=",strtolower($letter),"\"><strong>$letter</strong></a></li>\n";
                                }
                                else {
                                    echo "<li><a href=\"/customers/sioux-results.php?searchit=",strtolower($letter),"\">$letter</a></li>\n";
                                }
                            }
                        ?>
                    </ul>
                </div>
            </div>    
            <div class="row">
                <div class="col-lg-12">

                    <div class="heading">
                        
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4> <i class="fa fa-group fa-fw"></i>Sioux City Customers </h4>
                            <a href="/customers/sioux_new.php"><button class="btn btn-success pull-right" type="button" style="margin-top:-30px;">New Customer</button></a>
                        </div>
						<div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead><?php include $root.'/customers/_shared/table_head.php'; ?></thead>
                                    <tbody>
										<?php 

											$cust_request = ("SELECT * FROM customerInfo WHERE storeID = '112' ORDER BY custLName ASC, custComp ASC");
											$cust_result = mysql_query ($cust_request,$db) or die ("Query failed: $cust_request");
											
											$ticketcount = 0;
											while ($cust_row = mysql_fetch_array($cust_result)) { 
												extract($cust_row);


                                                $tic_num_request = ("SELECT ticketID,ticketCustID FROM customerTickets WHERE ticketCustID = '$custID' AND ticketStatus != 'Invoiced'");
                                                $ticket_result_num = mysql_query ($tic_num_request,$db) or die ("Query failed: $tic_num_request");
                                                $ticket_num_total = mysql_num_rows($ticket_result_num);

                                                if ($ticket_num_total > 0 ) {$current_customer = 'style="background-color:#fff1a1;"'; }
                                                elseif($ticket_num_total == '0') {$current_customer = 'style="background-color:#fff;"'; }

                                                    include $root.'/customers/_shared/table_data_loop.php'; 

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

                </div>

                <div id="display_results"></div>

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
