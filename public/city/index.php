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
                    <h1 class="page-header">"States/Cities" List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row" style="margin-bottom:20px;">
                <div class="col-md-4"> <p>Jump to:</p> <a class="btn btn-success" href="#neb">Nebraska</a>&nbsp; <a class="btn btn-success" href="#iowa">Iowa</a>&nbsp; <a class="btn btn-success" href="#sd">South Dakota</a></div>
            </div>
            <!-- /.row -->
            <div class="row">

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default" id="neb">
                                    <div class="panel-heading">
                                        <h4><i class="fa fa-trash-o fa-fw"></i>Nebraska</h4>
                                       <a href="/city/new.php"><button class="btn btn-success pull-right" type="button" style="margin-top:-30px;">New City</button></a>
                                    </div>
                                    <div class="panel-body">
                                        
                                    <!-- .panel-heading -->
                                    <div class="dataTable_wrapper">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead><?php include $root.'/city/_shared/table_head_index.php'; ?></thead>
                                            <tbody>
                                                <?php 

                                                    $city_request = ("SELECT * FROM cities WHERE city_state = 'NE' ORDER BY city_name ASC");
                                                    $city_result = mysql_query ($city_request,$db) or die ("Query failed: $city_request");

                                                    $ticketcount = 0;
                                                    while ($city_row = mysql_fetch_array($city_result)) { 
                                                        extract($city_row);
                                                        // $sinDate = date("m/j/Y",strtotime($sinDate)); if ($sinDate == '12/31/1969') {$sinDate = ''; }
                                                        include $root.'/city/_shared/table_index_loop.php'; 
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
                            </div> <!-- /.panel -->
                   
              

                
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default" id="iowa">
                                    <div class="panel-heading">
                                        <h4><i class="fa fa-trash-o fa-fw"></i>Iowa</h4>
                                       <a href="/city/new.php"><button class="btn btn-success pull-right" type="button" style="margin-top:-30px;">New City</button></a>                                        
                                    </div>
                                    <div class="panel-body">
                                        
                                    <!-- .panel-heading -->
                                    <div class="dataTable_wrapper">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead><?php include $root.'/city/_shared/table_head_index.php'; ?></thead>
                                            <tbody>
                                                <?php 

                                                    $city_request = ("SELECT * FROM cities WHERE city_state = 'IA' ORDER BY city_name ASC");
                                                    $city_result = mysql_query ($city_request,$db) or die ("Query failed: $city_request");

                                                    $ticketcount = 0;
                                                    while ($city_row = mysql_fetch_array($city_result)) { 
                                                        extract($city_row);
                                                        // $sinDate = date("m/j/Y",strtotime($sinDate)); if ($sinDate == '12/31/1969') {$sinDate = ''; }
                                                        include $root.'/city/_shared/table_index_loop.php'; 
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
                            </div> <!-- /.panel -->
                


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default" id="sd">
                                    <div class="panel-heading">
                                        <h4><i class="fa fa-trash-o fa-fw"></i>South Dakota</h4>
                                       <a href="/city/new.php"><button class="btn btn-success pull-right" type="button" style="margin-top:-30px;">New City</button></a>                                        
                                    </div>
                                    <div class="panel-body">
                                        
                                    <!-- .panel-heading -->
                                    <div class="dataTable_wrapper">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead><?php include $root.'/city/_shared/table_head_index.php'; ?></thead>
                                            <tbody>
                                                <?php 

                                                    $city_request = ("SELECT * FROM cities WHERE city_state = 'SD' ORDER BY city_name ASC");
                                                    $city_result = mysql_query ($city_request,$db) or die ("Query failed: $city_request");

                                                    $ticketcount = 0;
                                                    while ($city_row = mysql_fetch_array($city_result)) { 
                                                        extract($city_row);
                                                        // $sinDate = date("m/j/Y",strtotime($sinDate)); if ($sinDate == '12/31/1969') {$sinDate = ''; }
                                                        include $root.'/city/_shared/table_index_loop.php'; 
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
                            </div> <!-- /.panel -->
                        </div>


                    </div> <!-- /.col-lg-12 -->


            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include $root.'/_shared/footer.php'; ?>

</body>

</html>