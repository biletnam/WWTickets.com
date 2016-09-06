<? $root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once("$private/config.php");

$permissions = 4;

// Verify login
include_once("$root/lc.php");


	$post_request = ("SELECT ticketID,jobProduct FROM customerTickets WHERE jobProduct = 'Window & Door Repair' ");
	$post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
	
	while ($post_row = mysql_fetch_array($post_result)) { 
		extract($post_row);	



		$sql_query = "UPDATE customerTickets SET jobProduct = 'Window Door Repair' WHERE ticketID = '$ticketID'";


	$result = mysql_query($sql_query);

	}




 ?>