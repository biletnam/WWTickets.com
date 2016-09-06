        <?php $ticketcount = ($ticketcount == '0') ? 'odd' : 'even'; ?>

        <tr class="<?php echo $ticketcount; ?>">
            <td><a href="/city/edit.php?ID=<?php echo $city_id; ?>"><?php echo $city_name; ?></a></td>
            <td><?php echo $city_state; ?></td>
            <td><?php echo $city_zip; ?></td>
        </tr>
    <?php $ticketcount = ($ticketcount == '1') ? '0' : '1'; ?>

