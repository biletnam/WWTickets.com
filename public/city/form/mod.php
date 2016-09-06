<? $root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once("$private/config.php");

$permissions = 4;

 //error_reporting(E_ALL);
 //ini_set('display_errors', 1);



// Verify login
include_once("$root/lc.php");
	

// Public functions
function createSlug($str) {
	$nonos = Array('-----','----','---','--',',','"',"'");
	$str = urldecode($str);
	$str = preg_replace("/[^a-zA-Z0-9 -_]/", "", $str);
	$str = str_replace('&','-',$str);
	$str = trim($str);
	$str = str_replace(' ','-',$str);
	$str = str_replace($nonos,'-',$str);
	$str = strtolower($str);
	return $str;
}


// page slug
if(!$slug) $slug = createSlug($city_name);
else $slug = createSlug($slug);





// update database with new info
	$date_mod = date("Y-m-d");

	if ($type == 'new') {

		$sql_query = "INSERT INTO cities (city_name, city_slug, city_state, city_zip) ";
		$sql_query .= "VALUES ('$city_name', '$slug', '$city_state', '$city_zip');";

	}

	elseif ($type == 'edit'){

	$sql_query = "UPDATE cities SET city_name = '$city_name', city_slug = '$slug', city_state = '$city_state', city_zip = '$city_zip' WHERE city_id = '$city_id'";

	}

	$result = mysql_query($sql_query);

	if ($type == 'new') { $sinID = mysql_insert_id(); }

if($submit == "Save Changes") header("Location: /city/index.php"); 
else {
	$referer = $_SERVER['HTTP_REFERER'];
	header("Location: $referer");
}

?>
