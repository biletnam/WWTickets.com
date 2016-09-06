<?

$root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public', 'private', $root);
include_once("$private/config.php");

$permissions = 4;

// error_reporting(E_ALL);
// ini_set('display_errors', 1);


$calUsers = $_POST['calUsers'];


$ticketOrdDate = date('Y-m-d', strtotime($_POST['ticketOrdDate']));
$ticketDateM = date('Y-m-d', strtotime($_POST['ticketDateM']));
$ticketColum = date('Y-m-d', strtotime($_POST['ticketColum']));
$ticketInstall = date('Y-m-d', strtotime($_POST['ticketInstall']));
$leadTestEmpDate = date('Y-m-d', strtotime($_POST['leadTestEmpDate']));
$testDate = date('Y-m-d', strtotime($_POST['testDate']));
$pamDate = date('Y-m-d', strtotime($_POST['pamDate']));
$renoDate = date('Y-m-d', strtotime($_POST['renoDate']));
$paidDate = date('Y-m-d', strtotime($_POST['paidDate']));
$diyOrdered = date('Y-m-d', strtotime($_POST['diyOrdered']));
$diyReceived = date('Y-m-d', strtotime($_POST['diyReceived']));
$diyDate = date('Y-m-d', strtotime($_POST['diyDate']));
$appDate = date('Y-m-d', strtotime($_POST['appDate']));
$dateInstalled = date('Y-m-d', strtotime($_POST['dateInstalled']));
$ticketSInvoiced = date('Y-m-d', strtotime($_POST['ticketSInvoiced']));
$finalDate = date('Y-m-d', strtotime($_POST['finalDate']));
$ticketOrdDate = date('Y-m-d', strtotime($_POST['ticketOrdDate']));
$soldDate = date('Y-m-d', strtotime($_POST['soldDate']));
$downDate = date('Y-m-d', strtotime($_POST['downDate']));
$pwMade = date('Y-m-d', strtotime($_POST['pwMade']));


$date_mod = date('Y-m-d');
$month = date('F');
$year = date('Y');

// Verify login
include_once("$root/lc.php");

$formDate = date('Y-m-d');


if ($propertyType == 'Multiple Property') {


    $city_request = ("select city_name,city_zip FROM cities WHERE city_name = '$ticketCity'");
    $city_result = mysql_query($city_request, $db) or die ("Query failed: $city_request");

    while ($city_row = mysql_fetch_array($city_result)) {
        $ticketZip = $city_row['city_zip'];
    }


    /*
        Description : The following code convert the address to co-ordinates using google map api
        Author: Dnyanesh Pawar,
        Copyright: Dnyanesh Pawar (http://www.techrecite.com)
        Link: http://www.techrecite.com
        See the GNU General Public License for more details: http://www.creativecommons.org/
    */

// Take the address in a variable
// $address = "403 South 1st Street, Norfolk NE 68701";
    $address = $ticketAddress . ", " . $ticketCity . " " . $ticketState . " " . $ticketZip;

// Replace the empty spaces in the address with + sign
// + Sign is the concatanation/separation character used by google map service
    $address = str_replace(" ", "+", $address);

    $address_url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $address_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);

    $response_a = json_decode($response);

//Print the Latitude and Longitude of the address
    $lat = $response_a->results[0]->geometry->location->lat;
    $long = $response_a->results[0]->geometry->location->lng;

}


if ($propertyType == 'Single Property') {

    $tsCity_request = ("SELECT custID,custCity,custState,custZip,custBillAdd FROM customerInfo WHERE custID = '$custID'");
    $tsCity_result = mysql_query($tsCity_request, $db) or die ("Query failed: $tsCity_request");

    while ($tsCity_row = mysql_fetch_array($tsCity_result)) {
        extract($tsCity_row);
        $ticketCity = $custCity;
        $ticketState = $custState;
        $ticketZip = $custZip;
        $ticketAddress = $custBillAdd;
    }

    // Take the address in a variable
    // $address = "403 South 1st Street, Norfolk NE 68701";
    $address = $ticketAddress . ", " . $ticketCity . " " . $ticketState . " " . $ticketZip;


    // Replace the empty spaces in the address with + sign
    // + Sign is the concatanation/separation character used by google map service
    $address = str_replace(" ", "+", $address);

    $address_url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $address_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);

    $response_a = json_decode($response);

    //Print the Latitude and Longitude of the address
    $lat = $response_a->results[0]->geometry->location->lat;
    $long = $response_a->results[0]->geometry->location->lng;
    $propertyType = 'Single Property';

    $ticketCity = stripslashes($ticketCity);

}

