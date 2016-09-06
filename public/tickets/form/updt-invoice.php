<?php 

$root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once($private."/config.php");
$permissions = 4;
// Verify login
include_once($root."/lc.php");

	$date_mod = date('Y-m-d');


 $ticketSInvoiced = $date_mod; $updtDataTicket = ", ticketSInvoiced='$ticketSInvoiced'";

if ($ticketInvoiced == '') {
	$ticketSInvoiced = '0000-00-00';
	$updtDataTicket = ", ticketSInvoiced='$ticketSInvoiced'";
}

$sql_query = "UPDATE customerTickets SET ticketInvoiced = '$ticketInvoiced' $updtDataTicket WHERE ticketID = '$ticketID'";
$result = mysql_query($sql_query);
$ticketSInvoiced = date("m/j/Y",strtotime($ticketSInvoiced));


?>