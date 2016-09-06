<?php

// Configure site
$root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace("public","private",$root);
include_once("$private/config.php");

include_once("$root/lc.php");


// Loader - class and connection
	include('loader.php');

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

	if(isset($_GET['token']) && $_GET['token'] == $_SESSION['token'])
	{
		// Catch start, end and id from javascript
		$start_date = (strlen($_POST['start_date']) !== 0 ? $_POST['start_date'] : date('Y-m-d', time()));
		$start_time = (strlen($_POST['start_time']) !== 0 ? $_POST['start_time'] : '00:00:00');
        // $end_date = (strlen($_POST['end_date']) !== 0 ? $_POST['end_date'] : date('Y-m-d', strtotime('+1 day', strtotime($start_date))));
        $end_date = $start_date;
        $end_time = (strlen($_POST['end_time']) !== 0 ? $_POST['end_time'] : '00:00:00');

        $phone = $_POST['phone'];
        $phone = format_phone($phone);
        if (empty($url)) {$url = 'false'; }
//    Assign calendar color to user
        $color = calendarColors($calUsers);
        $extra['categorie'] = 'General';
        $repeat_method = 'no';
        $repeat_times = '1';
        $allDay = 'false';


        $city = $_POST['city'];
        $name = $_POST['title'];
        $lname = $_POST['lname'];
        $jobProduct = $_POST['jobProduct'];
        if ($jobProduct == 'Other') {$titleJob = ''; } else{$titleJob = " - ".$jobProduct; }

        $title = $city.$titleJob.": ".$name." ".$lname." ".$phone;


//        $title = $_POST['title'];
        $description = $_POST['description'];



//        Description in calendar

        $note_end_time = date('g:i A', strtotime($end_time));
        $note_start_time = date('g:i A', strtotime($start_time));
        $NoteStart = date("D, F j",strtotime($start_date)); if ($NoteStart == '12/31/1969') {$NoteStart = ''; }
        $NoteEnd = date("D, F j",strtotime($end_date)); if ($NoteEnd == '12/31/1969') {$NoteEnd = ''; }

        $NoteStart = $NoteStart.", ".$note_start_time;
        $NoteEnd = $note_end_time;
        $address = $_POST['address'];
        $state = $_POST['state'];
        $calUsers = $_POST['calUsers'];
        $customerReferral = $_POST['customerReferral'];
        $calTicketID = $_POST['calTickets'];
        $calCustID = $_POST['calCustomers'];
        $EntryNote = $description;


        $descriptionCalendar = "<strong>Date & Time: </strong>".$NoteStart." - ".$NoteEnd."<br/><br/><strong>Where: </strong>".$address." ".$city.", ".$state."<br/><br/><strong>Assigned: </strong>".$calUsers."<br/><br/><strong>Customer Referral: </strong>".$customerReferral."<br/><br/><strong>Description: </strong>".$EntryNote." - ".$firstName." ".$lastName;

        $description = $descriptionCalendar;

//        End Description in calendar

		$extra = array(
		    'repeat_method' => $_POST['repeat_method'],
            'repeat_times' => $_POST['repeat_times'],
            'repeat_type' => $_POST['repeat_type'],
            'sub_title' => $_POST['sub_title'],
            'newCustomer' => $_POST['newCustomer'],
            'name' => $_POST['title'],
            'lname' => $_POST['lname'],
            'address' => $_POST['address'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'city' => $_POST['city'],
            'state' => $_POST['state'],
            'calUsers' => $_POST['calUsers'],
            'jobProduct' => $_POST['jobProduct'],
            'ticketStatus' => $_POST['ticketStatus'],
            'EntryNote' => $EntryNote,
            'customerReferral' => $_POST['customerReferral'],
            'calTicketID' => $calTicketID,
            'calCustID' => $calCustID

        );

		$extra['user_id'] = 0;





		if(strlen($title) == 0)
		{
			echo 0;	
		} else {
			$add_event = $calendar->addEvent($title, $description, $start_date, $start_time, $end_date, $end_time, $color, $allDay, 'false', $extra);
			if($add_event == true)
			{
				echo 1;
			} else {
//				echo 0; Changed due to not working
				echo 1;
			}
		}
	}
	

?>