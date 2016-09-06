        <?php $ticketcount = ($ticketcount == '0') ? 'odd' : 'even'; ?>

        <tr class="<?php echo $ticketcount; ?>">
            <?php 
                $name_request = ("SELECT custID,custFName,custLName FROM customerInfo WHERE custID = '$ticketCustID'");
                $name_result = mysql_query ($name_request,$db) or die ("Query failed: $name_request");
                
                while ($name_row = mysql_fetch_array($name_result)) { 
                    extract($name_row);    
                        $ticketColum = date("m/j/Y",strtotime($ticketColum));
                        if ($ticketColum == '12/31/1969') {$ticketColum = ''; }   if ($ticketColum == '11/30/-0001') {$ticketColum = ''; }  
                }
             ?>
            <td><a href="/tickets/ticket_view.php?ticketID=<?php echo $ticketID ?>&custID=<?php echo $ticketCustID; ?>"><?php echo $showTicketID; ?></td>

            <?php include $root.'/_shared/status-colors.php'; ?>

<?php 

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
<td><?php echo $ticketName; ?></td>
            <td><?php echo $custLName; ?>, <?php echo $custFName; ?></td>
<td><?php echo $ticketCity; ?>, <?php echo $custState; ?></td>
<?php $ticketSInvoiced = date("m/j/Y",strtotime($ticketSInvoiced)); if ($ticketSInvoiced == '0000-00-00') {$ticketSInvoiced = ''; } if ($ticketSInvoiced == '11/30/-0001') { $ticketSInvoiced = ''; }if ($ticketSInvoiced == '12/31/1969') { $ticketSInvoiced = ''; } ?>

        <td>
          
            <form id="myInvoice<?php echo $ticketID; ?>" method="POST" action="/tickets/form/updt-invoice.php" style="width:20px;">
            <input type="hidden" name="ticketID" value="<?php echo $ticketID; ?>">    
                <input style="text-align:center;" type="checkbox" id="checkboxInv<?php echo $ticketID; ?>" value="1" name="ticketInvoiced"<? if($ticketInvoiced == '1') echo ' checked="checked"'; ?> />
            </form>

            <div id="outputInv<?php echo $ticketID; ?>"></div>
            <span><?php echo $ticketSInvoiced; ?></span>
            <script>
            $(document).ready(function() {
               $('#checkboxInv<?php echo $ticketID;?>').click( function() {
                   $.ajax({ // create an AJAX call...
                       data: $('#myInvoice<?php echo $ticketID;?>').serialize(), // serialize the form
                       type: $('#myInvoice<?php echo $ticketID;?>').attr('method'), // GET or POST from the form
                       url: $('#myInvoice<?php echo $ticketID;?>').attr('action'), // the file to call from the form
                       success: function(response) { // on success..
                           $('#outputInv<?php echo $ticketID; ?>').html(response); // update the DIV
                       }
                   });
                });
            });
            </script>

        </td>


            <td <?php echo $color; ?>>


<? 
/*
Author  : Scott DeBoer
Date    : 15.12.16
Comments: Brent Frey requested to change status on every view instead of going into every ticket
*/
        $soldDate = date("m/j/Y",strtotime($soldDate)); if ($soldDate == '12/31/1969') {$soldDate = ''; } if ($soldDate == '11/30/-0001') { $soldDate = ''; }
        $ticketSInstalled = date("m/j/Y",strtotime($ticketSInstalled)); if ($ticketSInstalled == '12/31/1969') {$ticketSInstalled = ''; } if ($ticketSInstalled == '11/30/-0001') { $ticketSInstalled = ''; }
        $ticketSSold = date("m/j/Y",strtotime($ticketSSold)); if ($ticketSSold == '12/31/1969') {$ticketSSold = ''; } if ($ticketSSold == '11/30/-0001') { $ticketSSold = ''; }
        $ticketSOrdered = date("m/j/Y",strtotime($ticketSOrdered)); if ($ticketSOrdered == '12/31/1969') {$ticketSOrdered = ''; } if ($ticketSOrdered == '11/30/-0001') { $ticketSOrdered = ''; }
        $ticketSReceived = date("m/j/Y",strtotime($ticketSReceived)); if ($ticketSReceived == '12/31/1969') {$ticketSReceived = ''; } if ($ticketSReceived == '11/30/-0001') { $ticketSReceived = ''; }
        $ticketSInvoiced = date("m/j/Y",strtotime($ticketSInvoiced)); if ($ticketSInvoiced == '12/31/1969') {$ticketSInvoiced = ''; } if ($ticketSInvoiced == '11/30/-0001') { $ticketSInvoiced = ''; }
        $ticketSPaid = date("m/j/Y",strtotime($ticketSPaid)); if ($ticketSPaid == '12/31/1969') {$ticketSPaid = ''; } if ($ticketSPaid == '11/30/-0001') { $ticketSPaid = ''; }
        $ticketSProposalGiven = date("m/j/Y",strtotime($ticketSProposalGiven)); if ($ticketSProposalGiven == '12/31/1969') {$ticketSProposalGiven = ''; } if ($ticketSProposalGiven == '11/30/-0001') { $ticketSProposalGiven = ''; }
        $ticketSIncomplete = date("m/j/Y",strtotime($ticketSIncomplete)); if ($ticketSIncomplete == '12/31/1969') {$ticketSIncomplete = ''; } if ($ticketSIncomplete == '11/30/-0001') { $ticketSIncomplete = ''; }
