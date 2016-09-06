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
                    <h1 class="page-header">Filters</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-4">
                    <form role="form" method="get" action="/filters/form/location-lookup.php">
                        <?php include $root.'/filters/form/location-filter-fields.php'; ?>
                    </form>
                </div>
<!--                 <div class="col-md-4">
                    <form role="form" method="get" action="/filters/form/installer-lookup.php">
                        <?php include $root.'/filters/form/installer-filter-fields.php'; ?>
                    </form>                    
                </div> -->
                <div class="col-md-4">
                    <form role="form" method="get" action="/filters/form/ticket-assign-lookup.php">
                        <?php include $root.'/filters/form/ticket-assign.php'; ?>
                    </form>                      
                </div>                                
                <div class="col-md-4">
                    <form role="form" method="get" action="/filters/form/ticket-status-lookup.php">
                        <?php include $root.'/filters/form/ticket-status-filter-fields.php'; ?>
                    </form>                      
                </div>
               
                 <div class="col-md-4">
                    <form role="form" method="get" action="/filters/form/task-list-lookup.php">
                        <?php include $root.'/filters/form/task-list-ticket.php'; ?>
                    </form>                      
                </div>

                 <div class="col-md-4">
                    <form role="form" method="get" action="/filters/form/diy-list.php">
                        <?php include $root.'/filters/form/diy-filters.php'; ?>
                    </form>                      
                </div>

                 <div class="col-md-4">
                    <form role="form" method="get" action="/filters/form/search-po-lookup.php">
                        <?php include $root.'/filters/form/search-po.php'; ?>
                    </form>
                </div>

                <div class="col-md-4">
                    <form role="form" method="get" action="/filters/form/search-ticket-lookup.php">
                        <?php include $root.'/filters/form/search-ticket-number.php'; ?>
                    </form>
                </div>


                <div class="clearfix"></div> 
                <div class="col-md-6">
                    <form role="form" method="get" action="/filters/form/ticket-timeframe-lookup.php">
                        <?php include $root.'/filters/form/calendar-filter-fields.php'; ?>
                    </form> 
                </div>
                <div class="col-md-6">
                    <form role="form" method="get" action="/filters/form/customer-rating-lookup.php">
                        <?php include $root.'/filters/form/customer-rating-filter-fields.php'; ?>
                    </form>                     
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


    <?php include $root.'/_shared/footer.php'; ?>
    <script>
        $(function(){$('.datepicker').datepicker({format: 'yyyy-mm-dd'}); }); 
    </script>

</body>

</html>
