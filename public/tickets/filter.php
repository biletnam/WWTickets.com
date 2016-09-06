
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                            <div class="panel-heading" style="background-color:#333!important;">
                                <h4><i class="fa fa-file-text fa-fw"></i>Filter Tickets</h4>
                            </div>                    
                        <div style="overflow:auto;padding-top:10px;padding-bottom:20px;">
                            <form id="searchfilter" method="get" action="/tickets/ticket-filter-results.php">
                               <div class="col-lg-2">
                                    <label>Store Location</label>
                                    <select class="form-control" name="ticketLocation" >
                                        <option value="">All Locations</option>
                                        <option value="Norfolk"<? if($ticketLocation== 'Norfolk') echo ' selected="selected"'; ?>>Norfolk</option>
                                        <option value="Columbus"<? if($ticketLocation== 'Columbus') echo ' selected="selected"'; ?>>Columbus</option>
                                        <option value="Sioux City"<? if($ticketLocation== 'Sioux City') echo ' selected="selected"'; ?>>Sioux City</option>

                                    </select>                                
                                </div>
                                <div class="col-lg-2">
                                    <label>Job Type</label>
                                    <select class="form-control" name="jobType" >
                                        <option value="">All Types</option>
                                        <option value="Windows"<? if($jobProduct == 'Windows') echo ' selected="selected"'; ?>>Windows</option>
                                        <option value="Siding"<? if($jobProduct == 'Siding') echo ' selected="selected"'; ?>>Siding</option>
                                        <option value="Doors"<? if($jobProduct == 'Doors') echo ' selected="selected"'; ?>>Doors</option>
                                        <option value="Window Door Repair"<? if($jobProduct == 'Window Door Repair') echo ' selected="selected"'; ?>>Window &amp; Door Repair</option>
                                        <option value="Siding Repair"<? if($jobProduct == 'Siding Repair') echo ' selected="selected"'; ?>>Siding Repair</option>
                                        <option value="Solar Zone Attic"<? if($jobProduct == 'Solar Zone Attic') echo ' selected="selected"'; ?>>Solar Zone & Attic</option>
                                    </select>                                
                                </div>                    

<? 
/*
Author  : Scott DeBoer
Date    : 15.12.16
Comments: Brent Frey requested to change status on every view instead of going into every ticket
*/
        $soldDate = date("m/j/Y",strtotime($soldDate)); if ($soldDate == '12/31/1969') {$soldDate = ''; } if ($soldDate == '11/30/-0001') { $soldDate = ''; }
        $ticketSSold = date("m/j/Y",strtotime($ticketSSold)); if ($ticketSSold == '12/31/1969') {$ticketSSold = ''; } if ($ticketSSold == '11/30/-0001') { $ticketSSold = ''; }
        $ticketSOrdered = date("m/j/Y",strtotime($ticketSOrdered)); if ($ticketSOrdered == '12/31/1969') {$ticketSOrdered = ''; } if ($ticketSOrdered == '11/30/-0001') { $ticketSOrdered = ''; }
        $ticketSReceived = date("m/j/Y",strtotime($ticketSReceived)); if ($ticketSReceived == '12/31/1969') {$ticketSReceived = ''; } if ($ticketSReceived == '11/30/-0001') { $ticketSReceived = ''; }
        $ticketSInstalled = date("m/j/Y",strtotime($ticketSInstalled)); if ($ticketSInstalled == '12/31/1969') {$ticketSInstalled = ''; } if ($ticketSInstalled == '11/30/-0001') { $ticketSInstalled = ''; }
        $ticketSInvoiced = date("m/j/Y",strtotime($ticketSInvoiced)); if ($ticketSInvoiced == '12/31/1969') {$ticketSInvoiced = ''; } if ($ticketSInvoiced == '11/30/-0001') { $ticketSInvoiced = ''; }
        $ticketSPaid = date("m/j/Y",strtotime($ticketSPaid)); if ($ticketSPaid == '12/31/1969') {$ticketSPaid = ''; } if ($ticketSPaid == '11/30/-0001') { $ticketSPaid = ''; }
        $ticketSProposalGiven = date("m/j/Y",strtotime($ticketSProposalGiven)); if ($ticketSProposalGiven == '12/31/1969') {$ticketSProposalGiven = ''; } if ($ticketSProposalGiven == '11/30/-0001') { $ticketSProposalGiven = ''; }
        $ticketSIncomplete = date("m/j/Y",strtotime($ticketSIncomplete)); if ($ticketSIncomplete == '12/31/1969') {$ticketSIncomplete = ''; } if ($ticketSIncomplete == '11/30/-0001') { $ticketSIncomplete = ''; }
        $ticketSPending = date("m/j/Y",strtotime($ticketSPending)); if ($ticketSPending == '12/31/1969') {$ticketSPending = ''; } if ($ticketSPending == '11/30/-0001') { $ticketSPending = ''; }
        $ticketSScheduled = date("m/j/Y",strtotime($ticketSScheduled)); if ($ticketSScheduled == '12/31/1969') {$ticketSScheduled = ''; } if ($ticketSScheduled == '11/30/-0001') { $ticketSScheduled = ''; }        
