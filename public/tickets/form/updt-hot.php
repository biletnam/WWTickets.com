<?php 

$root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once($private."/config.php");
$permissions = 4;
// Verify login
include_once($root."/lc.php");



$sql_query = "UPDATE customerTickets SET ticketsHot = '$ticketsHot'WHERE ticketID = '$ticketID'";
$result = mysql_query($sql_query);


?>