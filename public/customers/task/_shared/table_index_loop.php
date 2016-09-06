        <?php $ticketcount = ($ticketcount == '0') ? 'odd' : 'even'; ?>

                                                        <tr class="<?php echo $ticketcount; ?>">
                                                            <td><?php echo $taskEmp; ?></td>
                                                            <td><?php echo $taskDate; ?></td>
                                                            <td><?php echo $taskNotes; ?></td>
                                                            <td><?php echo $taskStatus; ?></td>
                                                            <td><a href="/tickets/task/edit.php?taskID=<?php echo $taskID; ?>&custID=<?php echo $custID; ?>">Edit</a></td>
                                                        </tr>

    <?php $ticketcount = ($ticketcount == '1') ? '0' : '1'; ?>