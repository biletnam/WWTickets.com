<?
    // Configure site
    $root = $_SERVER['DOCUMENT_ROOT']; 
    $private = str_replace("public","private",$root);
    include_once("$private/config.php");

// Verify login
include_once("$root/lc.php");


function format_phone($phone)
{
	$phone = preg_replace("/[^0-9]/", "", $phone);
 
	if(strlen($phone) == 7)
		return preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $phone);
	elseif(strlen($phone) == 10)
		return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone);
	else
		return $phone;
}


// error_reporting(E_ALL);
// ini_set('display_errors', 1);

$newCustomer = $_POST['newCustomer'];
$name = $_POST['name'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$city = $_POST['city'];
$state = $_POST['state'];
$calUsers = $_POST['calUsers'];
// $color = $_POST['color'];
$jobProduct = $_POST['jobProduct'];
$ticketStatus = $_POST['ticketStatus'];
$start_date = $_POST['start_date'];
$start_time = $_POST['start_time'];
$end_date = $_POST['end_date'];
$end_time = $_POST['end_time'];
$customerReferral = $_POST['customerReferral'];
$description = $_POST['description'];
// $edit_color = $_POST['edit_color'];
// $allDay = $_POST['allDay'];
// $repeat_method = $_POST['repeat_method'];
// $repeat_times = $_POST['repeat_times'];
// $url = $_POST['url'];

$phone = format_phone($phone);

// Convert Date Time
$start = $start_date.' '.$start_time.':00';

$end = $end_date.' '.$end_time.':00';


if (empty($url)) {$url = 'false'; }

$color = '#ff0000';
$category = 'General';
$repeat_method = 'no';
$repeat_times = '1';
$allDay = 'false';
$user_id = '0';
$title = $city.": ".$name." ".$lname." ".$phone;
$EntryNote = $description;


$NoteStart = date("D, F n, gA",strtotime($start)); if ($NoteStart == '12/31/1969') {$NoteStart = ''; }
$NoteEnd = date("D, F n, gA",strtotime($end)); if ($NoteEnd == '12/31/1969') {$NoteEnd = ''; }


$start = str_replace(" a", "", $start); $start = str_replace(" p", "", $start);
$end = str_replace(" a", "", $end); $end = str_replace(" p", "", $end);



switch ($ticketStatus) {
	case 'Scheduled': $color='#ff0000'; break;
	case 'Scheduled to Install': $color='#0000ff'; break;
	default: $color='#008800'; break;
}




$descriptionCalendar = "<strong>Date & Time: </strong>".$NoteStart." - ".$NoteEnd."<br/><br/><strong>Where: </strong>".$address." ".$city.", ".$state."<br/><br/><strong>Customer Referral: </strong>".$customerReferral."<br/><br/><strong>Description: </strong>".$EntryNote." - ".$cms_user_id;


$sql_query = "INSERT INTO calendar (newCustomer, name,lname, title, address, phone, email, city, state, calUsers, jobProduct, ticketStatus, start, end, customerReferral, category, description, color, allDay, repeat_type, repeat_id, url) VALUES ('$newCustomer','$name','$lname', '$title', '$address', '$phone', '$email', '$city', '$state', '$calUsers', '$jobProduct', '$ticketStatus', '$start', '$end', '$customerReferral', '$category','$descriptionCalendar', '$color', '$allDay', '$repeat_method', '$repeat_times', '$url')";

$result = mysql_query($sql_query) or die(mysql_error());



if ($newCustomer == '1') {

	$storeID = '72';

	$sql_query = "INSERT INTO customerInfo (custFName, custLName,custBillAdd,custCity,custState,custPhone,custEmail,custNotes,storeID) VALUES ('$name', '$lname','$address','$city','$state','$phone','$email','$description','$storeID')";

	$result = mysql_query($sql_query) or die(mysql_error());

}



 //Writes the photo to the server 
 header("Location: index.php");

 ?>