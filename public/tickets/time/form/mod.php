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

		$sql_query = "INSERT INTO ticketTimes (ticketID,empID, timeDate, timeTime, timeNotes) ";
		$sql_query .= "VALUES ('$ticketID', '$empID', '$timeDate', '$timeTime', '$timeNotes');";

	}

	elseif ($type == 'edit'){

	$sql_query = "UPDATE ticketTimes SET empID = '$empID', timeDate = '$timeDate', timeTime = '$timeTime', timeNotes = '$timeNotes' WHERE timeID = '$timeID'";

	}

	$result = mysql_query($sql_query);

if($submit == "Save Changes") header("Location: /tickets/ticket_view.php?ticketID=$ticketID&custID=$custID"); 
else {
	$referer = $_SERVER['HTTP_REFERER'];
	header("Location: $referer");
}

?>
