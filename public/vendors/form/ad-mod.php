<? $root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once("$private/config.php");

$permissions = 4;

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
	$adstartContract = date('Y-m-d',strtotime($_POST['adstartContract']));
	$adendContract = date('Y-m-d',strtotime($_POST['adendContract']));
	$adRenewal = date('Y-m-d',strtotime($_POST['adRenewal']));

// Verify login
include_once("$root/lc.php");
	
// update database with new info
	$date_mod = date("Y-m-d H:i:s",strtotime("-1 hour"));

	if ($type == 'new') {

		$adVendorID = $vendorID;

		$sql_query = "INSERT INTO VendorAds (adVendorID,adName, adLocation, adPrice, adPayment, adstartContract, adendContract, adRenewal, adNotes) ";
		$sql_query .= "VALUES ('$adVendorID','$adName', '$adLocation', '$adPrice', '$adPayment', '$adstartContract', '$adendContract', '$adRenewal', '$adNotes');";

	}

	elseif ($type == 'edit'){

	$sql_query = "UPDATE VendorAds SET adName = '$adName', adLocation = '$adLocation', adPrice = '$adPrice', adPayment = '$adPayment', adstartContract = '$adstartContract', adendContract = '$adendContract', adRenewal = '$adRenewal', adNotes = '$adNotes' WHERE adID = '$adID'";

	}

	$result = mysql_query($sql_query);

	if ($type == 'new') {$adID = mysql_insert_id(); }

if($submit == "Save Changes") header("Location: /vendors/ad-view.php?adID=$adID&vendorID=$vendorID"); 
else {
	$referer = $_SERVER['HTTP_REFERER'];
	header("Location: $referer");
}

?>