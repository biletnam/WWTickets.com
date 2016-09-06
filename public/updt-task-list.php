<? $root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once("$private/config.php");

$permissions = 4;

// Verify login
include_once("$root/lc.php");

				$tsCity_request = ("SELECT taskID,taskticketID FROM ticketTask");
				$tsCity_result = mysql_query ($tsCity_request,$db) or die ("Query failed: $tsCity_request");
				
				while ($tsCity_row = mysql_fetch_array($tsCity_result)) { 
					extract($tsCity_row);
			
						$post_request = ("SELECT ticketID,ticketCustID FROM customerTickets WHERE ticketID = '$taskticketID' ");
						$post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
						
						while ($post_row = mysql_fetch_array($post_result)) { 
							extract($post_row);
							$taskCust = $ticketCustID;
						}
			
					$sql_query = "UPDATE ticketTask SET taskCust = '$taskCust' WHERE taskticketID = '$taskticketID'";
					$result = mysql_query($sql_query);

				}

?>