        <?php $ticketcount = ($ticketcount == '0') ? 'odd' : 'even'; ?>

        <tr class="<?php echo $ticketcount; ?>">
            <td><a href="/sin-bin/view.php?ID=<?php echo $sinID; ?>"><?php echo $sinName ?></a></td>
            <td><?php echo $sinQty ?></td>
            <td><?php echo $sinModel ?></td>
            <td><?php echo $sinSize ?></td>
            <td><?php echo $sinInterior ?></td>
            <td><?php echo $sinExterior ?></td>
            <td><?php echo $sinGrid ?></td>
            <td><?php echo $sinSerial ?></td>
            <td><?php echo $sinNail ?></td>
            <td><?php echo $sinPrice ?></td>
            <td><?php echo $sinDonated ?></td>
            <td><?php echo $sinDate ?></td>
        </tr>
    <?php $ticketcount = ($ticketcount == '1') ? '0' : '1'; ?>

