<? $root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once("$private/config.php");

$permissions = 4;

// Verify login
include_once("$root/lc.php");

  //error_reporting(E_ALL);
 //ini_set('display_errors', 1);

$listStatus = 'Processing';


	//$type=$_POST['type'];
	$listDate = date('Y-m-d',strtotime($_POST['listDate']));
	$listTitle = htmlspecialchars($_POST['listTitle']);
	$listDetails = htmlspecialchars($_POST['listDetails']);
	$listAssign = $_POST['listAssign'];

if ($type == 'new') {


       $sql_query = "INSERT INTO listToDo (listDate,listTitle,listDetails,listStatus,listAssign) VALUES ('$listDate','$listTitle','$listDetails','$listStatus','$listAssign')";

}


else{

	$sql_query = "UPDATE listToDo SET listDate = '$listDate',listAssign='$listAssign',listTitle = '$listTitle',listDetails = '$listDetails',listStatus = '$listStatus'";

}

$result = mysql_query($sql_query) or die(mysql_error());

	header("Location: /to-do-list/");


?>

