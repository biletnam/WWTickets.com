<? $root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once("$private/config.php");

$permissions = 4;

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// Verify login
include_once("$root/lc.php");
	
// update database with new info



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



	if ($type == 'new') {

		$sql_query = "INSERT INTO customerLocations (custLocID,locationName, locationAddress, locationCity, locationState, locationZip) ";
		$sql_query .= "VALUES ('$custLocID','$locationName', '$locationAddress', '$locationCity', '$locationState', '$locationZip');";

	}

	elseif ($type == 'edit'){

	$sql_query = "UPDATE customerLocations SET custLocID = '$custLocID',locationName = '$locationName', locationAddress = '$locationAddress', locationCity = '$locationCity', locationState = '$locationState', locationZip = '$locationZip' WHERE locationID = '$locationID'";

	}

	$result = mysql_query($sql_query,$db);

	$custID = $custLocID;


header("Location: /customers/cust_view.php?ID=$custID"); 


?>
