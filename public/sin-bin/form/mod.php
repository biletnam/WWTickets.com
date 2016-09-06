<? $root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once("$private/config.php");

$permissions = 4;

 //error_reporting(E_ALL);
 //ini_set('display_errors', 1);


	$sinDate = date('Y-m-d',strtotime($_POST['sinDate']));

// Verify login
include_once("$root/lc.php");
	
// update database with new info
	$date_mod = date("Y-m-d");

	if ($type == 'new') {

		$sql_query = "INSERT INTO sinBin (sinName,sinQty, sinModel, sinSize, sinInterior, sinExterior, sinGrid, sinSerial, sinNail, sinPrice, sinDonated, sinDate) ";
		$sql_query .= "VALUES ('$sinName','$sinQty', '$sinModel', '$sinSize', '$sinInterior', '$sinExterior', '$sinGrid', '$sinSerial', '$sinNail', '$sinPrice', '$sinDonated', '$date_mod');";

	}

	elseif ($type == 'edit'){

	$sql_query = "UPDATE sinBin SET sinName = '$sinName',sinQty='$sinQty', sinModel = '$sinModel', sinSize = '$sinSize', sinInterior = '$sinInterior', sinExterior = '$sinExterior', sinGrid = '$sinGrid', sinSerial = '$sinSerial', sinNail = '$sinNail', sinPrice = '$sinPrice', sinDonated = '$sinDonated', sinDate = '$sinDate' WHERE sinID = '$sinID'";

	}

	$result = mysql_query($sql_query);

	if ($type == 'new') { $sinID = mysql_insert_id(); }

if($submit == "Save Changes") header("Location: /sin-bin/view.php?ID=$sinID"); 
else {
	$referer = $_SERVER['HTTP_REFERER'];
	header("Location: $referer");
}

?>
