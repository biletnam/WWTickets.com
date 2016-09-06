<? $root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once("$private/config.php");

$permissions = 4;

// Verify login
include_once("$root/lc.php");


	$post_request = ("SELECT ticketID,ticketCustID,propertyType,ticketCity FROM customerTickets");
	$post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
	
	while ($post_row = mysql_fetch_array($post_result)) { 
		extract($post_row);	



		if ($propertyType == 'DIY') {
			
				$tsCity_request = ("SELECT custID,custCity FROM customerInfo WHERE custID = '$ticketCustID'");
				$tsCity_result = mysql_query ($tsCity_request,$db) or die ("Query failed: $tsCity_request");
				
				while ($tsCity_row = mysql_fetch_array($tsCity_result)) { 
					extract($tsCity_row);
					$ticketCity = $custCity;	
				}
			
		}





		$sql_query = "UPDATE customerTickets SET ticketCity = '$ticketCity' WHERE ticketID = '$ticketID'";


	$result = mysql_query($sql_query);

	}




 ?>