<?
	// Configure site
	$root = $_SERVER['DOCUMENT_ROOT']; 
	$private = str_replace("public","private",$root);
	include_once("$private/config.php");

// Verify login
include_once("$root/lc.php");

	
		$task_request = ("SELECT * FROM ticketTask WHERE taskID= '".$_GET['taskID']."'");
		$task_result = mysql_query ($task_request,$db) or die ("Query failed: $task_request");
		$task_total = mysql_num_rows($task_result);
		if($task_total == 0) echo "<p>That task doesn't exist.</p>\n";
		
		while ($task_row = mysql_fetch_array($task_result)) { 
			extract($task_row);		
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
                    <h1 class="page-header">Edit Task</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Task Details
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="/customers/task/form/mod.php">
                            	<input type="hidden" name="type" value="edit" />
                                    <input type="hidden" name="ticketID" value="<? echo $taskticketID; ?>"  />
								<?php include $root.'/customers/task/form/fields.php'; ?>
                            </form>
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
