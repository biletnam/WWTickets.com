<?
	// Configure site
	$root = $_SERVER['DOCUMENT_ROOT']; 
	$private = str_replace("public","private",$root);
	include_once("$private/config.php");

// Verify login
include_once("$root/lc.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

$listID = $_GET['listID'];

    $list_request = ("SELECT * FROM listToDo WHERE listID = '$listID'");
    $list_result = mysql_query ($list_request,$db) or die ("Query failed: $list_request");
    
    while ($list_row = mysql_fetch_array($list_result)) { 
        extract($list_row);        
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
                    <h1 class="page-header">Edit - To-Do List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4><i class="fa fa-file-text fa-fw"></i>To-Do List</h4>
                            </div>
                            <form role="form" method="post" action="/to-do-list/form/detail-updt.php" >
                            <div class="panel-body">
                                    <input type="hidden" name="type" value="edit" />
                                    <input type="hidden" name="listID" value="<?php echo $listID; ?>" />
                                    <?php include $root.'/to-do-list/form/detail-fields.php'; ?>
                                </form>
                                
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include $root.'/_shared/footer.php'; ?>

</body>

</html>