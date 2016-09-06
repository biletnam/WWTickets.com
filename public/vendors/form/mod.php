<? $root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once("$private/config.php");

$permissions = 4;

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// Verify login
include_once("$root/lc.php");
	
// update database with new info
	$date_mod = date("Y-m-d H:i:s",strtotime("-1 hour"));

	if ($type == 'new') {

		$sql_query = "INSERT INTO Vendors (vendorName, vendorType, vendorFax, vendorContact, vendorEmail, vendorPhone, vendorNotes) ";
		$sql_query .= "VALUES ('$vendorName', '$vendorType', '$vendorFax', '$vendorContact', '$vendorEmail', '$vendorPhone', '$vendorNotes');";

	}

	elseif ($type == 'edit'){

	$sql_query = "UPDATE Vendors SET vendorName = '$vendorName', vendorType = '$vendorType', vendorFax = '$vendorFax', vendorContact = '$vendorContact', vendorEmail = '$vendorEmail', vendorPhone = '$vendorPhone', vendorNotes = '$vendorNotes' WHERE vendorID = '$vendorID'";

	}

	$result = mysql_query($sql_query);

	if ($type == 'new') {$vendorID = mysql_insert_id(); }

if($submit == "Save Changes") header("Location: /vendors/view.php?vendorID=$vendorID"); 
else {
	$referer = $_SERVER['HTTP_REFERER'];
	header("Location: $referer");
}

?>