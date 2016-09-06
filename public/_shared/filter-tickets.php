            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                            <div class="panel-heading" style="background-color:#333!important;">
                                <h4><i class="fa fa-file-text fa-fw"></i>Filter Tickets</h4>
                            </div>                    
                        <div style="overflow:auto;padding-top:10px;padding-bottom:20px;">
                            <form id="searchfilter" method="get" action="ticket-filter-results.php">
                                <div class="col-lg-3">
                                    <label>Location</label>
                                    <select class="form-control" name="ticketLocation" >
                                        <option value="">Choose Location</option>
                                        <option value="Norfolk"<? if($ticketLocation== 'Norfolk') echo ' selected="selected"'; ?>>Norfolk</option>
                                        <option value="Columbus"<? if($ticketLocation== 'Columbus') echo ' selected="selected"'; ?>>Columbus</option>
                                        <option value="Sioux City"<? if($ticketLocation== 'Sioux City') echo ' selected="selected"'; ?>>Sioux City</option>

                                    </select>                                
                                </div>
                                <div class="col-lg-3">
                                    <label>Job Type</label>
                                    <select class="form-control" name="jobType" >
                                        <option value="">Choose Type</option>
                                        <option value="Windows"<? if($jobProduct == 'Windows') echo ' selected="selected"'; ?>>Windows</option>
                                        <option value="Siding"<? if($jobProduct == 'Siding') echo ' selected="selected"'; ?>>Siding</option>
                                        <option value="Doors"<? if($jobProduct == 'Doors') echo ' selected="selected"'; ?>>Doors</option>
                                        <option value="Window &amp; Door Repair"<? if($jobProduct == 'Window &amp; Door Repair') echo ' selected="selected"'; ?>>Window &amp; Door Repair</option>
                                        <option value="Siding Repair"<? if($jobProduct == 'Siding Repair') echo ' selected="selected"'; ?>>Siding Repair</option>
                                        <option value="Solar Zone Attic"<? if($jobProduct == 'Solar Zone Attic') echo ' selected="selected"'; ?>>Solar Zone & Attic</option>
                                    </select>                                
                                </div>                            
                                <div class="col-lg-3">
                                    <label>Status</label>
                                    <select class="form-control" name="ticketStatus" >
                                        <option value="">Choose Status</option>
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