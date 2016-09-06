<? $root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once("$private/config.php");

$permissions = 4;

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// Verify login
include_once("$root/lc.php");

$usertype = 'Administrator';
	
// update database with new info
	$date_mod = date("Y-m-d H:i:s",strtotime("-1 hour"));

	if ($type == 'new') {

		$sql_query = "INSERT INTO cmsUsers (firstName, username, lastName, password, usertype, initials, dateLogin,userLevel,userAssignType,userLocation) ";
		$sql_query .= "VALUES ('$viewfirstName', '$viewusername', '$viewlastName', '$viewpassword', '$usertype','$viewinitials', '$date_mod','$viewuserLevel','$viewuserAssignType','$viewuserLocation');";

	}

	elseif ($type == 'edit'){

	$sql_query = "UPDATE cmsUsers SET firstName = '$viewfirstName', username = '$viewusername', lastName = '$viewlastName', password = '$viewpassword', initials = '$viewinitials',userLevel = '$viewuserLevel',userAssignType='$viewuserAssignType',userLocation='$viewuserLocation' WHERE ID = '$userID'";

	}

	$result = mysql_query($sql_query);

	if ($type == 'new') {$userID = mysql_insert_id(); }

if($submit == "Save Changes") header("Location: /users/"); 
else {
	$referer = $_SERVER['HTTP_REFERER'];
	header("Location: /users/user_edit.php?userID=$userID");
}

?>
