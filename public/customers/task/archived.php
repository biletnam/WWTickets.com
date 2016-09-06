<?
	// Configure site
	$root = $_SERVER['DOCUMENT_ROOT']; 
	$private = str_replace("public","private",$root);
	include_once("$private/config.php");

// Verify login
include_once("$root/lc.php");
	
		$cust_request = ("SELECT * FROM customerInfo WHERE custID= '".$_GET['ID']."'");
		$cust_result = mysql_query ($cust_request,$db) or die ("Query failed: $cust_request");
		$cust_total = mysql_num_rows($cust_result);
		if($cust_total == 0) echo "<p>That Product doesn't exist.</p>\n";
		
		while ($cust_row = mysql_fetch_array($cust_result)) { 
			extract($cust_row);		
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

    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

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
                        <?php include $root.'/_shared/customer-profile.php'; ?>
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <div class="row">
               
                <div class="col-lg-12">
                    <p> <a href="/customers/task/new.php?ticketID=<?php echo $ticketID; ?>&custID=<?php echo $custID; ?>" class="btn btn-primary btn-lg btn-block btn-success">New Task <i class="glyphicon glyphicon-plus-sign"></i></a> </p>
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color:darkblue!important;">
                            <h4><span>Task List</span></h4>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">

                                <?php 
                                    $task_request = ("SELECT * FROM ticketTask WHERE taskCust = '".$_GET['ID']."' AND taskStatus = 'Complete'");
                                    $task_result = mysql_query ($task_request,$db) or die ("Query failed: $task_request");
                                    
                                    while ($task_row = mysql_fetch_array($task_result)) { 
                                        extract($task_row);
                                        $taskDate = date("m/j/Y",strtotime($completeBy)); if ($taskDate == '12/31/1969') {$taskDate = ''; }  
                                 ?>  
                                <?php if ($ticketRedFlag == 'Yes') { ?> <div class="col-md-2"> <img src="/_images/redflag.gif" alt=""> </div> <? } ?>
                                <div class="col-md-4 col-xs-4"><strong>Assigned</strong><br/><?php echo $taskEmp; ?></div>
                                <div class="col-md-4 col-xs-4"><strong>Created By</strong><br/><?php echo $createdBy; ?></div>
                                <div class="col-md-4 col-xs-4"><strong>Due Date</strong><br/><?php echo $taskDate; ?></div>


                                <div class="col-md-12">


            <form id="myTask<?php echo $taskID; ?>" method="POST" action="/customers/form/updt-task.php" style="width:20px;">
            <input type="hidden" name="taskID" value="<?php echo $taskID; ?>">    
                <label for="">Status</label>


                <select name="taskStatus" id="taskDropdown<?php echo $taskID; ?>">
                    <option value=""<? if($taskStatus == '') echo ' selected="selected"'; ?>>Choose One</option>
                    <option value="Processing"<? if($taskStatus == 'Processing') echo ' selected="selected"'; ?>>Processing</option>
                    <option value="Complete"<? if($taskStatus == 'Complete') echo ' selected="selected"'; ?>>Complete</option>
                </select>                 

            </form>

            <script>
    
$(document).ready(function() {
   $('#taskDropdown<?php echo $taskID;?>').change( function() {
       $.ajax({ // create an AJAX call...
           data: $('#myTask<?php echo $taskID;?>').serialize(), // serialize the form
           type: $('#myTask<?php echo $taskID;?>').attr('method'), // GET or POST from the form
           url: $('#myTask<?php echo $taskID;?>').attr('action'), // the file to call from the form

       });
    });
});
</script>



                                </div>
                                <div class="col-md-12"><br/><strong>Note</strong><br/><br/>
                                    <?php echo $taskNotes; ?><br/><a style="margin-top:10px;"href="/customers/task/edit.php?taskID=<?php echo $taskID; ?>&custID=<?php echo $custID; ?>" class="btn btn-warning">Edit</a><hr style="height:10px;display:block;"/>
                                </div>


                                <? } ?>



          
                            </div>
                        </div>
                        <div class="panel-footer">
                           <p> <a href="/customers/cust_view.php?ID=<?php echo $custID; ?>"> <button class="btn btn-danger" style="margin-top:-7px;margin-left:15px;" type="button">Processing Task</button> </a></p>
                        </div>
                        <!-- /.panel-footer -->    
                    </div>



                </div>
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