?>

                                        
                                <div class="col-lg-2">
                                    <label>Ticket Status</label>
                                    <select class="form-control" name="ticketStatus" >
                                                <option value=""<? if($ticketStatus == '') echo ' selected="selected"'; ?>>Choose One</option>
                                                <option value="Rejected"<? if($ticketStatus == 'Rejected') echo ' selected="selected"'; ?>>Rejected</option>
                                                <option value="Unscheduled"<? if($ticketStatus == 'Unscheduled') echo ' selected="selected"'; ?>>Unscheduled Estimate</option>
                                                <!-- <option value="Need Estimate"<? if($ticketStatus == 'Need Estimate') echo ' selected="selected"'; ?>>Need Estimate</option> -->
                                                <option value="Scheduled"<? if($ticketStatus == 'Scheduled') echo ' selected="selected"'; ?>>Scheduled Estimate</option>
                                                <option value="Proposal Given"<? if($ticketStatus == 'Proposal Given') echo ' selected="selected"'; ?>>Proposal Given <?php if ($ticketSProposalGiven != '') {echo "(".$ticketSProposalGiven.")"; } ?></option>
                                                <option value="Sold"<? if($ticketStatus == 'Sold') echo ' selected="selected"'; ?>>Sold <?php if ($soldDate != '') {echo "(".$soldDate.")"; } ?> </option>
                                                <option value="Needs Measured"<? if($ticketStatus == 'Needs Measured') echo ' selected="selected"'; ?>>Needs Measured</option>
                                                <option value="Need to Order"<? if($ticketStatus == 'Need to Order') echo ' selected="selected"'; ?>>Need to Order</option>
                                                <option value="Ordered"<? if($ticketStatus == 'Ordered') echo ' selected="selected"'; ?>>Ordered <?php if ($ticketSOrdered != '') {echo "(".$ticketSOrdered.")"; } ?></option>
                                                <option value="Received"<? if($ticketStatus == 'Received') echo ' selected="selected"'; ?>>Received <?php if ($ticketSReceived != '') {echo "(".$ticketSReceived.")"; } ?></option>
                                                <option value="Went To Columbus"<? if($ticketStatus == 'Went To Columbus') echo ' selected="selected"'; ?>>Went To Columbus</option>
                                                <option value="Ready to Install"<? if($ticketStatus == 'Ready to Install') echo ' selected="selected"'; ?>>Ready to Install</option>
                                                <option value="Scheduled to Install"<? if($ticketStatus == 'Scheduled to Install') echo ' selected="selected"'; ?>>Scheduled to Install <?php if ($ticketSScheduled != '') {echo "(".$ticketSScheduled.")"; } ?></option>
                                                <option value="Installed"<? if($ticketStatus == 'Installed') echo ' selected="selected"'; ?>>Installed <?php if ($ticketSInstalled != '') {echo "(".$ticketSInstalled.")"; } ?></option>
                                                <option value="Pending Wrap"<? if($ticketStatus == 'Pending Wrap') echo ' selected="selected"'; ?>>Pending Wrap <?php if ($ticketSPending != '') {echo "(".$ticketSPending.")"; } ?></option>
                                                <option value="Incomplete"<? if($ticketStatus == 'Incomplete') echo ' selected="selected"'; ?>>Incomplete <?php if ($ticketSIncomplete != '') {echo "(".$ticketSIncomplete.")"; } ?></option>
                                                <option value="Complete"<? if($ticketStatus == 'Complete') echo ' selected="selected"'; ?>>Complete</option>
                                                <option value="Paid"<? if($ticketStatus == 'Paid') echo ' selected="selected"'; ?>>Paid <?php if ($ticketSPaid != '') {echo "(".$ticketSPaid.")"; } ?></option>
                                                <option value="Gift Sent"<? if($ticketStatus == 'Gift Sent') echo ' selected="selected"'; ?>>Gift Sent</option>
                                                <!-- <option value="Rejected"<? if($ticketStatus == 'Rejected') echo ' selected="selected"'; ?>>Rejected</option> -->
                                                <!-- <option value="Proposal"<? if($ticketStatus == 'Proposal') echo ' selected="selected"'; ?>>Proposal</option> -->
                                                <!-- <option value="Old Proposals"<? if($ticketStatus == 'Old Proposals') echo ' selected="selected"'; ?>>Old Proposals</option> -->
                                      ?>
                                    </select>
                              
                                </div>
                                <div class="col-lg-2">
                                    <label>Ticket City</label>
                                    <select class="form-control" name="ticketCity" >
                                        <option value="">All Cities</option>

                                        <?php 

                                        $citySearch = $ticketCity;
                                        
                                            $post_request = ("SELECT ticketCity FROM customerTickets GROUP BY ticketCity DESC ORDER BY ticketCity ASC");
                                            $post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
                                            
                                            while ($post_row = mysql_fetch_array($post_result)) { 
                                                extract($post_row);
                                                $ticketSearchCity = $post_row['ticketCity'];?>
                                                    <option value="<?php echo $ticketCity ?>"<? if($ticketCity == $citySearch) echo ' selected="selected"'; ?>><?php echo $ticketCity; ?></option>
                                            <? } ?>
                                    </select>
                                </div>     
                                <div class="col-lg-2">
                                    <label>Ticket Assigned</label>
                                    <select class="form-control" name="ticketAssign" >
                                        <option value="">All Installers</option>
                                        
                                        <?
                                            $emp_request = ("SELECT ID,firstName,lastname from cmsUsers ORDER BY firstName ASC");
                                            $emp_result = mysql_query ($emp_request,$db) or die ("Query failed: $emp_request");
                                            
                                            while ($emp_row = mysql_fetch_array($emp_result)) { 
                                                extract($emp_row);
                                                $empName = $firstName;
                                                if ($empName == 'Power') {}
                                                else{
                                                echo '<option value="'.$empName.'"'.($empName == $ticketAssign ? ' selected="selected"' : '').'>'.$empName.'</option>'."\r";
                                                }
                                            }
                                        ?>

                                    </select>
                                </div>                                                                
                                         <div class="col-md-2">
                                            <label for="">&nbsp;</label>
                                            <br/>
                                            <button class="btn btn-primary" type="submit"><i class="fa  fa-search fa-fw"></i> </button>
                                        </div>                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>