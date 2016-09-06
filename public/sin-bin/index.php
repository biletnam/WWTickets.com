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

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



    <style>
        #msg{margin-left: -15px;}
    </style>

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
                    <h1 class="page-header">Sin Bin List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

                    <div class="col-lg-12">


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4><i class="fa fa-trash-o fa-fw"></i>Sin Bin List</h4>
                                   <a href="/sin-bin/new.php"><button class="btn btn-success pull-right" type="button" style="margin-top:-30px;">New Item</button></a>
                                </div>
                                <div class="panel-body">
                                    
                                <!-- .panel-heading -->
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead><?php include $root.'/sin-bin/_shared/table_head_index.php'; ?></thead>
                                        <tbody>
                                            <?php 

                                                $sin_request = ("SELECT * FROM sinBin ORDER BY sinDate DESC");
                                                $sin_result = mysql_query ($sin_request,$db) or die ("Query failed: $sin_request");

                                                $ticketcount = 0;
                                                while ($sin_row = mysql_fetch_array($sin_result)) { 
                                                    extract($sin_row);
                                                    $sinDate = date("m/j/Y",strtotime($sinDate)); if ($sinDate == '12/31/1969') {$sinDate = ''; }
                                                    include $root.'/sin-bin/_shared/table_index_loop.php'; 
                                             } ?>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                                <!-- .panel-body -->
                                <div class="panel-footer">
                                    &nbsp;
                                    <!-- <a href="/to-do-list/past-list.php"><button type="submit" name="submit" class="btn btn-primary btn-danger" >Past List</button></a> -->
                                </div>
                            </div>
                            <!-- /.panel -->

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