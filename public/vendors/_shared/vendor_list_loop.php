           <?php $ticketcount = ($ticketcount == '0') ? 'odd' : 'even'; ?>

            <tr class="<?php echo $ticketcount; ?>">
                <td><a href="/vendors/ad-view.php?adID=<?php echo $adID; ?>&vendorID=<?php echo $vendorID; ?>"><?php echo $adName; ?></a></td>
                <td><?php echo $adLocation; ?></td>
                <td><?php echo $adstartContract; ?></td>
                <td><?php echo $adendContract; ?></td>
                <td><?php echo $adRenewal; ?></td>
                <td>$<?php echo $adPrice; ?></td>
            </tr>

            <?php $ticketcount = ($ticketcount == '1') ? '0' : '1'; ?>