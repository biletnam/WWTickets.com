<?php 

$root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once($private."/config.php");
$permissions = 4;
// Verify login
include_once($root."/lc.php");

	$date_mod = date('Y-m-d');


switch ($ticketStatus) {

	case 'Sold': $ticketSSold = $date_mod; $updtDataTicket = ", ticketSSold='$ticketSSold'"; break;
	case 'Ordered': $ticketSOrdered = $date_mod; $updtDataTicket = ", ticketSOrdered='$ticketSOrdered'"; $ticketAssign = 'Jolene'; break;
	case 'Received': $ticketSReceived = $date_mod; $updtDataTicket = ", ticketSReceived='$ticketSReceived'"; break;
	case 'Installed': $ticketSInstalled = $date_mod; $updtDataTicket = ", ticketSInstalled='$ticketSInstalled'"; break;
	case 'Paid': $ticketSPaid = $date_mod; $updtDataTicket = ", ticketSPaid='$ticketSPaid'"; $ticketAssign = 'Angi'; break;
    case 'Complete': $ticketSComplete = $date_mod;$updtDataTicket = ", ticketSComplete='$ticketSComplete'"; $ticketAssign = 'Karla '; break;
    case 'Unscheduled': $ticketAssign = 'Jolene'; break;
    case 'Needs Measured': $ticketAssign = 'Brent '; break;
	case 'Proposal Given': $ticketSProposalGiven = $date_mod; $updtDataTicket = ", ticketSProposalGiven='$ticketSProposalGiven'"; break;
    case 'Incomplete': $ticketSIncomplete = $date_mod; $updtDataTicket = ", ticketSIncomplete='$ticketSIncomplete'";  $ticketAssign = 'Brent '; break;
    case 'Pending Wrap': $ticketSPending = $date_mod; $updtDataTicket = ", ticketSPending='$ticketSPending'"; $ticketAssign = 'Brent '; break;
    case 'Scheduled to Install': $ticketSScheduled = $date_mod; $updtDataTicket = ", ticketSScheduled='$ticketSScheduled'"; break;
	default: $updtDataTicket = ''; break;


}



$sql_query = "UPDATE customerTickets SET ticketStatus = '$ticketStatus' $updtDataTicket WHERE ticketID = '$ticketID'";
$result = mysql_query($sql_query);

echo $ticketSComplete;
?>