        <?php $ticketcount = ($ticketcount == '0') ? 'odd' : 'even'; ?>

        <tr class="<?php echo $ticketcount; ?>">
            <td><?php echo $installerName; ?></td>
            <td><?php echo $installerType; ?></td>
            <td><?php echo $installerNum; ?></td>
            <td><a href="/tickets/installers/edit.php?installerID=<?php echo $installerID; ?>&custID=<?php echo $custID; ?>">Edit</a></td>
        </tr>

    <?php $ticketcount = ($ticketcount == '1') ? '0' : '1'; ?>