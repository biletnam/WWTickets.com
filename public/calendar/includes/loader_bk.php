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
    if (strlen($_POST['search']) > 0) {
        $_POST['search'] = str_replace('&', '&amp;', $_POST['search']);
        $_SESSION['condition'] = "city LIKE '%" . $_POST['search'] . "%'";
    }

    if (strlen($_POST['user_filter']) > 0) {
        $_POST['user_filter'] = str_replace('&', '&amp;', $_POST['user_filter']);
        $userFilters = $_POST['user_filter'];
        $userFilters = explode(',', $userFilters);
        $conditionTmp = '';
        if (strlen($_POST['search']) > 0) {
            //var_dump($_SESSION['condition']);
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
//            var_dump($_SESSION['condition']);
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