$ticketSComplete = date("m/j/Y",strtotime($ticketSComplete)); if ($ticketSComplete == '12/31/1969') {$ticketSComplete = ''; } if ($ticketSComplete == '11/30/-0001') { $ticketSComplete = ''; }
        $ticketSPending = date("m/j/Y",strtotime($ticketSPending)); if ($ticketSPending == '12/31/1969') {$ticketSPending = ''; } if ($ticketSPending == '11/30/-0001') { $ticketSPending = ''; }
        $ticketSScheduled = date("m/j/Y",strtotime($ticketSScheduled)); if ($ticketSScheduled == '12/31/1969') {$ticketSScheduled = ''; } if ($ticketSScheduled == '11/30/-0001') { $ticketSScheduled = ''; }        
?>


            <form id="myform<?php echo $ticketID; ?>" method="POST" action="/tickets/form/updt-ticket-status.php">
            <input type="hidden" name="ticketID" value="<?php echo $ticketID; ?>">    
                <select class="form-control" name="ticketStatus" id="dropdown<?php echo $ticketID; ?>">
                                                <option value=""<? if($ticketStatus == '') echo ' selected="selected"'; ?>>Choose One</option>
                                                <option value="Rejected"<? if($ticketStatus == 'Rejected') echo ' selected="selected"'; ?>>Rejected</option>
                                                <option value="Unscheduled"<? if($ticketStatus == 'Unscheduled') echo ' selected="selected"'; ?>>Unscheduled Estimate</option>
                                                <!-- <option value="Need Estimate"<? if($ticketStatus == 'Need Estimate') echo ' selected="selected"'; ?>>Need Estimate</option> -->
                                                <option value="Scheduled"<? if($ticketStatus == 'Scheduled') echo ' selected="selected"'; ?>>Scheduled Estimate</option>
                                                <option value="Proposal Given"<? if($ticketStatus == 'Proposal Given') echo ' selected="selected"'; ?>>Proposal Given <?php if ($ticketSProposalGiven != '') {echo "(".$ticketSProposalGiven.")"; } ?></option>
                                                <option value="Sold"<? if($ticketStatus == 'Sold') echo ' selected="selected"'; ?>>Sold <?php if ($soldDate != '') {echo "(".$soldDate.")"; } ?> </option>
                                                <option value="Needs Measured"<? if($ticketStatus == 'Needs Measured') echo ' selected="selected"'; ?>>Needs Measured</option>
                                                <option value="Need to Order"<? if($ticketStatus == 'Need to Order') echo ' selected="selected"'; ?>>Need to Order</option>
                                                <option value="Ordered"<? if($ticketStatus == 'Ordered') echo ' selected="selected"'; ?>>Ordered <?php if ($ticketSOrdered != '') {echo "(".$ticketSOrdered.")"; } ?></option>
                                                <option value="Received"<? if($ticketStatus == 'Received') echo ' selected="selected"'; ?>>Received <?php if ($ticketSReceived != '') {echo "(".$ticketSReceived.")"; } ?></option>
                                                <option value="Went To Columbus"<? if($ticketStatus == 'Went To Columbus') echo ' selected="selected"'; ?>>Went To Columbus</option>
                                                <option value="Ready to Install"<? if($ticketStatus == 'Ready to Install') echo ' selected="selected"'; ?>>Ready to Install</option>
                                                <option value="Scheduled to Install"<? if($ticketStatus == 'Scheduled to Install') echo ' selected="selected"'; ?>>Scheduled to Install <?php if ($ticketSScheduled != '') {echo "(".$ticketSScheduled.")"; } ?></option>
                                                <option value="Installed"<? if($ticketStatus == 'Installed') echo ' selected="selected"'; ?>>Installed <?php if ($ticketSInstalled != '') {echo "(".$ticketSInstalled.")"; } ?></option>
                                                <option value="Pending Wrap"<? if($ticketStatus == 'Pending Wrap') echo ' selected="selected"'; ?>>Pending Wrap <?php if ($ticketSPending != '') {echo "(".$ticketSPending.")"; } ?></option>
                                                <option value="Incomplete"<? if($ticketStatus == 'Incomplete') echo ' selected="selected"'; ?>>Incomplete <?php if ($ticketSIncomplete != '') {echo "(".$ticketSIncomplete.")"; } ?></option>
                                                <option value="Complete"<? if($ticketStatus == 'Complete') echo ' selected="selected"'; ?>>Complete <?php if ($ticketSComplete != '') {echo "(".$ticketSComplete.")"; } ?></option>
                                                <option value="Paid"<? if($ticketStatus == 'Paid') echo ' selected="selected"'; ?>>Paid <?php if ($ticketSPaid != '') {echo "(".$ticketSPaid.")"; } ?></option>
                                                <option value="Gift Sent"<? if($ticketStatus == 'Gift Sent') echo ' selected="selected"'; ?>>Gift Sent</option>
                                                <!-- <option value="Rejected"<? if($ticketStatus == 'Rejected') echo ' selected="selected"'; ?>>Rejected</option> -->
                                                <!-- <option value="Proposal"<? if($ticketStatus == 'Proposal') echo ' selected="selected"'; ?>>Proposal</option> -->
                                                <!-- <option value="Old Proposals"<? if($ticketStatus == 'Old Proposals') echo ' selected="selected"'; ?>>Old Proposals</option> -->
                </select>            
            </form>

            <div id="output<?php echo $ticketID; ?>"></div>

        </td>
            <td> <?php if ($ticketsHot == '1') { ?> <img src="/_images/siren.gif" alt="" style="width:15px;"> 
          <? } else{ echo ''; } ?> 


            <form id="myHot<?php echo $ticketID; ?>" method="POST" action="/tickets/form/updt-hot.php" style="width:20px;">
            <input type="hidden" name="ticketID" value="<?php echo $ticketID; ?>">    
                <input style="text-align:center;" type="checkbox" id="checkboxHot<?php echo $ticketID; ?>" value="1" name="ticketsHot"<? if($ticketsHot == '1') echo ' checked="checked"'; ?> />
            </form>
      </td>
                    
            <td>
