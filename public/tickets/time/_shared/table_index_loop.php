        <?php $ticketcount = ($ticketcount == '0') ? 'odd' : 'even'; ?>

        <tr class="<?php echo $ticketcount; ?>">
            <td><?php echo $empID; ?></td>
            <td><?php echo $timeDate; ?></td>
            <td><?php echo $timeNotes; ?></td>
            <td><?php echo $timeTime ?> min</td>
            <td><a href="/tickets/time/edit.php?timeID=<?php echo $timeID; ?>&custID=<?php echo $custID; ?>">Edit</a></td>
        </tr>

    <?php $ticketcount = ($ticketcount == '1') ? '0' : '1'; ?>