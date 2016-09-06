<? $root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once("$private/config.php");

$permissions = 4;

// Verify login
include_once("$root/lc.php");

 // error_reporting(E_ALL);
 // ini_set('display_errors', 1);


	$type=$_POST['type'];
	$listAssign=$_POST['listAssign'];
	$listDate = date('Y-m-d',strtotime($_POST['listDate']));
	$listTitle = htmlspecialchars($_POST['listTitle']);
	$listDetails = htmlspecialchars($_POST['listDetails']);


		$listID=$_POST['listID'];
		$sql_query = "UPDATE listToDo SET listTitle = '$listTitle',listAssign='$listAssign',listDate = '$listDate', listDetails = '$listDetails' WHERE listID = '$listID'";
		$result = mysql_query($sql_query);
		header("Location: /to-do-list/"); 


?>