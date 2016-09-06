<? $root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once("$private/config.php");

$permissions = 4;

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
$timeID = $_GET['timeID'];
$ticketID = $_GET['ticketID'];
$custID = $_GET['custID'];
// Verify login
include_once("$root/lc.php");

mysql_query("DELETE from ticketTimes where timeID= '$timeID'") or die(mysql_error()); 
  
header("Location: /tickets/ticket_view.php?ticketID=$ticketID&custID=$custID"); 

?>
