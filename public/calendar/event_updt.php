<?
    // Configure site
    $root = $_SERVER['DOCUMENT_ROOT']; 
    $private = str_replace("public","private",$root);
    include_once("$private/config.php");

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

$calendarID = $_POST['calendarID'];
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

$phone = format_phone($phone);
if (empty($url)) {$url = 'false'; }
$color = '#ff0000';
$category = 'General';
$repeat_method = 'no';
$repeat_times = '1';
$allDay = 'false';
$user_id = '0';

if ($jobProduct == 'Other') {$titleJob = ''; } else{$titleJob = " - ".$jobProduct; }

$time = strtotime($start_time);

$endTime = date("h:i", strtotime('+30 minutes', $time));
$am = array('07','08','09','10','11');
$pm = array('12','01','02','03','04','05','06');


$test = explode(":", $endTime);

if (in_array($test[0],$am)) {$extension = ' AM'; } else{$extension = ' PM';}

$end_time = $endTime.$extension;
$final_end_time = date("H:i", strtotime("$end_time"));
$end_date = $_POST['start_date'];

$customerReferral = $_POST['customerReferral'];
$description = $_POST['description'];


$start_time  = date("H:i", strtotime($start_time));
// $end_time  = date("H:i A", strtotime($end_time)); -- Original
$end_time = $endTime.$extension;

// echo $end_time;

// Convert Date Time
$start = $start_date.' '.$start_time.':00';
$end = $end_date.' '.$final_end_time.':00';

$calCustomers = $_POST['calCustomers'];
$calTickets = $_POST['calTickets'];

$title = $city.$titleJob.": ".$name." ".$lname." ".$phone;
$EntryNote = $description;

$end_time = str_replace(" a", "", $end_time); $end_time = str_replace(" p", "", $end_time);
$start_time = str_replace(" a", "", $start_time); $start_time = str_replace(" p", "", $start_time);
$note_end_time = date('g:i A', strtotime($end_time));
$note_start_time = date('g:i A', strtotime($start_time));














$NoteStart = date("D, F j",strtotime($start_date)); if ($NoteStart == '12/31/1969') {$NoteStart = ''; }
$NoteEnd = date("D, F j",strtotime($end_date)); if ($NoteEnd == '12/31/1969') {$NoteEnd = ''; }
// $note_start_time = str_replace(" a", "AM", $start_time);
// $note_end_time = str_replace(" a", "AM", $end_time);
// $note_start_time = str_replace(" p", "PM", $start_time);
// $note_end_time = str_replace(" p", "PM", $end_time);



$NoteStart = $NoteStart.", ".$note_start_time;
$NoteEnd = $note_end_time;


$start = str_replace(" AM", "", $start); $start = str_replace(" PM", "", $start);
$end = str_replace(" AM", "", $end); $end = str_replace(" PM", "", $end);

//    Assign calendar color to user
$color = calendarColors($calUsers);

$descriptionCalendar = "<strong>Date & Time: </strong>".$NoteStart." - ".$NoteEnd."<br/><br/><strong>Where: </strong>".$address." ".$city.", ".$state."<br/><br/><strong>Assigned: </strong>".$calUsers."<br/><br/><strong>Customer Referral: </strong>".$customerReferral."<br/><br/><strong>Description: </strong>".$EntryNote." - ".$firstName." ".$lastName;


$sql_query = "UPDATE calendar SET name = '$name', lname = '$lname', title = '$title', notes = '$description', address = '$address', phone = '$phone', email = '$email', city = '$city', state = '$state', calUsers = '$calUsers', jobProduct = '$jobProduct', ticketStatus = '$ticketStatus', start = '$start', end = '$end', customerReferral = '$customerReferral', category = '$category', description = '$descriptionCalendar', color = '$color', allDay = '$allDay', repeat_type = '$repeat_method', repeat_id = '$repeat_times', url = '$url',calTicketID = '$calTickets',calCustID = '$calCustomers' WHERE id= '$calendarID'";
$result = mysql_query($sql_query) or die(mysql_error());

// $sql_query = "INSERT INTO calendar (newCustomer, name,lname, title,notes, address, phone, email, city, state, calUsers, jobProduct, ticketStatus, start, end, customerReferral, category, description, color, allDay, repeat_type, repeat_id, url) VALUES ('$newCustomer','$name','$lname', '$title','$description', '$address', '$phone', '$email', '$city', '$state', '$calUsers', '$jobProduct', '$ticketStatus', '$start', '$end', '$customerReferral', '$category','$descriptionCalendar', '$color', '$allDay', '$repeat_method', '$repeat_times', '$url')";

// $result = mysql_query($sql_query) or die(mysql_error());


 //Writes the photo to the server 
 header("Location: index.php");

 ?>