                                    <option value="Estimate"<? if($ticketStatus == 'Estimate') echo ' selected="selected"'; ?>>Estimate</option>
                                    <option value="Unscheduled"<? if($ticketStatus == 'Unscheduled') echo ' selected="selected"'; ?>>Unscheduled</option>
                                    <option value="Scheduled"<? if($ticketStatus == 'Scheduled') echo ' selected="selected"'; ?>>Scheduled</option>
                                    <option value="Proposal"<? if($ticketStatus == 'Proposal') echo ' selected="selected"'; ?>>Proposal</option>
                                    <option value="Old Proposals"<? if($ticketStatus == 'Old Proposals') echo ' selected="selected"'; ?>>Old Proposals</option>
                                    <option value="Rejected"<? if($ticketStatus == 'Rejected') echo ' selected="selected"'; ?>>Rejected</option>
                                    <option value="Sold"<? if($ticketStatus == 'Sold') echo ' selected="selected"'; ?>>Sold</option>
                                    <option value="Ordered"<? if($ticketStatus == 'Ordered') echo ' selected="selected"'; ?>>Ordered</option>
                                    <option value="Received"<? if($ticketStatus == 'Received') echo ' selected="selected"'; ?>>Received</option>
                                    <option value="Ready to Install"<? if($ticketStatus == 'Ready to Install') echo ' selected="selected"'; ?>>Ready to Install</option>
                                    <option value="Pending Wrap"<? if($ticketStatus == 'Pending Wrap') echo ' selected="selected"'; ?>>Pending Wrap</option>
                                    <option value="Incomplete"<? if($ticketStatus == 'Incomplete') echo ' selected="selected"'; ?>>Incomplete</option>
                                    <option value="Complete"<? if($ticketStatus == 'Complete') echo ' selected="selected"'; ?>>Complete</option>
                                    <option value="Invoiced"<? if($ticketStatus == 'Invoiced') echo ' selected="selected"'; ?>>Invoiced</option>