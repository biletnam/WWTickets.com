           <?php $ticketcount = ($ticketcount == '0') ? 'odd' : 'even'; ?>

            <tr class="<?php echo $ticketcount; ?>">
                <td><a href="/vendors/view.php?vendorID=<?php echo $vendorID; ?>"><?php echo $vendorName; ?></a></td>
                <td><?php echo $vendorContact ?></td>
                <td><?php echo $vendorPhone ?></td>
                <td class="center"><?php echo $vendorType ?></td>
            </tr>

            <?php $ticketcount = ($ticketcount == '1') ? '0' : '1'; ?>