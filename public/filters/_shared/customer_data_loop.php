                                                    <tr class="odd">
                                                        <td><a href="/tickets/ticket_view.php?ticketID=<?php echo $ticketID; ?>&custID=<?php echo $custID; ?>"><?php echo $custFName; ?> <?php echo $custLName; ?></td>
                                                        <td><?php echo $custBillAdd; ?></td>
                                                        <td><?php echo $custCity; ?></td>
                                                        <td><?php echo $custPrimPhone; ?></td>
                                                        <td>
					                                    <?php 
							                                switch ($custRank) {
							                                    case '1': echo "<img src=\"/_images/1-star.png\" alt=\"\" title=\"\" width=\"70px\" /><br/><br/>"; break;
							                                    case '2': echo "<img src=\"/_images/2-star.png\" alt=\"\" title=\"\" width=\"70px\" /><br/><br/>"; break;
							                                    case '3': echo "<img src=\"/_images/3-star.png\" alt=\"\" title=\"\" width=\"70px\" /><br/><br/>"; break;
							                                    case '4': echo "<img src=\"/_images/4-star.png\" alt=\"\" title=\"\" width=\"70px\" /><br/><br/>"; break;
							                                    case '5': echo "<img src=\"/_images/5-star.png\" alt=\"\" title=\"\" width=\"70px\" /><br/><br/>"; break;

							                                }
						                                ?>                                                    	
                                                        </td>
                                                    </tr>