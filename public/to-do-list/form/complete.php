<? $root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once("$private/config.php");

$permissions = 4;

 //error_reporting(E_ALL);
 //ini_set('display_errors', 1);


// Verify login
include_once("$root/lc.php");
	

		$listID=$_GET['listID'];

		$listStatus = 'Complete';

		$sql_query = "UPDATE listToDo SET listStatus = '$listStatus' WHERE listID = '$listID'";
		$result = mysql_query($sql_query);


		header("Location: /to-do-list/index.php");


?>