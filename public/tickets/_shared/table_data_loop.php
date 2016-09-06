        <?php $ticketcount = ($ticketcount == '0') ? 'odd' : 'even'; ?>

        <tr class="<?php echo $ticketcount; ?>">
            <td><a href="/tickets/ticket_view.php?ticketID=<?php echo $ticketID; ?>&custID=<?php echo $custID ?>"><?php echo $showTicketID; ?></a></td>
            
            <?php include $root.'/_shared/status-colors.php'; ?>

            <td <?php echo $color; ?>><?php echo $ticketStatus ?></td>
            <td><?php echo $ticketDate ?></td>
            <td><?php echo $diy ?></td>
            <td><?php echo $ticketCOL ?></td>
            <td><?php echo $ticketNORF ?></td>
            <td><?php echo $ticketMI ?></td>
            <td><?php echo $ticketMIOrd ?></td>
            <td><?php echo $ticketAMI ?></td>
            <td><?php echo $ticketAMIFO ?></td>
            <td>
            <?php 
                $warranty_request = ("SELECT * FROM warrantyTransfer WHERE warrantyTransfer.ticketID = '$ticketID'");
                $warranty_result = mysql_query ($warranty_request,$db) or die ("Query failed: $warranty_request");
                
                while ($warranty_row = mysql_fetch_array($warranty_result)) { 
                    extract($warranty_row); 
                    if ($newShow == '1') {echo '<i class="fa fa-check fa-fw"></i>'; }
                    else{ echo '&nbsp;';}
                }
             ?>
            </td>
        </tr>

    <?php $ticketcount = ($ticketcount == '1') ? '0' : '1'; ?>