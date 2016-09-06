<? $root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once("$private/config.php");

$permissions = 4;

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
$locationID = $_GET['locationID'];
$custID = $_GET['custID'];
// Verify login
include_once("$root/lc.php");

mysql_query("DELETE from customerLocations where locationID= '$locationID'") or die(mysql_error()); 
  
header("Location: /customers/cust_view.php?ID=$custID"); 

?>