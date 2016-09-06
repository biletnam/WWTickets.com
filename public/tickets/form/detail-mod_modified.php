<? $root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once("$private/config.php");

$permissions = 4;

 // error_reporting(E_ALL);
 // ini_set('display_errors', 1);

	$ticketOrdDate = date('Y-m-d',strtotime($_POST['ticketOrdDate']));
	$ticketDateM = date('Y-m-d',strtotime($_POST['ticketDateM']));
	$ticketColum = date('Y-m-d',strtotime($_POST['ticketColum']));
	$ticketInstall = date('Y-m-d',strtotime($_POST['ticketInstall']));
	$leadTestEmpDate = date('Y-m-d',strtotime($_POST['leadTestEmpDate']));
	$testDate = date('Y-m-d',strtotime($_POST['testDate']));
	$pamDate = date('Y-m-d',strtotime($_POST['pamDate']));
	$renoDate = date('Y-m-d',strtotime($_POST['renoDate']));
	$paidDate = date('Y-m-d',strtotime($_POST['paidDate']));
	$diyOrdered = date('Y-m-d',strtotime($_POST['diyOrdered']));
	$diyReceived = date('Y-m-d',strtotime($_POST['diyReceived']));
	$diyDate = date('Y-m-d',strtotime($_POST['diyDate']));
	$appDate = date('Y-m-d',strtotime($_POST['appDate']));
	$dateInstalled = date('Y-m-d',strtotime($_POST['dateInstalled']));
	$finalDate = date('Y-m-d',strtotime($_POST['finalDate']));
	$ticketOrdDate = date('Y-m-d',strtotime($_POST['ticketOrdDate']));
	$soldDate = date('Y-m-d',strtotime($_POST['soldDate']));
	$downDate = date('Y-m-d',strtotime($_POST['downDate']));
	$date_mod = date('Y-m-d');
	$month = date('F');
	$year = date('Y');

// Verify login
include_once("$root/lc.php");

$formDate = date('Y-m-d');


$post_request = ("select city_name,city_zip FROM cities WHERE city_name = '$ticketCity'");
$post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");

while ($post_row = mysql_fetch_array($post_result)) { 
	
	$ticketZip = $post_row['city_zip'];	
}


if ($propertyType == 'Single Property') {
	
		$tsCity_request = ("SELECT custID,custCity,custState,custZip,custBillAdd FROM customerInfo WHERE custID = '$custID'");
		$tsCity_result = mysql_query ($tsCity_request,$db) or die ("Query failed: $tsCity_request");
		
		while ($tsCity_row = mysql_fetch_array($tsCity_result)) { 
			extract($tsCity_row);
			$ticketCity = $custCity;
			$ticketState = $custState;
			$ticketZip = $custZip;
			$ticketAddress = $custBillAdd;	
		}

		// Take the address in a variable
		// $address = "403 South 1st Street, Norfolk NE 68701";
		$address = $ticketAddress.", ".$ticketCity. " ".$ticketState." ".$ticketZip;

		 
		// Replace the empty spaces in the address with + sign
		// + Sign is the concatanation/separation character used by google map service
		$address = str_replace(" ", "+", $address);
		 
		$address_url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $address_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$response = curl_exec($ch);
		curl_close($ch);
		 
		$response_a = json_decode($response);
		 
		//Print the Latitude and Longitude of the address
		$lat = $response_a->results[0]->geometry->location->lat;
		$long = $response_a->results[0]->geometry->location->lng;
	
}



if ($propertyType == 'Multiple Property') {

/*
    Description : The following code convert the address to co-ordinates using google map api 
    Author: Dnyanesh Pawar, 
    Copyright: Dnyanesh Pawar (http://www.techrecite.com)
    Link: http://www.techrecite.com
    See the GNU General Public License for more details: http://www.creativecommons.org/
*/
 
// Take the address in a variable
// $address = "403 South 1st Street, Norfolk NE 68701";
$address = $ticketAddress.", ".$ticketCity. " ".$ticketState." ".$ticketZip;
 
// Replace the empty spaces in the address with + sign
// + Sign is the concatanation/separation character used by google map service
$address = str_replace(" ", "+", $address);
 
$address_url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $address_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$response = curl_exec($ch);
curl_close($ch);
 
$response_a = json_decode($response);
 
//Print the Latitude and Longitude of the address
$lat = $response_a->results[0]->geometry->location->lat;
$long = $response_a->results[0]->geometry->location->lng;

}




