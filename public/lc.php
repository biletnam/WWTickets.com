<?  
//include_once($_SERVER['DOCUMENT_ROOT']."/_shared/lc.php"); 

	#######################################################
	## Redirect to WWW
	#######################################################
	$request = $_SERVER['REQUEST_URI'];
	$server = $_SERVER['HTTP_HOST'];

	// Determine page content
	$rURI = $_SERVER['REQUEST_URI'];
	$rURI = str_replace(".htm","",$rURI);
	$rURI = explode("?",$rURI); // divide out query string
	$query_string = $rURI[1];
	$URI = explode("/",$rURI[0]);
	$URI['full'] = rtrim($rURI[0],'/');
	$uri_count = count($URI);
	
	#######################################################
	## Site Variables
	#######################################################
	$tz_diff					= '-1 hour'; // difference between local TZ and host TZ
	$datetime					= date("Y-m-d H:i:s",strtotime($tz_diff));
	$ip_whitelist				= array('98.179.23.180','69.92.89.30','65.116.108.88','67.135.145.252');
	
	function is_admin() {
		global $ip_whitelist;
		if(in_array($_SERVER['REMOTE_ADDR'],$ip_whitelist)) return true;
		else return false;
	}


	#######################################################
	## MySQL Functions
	#######################################################
	// Connect to the databasie
$db = mysql_connect("$dbserver","$dbuser","$dbpass");
	mysql_select_db("$dbname",$db);


	// Query function
	function pwr_query($query,$database=false,$error_reporting=true) {
		global $db;
		if($database === false) $database = $db;
		
		if($error_reporting) $result = mysql_query ($query,$database) or die (query_failed($query,mysql_error()));
		else $result = mysql_query ($query,$database);
		
		$total = mysql_num_rows($result);
		$last_id = mysql_insert_id();
		$error_no = mysql_errno();
		## MySQL ERRORS
		## 1062 - duplicate entry
		
		return array($result,$total,$last_id,$error_no);
	}
	// MySQL query failed function. Prints query and error
	function query_failed($query,$error) {
		if($_SERVER['REMOTE_ADDR'] == '98.168.224.123') {
			echo "<p><b>Error:</b> $error<br /><b>Query:</b> $query</p>";
		}
		else echo "There was a problem connecting to the database. Please <a href=\"mailto:".$contact['email']."\">let us know</a> if you continue to experience problems.";
	}
	

	
	## Website Error List
	############################################
	$errors = array(
		'04' => '<strong>Cookies required</strong> &ndash; It appears that cookies are not enabled on your browser. <br />Please adjust this in your security preferences before continuing.',
		'10' => "You didn't complete the entire form. Please fill in all of the required fields below.",
		'11' => "The date or time you entered appears to be invalid. Please try again.",
		'20' => "A user has already been setup with that e-mail address. Please login using the box to the right or use a different e-mail address.",
		'21' => "A user has already been setup with that e-mail address. Please choose a different e-mail address. <br />If you've forgotten your password, please use our <a href=\"/forgot/\">Forgotten Password Tool</a>.",
		'22' => "That username does not exist. Please feel free to <a href=\"/signup/\">create an account</a>.",
		'23' => "Incorrect login information.",
		'24' => "A business listing with that name already exists. If you've forgotten your password, please use our <a href=\"/forgot/\">Forgotten Password Tool</a>.<br />If you need further assistance in taking ownership of this listing, please e-mail us at <span class=\"cloak\">".$contact['email']."</span>.",
		'25' => "That listing does not exist.",
		'30' => "The password you entered was incorrect. Please try again.",
		'31' => "You must enter the same password twice. Your passwords did not match.",
		'32' => "You must choose a new password in order to change your password.",
		'90' => "The form you submitted has been detected as spam. <br /> You wrote in the box labeled \"DO NOT WRITE IN THIS BOX!\"."
	);


session_start();  // Start Session
header("Cache-control: private"); //IE 6 Fix 

// Get the user's input from the form 
   if ($_POST['username']) $username = $_POST['username']; 
   if ($_POST['password']) $password = $_POST['password'];

// Register session key with the value 
   if ($_POST['username']) $_SESSION['username'] = $username;
   if ($_POST['password']) $_SESSION['password'] = $password; 
 
// Use session variables
	$cms_user = $_SESSION['username'];
	$cms_pass = $_SESSION['password'];

