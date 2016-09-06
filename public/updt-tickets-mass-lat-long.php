<? $root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once("$private/config.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);
$permissions = 4;

// Verify login
include_once("$root/lc.php");

	$date_mod = date('Y-m-d');

	$post_request = ("SELECT ticketID,ticketCustID,propertyType,ticketAddress,ticketCity,ticketState,ticketZip,ticketStatus,ticketAssign,ticketLocation,ticketCustID,ticketStatus,jobProduct,ticketLat FROM customerTickets");
	$post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
	
	while ($post_row = mysql_fetch_array($post_result)) { 
		extract($post_row);	


if (empty($ticketLat)) {


if ($propertyType == 'Multiple Property') {


$city_request = ("select city_name,city_zip FROM cities WHERE city_name = '$ticketCity'");
$city_result = mysql_query ($city_request,$db) or die ("Query failed: $city_request");

while ($city_row = mysql_fetch_array($city_result)) { 
	$ticketZip = $city_row['city_zip'];	
}



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



if ($propertyType == 'Single Property') {
	
		$tsCity_request = ("SELECT custID,custCity,custState,custZip,custBillAdd FROM customerInfo WHERE custID = '$ticketCustID'");
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
		$propertyType = 'Single Property';

		$ticketCity = stripslashes($ticketCity);

}





switch ($ticketStatus) {

	case 'Sold': $ticketSSold = $date_mod; $updtDataTicket = ", ticketSSold='$ticketSSold'"; break;
	case 'Ordered': $ticketSOrdered = $date_mod; $updtDataTicket = ", ticketSOrdered='$ticketSOrdered'"; $ticketAssign = 'Hailey'; break;
	case 'Received': $ticketSReceived = $date_mod; $updtDataTicket = ", ticketSReceived='$ticketSReceived'"; break;
	case 'Installed': $ticketSInstalled = $date_mod; $updtDataTicket = ", ticketSInstalled='$ticketSInstalled'"; break;
	case 'Paid': $ticketSPaid = $date_mod; $updtDataTicket = ", ticketSPaid='$ticketSPaid'"; $ticketAssign = 'Angi'; break;
	case 'Complete'; $ticketAssign = 'Karla '; break;
	case 'Unscheduled'; $ticketAssign = 'Hailey'; break;
	case 'Needs Measured'; $ticketAssign = 'Brent '; break;
	case 'Proposal Given': $ticketSProposalGiven = $date_mod; $updtDataTicket = ", ticketSProposalGiven='$ticketSProposalGiven'"; break;
	case 'Incomplete'; $ticketSIncomplete = $date_mod; $updtDataTicket = ", ticketSIncomplete='$ticketSIncomplete'";  $ticketAssign = 'Brent '; break;
	case 'Pending Wrap'; $ticketSPending = $date_mod; $updtDataTicket = ", ticketSPending='$ticketSPending'"; $ticketAssign = 'Brent '; break;
	case 'Scheduled to Install'; $ticketSScheduled = $date_mod; $updtDataTicket = ", ticketSScheduled='$ticketSScheduled'"; break;
	default: $updtDataTicket = ''; break;


}

if ($ticketStatus == 'Need to Order') {
	switch ($jobProduct) {
		case 'Windows': $ticketAssign = 'Karla '; break;
		case 'Window Door Repair'; $ticketAssign = 'Angi'; break;
	}
}






// $ticketCity = str_replace("'", "\'", $ticketCity);
 	$sql_query = "UPDATE customerTickets SET  ticketAddress = '$ticketAddress', ticketSecAddress = '$ticketSecAddress', ticketCity = '$ticketCity', ticketState = '$ticketState', ticketZip = '$ticketZip',ticketAssign = '$ticketAssign',ticketLat='$lat',ticketLong = '$long' WHERE ticketID = '$ticketID'";

// 	}

$result = mysql_query($sql_query);

echo $ticketID;echo" | ";$ticketAssign;echo" | ";echo $address;echo" | ";echo $lat;echo " | ";echo $long;echo " | ";echo $ticketStatus;echo " <br/>";

//echo "Success";echo "<br/>";



		//$sql_query = "UPDATE customerTickets SET ticketCity = '$ticketCity' WHERE ticketID = '$ticketID'";


	//$result = mysql_query($sql_query);

	}

}



 ?>