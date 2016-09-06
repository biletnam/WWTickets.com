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
                    <h1 class="page-header">To-Do List</h1>
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
                            <div class="panel-body">

                                    <div id="msg" class="col-md-12"></div>

                                <form role="form" method="post" action="/to-do-list/form/detail-mod.php">
                                    <input type="hidden" name="type" value="new" />
                                    <?php include $root.'/to-do-list/form/detail-fields.php'; ?>
                                </form>
                                
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4><i class="fa fa-file-text fa-fw"></i>Current To-Do List</h4>
                                </div>
                                <!-- .panel-heading -->
                                <div class="panel-body">

                                    <style>
    
                                    .panel-heading .accordion-toggle:after {
                                        /* symbol for "opening" panels */
                                        font-family:'Glyphicons Halflings';
                                        /* essential for enabling glyphicon */
                                        content:"\e114";
                                        /* adjust as needed, taken from bootstrap.css */
                                        float: right;
                                        /* adjust as needed */
                                        color: grey;
                                        /* adjust as needed */
                                    }
                                    .panel-heading .accordion-toggle.collapsed:after {
                                        /* symbol for "collapsed" panels */
                                        content:"\e080";
                                        /* adjust as needed, taken from bootstrap.css */
                                    }
                                    .panel-heading {
                                        cursor: pointer;
                                    }


                                    </style>

                                    <?php $alphabet = array('One','Two','Three','Four','Five','Six','Seven','Eight','Nine','Ten','Twelve','Thirteen','Fourteen','Fifteen','Sixteen','Seventeen','Eighteen','Nineteen','Twenty','TwentyOne','TwentyTwo','V','W','X','Y','Z'); ?>

                                    <div class="panel-group" id="accordion">
                                    <?
                                        $faq_request = ("SELECT * FROM listToDo WHERE listStatus = 'Processing' ORDER BY listDate ASC");
                                        $faq_result = mysql_query ($faq_request,$db) or die ("Query failed: $faq_request");
                                        
                                        while ($faq_row = mysql_fetch_array($faq_result)) { 
                                            extract($faq_row);
                                            $listDate = date("m/j/Y",strtotime($listDate)); if ($listDate == '12/31/1969') {$listDate = ''; }
                                            ?>

                                                <div class="panel panel-default">
                                                    <div class="panel-heading accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $alphabet[0]; ?>">
                                                         <h4 class="panel-title">
                                                            <a href="edit.php?"><?php echo $listTitle; ?> - <?php echo $listAssign; ?></a>
                                                            <div class="pull-right"><?php echo $listDate; ?></div>
                                                        </h4>
                                                    </div>
                                                    <div id="" class="">
                                                        <div class="panel-body"><?php echo $listDetails; ?>
                                                        <br/>
                                                                                        <div class="pull-right">
                                            <div class="pull-right"><a class="btn btn-primary btn-danger" onclick="return deleteItem();" href="/to-do-list/del.php?listID=<?php echo $listID;?>">Delete</a></div>
                                            <div class="pull-right" style="margin-right:5px;"><a href="/to-do-list/edit.php?listID=<?php echo $listID; ?>" class="btn btn-primary">Edit</a></div>
                                            <div class="pull-right" style="margin-right:5px;"><a href="/to-do-list/form/complete.php?listID=<?php echo $listID; ?>" class="btn btn-success">Complete</a></div>
                                </div>

                                                    </div>
                                                    </div>
                                                </div>

                                            <?php $first = $alphabet[0]; array_shift($alphabet); 

                                         } ?>
                                     
                                    </div>

                                </div>
                                <!-- .panel-body -->
                                <div class="panel-footer">
                                    <a href="/to-do-list/past-list.php"><button type="submit" name="submit" class="btn btn-primary btn-danger" >Past List</button></a>
                                </div>
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