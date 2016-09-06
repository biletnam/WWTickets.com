           <?php $ticketcount = ($ticketcount == '0') ? 'odd' : 'even'; ?>

            <tr <?php echo $ticketcount; ?> <?php echo $current_customer?>>
                <td><a href="/customers/cust_view.php?ID=<?php echo $custID; ?>">

                    <?php if (!empty($custComp)) {echo "Company: "; echo $custComp; echo "<br/>";} 

                    else{
                     echo $custLName;echo" ";echo $custFName;
                    } ?>

                </a></td>
                <td><a href="/customers/cust_view.php?ID=<?php echo $custID; ?>"><?php echo $custBillAdd ?></a></td>
                <td><a href="/customers/cust_view.php?ID=<?php echo $custID; ?>"><?php echo $custCity ?>, <?php echo $custState ?></a></td>
                <td class="center"><?php echo $custPhone ?></td>
                <td class="center"><a href="mailto:<?php echo $custEmail; ?>"><?php echo $custEmail; ?></a></td>
                <td>

<?php 

switch ($storeID) {
	case '72': $store = 'Norfolk';break;
	case '73': $store = 'Columbus';break;
	case '112': $store = 'Sioux City';break;
	default: $store = ''; break;
}
echo $store;
 ?>
</td>
            </tr>

<?php $ticketcount = ($ticketcount == '1') ? '0' : '1'; ?>