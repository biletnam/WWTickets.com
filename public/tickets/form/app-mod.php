<? $root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once("$private/config.php");

$permissions = 4;

 // error_reporting(E_ALL);
 // ini_set('display_errors', 1);

// Verify login
include_once("$root/lc.php");

// update database with new info
	$date_mod = date("Y-m-d");
	$appDate = date('Y-m-d',strtotime($_POST['appDate']));
	$appLevel = $_POST['appLevel'];
	$appSent = $_POST['appSent'];

	$sql_query = "UPDATE customerTickets SET appLevel='$appLevel',appSent='$appSent',appDate='$appDate' WHERE ticketID = '$ticketID'";
	$result = mysql_query($sql_query);

	if($submit == "Save Changes") header("Location: /tickets/ticket_view.php?ticketID=$ticketID&custID=$custID"); 
	else {
	 	$referer = $_SERVER['HTTP_REFERER'];
	 	header("Location: $referer");
	 }

?>