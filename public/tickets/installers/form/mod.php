<? $root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once("$private/config.php");

$permissions = 4;

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
$timeDate = date('Y-m-d',strtotime($_POST['timeDate']));


// Verify login
include_once("$root/lc.php");
	
// update database with new info
	$date_mod = date("Y-m-d H:i:s",strtotime("-1 hour"));

	if ($type == 'new') {

		$sql_query = "INSERT INTO ticketInstallers (ticketID,installerName, installerType, installerNum) ";
		$sql_query .= "VALUES ('$ticketID', '$installerName', '$installerType', '$installerNum');";

	}

	elseif ($type == 'edit'){

	$sql_query = "UPDATE ticketInstallers SET installerName = '$installerName', installerType = '$installerType', installerNum = '$installerNum' WHERE installerID = '$installerID'";

	}

	$result = mysql_query($sql_query);

if($submit == "Save Changes") header("Location: /tickets/ticket_view.php?ticketID=$ticketID&custID=$custID"); 
else {
	$referer = $_SERVER['HTTP_REFERER'];
	header("Location: $referer");
}

?>