// Connect to the database
$db = mysql_connect("$dbserver","$dbuser","$dbpass");
mysql_select_db("$dbname",$db);

// update last login time
   if ($_POST['username']) {
   	 $datetime = date("Y-m-d H:i:s");
	 mysql_query("UPDATE cmsUsers SET dateLogin= '$datetime' WHERE username='$username'");
   }


// If not logged in, redirect to login page
if(!$_SESSION['username']){ 
    header("Location: /login.php");
} 

// if username exists, check to see if they are a real user
if ($_SESSION['username']) {
	$user_request = ("SELECT * FROM cmsUsers WHERE username='$cms_user' and password='$cms_pass';");
	$user_result = mysql_query ($user_request,$db) or die ("Query failed: $user_request.<br />".mysql_error());
	$verify = mysql_num_rows($user_result);
	while($user_row = mysql_fetch_array($user_result)) {
		$user_type = $user_row["usertype"];
		$cms_user_id = $user_row["ID"];
		$username = $user_row['username'];
		$firstName = $user_row['firstName'];
		$lastName = $user_row['lastName'];
		$initials = $user_row['initials'];
		$_SESSION['userLevel'] = $user_row['userLevel'];
		$_SESSION['userLocation'] = $user_row['userLocation'];
	
	}
}
if ($verify == "0") {
	echo "<p>&nbsp;</p>\n<p style=\"text-align: center\">Invalid login. <a href=\"/login.php\">Try Again</a></p>";
	exit();
}

function retrieveDatabaseConvertDate($inputDate){
	$inputDate = date("m/j/Y",strtotime($inputDate));
}



function convertDate($inputDate){
	$inputDate = date("m/j/Y",strtotime($inputDate));
		if ($inputDate == '12/31/1969'){$inputDate = '';}
		elseif ($inputDate == '11/30/-0001'){$inputDate = '';}
		else{ return $inputDate; }
}

##########################################
# Function to give access to all pages
# Assign Session on Line 121
##########################################
function pagePermission() {
     if($_SESSION['userLevel']=='Admin'){
          return true;
     } else { 
          return false;
	}
}

function userOnly() {
	if($_SESSION['userLevel']=='User'){
		return true;
	} else {
		return false;
	}
}

function isMobile(){
	$useragent=$_SERVER['HTTP_USER_AGENT'];

	if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
		return true;
	}
	else{
		return false;
	}
}


function suxLocation() {
     if($_SESSION['userLocation']=='Sioux City'){
          return true;
     } else { 
          return false;
	}
}

function calendarColors($calUsers) {
	switch ($calUsers) {
		case 'Angi Kruse': $color='#5babe6'; return $color; break;
		case 'Karla  Frey ': $color='#9c56b9';return $color; break;
		case 'Brent  Frey': $color='#f3c500';return $color; break;
		case 'Jolene Clemens': $color='#026609';return $color; break;
		case 'Jons Arens ': $color='#334960';return $color; break;
		case 'Dwayne Cornett': $color='#ec008c';return $color; break;
		case 'Mike  Funkhouser': $color='#01bf9d';return $color; break;
		case 'Stephen  havlovec': $color='#bec3c7';return $color; break;
		case 'Tyler  Leinbaugh': $color='#c43926';return $color; break;
		case 'Mark  Peterson': $color='#d0f7fc';return $color; break;
		case 'Jerry  Pospisil': $color='#ff0000';return $color; break;
		case 'Sue  Roach': $color='#f393e2';return $color; break;
		case 'Scott  Simomsen': $color='#212b2c';return $color; break;
		case 'Scott Stenwall': $color='#bcd984';return $color; break;
		case 'Josh  Tague': $color='#1b9094';return $color; break;
		case 'Jeff  White ': $color='#6d6e19';return $color; break;
		case 'Adam Harrington': $color='#adffbb';return $color; break;
		default: $color='#008800';return $color; break;
	}
}


// Page Permissions (0=Everyone,1=Admin)
	if(!$permissions) $permissions = '0';
	$user_level = Array(
		'Author' => '0', // write only
		'Designer' => '1', // write and upload
		'Coder' => '2', // create modules
		'Owner' => '3', // modify users
		'Administrator' => '4' // everything
	);
	if($permissions > $user_level[$user_type]) {
		echo "<p>&nbsp;</p>\n<p style=\"text-align: center\">Access Denied.</p>";
		exit();
	}



	
?>
