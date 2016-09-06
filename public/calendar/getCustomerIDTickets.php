<?php
/**
 * Created by PhpStorm.
 * User: WebDesign
 * Date: 8/29/2016
 * Time: 9:04 AM
 */

// Configure site
$root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace("public","private",$root);
include_once("$private/config.php");
include_once("$root/lc.php");
$custTicketID = mysql_real_escape_string($_GET['custTicketID']);


$getCustomerTicketsDropdown_request = ("SELECT ticketID,ticketCustID,ticketDate,soldDate,jobProduct,ticketCity,ticketNORF FROM customerTickets WHERE ticketCustID = '$custTicketID'");
$getCustomerTicketsDropdown_result = mysql_query ($getCustomerTicketsDropdown_request,$db) or die ("Query failed: $getCustomerTicketsDropdown_request");

while ($getCustomerTicketsDropdown_row = mysql_fetch_array($getCustomerTicketsDropdown_result)) {
    extract($getCustomerTicketsDropdown_row);

    $ticketCode = date('Ymd',strtotime($ticketDate));

    if ($soldDate != '1969-12-31') {
        $ticketCode = $soldDate;
        $ticketCode = date("Ymd",strtotime($ticketCode));
    }

    $ticketCode = str_replace("2015", "15", $ticketCode);
    $ticketCode = str_replace("2016", "16", $ticketCode);
    $ticketCode = str_replace("2017", "17", $ticketCode);
    $ticketCode = str_replace("2018", "18", $ticketCode);
    $ticketCode = str_replace("2019", "19", $ticketCode);
    $ticketCode = str_replace("2020", "20", $ticketCode);
    $ticketCode = str_replace("2021", "21", $ticketCode);

    if ($ticketCode == '-00011130') {
        $ticketCode = '151031';
    }

    $ticketName = $ticketCode."_".$jobProduct."_".$ticketCity."_(".$ticketNORF.")";

    ?>
    <option value="<?php echo $ticketID;?>">Ticket # <?php echo $ticketCode ;?> - <?php echo $ticketName; ?></option>
<? } ?>