<?php if ($ticketColum != '' && $ticketColum != '0000-00-00') { ?>
<img src="/_images/columbus-icon.png" alt="" title="<?php echo $ticketColum; ?>"> <?php 




}else{echo '&nbsp;';} ?>
</td>

            <script>
    
$(document).ready(function() {
   $('#checkboxHot<?php echo $ticketID;?>').click( function() {
       $.ajax({ // create an AJAX call...
           data: $('#myHot<?php echo $ticketID;?>').serialize(), // serialize the form
           type: $('#myHot<?php echo $ticketID;?>').attr('method'), // GET or POST from the form
           url: $('#myHot<?php echo $ticketID;?>').attr('action'), // the file to call from the form
       });
    });     
   $('#dropdown<?php echo $ticketID;?>').change( function() {
       $.ajax({ // create an AJAX call...
           data: $('#myform<?php echo $ticketID;?>').serialize(), // serialize the form
           type: $('#myform<?php echo $ticketID;?>').attr('method'), // GET or POST from the form
           url: $('#myform<?php echo $ticketID;?>').attr('action'), // the file to call from the form
           success: function(response) { // on success..
               $('#output<?php echo $ticketID; ?>').html(response); // update the DIV
           }
       });
    });
});
</script>
        </tr>

    <?php $ticketcount = ($ticketcount == '1') ? '0' : '1'; ?>