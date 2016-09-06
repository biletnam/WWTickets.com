<?
	// Configure site
	$root = $_SERVER['DOCUMENT_ROOT']; 
	$private = str_replace("public","private",$root);
	include_once("$private/config.php");

// Verify login
include_once("$root/lc.php");

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
	
		$sin_request = ("SELECT * FROM sinBin WHERE sinID= '".$_GET['ID']."'");
		$sin_result = mysql_query ($sin_request,$db) or die ("Query failed: $sin_request");
		$sin_total = mysql_num_rows($sin_result);
		if($sin_total == 0) echo "<p>That sin bin doesn't exist.</p>\n";
		
		while ($sin_row = mysql_fetch_array($sin_result)) { 
            extract($sin_row);      
            $sinDate = date("m/j/Y",strtotime($sinDate)); if ($sinDate == '12/31/1969') {$sinDate = ''; }
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
                    <p>&nbsp;</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <h4><span>Sin Bin Details</span></h4>
                        </div>
                        <div class="panel-body">

                            <div class="col-md-12">
                                <h1><?php echo $sinName; ?></h1>
                            </div>

                            <div class="col-md-6">
                                <p><strong>Model: </strong><?php echo $sinModel; ?><br/>
                                <strong>Qty: </strong><?php echo $sinQty; ?><br/>
                                <strong>Size: </strong><?php echo $sinSize; ?><br/>
                                <strong>Interior Color: </strong><?php echo $sinInterior; ?><br/>
                                <strong>Exterior Color: </strong><?php echo $sinExterior; ?><br/>
                                <strong>Grid: </strong><?php echo $sinGrid; ?></p>
                            </div>

                            <div class="col-md-6">
                                <p><strong>Serial Number: </strong><?php echo $sinSerial; ?><br/>
                                <strong>Nail Fin: </strong><?php echo $sinNail; ?><br/>
                                <strong>Price: </strong><?php echo $sinPrice; ?><br/>
                                <strong>Donated: </strong><?php echo $sinDonated; ?><br/>
                                <strong>Date: </strong><?php echo $sinDate; ?></p>
                            </div>

                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">


                            <a href="/sin-bin/edit.php?ID=<?php echo $sinID; ?>"><button type="submit" name="submit" class="btn btn-primary btn-default" value="Save Changes" >Edit</button></a>

                        </div>
                        <!-- /.panel-footer -->
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
