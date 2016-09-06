<? $root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once("$private/config.php");
$permissions = 4;
// Verify login
include_once("$root/lc.php");


$ticketID = $_GET['ticketID'];
$custID = $_GET['custID'];


	$post_request = ("SELECT custEmail FROM customerInfo WHERE custID = '$custID'");
	$post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
	
	while ($post_row = mysql_fetch_array($post_result)) { 
		extract($post_row);
		$email = $custEmail;	
	}

	// send room inserted
	ob_start();
	include("$root/tickets/send-letter-html.php");
	$message = ob_get_clean();
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	mail($email, 'Your Windows Have Been Ordered!', $message, "From: Window World of Northeast Nebraska <office@windowworldnen.com>\nX-Mailer: PHP/" . phpversion()."\r\n$headers");


$prepLetter = 'Yes';
$prepSent = date('Y-m-d');

$sql_query = "UPDATE customerTickets SET prepLetter='$prepLetter',prepSent='$prepSent' WHERE ticketID='$ticketID'";
$result = mysql_query($sql_query) or die(mysql_error());

header("Location: /tickets/ticket_view.php?ticketID=$ticketID&custID=$custID"); 
//3678830
?>