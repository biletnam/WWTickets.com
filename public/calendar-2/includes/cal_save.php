<?php

	// Loader - class and connection
	include('loader.php');
	
	// Catch start, end and id from javascript
	$description = $_POST['description'];
	$start_date = $_POST['start_date'];
	$start_time = $_POST['start_time'];
	$end_date = $_POST['end_date'];
	$end_time = $_POST['end_time'];
	$allDay = $_POST['allDay'];
	$url = $_POST['url'];



	// Custom Variables
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$title = $fname." ".$lname;

	$ticketStatus = $_POST['ticketStatus'];

	switch ($ticketStatus) {
		case 'Scheduled': $color = '#ff0000'; break;
		case 'Scheduled to Install': $color = '#ffff00'; break;
		default: break;
	}

	$extra = array('repeat_method' => $_POST['repeat_method'], 'repeat_times' => $_POST['repeat_times'], 'new_customer' => $_POST['new_customer'], 'fname' => $_POST['fname'], 'lname' => $_POST['lname'], 'address' => $_POST['address'], 'phone' => $_POST['phone'], 'city' => $_POST['city'], 'state' => $_POST['state'], 'jobProduct' => $_POST['jobProduct'], 'ticketStatus' => $_POST['ticketStatus'], 'referral' => $_POST['referral'], 'calUsers' => $_POST['calUsers']);
	
	// All Day Fix
	if($allDay == 'true')
	{
		$allDay = 'false';
	} else {
		$allDay = 'true';	
	}
	
	if(empty($url)) 
	{
		$url = "?page=";
	}
	



	echo $calendar->addEvent($title, $description, $start_date, $start_time, $end_date, $end_time, $color, $allDay, $url, $extra);
	

?>