// update database with new info
if (!empty($start_date) || !empty($start_time)) {
    $calUsers = $_POST['calUsers'];
    ##################### Calendar Feature ##########################
    #################################################################
    #################################################################
    #################################################################
    $cal_request = ("SELECT * FROM customerInfo WHERE custID = '$custID'");
    $cal_result = mysql_query($cal_request, $db) or die ("Query failed: $cal_request");

    while ($cal_row = mysql_fetch_array($cal_result)) {
        extract($cal_row);
    }

    $calUsers = $_POST['calUsers'];
    $jobProduct = $_POST['jobProduct'];
    $ticketStatus = $_POST['ticketStatus'];
    $start_date = $_POST['start_date'];
    $start_time = $_POST['start_time'];

    $url = 'false';
    $color = '#ff0000';
    $category = 'General';
    $repeat_method = 'no';
    $repeat_times = '1';
    $allDay = 'false';
    $user_id = '0';

    if ($jobProduct == '') {
        $titleJob = '';
    } else {
        $titleJob = " - " . $jobProduct;
    }

    $time = strtotime($start_time);

    $endTime = date("h:i", strtotime('+30 minutes', $time));
    $am = array('07', '08', '09', '10', '11');
    $pm = array('12', '01', '02', '03', '04', '05', '06');

    $test = explode(":", $endTime);

    if (in_array($test[0], $am)) {
        $extension = ' AM';
    } else {
        $extension = ' PM';
    }

    $end_time = $endTime . $extension;
    $final_end_time = date("H:i", strtotime("$end_time"));
    $end_date = $_POST['start_date'];

    $customerReferral = $_POST['customerReferral'];
    $description = $_POST['wrapDetails'];
    $start_time = date("H:i", strtotime($start_time));
    $end_time = $endTime . $extension;

    // Convert Date Time
    $start = $start_date . ' ' . $start_time . ':00';
    $end = $end_date . ' ' . $final_end_time . ':00';


    $title = $custCity . $titleJob . ": " . $custFName . " " . $custLName . " " . $custPhone;
    $EntryNote = $description;

    $end_time = str_replace(" a", "", $end_time);
    $end_time = str_replace(" p", "", $end_time);
    $start_time = str_replace(" a", "", $start_time);
    $start_time = str_replace(" p", "", $start_time);
    $note_end_time = date('g:i A', strtotime($end_time));
    $note_start_time = date('g:i A', strtotime($start_time));

    $NoteStart = date("D, F j", strtotime($start_date));
    $NoteEnd = date("D, F j", strtotime($end_date));
    $NoteStart = $NoteStart . ", " . $note_start_time;
    $NoteEnd = $note_end_time;


    $start = str_replace(" AM", "", $start);
    $start = str_replace(" PM", "", $start);
    $end = str_replace(" AM", "", $end);
    $end = str_replace(" PM", "", $end);

    //    Assign calendar color to user
    $color = calendarColors($calUsers);

    $descriptionCalendar = "<strong>Date & Time: </strong>" . $NoteStart . " - " . $NoteEnd . "<br/><br/><strong>Where: </strong>" . $custBillAdd . " " . $custCity . ", " . $custState . "<br/><br/><strong>Assigned: </strong>" . $calUsers . "<br/><br/><strong>Description: </strong>" . $EntryNote . " - " . $firstName . " " . $lastName;

    $sql_query = "INSERT INTO calendar (name,lname, title, address, phone, email, city, state, calUsers, jobProduct, ticketStatus, start, end, category, description, color, allDay, repeat_type, repeat_id, url,calTicketID,calCustID) VALUES ('$custFName','$custLName', '$title', '$custBillAdd', '$custPhone', '$custEmail', '$custCity', '$custState', '$calUsers', '$jobProduct', '$ticketStatus', '$start', '$end', '$category','$descriptionCalendar', '$color', '$allDay', '$repeat_method', '$repeat_times', '$url','$ticketID','$custID')";

    $result = mysql_query($sql_query) or die(mysql_error());


    #################################################################
    ##################### Calendar Feature ##########################
    #################################################################
}

