<div class="well">
    
                                    <h4><span>Ticket Status</span></h4>
                                    <div class="col-md-10">
                                        
                                        <div class="form-group">
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

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-primary" type="submit"><i class="fa  fa-search fa-fw"></i> </button>
                                    </div>
                                        
                                    <div class="clearfix"></div>
                           
</div>