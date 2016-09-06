<?php

	// Configure site
	$root = $_SERVER['DOCUMENT_ROOT']; 
	$private = str_replace("public","private",$root);
	include_once("$private/config.php");
	// Verify login
	include_once("$root/lc.php");

$term = strip_tags(substr($_POST['searchit'],0, 100));
$term = mysql_escape_string($term); // Attack Prevention

if($term=="%") echo "Enter Customer Name";

else{

	$query = mysql_query("SELECT * FROM customerInfo WHERE custFName LIKE '{$term}%' OR custLName LIKE '{$term}%' OR custComp LIKE '{$term}%' ORDER BY custLName ASC");

	$string = '<h3 style="margin-left:20px;"> "'.$term.'" Customer</h3>';
	$string .= '<div class="col-lg-12">';
	$string .= "<div class=\"panel panel-default\">
                            <div class=\"panel-heading\">
                                <i class=\"fa fa-group fa-fw\"></i>Customer
                            </div>
                            <div class=\"panel-body\">
                                <div class=\"dataTable_wrapper\">
                                    <table class=\"table table-striped table-bordered table-hover\" id=\"dataTables-example\">
                                        <thead> <tr>
                                            <th>Name</th>
                                            <th>Street</th>
                                            <th>City, State</th>
                                            <th>Telephone</th>
                                            <th>Email Address</th>
                                            <th>Store</th>
                                        </tr></thead>
                                        <tbody>";

				if (mysql_num_rows($query)){
					while($row = mysql_fetch_assoc($query)){ 

					$ticketcount = ($ticketcount == '0') ? 'odd' : 'even'; 

					    $string .= ' <tr class="'.$ticketcount.'">';				        
				           $string .= '<td><a href="/customers/cust_view.php?ID='.$row['custID'].'">'.$row['custLName'].' '.$row['custFName'].'</a></td>';
				           $string .= '<td><a href="/customers/cust_view.php?ID='.$row['custID'].'">'.$row['custBillAdd'].'</a></td>';
				           $string .= '<td><a href="/customers/cust_view.php?ID='.$row['custID'].'">'.$row['custCity'].' '.$row['custState'].'</a></td>';
				           $string .= '<td>'.$row['custPhone'].'</td>';
				           $string .= '<td>'.$row['custEmail'].'</td>';

switch ($row['storeID']) {
	case '72': $store = 'Norfolk';break;
	case '73': $store = 'Columbus';break;
	case '112': $store = 'Sioux City';break;
	default: $store = ''; break;
}




				           $string .= '<td>'.$store.'</td>';
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

else{$string = "<span style='margin-left:20px;'>No matches found!</span>"; }

echo $string;

}

?>