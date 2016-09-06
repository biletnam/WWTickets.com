<?php
session_start();

// Database Connection
include('connection.php');

// Calendar Class
include('calendar.php');

// Embed Class
include('embed.php');

// Formater Class
include('formater.php');

// Google Maps
include('maps.class.php');
//unset($_SESSION['condition']);

$cf = $_GET;
    // Search
    if ($_POST['search'] == 1) {
        $conditionTmp = '';
        $fields = array('name','lname','address','phone','email','city','state','notes');
        foreach($fields as $field)
            if(isset($_POST[$field]) && $_POST[$field] != '')
                $conditionTmp .= '('.$field.' LIKE "%'.$_POST[$field].'%") AND ';

        $fields = array('jobProduct','ticketStatus');
        foreach($fields as $field)
            if(isset($_POST[$field]) && is_array($_POST[$field]))
                foreach($_POST[$field] as $value)
                    $conditionTmp .= '('.$field.' LIKE "%'.$value.'%") AND ';
        $_SESSION['condition'] = '';
        $_SESSION['condition'] .= substr($conditionTmp,0,-5);
    }

    if (strlen($_POST['user_filter']) > 0) {
        $_POST['user_filter'] = str_replace('&', '&amp;', $_POST['user_filter']);
        $userFilters = $_POST['user_filter'];
        $userFilters = explode(',', $userFilters);
        $conditionTmp = '';
        if (strlen($_POST['search']) > 0) {
            if(!in_array('All/General',$userFilters)){
                foreach ($userFilters as $filter) {
                    if (count($userFilters) > 1) {
                        if ($filter == $userFilters[0]) {
                            $conditionTmp .= " AND (calUsers LIKE '%" . $filter . "%'";
                        } elseif ($filter == end($userFilters)) {
                            $conditionTmp .= " OR calUsers LIKE '%" . $filter . "%')";
                        } else {
                            $conditionTmp .= " OR calUsers LIKE '%" . $filter . "%'";
                        }
                    } else {
                        $conditionTmp .= " AND calUsers LIKE '%" . $filter . "%'";
                    }

                }
                $_SESSION['condition'] .= $conditionTmp;
            }
        } else {
            if(!in_array('All/General',$userFilters)) {
                foreach ($userFilters as $filter) {
                    if ($filter != $userFilters[0]) {
                        $conditionTmp .= ' OR ';
                    }
                    $conditionTmp .= "calUsers LIKE '%" . $filter . "%'";

                }
                $_SESSION['condition'] = trim($conditionTmp);
            } else{
                $_SESSION['condition'] = false;
            }
        }
        $calendar = new calendar(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE, TABLE, $_SESSION['condition'], $cf);

    }
    elseif (strlen($_SESSION['condition']) > 0) {
        $calendar = new calendar(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE, TABLE, $_SESSION['condition'], $cf);
    } else {
        $calendar = new calendar(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE, TABLE, false, $cf);
    }
    // Set Categories
    if (isset($categories)) {
        $calendar->categories = $categories;
    } else {
        $calendar->categories = array('General');
    }
//}
?>