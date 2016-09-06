<? $root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once("$private/config.php");

$permissions = 4;

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
$taskDate = date('Y-m-d',strtotime($_POST['taskDate']));
$completeBy = date('Y-m-d',strtotime($_POST['completeBy']));


// Verify login
include_once("$root/lc.php");
	
// update database with new info
	$date_mod = date("Y-m-d H:i:s",strtotime("-1 hour"));

	if ($type == 'new') {

		$sql_query = "INSERT INTO ticketTask (taskCust,taskEmp, taskNotes, taskDate, taskStatus, createdBy, ticketRedFlag,completeBy) ";
		$sql_query .= "VALUES ('$custID', '$taskEmp', '$taskNotes','$taskDate', '$taskStatus', '$createdBy', '$ticketRedFlag','$completeBy');";

	}

	elseif ($type == 'edit'){

	$sql_query = "UPDATE ticketTask SET taskEmp = '$taskEmp', taskDate = '$taskDate', taskNotes = '$taskNotes', taskStatus = '$taskStatus',createdBy = '$createdBy', ticketRedFlag = '$ticketRedFlag',completeBy = '$completeBy' WHERE taskID = '$taskID'";

	}

	$result = mysql_query($sql_query);


if($submit == "Save Changes") header("Location: /customers/cust_view.php?ID=$custID"); 
else {
	$referer = $_SERVER['HTTP_REFERER'];
	header("Location: $referer");
}

?>