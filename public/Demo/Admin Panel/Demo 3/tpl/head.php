<?php
	if(isset($_GET['action']) && $_GET['action'] == 'logout')
	{
		$_SESSION = array();
		header('Location: index.php');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Ajax Full Featured Calendar 2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

<!-- Bootstrap Core CSS -->
    <link href="/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="/_css/style.css" rel="stylesheet">


    <!-- styles -->
    <!-- <link href="css/bootstrap.css" rel="stylesheet"> -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/smoothness/jquery-ui.css" rel="stylesheet">
    <link href="css/fullcalendar.print.css" media="print" rel="stylesheet">
    <link href="css/fullcalendar.css" rel="stylesheet">
    <link href="lib/spectrum/spectrum.css" rel="stylesheet">    
    <link href="lib/timepicker/jquery-ui-timepicker-addon.css" rel="stylesheet">


    <link href="/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">    
	    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
