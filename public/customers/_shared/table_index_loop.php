        <?php $ticketcount = ($ticketcount == '0') ? 'odd' : 'even'; ?>

        <tr class="<?php echo $ticketcount; ?>">
            <?php 
                $name_request = ("SELECT custID,custFName,custLName FROM customerInfo WHERE custID = '$ticketCustID'");
                $name_result = mysql_query ($name_request,$db) or die ("Query failed: $name_request");
                
                while ($name_row = mysql_fetch_array($name_result)) { 
                    extract($name_row);        
                }
             ?>
            <td><a href="/tickets/ticket_view.php?ticketID=<?php echo $ticketID ?>&custID=<?php echo $ticketCustID; ?>"><?php echo $showTicketID; ?></td>

            <?php include $root.'/_shared/status-colors.php'; ?>

            <td><?php echo $custLName; ?>, <?php echo $custFName; ?></td>

            <td><?php echo $custCity; ?>, <?php echo $custState;?></td>
            <td <?php echo $color; ?>><?php echo $ticketStatus ?></td>
        </tr>

    <?php $ticketcount = ($ticketcount == '1') ? '0' : '1'; ?>