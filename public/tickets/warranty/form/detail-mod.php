<? $root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once("$private/config.php");

$permissions = 4;

 //error_reporting(E_ALL);
 //ini_set('display_errors', 1);


$warrantyDate = date('Y-m-d',strtotime($_POST['warrantyDate']));


// Verify login
include_once("$root/lc.php");
	
// update database with new info
	$date_mod = date("Y-m-d");


	if ($type == 'new') {

		$sql_query = "INSERT INTO warrantyTransfer (ticketID, custID, newName, newPhone, newEmail, warrantyDate,newNotes) ";
		$sql_query .= "VALUES ('$ticketID', '$custID','$newName', '$newPhone', '$newEmail', '$warrantyDate','$newNotes');";

	}

	elseif ($type == 'edit'){

	$sql_query = "UPDATE warrantyTransfer SET newName = '$newName', newPhone = '$newPhone', newEmail = '$newEmail', warrantyDate = '$warrantyDate', newNotes = '$newNotes', newShow = '1' WHERE warrantyID = '$warrantyID'";

	}

	$result = mysql_query($sql_query);

	// if ($type == 'new') {$ticketID = mysql_insert_id(); }


if($submit == "Save Changes") header("Location: /tickets/ticket_view.php?ticketID=$ticketID&custID=$custID"); 
else {
	$referer = $_SERVER['HTTP_REFERER'];
	header("Location: $referer");
}

?>
