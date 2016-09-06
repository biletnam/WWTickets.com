<?php

	// Loader - class and connection
	include('loader.php');
	
	// Catch start, end and id from javascript
	$newCustomer = $_POST['newCustomer'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$jobProduct = $_POST['jobProduct'];
	$ticketStatus = $_POST['ticketStatus'];
	$referral = $_POST['referral'];
	$start_date = $_POST['start_date'];
	$start_time = $_POST['start_time'];
	$end_date = $_POST['end_date'];
	$end_time = $_POST['end_time'];
	$calUsers = $_POST['calUsers'];
	$notes = $_POST['notes'];

	
	//$extra = array('repeat_method' => $_POST['repeat_method'], 'repeat_times' => $_POST['repeat_times']);
	$allDay = 'true';
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





	// 	$sql_query = "INSERT INTO calendar (fname, lname, address, phone, city, state, jobProduct, ticketStatus, referral, calUsers, notes, allDay ) VALUES ('$fname', '$lname', '$address', '$phone', '$city', '$state', '$jobProduct', '$ticketStatus', '$referral', '$calUsers', '$notes','$allDay')";
	// 	$result = mysql_query($sql_query) or die(mysql_error());



 // header("Location: index.php"); 


	echo $calendar->addEvent($fname, $description, $start_date, $start_time, $end_date, $end_time, $color, $allDay, $url, $extra);
	

?>