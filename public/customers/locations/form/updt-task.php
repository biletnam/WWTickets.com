<?php 

$root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once($private."/config.php");
$permissions = 4;
// Verify login
include_once($root."/lc.php");



$sql_query = "UPDATE ticketTask SET taskStatus = '$taskStatus'WHERE taskID = '$taskID'";
$result = mysql_query($sql_query);


?>