// update database with new info





	if ($type == 'new') {

switch ($ticketStatus) {
	case 'Sold': $ticketSSold = $date_mod; break;
	case 'Ordered': $ticketSOrdered = $date_mod; $ticketAssign = 'hailey'; break;
	case 'Received': $ticketSReceived = $date_mod; break;
	case 'Installed': $ticketSInstalled = $date_mod; break;
	case 'Invoiced': $ticketSInvoiced = $date_mod; $ticketAssign = 'karla'; break;
	case 'Paid': $ticketSPaid = $date_mod; $ticketAssign = 'angi'; break;
	case 'Complete'; $ticketAssign = 'karla'; break;
	case 'Unscheduled'; $ticketAssign = 'hailey'; break;
	case 'Needs Measured'; $ticketAssign = 'brent'; break;
	case 'Proposal Given': $ticketSProposalGiven = $date_mod; break;
	case 'Incomplete'; $ticketSIncomplete = $date_mod;  $ticketAssign = 'brent'; break;
	case 'Pending Wrap'; $ticketSPending = $date_mod; $ticketAssign = 'brent'; break;
	default: $updtDataTicket = ''; break;
}		

		$sql_query = "INSERT INTO customerTickets (ticketCustID,propertyType,ticketAddress,ticketSecAddress,ticketCity,ticketState,ticketZip,ticketPO,ticketStatus,ticketDate, ticketType, ticketFinance, homeYear, leadTest,leadTestEmp,leadTestEmpDate, financeStatus, pamfill,pamEmpfill,pamDate, testKit,testKitEmp,testDate, reno,renoEmp,renoDate, wrap, wrapStatus, wrapColor, ticketRelation, jobLadder, wrapDetails, ticketOrdDate, ticketCOL, ticketNORF,ticketSUX, ticketMI, ticketColum, ticketInstall, ticketMIOrd, ticketAMI, ticketAMIFO, paidDate, jobName,diyOrdered,diyReceived,diyDate, checkStatus,ticketMonth,ticketYear,ticketAssign,ticketLat,ticketLong,jobProduct, dateInstalled, ticketcolMI, ticketcolMIoOrd, ticketcolAMI, ticketcolAMIFO, paymentMethod, downDate, finalPayment, finalDate, paymentNotes,downPayment,paymentReceived,yardSign,certCompletion,otherWrapColor,ticketsHot,ticketLocation,soldDate,ticketSSold,ticketSOrdered,ticketSReceived,ticketSInstalled,ticketSInvoiced,ticketSPaid,ticketSProposalGiven,ticketSIncomplete,ticketSPending) ";
		$sql_query .= "VALUES ('$custID','$propertyType','$ticketAddress', '$ticketSecAddress', '$ticketCity', '$ticketState', '$ticketZip','$ticketPO','$ticketStatus','$date_mod', '$ticketType', '$ticketFinance', '$homeYear', '$leadTest', '$initials','$formDate','$financeStatus','$pamfill','$pamEmpfill','$pamDate','$testKit','$testKitEmp','$testDate', '$reno', '$renoEmp','$renoDate', '$wrap', '$wrapStatus', '$wrapColor','$ticketRelation', '$jobLadder', '$wrapDetails', '$ticketOrdDate', '$ticketCOL', '$ticketNORF','$ticketSUX', '$ticketMI', '$ticketColum', '$ticketInstall', '$ticketMIOrd', '$ticketAMI', '$ticketAMIFO', '$paidDate', '$jobName','$diyOrdered','$diyReceived','$diyDate','$checkStatus','$month','$year','$ticketAssign','$lat','$long','$jobProduct','$dateInstalled','$ticketcolMI','$ticketcolMIOrd','$ticketcolAMI','$ticketcolAMIFO','$paymentMethod','$downDate','$finalPayment','$finalDate','$paymentNotes','$downPayment','$paymentReceived','$yardSign','$certCompletion','$otherWrapColor','$ticketsHot','$ticketLocation','$soldDate','$ticketSSold','$ticketSOrdered','$ticketSReceived','$ticketSInstalled','$ticketSInvoiced','$ticketSPaid','$ticketSProposalGiven','$ticketSIncomplete','$ticketSPending');";

	}


	elseif ($type == 'edit'){


switch ($ticketStatus) {

	case 'Sold': $ticketSSold = $date_mod; $ticketSSold = ", ticketSSold='$ticketSSold'"; break;
	case 'Ordered': $ticketSOrdered = $date_mod; $ticketSOrdered = ", ticketSOrdered='$ticketSOrdered'"; $ticketAssign = 'hailey'; break;
	case 'Received': $ticketSReceived = $date_mod; $ticketSReceived = ", ticketSReceived='$ticketSReceived'"; break;
	case 'Installed': $ticketSInstalled = $date_mod; $ticketSInstalled = ", ticketSInstalled='$ticketSInstalled'"; break;
	case 'Invoiced': $ticketSInvoiced = $date_mod; $ticketSInvoiced = ", ticketSInvoiced='$ticketSInvoiced'"; $ticketAssign = 'karla'; break;
	case 'Paid': $ticketSPaid = $date_mod; $ticketSPaid = ", ticketSPaid='$ticketSPaid'"; $ticketAssign = 'angi'; break;
	case 'Complete'; $ticketAssign = 'karla'; break;
	case 'Unscheduled'; $ticketAssign = 'hailey'; break;
	case 'Needs Measured'; $ticketAssign = 'brent'; break;
	case 'Proposal Given': $ticketSProposalGiven = $date_mod; $ticketSProposalGiven = ", ticketSProposalGiven='$ticketSProposalGiven'"; break;
	case 'Incomplete'; $ticketSIncomplete = $date_mod; $ticketSIncomplete = ", ticketSIncomplete='$ticketSIncomplete'";  $ticketAssign = 'brent'; break;
	case 'Pending Wrap'; $ticketSPending = $date_mod; $ticketSPending = ", ticketSPending='$ticketSPending'"; $ticketAssign = 'brent'; break;
	default: $updtDataTicket = ''; break;

}


	$sql_query = "UPDATE customerTickets SET ticketStatus = '$ticketStatus', propertyType = '$propertyType',ticketAddress = '$ticketAddress', ticketSecAddress = '$ticketSecAddress', ticketCity = '$ticketCity', ticketState = '$ticketState', ticketZip = '$ticketZip', ticketPO='$ticketPO',ticketType = '$ticketType', ticketFinance = '$ticketFinance', homeYear = '$homeYear', leadTest = '$leadTest',leadTestEmp = '$initials', leadTestEmpDate ='$formDate', pamfill = '$pamfill',pamEmpfill = '$pamEmpfill', pamDate ='$pamDate', testKit = '$testKit',testKitEmp = '$testKitEmp', testDate ='$testDate', reno = '$reno',renoEmp = '$renoEmp', renoDate ='$renoDate', wrap = '$wrap', wrapStatus = '$wrapStatus',ticketRelation = '$ticketRelation', wrapColor = '$wrapColor', jobLadder = '$jobLadder', wrapDetails = '$wrapDetails', ticketOrdDate = '$ticketOrdDate', ticketCOL = '$ticketCOL', ticketNORF = '$ticketNORF',ticketSUX = '$ticketSUX', ticketMI = '$ticketMI', ticketColum = '$ticketColum', jobName='$jobName',diyOrdered='$diyOrdered',diyReceived = '$diyReceived',diyDate='$diyDate',ticketInstall = '$ticketInstall', ticketMIOrd = '$ticketMIOrd', ticketAMI = '$ticketAMI', ticketAMIFO = '$ticketAMIFO', paidDate = '$paidDate', checkStatus = '$checkStatus', ticketAssign = '$ticketAssign',financeStatus='$financeStatus', ticketLat='$ticketLat',ticketLong='$ticketLong',jobProduct = '$jobProduct',downPayment = '$downPayment', dateInstalled = '$dateInstalled', ticketcolMI = '$ticketcolMI', ticketcolMIoOrd = '$ticketcolMIOrd', ticketcolAMI = '$ticketcolAMI', ticketcolAMIFO = '$ticketcolAMIFO', paymentMethod = '$paymentMethod', downDate = '$downDate', finalPayment = '$finalPayment',ticketLat='$lat',ticketLong = '$long', finalDate = '$finalDate', paymentNotes = '$paymentNotes',paymentReceived='$paymentReceived',yardSign = '$yardSign',certCompletion='$certCompletion', otherWrapColor = '$otherWrapColor',ticketsHot = '$ticketsHot',ticketLocation='$ticketLocation',soldDate='$soldDate' $updtDataTicket WHERE ticketID = '$ticketID'";

	}

	$result = mysql_query($sql_query);

	if ($type == 'new') {$ticketID = mysql_insert_id(); 

		// Insert warranty record into warrantyTransferTable
		$newShow = '0';

		$warranty_query = "INSERT INTO warrantyTransfer (ticketID,custID,newShow) ";
		$warranty_query .= "VALUES ('$ticketID','$custID','$newShow');";
		$warranty_result = mysql_query($warranty_query);


		$attachment_query = "INSERT INTO ticketAttachments (ticketID) ";
		$attachment_query .= "VALUES ('$ticketID');";
		$attach_result = mysql_query($attachment_query);

	}


if ($submit == 'Save Changes' && $ticketStatus == 'Invoiced') {

	if ($appSent == 'Yes') {
		header("Location: /tickets/ticket_view.php?ticketID=$ticketID&custID=$custID"); 
	}
	else{
	header("Location: /tickets/form/customer_appreciation.php?ticketID=$ticketID&custID=$custID");
	}
	
}


if ($submit == 'Save Changes') {
		header("Location: /tickets/ticket_view.php?ticketID=$ticketID&custID=$custID"); 
}
if ($submit == 'Save and Continue Editing') {
		header("Location: /tickets/ticket_edit.php?ticketID=$ticketID&custID=$custID"); 
}
	



?>
