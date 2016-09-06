<?php 
// start the session 
session_start(); 
header("Cache-control: private"); //IE 6 Fix 
$_SESSION = array(); 

// clear the session (logout)
session_destroy(); 

// redirect to login page
header("Location: /login.php");
?> 