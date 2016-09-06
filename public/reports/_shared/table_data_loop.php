                                        <tr class="odd">
                                            <td><?php echo $thisMonth;?></td>
                                            <td>

                                                <?
                                                  $post_request = ("SELECT SUM(ticketCOL) FROM customerTickets WHERE ticketMonth = '$thisMonth' AND ticketYear = '$thisYear';");
                                                  $post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
                                                  
                                                  while ($post_row = mysql_fetch_array($post_result)) { 
                                                    extract($post_row);
                                                    echo $post_row['SUM(ticketCOL)'];
                                                  }
                                                ?>

                                              </td>
                                            <td>
                                               <?
                                                  $post_request = ("SELECT SUM(ticketNORF) FROM customerTickets WHERE ticketMonth = '$thisMonth' AND ticketYear = '$thisYear';");
                                                  $post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
                                                  
                                                  while ($post_row = mysql_fetch_array($post_result)) { 
                                                    extract($post_row);
                                                    echo $post_row['SUM(ticketNORF)'];
                                                  }
                                                ?>                                              
                                            </td>
                                            <td>
                                               <?
                                                  $post_request = ("SELECT SUM(ticketAMI) FROM customerTickets WHERE ticketMonth = '$thisMonth' AND ticketYear = '$thisYear';");
                                                  $post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
                                                  
                                                  while ($post_row = mysql_fetch_array($post_result)) { 
                                                    extract($post_row);
                                                    echo $post_row['SUM(ticketAMI)'];
                                                  }
                                                ?>                                              
                                            </td>
                                            <td>
                                               <?
                                                  $post_request = ("SELECT SUM(ticketAMIFO) FROM customerTickets WHERE ticketMonth = '$thisMonth' AND ticketYear = '$thisYear';");
                                                  $post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
                                                  
                                                  while ($post_row = mysql_fetch_array($post_result)) { 
                                                    extract($post_row);
                                                    echo $post_row['SUM(ticketAMIFO)'];
                                                  }
                                                ?>                                              
                                            </td>
                                        </tr>
                                        <tr class="even">
                                            <td><?php echo $lastMonth;?></td>
                                            <td>

                                                <?
                                                  $post_request = ("SELECT SUM(ticketCOL) FROM customerTickets WHERE ticketMonth = '$lastMonth' AND ticketYear = '$thisYear';");
                                                  $post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
                                                  
                                                  while ($post_row = mysql_fetch_array($post_result)) { 
                                                    extract($post_row);
                                                    echo $post_row['SUM(ticketCOL)'];
                                                  }
                                                ?>

                                              </td>
                                            <td>
                                               <?
                                                  $post_request = ("SELECT SUM(ticketNORF) FROM customerTickets WHERE ticketMonth = '$lastMonth' AND ticketYear = '$thisYear';");
                                                  $post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
                                                  
                                                  while ($post_row = mysql_fetch_array($post_result)) { 
                                                    extract($post_row);
                                                    echo $post_row['SUM(ticketNORF)'];
                                                  }
                                                ?>                                              
                                            </td>
                                            <td>
                                               <?
                                                  $post_request = ("SELECT SUM(ticketAMI) FROM customerTickets WHERE ticketMonth = '$lastMonth' AND ticketYear = '$thisYear';");
                                                  $post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
                                                  
                                                  while ($post_row = mysql_fetch_array($post_result)) { 
                                                    extract($post_row);
                                                    echo $post_row['SUM(ticketAMI)'];
                                                  }
                                                ?>                                              
                                            </td>
                                            <td>
                                               <?
                                                  $post_request = ("SELECT SUM(ticketAMIFO) FROM customerTickets WHERE ticketMonth = '$lastMonth' AND ticketYear = '$thisYear';");
                                                  $post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
                                                  
                                                  while ($post_row = mysql_fetch_array($post_result)) { 
                                                    extract($post_row);
                                                    echo $post_row['SUM(ticketAMIFO)'];
                                                  }
                                                ?>                                              
                                            </td>
                                        </tr>
                                        <tr class="odd">
                                            <td><?php echo $threeMonth;?></td>
                                            <td>

                                                <?
                                                  $post_request = ("SELECT SUM(ticketCOL) FROM customerTickets WHERE ticketMonth = '$threeMonth' AND ticketYear = '$thisYear';");
                                                  $post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
                                                  
                                                  while ($post_row = mysql_fetch_array($post_result)) { 
                                                    extract($post_row);
                                                    echo $post_row['SUM(ticketCOL)'];
                                                  }
                                                ?>

                                              </td>
                                            <td>
                                               <?
                                                  $post_request = ("SELECT SUM(ticketNORF) FROM customerTickets WHERE ticketMonth = '$threeMonth' AND ticketYear = '$thisYear';");
                                                  $post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
                                                  
                                                  while ($post_row = mysql_fetch_array($post_result)) { 
                                                    extract($post_row);
                                                    echo $post_row['SUM(ticketNORF)'];
                                                  }
                                                ?>                                              
                                            </td>
                                            <td>
                                               <?
                                                  $post_request = ("SELECT SUM(ticketAMI) FROM customerTickets WHERE ticketMonth = '$threeMonth' AND ticketYear = '$thisYear';");
                                                  $post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
                                                  
                                                  while ($post_row = mysql_fetch_array($post_result)) { 
                                                    extract($post_row);
                                                    echo $post_row['SUM(ticketAMI)'];
                                                  }
                                                ?>                                              
                                            </td>
                                            <td>
                                               <?
                                                  $post_request = ("SELECT SUM(ticketAMIFO) FROM customerTickets WHERE ticketMonth = '$threeMonth' AND ticketYear = '$thisYear';");
                                                  $post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
                                                  
                                                  while ($post_row = mysql_fetch_array($post_result)) { 
                                                    extract($post_row);
                                                    echo $post_row['SUM(ticketAMIFO)'];
                                                  }
                                                ?>                                              
                                            </td>
                                        </tr>