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
	$refMonth = date("F");
	$refYear = date("Y");


// echo $isReferral;
// echo "<br/>";
// echo $refFName;
// echo "<br/>";
// echo $refLName;
// die();
// $city_request = ("select city_name,city_zip FROM cities WHERE city_name = '$custCity'");
// $city_result = mysql_query ($city_request,$db) or die ("Query failed: $city_request");

// while ($city_row = mysql_fetch_array($city_result)) { 
	
// 	$firstcustZip = $city_row['city_zip'];	
// }


// $zip_request = ("select city_name,city_zip FROM cities WHERE city_zip = '$custZip'");
// $zip_result = mysql_query ($zip_request,$db) or die ("Query failed: $zip_request");

// while ($zip_row = mysql_fetch_array($zip_result)) { 
	
// 	$custCity = $zip_row['city_name']; 
// }

// if ($custZip != $firstcustZip) {$firstcustZip = $custZip; }

	// Update if new
	if ($type == 'new') {

		if ($isReferral == 'Yes'){
			$ref_query = "INSERT INTO referralTable (refFname, refLName, refMonth, refYear,refCustFName,refCustLName) VALUES ('$refFName', '$refLName', '$refMonth', '$refYear','$custFName','$custLName');";
			$result = mysql_query($ref_query,$db);
			$refID = mysql_insert_id();

			$email2 = 'karla@windowworldnen.com';
			$email = 'webdesign@powerpgs.com';
				$subject = 'Window World Ticket System - New Refferal Added';
				$message = 'Referral Name:      '.$refFName.' '.$refLName.'
Month/Year:         '.$refMonth.' '.$refYear.'
Customer Name:      '.$custFName.' '.$custLName.'
				';
#Address:			'.$custBillAdd.' '.$custCity.' '.$custState.' '.$custZip.'

				mail($email, $subject, $message, "From: $refFName <$email>\nReply-To: $email\nReturn-Path: $email\nX-Mailer: PHP/" . phpversion());
				mail($email2, $subject, $message, "From: $refFName <$email>\nReply-To: $email\nReturn-Path: $email\nX-Mailer: PHP/" . phpversion());

			$referralFilled = '1';
		}

		if (!empty($marketingSold)) {
			$marketRefOne = date("F");
			$marketRefTwo = date("Y");
			$marketReferred = '1';
		}

		$sql_query = "INSERT INTO customerInfo (custFName, custLName, custComp, custBillAdd, custSecAdd, custCity, custState, custZip, custPhone, custFax, custMobile, custWork, custEmail, custEmail2, custPrimaryF, custPrimPhone, custRank, custNotes,storeID,referralType,isReferral,refferalFName,refferalLName,marketingSold,dateCreated,referralFilled,marketRefOne,marketRefTwo,marketReferred) ";
		$sql_query .= "VALUES ('$custFName', '$custLName', '$custComp', '$custBillAdd', '$custSecAdd', '$custCity', '$custState', '$custZip', '$custPhone', '$custFax', '$custMobile', '$custWork', '$custEmail', '$custEmail2', '$custPrimaryF', '$custPrimPhone', '$custRank', '$custNotes','$storeID','$referralType','$isReferral','$refFName','$refLName','$marketingSold','$date_mod','$referralFilled','$marketRefOne','$marketRefTwo','$marketReferred');";
		}

	// Update if existing
	elseif ($type == 'edit'){
		// Skip if process when new
		if ($referralFilled != '1') {
			$ref_query = "INSERT INTO referralTable (refFname, refLName, refMonth, refYear,refCustFName,refCustLName,refCustLink) VALUES ('$refFName', '$refLName', '$refMonth', '$refYear','$custFName','$custLName','$custID');";
			$result = mysql_query($ref_query,$db);
			$refID = mysql_insert_id();

			$email2 = 'karla@windowworldnen.com';
			$email = 'webdesign@powerpgs.com';
			$subject = 'Window World Ticket System - New Refferal Added';
			$message = 'Referral Name:      '.$refFName.' '.$refLName.'
Month/Year:         '.$refMonth.' '.$refYear.'
Customer Name:      '.$custFName.' '.$custLName.'
				';
#Address:			'.$custBillAdd.' '.$custCity.' '.$custState.' '.$custZip.'

			mail($email, $subject, $message, "From: $name <$email>\nReply-To: $email\nReturn-Path: $email\nX-Mailer: PHP/" . phpversion());
			mail($email2, $subject, $message, "From: $name <$email>\nReply-To: $email\nReturn-Path: $email\nX-Mailer: PHP/" . phpversion());

			$referralFilled = '1';
		}
		else {

		}

		// Update Database
		if ($marketReferred != '1') {
			if (!empty($marketingSold)) {
				$marketRefOne = date("F");
				$marketRefTwo = date("Y");
				$marketReferred = '1';
			}
		}
		else{

		}

		$sql_query = "UPDATE customerInfo SET custFName = '$custFName', custLName = '$custLName', custComp = '$custComp', custBillAdd = '$custBillAdd', custSecAdd = '$custSecAdd', custCity = '$custCity', custState = '$custState', custZip = '$custZip', custPhone = '$custPhone', custFax = '$custFax', custMobile = '$custMobile', custWork = '$custWork', custEmail = '$custEmail', custEmail2 = '$custEmail2', custPrimaryF = '$custPrimaryF', custPrimPhone = '$custPrimPhone', custRank = '$custRank', custNotes = '$custNotes',storeID = '$storeID',referralType = '$referralType',isReferral='$isReferral',refferalFName='$refFName',refferalLName='$refLName',marketingSold='$marketingSold',referralFilled='$referralFilled',marketRefOne='$marketRefOne',marketRefTwo='$marketRefTwo',marketReferred='$marketReferred' WHERE custID = '$custID'";

	}

$result = mysql_query($sql_query,$db);
if ($type == 'new') {
	$custID = mysql_insert_id();
	$ref_query = "UPDATE referralTable SET refCustLink = '$custID' WHERE refID = '$refID'";
	$result = mysql_query($ref_query,$db);
}
$result = mysql_query($sql_query,$secdb);




header("Location: /customers/cust_view.php?ID=$custID");


?>