if ($type == 'new') {

    $color = calendarColors($calUsers);

    switch ($ticketStatus) {
        case 'Sold':
            $soldDate = $date_mod;
            break;
        case 'Ordered':
            $ticketSOrdered = $date_mod;
            $ticketAssign = 'Jolene';
            break;
        case 'Received':
            $ticketSReceived = $date_mod;
            break;
        case 'Scheduled to Install':
            $ticketSScheduled = $date_mod;
            break;
        case 'Installed':
            $ticketSInstalled = $date_mod;
            break;
        case 'Paid':
            $ticketSPaid = $date_mod;
            $ticketAssign = 'Angi';
            break;
        case 'Complete';
            $ticketSComplete = $date_mod;
            $ticketAssign = 'Karla ';
            break;
        case 'Unscheduled';
            $ticketAssign = 'Jolene';
            break;
        case 'Needs Measured';
            $ticketAssign = 'Brent ';
            break;
        case 'Proposal Given':
            $ticketSProposalGiven = $date_mod;
            break;
        case 'Incomplete';
            $ticketSIncomplete = $date_mod;
            $ticketAssign = 'Brent ';
            break;
        case 'Pending Wrap';
            $ticketSPending = $date_mod;
            $ticketAssign = 'Brent ';
            break;
        default:
            $updtDataTicket = '';
            break;
    }


    if ($ticketStatus == 'Need to Order') {
        switch ($jobProduct) {
            case 'Windows':
                $ticketAssign = 'Karla ';
                break;
            case 'Window Door Repair';
                $ticketAssign = 'Angi';
                break;
        }
    }


    $ticketCity = str_replace("'", "\'", $ticketCity);
    $ticketAddress = str_replace("'", "\'", $ticketAddress);

    $sql_query = "INSERT INTO customerTickets (ticketCustID,propertyType,ticketAddress,ticketSecAddress,ticketCity,ticketState,ticketZip,ticketPO,ticketStatus,ticketArchive,ticketDate, ticketType, ticketFinance, homeYear, leadTest,leadTestEmp,leadTestEmpDate, financeStatus, pamfill,pamEmpfill,pamDate, testKit,testKitEmp,testDate, reno,renoEmp,renoDate, wrap, wrapStatus, wrapColor, ticketRelation, jobLadder, wrapDetails, ticketOrdDate, ticketCOL, ticketNORF,ticketSUX, ticketMI, ticketColum, ticketInstall,installedBy, ticketMIOrd, ticketAMI, ticketAMIFO, paidDate, jobName,diyOrdered,diyReceived,diyDate, checkStatus,ticketMonth,ticketYear,ticketAssign,ticketLat,ticketLong,jobProduct, dateInstalled, ticketcolMI, ticketcolMIoOrd, ticketcolAMI, ticketcolAMIFO, paymentMethod, downDate, finalPayment, finalDate, paymentNotes,downPayment,paymentReceived,yardSign,certCompletion,otherWrapColor,ticketsHot,ticketLocation,soldDate,ticketSOrdered,ticketSReceived,ticketSInstalled,ticketSPaid,ticketSProposalGiven,ticketSIncomplete,ticketSComplete,ticketSPending,ticketSScheduled,pwMade,ticketRelated,repairNeeded,repairNotes) ";
    $sql_query .= "VALUES ('$custID','$propertyType','$ticketAddress', '$ticketSecAddress', '$ticketCity', '$ticketState', '$ticketZip','$ticketPO','$ticketStatus','$ticketArchive','$date_mod', '$ticketType', '$ticketFinance', '$homeYear', '$leadTest', '$initials','$formDate','$financeStatus','$pamfill','$pamEmpfill','$pamDate','$testKit','$testKitEmp','$testDate', '$reno', '$renoEmp','$renoDate', '$wrap', '$wrapStatus', '$wrapColor','$ticketRelation', '$jobLadder', '$wrapDetails', '$ticketOrdDate', '$ticketCOL', '$ticketNORF','$ticketSUX', '$ticketMI', '$ticketColum', '$ticketInstall','$installedBy', '$ticketMIOrd', '$ticketAMI', '$ticketAMIFO', '$paidDate', '$jobName','$diyOrdered','$diyReceived','$diyDate','$checkStatus','$month','$year','$ticketAssign','$lat','$long','$jobProduct','$dateInstalled','$ticketcolMI','$ticketcolMIOrd','$ticketcolAMI','$ticketcolAMIFO','$paymentMethod','$downDate','$finalPayment','$finalDate','$paymentNotes','$downPayment','$paymentReceived','$yardSign','$certCompletion','$otherWrapColor','$ticketsHot','$ticketLocation','$soldDate','$ticketSOrdered','$ticketSReceived','$ticketSInstalled','$ticketSPaid','$ticketSProposalGiven','$ticketSIncomplete','$ticketSComplete','$ticketSPending','$ticketSScheduled','$pwMade','$ticketRelated','$repairNeeded','$repairNotes');";

} elseif ($type == 'edit') {

    switch ($ticketStatus) {

        case 'Sold':
            $ticketSSold = $date_mod;
            $updtDataTicket = ", ticketSSold='$ticketSSold'";
            break;
        case 'Ordered':
            $ticketSOrdered = $date_mod;
            $updtDataTicket = ", ticketSOrdered='$ticketSOrdered'";
            $ticketAssign = 'Jolene';
            break;
        case 'Received':
            $ticketSReceived = $date_mod;
            $updtDataTicket = ", ticketSReceived='$ticketSReceived'";
            break;
        case 'Installed':
            $ticketSInstalled = $date_mod;
            $updtDataTicket = ", ticketSInstalled='$ticketSInstalled'";
            break;
        case 'Paid':
            $ticketSPaid = $date_mod;
            $updtDataTicket = ", ticketSPaid='$ticketSPaid'";
            $ticketAssign = 'Angi';
            break;
        case 'Complete';
            $ticketSComplete = $date_mod;
            $updtDataTicket = ", ticketSComplete='$ticketSComplete'";
            $ticketAssign = 'Karla ';
            break;
        case 'Unscheduled';
            $ticketAssign = 'Jolene';
            break;
        case 'Needs Measured';
            $ticketAssign = 'Brent ';
            break;
        case 'Proposal Given':
            $ticketSProposalGiven = $date_mod;
            $updtDataTicket = ", ticketSProposalGiven='$ticketSProposalGiven'";
            break;
        case 'Incomplete';
            $ticketSIncomplete = $date_mod;
            $updtDataTicket = ", ticketSIncomplete='$ticketSIncomplete'";
            $ticketAssign = 'Brent ';
            break;
        case 'Pending Wrap';
            $ticketSPending = $date_mod;
            $updtDataTicket = ", ticketSPending='$ticketSPending'";
            $ticketAssign = 'Brent ';
            break;
        case 'Scheduled to Install';
            $ticketSScheduled = $date_mod;
            $updtDataTicket = ", ticketSScheduled='$ticketSScheduled'";
            break;
        default:
            $updtDataTicket = '';
            break;

    }

    if ($ticketStatus == 'Need to Order') {
        switch ($jobProduct) {
            case 'Windows':
                $ticketAssign = 'Karla ';
                break;
            case 'Window Door Repair';
                $ticketAssign = 'Angi';
                break;
        }
    }


    if ($soldDate != $ticketSSold) {
        $soldDate = $soldDate;
    }

    $ticketCity = str_replace("'", "\'", $ticketCity);
    $ticketAddress = str_replace("'", "\'", $ticketAddress);
    $sql_query = "UPDATE customerTickets SET ticketStatus = '$ticketStatus', propertyType = '$propertyType',ticketAddress = '$ticketAddress', ticketSecAddress = '$ticketSecAddress', ticketCity = '$ticketCity', ticketState = '$ticketState', ticketZip = '$ticketZip', ticketPO='$ticketPO',ticketArchive='$ticketArchive',ticketType = '$ticketType', ticketFinance = '$ticketFinance', homeYear = '$homeYear', leadTest = '$leadTest',leadTestEmp = '$initials', leadTestEmpDate ='$formDate', pamfill = '$pamfill',pamEmpfill = '$pamEmpfill', pamDate ='$pamDate', testKit = '$testKit',testKitEmp = '$testKitEmp', testDate ='$testDate', reno = '$reno',renoEmp = '$renoEmp', renoDate ='$renoDate', wrap = '$wrap', wrapStatus = '$wrapStatus',ticketRelation = '$ticketRelation', wrapColor = '$wrapColor', jobLadder = '$jobLadder', wrapDetails = '$wrapDetails', ticketOrdDate = '$ticketOrdDate', ticketCOL = '$ticketCOL', ticketNORF = '$ticketNORF',ticketSUX = '$ticketSUX', ticketMI = '$ticketMI', ticketColum = '$ticketColum', jobName='$jobName',diyOrdered='$diyOrdered',diyReceived = '$diyReceived',diyDate='$diyDate',ticketInstall = '$ticketInstall',installedBy='$installedBy', ticketMIOrd = '$ticketMIOrd', ticketAMI = '$ticketAMI', ticketAMIFO = '$ticketAMIFO', paidDate = '$paidDate', checkStatus = '$checkStatus', ticketAssign = '$ticketAssign',financeStatus='$financeStatus', ticketLat='$ticketLat',ticketLong='$ticketLong',jobProduct = '$jobProduct',downPayment = '$downPayment', dateInstalled = '$dateInstalled', ticketcolMI = '$ticketcolMI', ticketcolMIoOrd = '$ticketcolMIOrd', ticketcolAMI = '$ticketcolAMI', ticketcolAMIFO = '$ticketcolAMIFO', paymentMethod = '$paymentMethod', downDate = '$downDate', finalPayment = '$finalPayment',ticketLat='$lat',ticketLong = '$long', finalDate = '$finalDate', paymentNotes = '$paymentNotes',paymentReceived='$paymentReceived',yardSign = '$yardSign',certCompletion='$certCompletion', otherWrapColor = '$otherWrapColor',ticketsHot = '$ticketsHot',ticketLocation='$ticketLocation',ticketInvoiced='$ticketInvoiced',ticketSComplete='$ticketSComplete',ticketSInvoiced='$ticketSInvoiced',soldDate='$soldDate' $updtDataTicket,pwMade='$pwMade',ticketRelated='$ticketRelated',repairNeeded='$repairNeeded',repairNotes='$repairNotes' WHERE ticketID = '$ticketID'";

}

$result = mysql_query($sql_query);

if ($type == 'new') {
    $ticketID = mysql_insert_id();

    // Insert warranty record into warrantyTransferTable
    $newShow = '0';

    $warranty_query = "INSERT INTO warrantyTransfer (ticketID,custID,newShow) ";
    $warranty_query .= "VALUES ('$ticketID','$custID','$newShow');";
    $warranty_result = mysql_query($warranty_query);

    $attachment_query = "INSERT INTO ticketAttachments (ticketID) ";
    $attachment_query .= "VALUES ('$ticketID');";
    $attach_result = mysql_query($attachment_query);

}


if ($submit == 'Save Changes' && $ticketStatus == 'Invoiced') {

    if ($appSent == 'Yes') {
        header("Location: /tickets/ticket_view.php?ticketID=$ticketID&custID=$custID");
    } else {
        header("Location: /tickets/form/customer_appreciation.php?ticketID=$ticketID&custID=$custID");
    }

}


if ($submit == 'Save Changes') {
    header("Location: /tickets/ticket_view.php?ticketID=$ticketID&custID=$custID");
}
if ($submit == 'Save and Continue Editing') {
    header("Location: /tickets/ticket_edit.php?ticketID=$ticketID&custID=$custID");
}
	

?>