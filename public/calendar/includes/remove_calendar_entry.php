<?php
/**
 * Created by PhpStorm.
 * User: WebDesign
 * Date: 8/30/2016
 * Time: 8:52 AM
 */


// Configure site
$root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace("public","private",$root);
include_once("$private/config.php");

// Verify login
include_once("$root/lc.php");

$post_request = ("DELETE FROM calendar WHERE id = '$id'");
$post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");

header("Location: /calendar/");