<?php

	// Configure site
	$root = $_SERVER['DOCUMENT_ROOT']; 
	$private = str_replace("public","private",$root);
	include_once("$private/config.php");
	// Verify login
	include_once("$root/lc.php");

$term = strip_tags(substr($_POST['searchit'],0, 100));
$term = mysql_escape_string($term); // Attack Prevention

if($term=="%") echo "Enter Tickets By Customer Name";

else{

	$query = mysql_query("SELECT * FROM customerInfo LEFT JOIN customerTickets ON customerInfo.custID = customerTickets.ticketCustID WHERE custFName LIKE '{$term}%' OR custLName LIKE '{$term}%' ORDER BY custLName ASC");

	$string = '<h3 style="margin-left:20px;"> "'.$term.'" Tickets</h3>';
	$string .= '<div class="col-lg-12">';
	$string .= "<div class=\"panel panel-default\">
                            <div class=\"panel-heading\">
                                <i class=\"fa fa-file-text fa-fw\"></i>Tickets
                            </div>
                            <div class=\"panel-body\" style=\"background-color:#fffeed;\">
                                <div class=\"dataTable_wrapper\">
                                    <table class=\"table table-striped table-bordered table-hover\" id=\"dataTables-example\">
                                        <thead> <tr>
                                            <th>Ticket #</th>
                                            <th>Customer Name</th>
                                            <th>Job Name</th>
                                            <th>Town</th>
                                            <th>Status</th>
                                 
                                        </tr></thead>
                                        <tbody>";

				if (mysql_num_rows($query)){
					while($row = mysql_fetch_assoc($query)){ 

        $ticketDate = date("m/j/Y",strtotime($row['ticketDate'])); if ($ticketDate == '11/30/-0001') {$ticketDate = ''; }        
        $soldDate = date("m/j/Y",strtotime($row['soldDate'])); if ($soldDate == '11/30/-0001') {$soldDate = ''; }          
          
    $ticketCode = date('Ymd',strtotime($ticketDate));



    if (empty($jobProduct)) {$jobProduct == 'x'; }

$ticketCode = $row['ticketDate'];
$ticketCode = str_replace("-", "", $ticketCode);		


// if ($row['soldDate'] != '0000-00-00') {$ticketCode = $soldDate; $ticketCode = date("Ymd",strtotime($ticketCode)); }



    $ticketCode = str_replace("2015", "15", $ticketCode);
    $ticketCode = str_replace("2016", "16", $ticketCode);
    $ticketCode = str_replace("2017", "17", $ticketCode);
    $ticketCode = str_replace("2018", "18", $ticketCode);
    $ticketCode = str_replace("2019", "19", $ticketCode);
    $ticketCode = str_replace("2020", "20", $ticketCode);
    $ticketCode = str_replace("2021", "21", $ticketCode);

    $ticketName = $ticketCode."_".$row['jobProduct']."_".$row['ticketCity']."_(".$row['ticketNORF'].")"; 

$custState = $row['custState'];
$ticketState = $row['ticketState'];
if ($ticketState == 'Choose One') {$ticketState = $custState; }
  



include $root.'/_shared/status-colors.php'; 

$ticketStatus = $row['ticketStatus'];
$showTicketID = sprintf('%05d',$row['ticketID']);

					$ticketcount = ($ticketcount == '0') ? 'odd' : 'even'; 

					    $string .= ' <tr class="'.$ticketcount.'">';				        

                           $string .= '<td><a href="/tickets/ticket_view.php?ticketID='.$row['ticketID'].'&custID='.$row['ticketCustID'].'">'.$showTicketID.'</a></td>';
                           $string .= '<td>'.$ticketName.'</td>';
                           $string .= '<td>'.$row['custLName'].', '.$row['custFName'].'</td>';
                           $string .= '<td>'.$row['ticketCity'].', '.$ticketState.'</td>';
                           $string .= '<td>'.$row['ticketStatus'].'</td>';

				        $string .= '</tr>';

				    $ticketcount = ($ticketcount == '1') ? '0' : '1';

				}

	$string .= "</tbody>";
	$string .= "</table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        </div>
        <!-- /.panel -->";
}

else{$string = "<p><span style='margin-left:20px;'>No matches found!</span></p>"; }

echo $string;

}

?>