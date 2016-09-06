 <?php 
####################################
# Special Variable Characters
# Dates
 ####################################
$ticketDate = convertDate($ticketDate);
$ticketOrdDate = convertDate($ticketOrdDate);
$ticketDateM = convertDate($ticketDateM);
$ticketColum = convertDate($ticketColum);
$ticketInstall = convertDate($ticketInstall);
$leadTestEmpDate = convertDate($leadTestEmpDate);
$finalDate = convertDate($finalDate);
$downDate = convertDate($downDate);
$dateInstalled = convertDate($dateInstalled);
$diyReceived = convertDate($diyReceived);
$diyOrdered = convertDate($diyOrdered);
$pamDate = convertDate($pamDate);
$renoDate = convertDate($renoDate);
$paidDate = convertDate($paidDate);
$testDate = convertDate($testDate);
$diyDate = convertDate($diyDate);
$soldDate = convertDate($soldDate);
$ticketSSold = convertDate($ticketSSold);
$ticketSOrdered = convertDate($ticketSOrdered);
$ticketSReceived = convertDate($ticketSReceived);
$ticketSInstalled = convertDate($ticketSInstalled);
$ticketSPaid = convertDate($ticketSPaid);
$ticketSProposalGiven = convertDate($ticketSProposalGiven);
$ticketSIncomplete = convertDate($ticketSIncomplete);
$ticketSComplete = convertDate($ticketSComplete);
$ticketSPending = convertDate($ticketSPending);
$ticketSScheduled = convertDate($ticketSScheduled);
$pwMade = convertDate($pwMade);
####################################

if (empty($custID)) {
    $custID = $_GET['custID'];
}

 ?>
                        

    <input type="hidden" name="custID" value="<? echo $custID; ?>"  />
    <input type="hidden" name="ticketID" value="<? echo $ticketID; ?>"  />
    <input type="hidden" name="appSent" value="<? echo $appSent; ?>"  />


                        <div class="panel-footer">
                            <?php if (pagePermission()) { ?>
                                <div class="pull-right"> <a class="btn btn-primary btn-danger" onclick="return deleteItem();" href="/tickets/ticket_del.php?custID=<?php echo $custID; ?>&ticketID=<?php echo $ticketID;?>">Delete</a> </div>
                            <? } ?>
                                <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save Changes" >Save</button>
                        </div>

                

         



                                <!-- /.col-lg-6 (nested) -->
                                <!--  <div class="col-md-6"> <div class="form-group">
                                        <label for="">Job Name</label>
                                        <input class="form-control" type="text" name="jobName" value="<?php echo $jobName; ?>">
                                    </div>
                                </div> -->

                                  


                                <div class="col-md-6">
                                        <!--  <div class="form-group">
                                            <label>Customer Type</label>
                                            <select class="form-control" name="ticketRelation" >
                                                <option value="Prospective"<? if($ticketRelation == 'Prospective') echo ' selected="selected"'; ?>>Prospective</option>
                                                <option value="Customer"<? if($ticketRelation == 'Customer') echo ' selected="selected"'; ?>>Customer</option>
                                            </select>
                                        </div>   -->
                                     
                     
                                    <div class="form-group" id="selectProduct">
                                        <label>Job</label>
                                        <select class="form-control" name="jobProduct" >
                                                <option value="Windows"<? if($jobProduct == 'Windows') echo ' selected="selected"'; ?>>Windows</option>
                                                <option value="Siding"<? if($jobProduct == 'Siding') echo ' selected="selected"'; ?>>Siding</option>
                                                <option value="Doors"<? if($jobProduct == 'Doors') echo ' selected="selected"'; ?>>Doors</option>
                                                <option value="Window Door Repair"<? if($jobProduct == 'Window Door Repair') echo ' selected="selected"'; ?>>Window &amp; Door Repair</option>
                                                <option value="Siding Repair"<? if($jobProduct == 'Siding Repair') echo ' selected="selected"'; ?>>Siding Repair</option>
                                                <option value="Solar Zone Attic"<? if($jobProduct == 'Solar Zone Attic') echo ' selected="selected"'; ?>>Solar Zone & Attic</option>
                                        </select>
                                    </div>
                    

                          
                                    <div class="form-group">
                                        <label for="">Type</label>
                                            <select class="form-control" name="ticketType" >
                                        <div id="job-windows">
                                            <optgroup label="Job Windows">
                                                <option value="Basic"<? if($ticketType == 'Basic') echo ' selected="selected"'; ?>>Basic</option>
                                                <option value="Windows w/ Wraps"<? if($ticketType == 'Windows w/ Wraps') echo ' selected="selected"'; ?>>Windows w/ Wraps</option>
                                                <option value="Tough Install"<? if($ticketType == 'Tough Install') echo ' selected="selected"'; ?>>Tough Install</option>
                                                <option value="Cut-In"<? if($ticketType == 'Cut-In') echo ' selected="selected"'; ?>>Cut-In</option>
                                            </optgroup>
                                        </div>

                                        <div id="job-doors">
                                             <optgroup label="Job Doors">
                                                <option value="Patio"<? if($ticketType == 'Patio') echo ' selected="selected"'; ?>>Patio</option>
                                                <option value="Entry Door"<? if($ticketType == 'Entry Door') echo ' selected="selected"'; ?>>Entry Door</option>
                                                <option value="Cut-In"<? if($ticketType == 'Cut-In') echo ' selected="selected"'; ?>>Cut-In</option>
                                             </optgroup>
                                        </div>
                                        
                                        <div id="job-siding">
                                        <optgroup label="Job Siding">
                                                <option value="Single-Story"<? if($ticketType == 'Single-Story') echo ' selected="selected"'; ?>>Single-Story</option>
                                                <option value="Two-Story"<? if($ticketType == 'Two-Story') echo ' selected="selected"'; ?>>Two-Story</option>
                                                <option value="Tough Install"<? if($ticketType == 'Tough Install') echo ' selected="selected"'; ?>>Tough Install</option>
                                        </optgroup>
                                                                                
                                        </div>
                                        <div id="job-window-repair">
                                            <optgroup label="Window Repair">
                                                <option value="Double Hung"<? if($ticketType == 'Double Hung') echo ' selected="selected"'; ?>>Double Hung</option>
                                                <option value="Casement"<? if($ticketType == 'Casement') echo ' selected="selected"'; ?>>Casement</option>
                                                <option value="Glass"<? if($ticketType == 'Glass') echo ' selected="selected"'; ?>>Glass</option>
                                                <option value="Other"<? if($ticketType == 'Other') echo ' selected="selected"'; ?>>Other</option>
                                            </optgroup>
                                        </div>
                                        <div id="job-door-repair">
                                            <optgroup label="Door Repair">
                                                <option value="Attic"<? if($ticketType == 'Attic') echo ' selected="selected"'; ?>>Attic</option>
                                                <option value="Siding"<? if($ticketType == 'Siding') echo ' selected="selected"'; ?>>Siding</option>
                                            </optgroup>
                                        </div>            
                                            </select>                                                
                                    </div>                                       
                          

                                    <div class="form-group">
                                        <label>Status</label>
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
                                            <option value="Complete"<? if($ticketStatus == 'Complete') echo ' selected="selected"'; ?>>Complete <?php if ($ticketSComplete != '') {echo "(".$ticketSComplete.")"; } ?></option>
                                            <option value="Paid"<? if($ticketStatus == 'Paid') echo ' selected="selected"'; ?>>Paid <?php if ($ticketSPaid != '') {echo "(".$ticketSPaid.")"; } ?></option>
                                            <option value="Gift Sent"<? if($ticketStatus == 'Gift Sent') echo ' selected="selected"'; ?>>Gift Sent</option>
                                            <!-- <option value="Rejected"<? if($ticketStatus == 'Rejected') echo ' selected="selected"'; ?>>Rejected</option> -->
                                            <!-- <option value="Proposal"<? if($ticketStatus == 'Proposal') echo ' selected="selected"'; ?>>Proposal</option> -->
                                            <!-- <option value="Old Proposals"<? if($ticketStatus == 'Old Proposals') echo ' selected="selected"'; ?>>Old Proposals</option> -->
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Ticket Location</label>
                                        <select class="form-control" name="ticketLocation" >
                                            <option value="Norfolk"<? if($ticketLocation== 'Norfolk') echo ' selected="selected"'; ?>>Norfolk</option>
                                            <option value="Columbus"<? if($ticketLocation== 'Columbus') echo ' selected="selected"'; ?>>Columbus</option>
                                            <option value="Sioux City"<? if($ticketLocation== 'Sioux City') echo ' selected="selected"'; ?>>Sioux City</option>
                                        </select>
                                    </div>

                                    <div class="form-group" id="propertyTypediv">
                                        <label for="">Property Type</label>
                                        <select name="propertyType" class="form-control">
                                            <option value="Single Property" <? if ($propertyType == 'Single Property') { echo ' selected="selected"';}?>>Single Property</option>
                                            <option value="Multiple Property" <? if ($propertyType == 'Multiple Property') { echo ' selected="selected"';}?>>Multiple Property</option>
                                            <option value="DIY" <? if ($propertyType == 'DIY') { echo ' selected="selected"';}?>>DIY</option>
                                        </select>
                                    </div>

                                    <div id="multi">
    
                                        <div class="form-group">
                                            <label>Job Location Address</label>
                                            <input class="form-control" name="ticketAddress" value="<?php echo $ticketAddress ?>" placeholder="">
                                        </div> 
                                        <div class="form-group">
                                            <label>Billing Address</label>
                                            <input class="form-control" name="ticketSecAddress" value="<?php echo $ticketSecAddress ?>" placeholder="">
                                        </div> 
                                        <div class="form-group">
                                            <label>City</label>
                                            <select class="form-control" name="ticketCity">
                                                <option value=""<?php if ($city_name == '') {echo 'selected="selected"'; } ?>>Choose One</option>
                                            <?
                                                $city_request = ("SELECT city_name from cities ORDER BY city_name ASC");
                                                $city_result = mysql_query ($city_request,$db) or die ("Query failed: $city_request");
                                                
                                                while ($city_row = mysql_fetch_array($city_result)) { 
                                                    extract($city_row);        
                                                    echo '<option value="'.$city_name.'"'.($city_name == $ticketCity ? ' selected="selected"' : '').'>'.$city_name.'</option>'."\r";
                                                }
                                            ?>

                                            </select>
                                        </div> 
                                        <div class="form-group">
                                            <label>State</label>
                                            <select class="form-control" name="ticketState">
                                                <option value"">Choose One</option>
                                                <?php
                                                  $state_list = array('Nebraska', 'South Dakota', 'Iowa', 'Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming');
                                                  foreach($state_list as $state_item) {
                                                    echo '<option value="'.$state_item.'"'.($state_item == $ticketState ? ' selected="selected"' : '').'>'.$state_item.'</option>'."\r";
                                                  }

                                                ?>
                                         
                                            </select>
                                        </div> 
                                        <div class="form-group">
                                            <label>Zip Code</label>
                                            <input class="form-control" name="ticketZip" value="<?php echo $ticketZip ?>" placeholder="" readonly disabled>
                                        </div>

                                    </div>

                                    <div id="diy-main">
                                        
                                        <div class="col-md-4" style="padding-left:0px;padding-right:8px;">
                                            <div class="form-group">
                                                <label for="">Date Ordered</label>
                                                <input type="text" class="form-control datepicker" value="<?php echo $diyOrdered; ?>" name="diyOrdered">
                                            </div>                                        
                                        </div>
                                        <div class="col-md-4" style="padding-left:0px;padding-right:8px;">
                                            <div class="form-group">
                                                <label for="">Date Received</label>
                                                <input type="text" class="form-control datepicker" value="<?php echo $diyReceived; ?>" name="diyReceived">
                                            </div>                                        
                                        </div>                                    
                                        <div class="col-md-4" style="padding-left:7px;padding-right:0px;">
                                            <div class="form-group">
                                                <label for="">Date Pickup</label>
                                                <input type="text" class="form-control datepicker" value="<?php echo $diyDate; ?>" name="diyDate">
                                            </div>
                                        </div>

                                    </div> 

                                </div>

                                <!-- Right Column -->

                                <!-- /.col-lg-6 (nested) -->                                
                                <div class="col-md-6">

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="checkbox" name="ticketsHot" value='1' <? if($ticketsHot == '1') echo ' checked="checked"'; ?>>
                                                <label for="">Hot List</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="checkbox" name="ticketArchive" value='1' <? if($ticketArchive == '1') echo ' checked="checked"'; ?>>
                                                <label for="">Archive</label>
                                            </div>                                    
                                        </div>                 
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Went To Columbus</label>
                                                    <input class="form-control datepicker" name="ticketColum" value="<?php echo $ticketColum ?>">
                                                </div> 
                                        </div> 
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Assign Ticket:</label>

                                                <select class="form-control" name="ticketAssign">
                                                    <option value="" <?php if (empty($ticketAssign)) {echo 'selected="selected"'; } ?>>Choose One</option>                                                
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
                                                    }?>
                                                </select>
                                            </div>                                        
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Year of Home</label>
                                                <input id="homeNum" class="form-control" name="homeYear" value="<?php echo $homeYear ?>">
                                            </div> 
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Install/P&amp;B</label>
                                                <input class="form-control datepicker" name="ticketInstall" value="<?php echo $ticketInstall ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Installed By:</label>
                                                <input class="form-control" name="installedBy" value="<?php echo $installedBy ?>">
                                            </div> 
                                        </div>

                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>PW Made</label>
                                                    <input class="form-control datepicker" name="pwMade" value="<?php echo $pwMade ?>">
                                                </div> 
                                        </div>                                         

                         

                                    <div id="event-type-selected" style="margin-top:20px;margin-bottom:20px;">

                                        <div class="col-md-12">
                                            <h4 style="padding-left:0px;margin-top:20px;">Calendar Feature</h4>
                                        </div>


                                        <div class="col-lg-4">
                                            <div class="form-group"> 
                                                <label>Start Date:</label>
                                                <input type="text" name="start_date" class="form-control input-sm" placeholder="Y-M-D" id="startDate" style="margin-bottom:20px;">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group"> 
                                                <label>Start Time:</label>
                                                <input type="text" class="form-control input-sm" name="start_time" placeholder="HH:MM" id="startTime" style="margin-bottom:20px;">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group"> 
                                            <label>Assign Calendar:</label>
                                             <select name="calUsers" id="" class="form-control" style="margin-bottom:20px;">
                                                <option value="">All</option>
                                            <?
                                                $calUsers_request = ("SELECT firstName,lastName FROM cmsUsers WHERE ID != '1'");
                                                $calUsers_result = mysql_query ($calUsers_request,$db) or die ("Query failed: $calUsers_request");
                                                
                                                while ($calUsers_row = mysql_fetch_array($calUsers_result)) { 
                                                    extract($calUsers_row);
                                                        
                                                    ?>
                                                    <option value="<?php echo $firstName ?> <?php echo $lastName; ?>"><?php echo $firstName; ?> <?php echo $lastName; ?></option>
                                                <? } ?>
                                            </select> 
                                            <!-- <input type="text" class="input-small form-control" name="color" id="cp"> -->
                                            </div>
                                        </div>

                                    <hr>

                                    </div>

                                    <div class="col-md-12">
                                        <h4>Calendar Entries</h4>
                                        <table class="table">
                                            <tbody>

                                            <?
                                            $getAssociatedCalendarEntries_request = ("SELECT id,title,start,calUsers FROM calendar WHERE calTicketID = '$ticketID'");
                                            $getAssociatedCalendarEntries_result = mysql_query ($getAssociatedCalendarEntries_request,$db) or die ("Query failed: $getAssociatedCalendarEntries_request");

                                            while ($getAssociatedCalendarEntries_row = mysql_fetch_array($getAssociatedCalendarEntries_result)) {
                                                extract($getAssociatedCalendarEntries_row);
                                                $calendarID =  $getAssociatedCalendarEntries_row['id'];
                                                $start = explode(" ", $start);
                                                $startDate = $start[0];
                                                $startDate = date("m/j/Y",strtotime($startDate));
                                                $startTime = $start[1];
                                                $startTime = date('h:i A',strtotime($startTime));

                                                ?>

                                                <tr>
                                                    <td class="view-ticket"><a href="/calendar/?id=<?php echo $calendarID;?>">View Ticket</a></td>
                                                    <td><?php echo $startDate ;?></td>
                                                    <td><?php echo $startTime ;?></td>
                                                    <td><?php echo $calUsers; ?></td>
                                                </tr>

                                            <? } ?>


                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Ticket Notes</label>
                                            <textarea class="form-control" name="wrapDetails" cols="50" rows="10"><?php echo $wrapDetails; ?></textarea>
                                        </div>     
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <?php $sticketRelated = $ticketRelated;$modCustID = $custID; ?>


                                            <label>
                                            <?php if (!empty($ticketRelated)) {echo 'Assigned Previous Ticket<br/><a class="text-right" href="/tickets/ticket_view.php?ticketID='.$sticketRelated.'&custID='.$custID.'">Click Here To View Related Ticket</a><br/>'; }else{
                                                echo "Assign Previous Ticket";}?>
                                            </label>

                                            <select class="form-control" name="ticketRelated" >
                                                <option value="">None</option>
                                                <?
                                                    $related_request = ("SELECT * FROM customerTickets WHERE ticketCustID = '$modCustID' AND ticketID != '$ticketID'");
                                                    $related_result = mysql_query ($related_request,$db) or die ("Query failed: $related_request");

                                                    while ($related_row = mysql_fetch_array($related_result)) {
                                                        $relatedTicketID = $related_row['ticketID'];
                                                        $relatedJobProduct = $related_row['jobProduct'];
                                                        $relatedTicketCity = $related_row['ticketCity'];
                                                        $relatedTicketNORF = $related_row['ticketNORF'];
                                                        $relatedTicketCode = $related_row['ticketCode'];

                                                        $relatedShowTicketID = sprintf('%05d',$relatedTicketID);
                                                        $relatedTicketName = $relatedTicketCode."_".$relatedJobProduct."_".$relatedTicketCity."_(".$relatedTicketNORF.")";?>
                                                        <option value="<?php echo $relatedTicketID ?>"<? if($sticketRelated == $relatedTicketID) echo ' selected="selected"'; ?>><?php echo "Ticket #".$relatedShowTicketID; ?> - <?php echo $relatedTicketName; ?> </option>
                                                    <? } ?>
                                            </select>

                                        </div>
                                    </div>

                                </div>

                                <!-- End Column -->

                        </div>
                        <!-- /.panel-body -->
                    </div>


                    <div class="col-lg-12" style="padding-left: 0;margin-top:0px;">

                        <div class="panel panel-default">
                            <div class="panel-heading"
                                 style="background-color:lightblue!important;color:#000!important;">
                                <h4><span>Attachments</span></h4>
                            </div>

                            <link rel="stylesheet" href="/lightbox/css/ideal-image-slider.css">
                            <link rel="stylesheet" type="text/css" href="/lightbox/jquery.lightbox.css">

                            <div class="panel-body" style="padding:0px;">
                                <div class="col-md-12 gallery1" style="padding:15px 10px;">
                                     <h4 id="attachments-div">Images</h4>
                                    <?php

                                    $item_counter = 1;

                                    if ($item_counter == '1') { echo "<div class=\"row\">"; } 

                                    $attachments_request = ("SELECT * FROM ticketAttachments WHERE ticketID = '$ticketID' AND (file_type = 'image/jpeg' OR file_type = 'image/gif' OR file_type = 'image/png' OR file_type = 'image/jpg')");
                                    $attachments_result = mysql_query ($attachments_request,$db) or die ("Query failed: $attachments_request");

                                    while ($attachments_row = mysql_fetch_array($attachments_result)) {
                                        extract($attachments_row);
                                        $attachDate = convertDate($attachDate);
                                        ?>
                                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 text-center">
                                        <a href="/_storage/attachments/<?php echo $attachFile;?>" data-gallery="<?php echo $ticketID ?>">
                                            <img width="200" style="margin:0 auto;" class="img-responsive" src="/_storage/attachments/<?php echo $attachFile;?>" alt="" />

                                            <span><?php echo $attachmentType;?><?php if (!empty($attachmentTypeOveride)) { echo " - ".$attachmentTypeOveride;}?><span style="display:block;"><?php echo $attachDate;?></span></span>
                                        </a>
                                    </div>

                                    <?php } 

                                    $item_counter++;
                                    if ($item_counter == '4') {  echo "</div><div class=\"clearfix\">"; $item_counter = '1';}
                                    if ($item_counter != '4') {echo "</div>"; }

                                    ?>
                            </div>


                            <div class="col-md-12" style="padding:15px 10px;">
                                <h4>PDF</h4>

                                    <?php

                                    $item_counter = 1;

                                    if ($item_counter == '1') { echo "<div class=\"row\">"; } 


                                    $attachments_request = ("SELECT * FROM ticketAttachments WHERE ticketID = '$ticketID' AND file_type = 'application/pdf'");
                                    $attachments_result = mysql_query ($attachments_request,$db) or die ("Query failed: $attachments_request");

                                    while ($attachments_row = mysql_fetch_array($attachments_result)) {
                                        extract($attachments_row);
                                        $attachDate = convertDate($attachDate);
                                        ?>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 text-center">
                                        <a href="/_storage/attachments/<?php echo $attachFile;?>" target="_blank">
                                            <img class="img-responsive" src="/_storage/attachments/pdf-icon.gif" alt="" />
                                            <span><?php echo $attachmentType;?><span style="display:block;"><?php echo $attachDate;?></span></span>
                                        </a>
                                    </div>

                                    <?php }
                                    $item_counter++;
                                    if ($item_counter == '4') {  echo "</div><div class=\"clearfix\">"; $item_counter = '1';}
                                    ?>

                                </div>

                            </div>
                            <div class="panel-footer">
                                <a href="/tickets/attach_edit.php?ticketID=<?php echo $ticketID; ?>&custID=<?php echo $custID; ?>">
                                    <button type="submit" name="submit" class="btn btn-warning btn-default"
                                            value="Save Changes">Add
                                    </button>
                                </a>
                            </div>
                            <!-- /.panel-footer -->
                        </div>
                    </div>






<!--
                    <div id="wrap-div">
                        <div class="panel panel-default">
                            <div class="panel-heading"  style="background-color:purple!important;">
                                <h4><span>Forms</span></h4>
                            </div>
                            <div class="panel-body">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="checkbox" name="leadTest" value="1" <? if($leadTest == '1') echo ' checked="checked"'; ?>> <label>Lead Test</label><br/>
                                        <input type="checkbox" name="pamfill" value="1" <? if($pamfill == '1') echo ' checked="checked"'; ?>> <label>Pamphlet Filled</label><br/>
                                        <input type="checkbox" name="testKit" value="1" <? if($testKit == '1') echo ' checked="checked"'; ?>> <label>Test Kit Form</label><br/>
                                        <input type="checkbox" name="reno" value="1" <? if($reno == '1') echo ' checked="checked"'; ?>> <label>Renovation Record Keeping</label><br/>
                                        <input type="checkbox" name="paymentReceived" value="1" <? if($paymentReceived == '1') echo ' checked="checked"'; ?>> <label>Payment Received</label><br/>
                                        <input type="checkbox" name="yardSign" value="1" <? if($yardSign == '1') echo ' checked="checked"'; ?>> <label>Yard Sign</label><br/>
                                        <input type="checkbox" name="certCompletion" value="1" <? if($certCompletion == '1') echo ' checked="checked"'; ?>> <label>Certificate of Completion</label><br/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->

                    <div class="panel panel-default">

                        <div class="panel-heading" style="background-color:blue!important;color:#fff!important;"> <h4><span>Repairs Needed</span></h4> </div>

                        <div class="panel-body">      
                            <div class="col-md-12">
                                <label for="">Repair Needed</label>
                                <select class="form-control" name="repairNeeded">
                                        <option value=""<? if($repairNeeded == '') echo ' selected="selected"'; ?>>No</option>
                                        <option value="1"<? if($repairNeeded == '1') echo ' selected="selected"'; ?>>Yes</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Repair Notes</label>
                                    <textarea class="form-control" name="repairNotes" cols="50" rows="5"><?php echo $repairNotes; ?></textarea>
                                </div>
                            </div>

                        </div>
                    </div>


                <?php if (pagePermission()) { ?>                             
                    <div class="panel panel-default">

                        <div class="panel-heading" style="background-color:yellow!important;color:#000!important;"> <h4><span>Order Info</span></h4> </div>

                        <div class="panel-body">      
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>PO #</label>
                                    <input class="form-control" name="ticketPO" value="<?php echo $ticketPO ?>" placeholder="#">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sold Date <?php echo $soldDate;?></label>
                                    <input class="form-control datepicker" name="soldDate" value="<?php echo $soldDate; ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Order Date</label>
                                    <input class="form-control datepicker" name="ticketOrdDate" value="<?php echo $ticketOrdDate ?>">
                                </div>
                            </div>   

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Qty</label>
                                    <input class="form-control" name="ticketNORF" value="<?php echo $ticketNORF ?>" placeholder="#">
                                </div>
                            </div>        

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label># MI</label>
                                    <input class="form-control" name="ticketMI" value="<?php echo $ticketMI ?>" placeholder="#">
                                </div> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>MI FO#</label>
                                    <input class="form-control" name="ticketMIOrd" value="<?php echo $ticketMIOrd ?>" placeholder="#">
                                </div> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label># AMI</label>
                                    <input class="form-control" name="ticketAMI" value="<?php echo $ticketAMI ?>" placeholder="#">
                                </div> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>AMI FO#</label>
                                    <input class="form-control" name="ticketAMIFO" value="<?php echo $ticketAMIFO ?>" placeholder="#">
                                </div>              
                            </div>

                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading"  style="background-color:orange!important;"> <h4><span>Payment Details</span></h4> </div>
                        <div class="panel-body">

                            <div class="col-md-12">
                                <label for="">Invoiced</label>
                                <select class="form-control" name="ticketInvoiced" id="" readonly>
                                        <option value=""<? if($ticketInvoiced == '') echo ' selected="selected"'; ?>>No</option>
                                        <option value="1"<? if($ticketInvoiced == '1') echo ' selected="selected"'; ?>>Yes <?php if (!empty($ticketSInvoiced)) echo "- (".$ticketSInvoiced.")"; ?></option>
                                </select>
                            </div>

                            <input class="form-control" type="hidden" name="ticketSInvoiced" value="<?php echo $ticketSInvoiced ?>">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Financing Details</label>
                                    <select class="form-control" name="financeStatus" >
                                        <option value=""<? if($financeStatus == '') echo ' selected="selected"'; ?>>Choose One</option>
                                        <option value="Approved"<? if($financeStatus == 'Approved') echo ' selected="selected"'; ?>>Approved</option>
                                        <option value="Contract Sent"<? if($financeStatus == 'Contract Sent') echo ' selected="selected"'; ?>>Contract Sent</option>
                                        <option value="Received"<? if($financeStatus == 'Received') echo ' selected="selected"'; ?>>Received</option>
                                        <option value="Paid"<? if($financeStatus == 'Paid') echo ' selected="selected"'; ?>>Paid</option>
                                    </select>
                                </div>                                         

                                <div class="form-group">
                                    <label>Payment Method</label>
                                    <select class="form-control" name="paymentMethod" >
                                        <option value=""<? if($paymentMethod == '') echo ' selected="selected"'; ?>>Choose One</option>
                                        <option value="Cash"<? if($paymentMethod == 'Cash') echo ' selected="selected"'; ?>>Cash</option>
                                        <option value="Check"<? if($paymentMethod == 'Check') echo ' selected="selected"'; ?>>Check</option>
                                        <option value="Debit Card"<? if($paymentMethod == 'Debit Card') echo ' selected="selected"'; ?>>Debit Card</option>
                                        <option value="Cashier Check"<? if($paymentMethod == 'Cashier Check') echo ' selected="selected"'; ?>>Cashier Check</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Down Payment Amount</label>
                                        <input class="form-control" name="downPayment" value="<?php echo $downPayment ?>" placeholder="$">
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input class="form-control datepicker" name="downDate" value="<?php echo $downDate ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Final Payment Amount</label>
                                        <input class="form-control" name="finalPayment" value="<?php echo $finalPayment ?>" placeholder="$">
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input class="form-control datepicker" name="finalDate" value="<?php echo $finalDate ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Payment Notes</label>
                                    <textarea class="form-control" name="paymentNotes" cols="30" rows="7"><?php echo $paymentNotes; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                <? } ?>
                    <!-- 
                    <div class="panel panel-default">
                        <div class="panel-heading"  style="background-color:brown!important;"> <h4><span>Office Use Only</span></h4> </div>
                        <div class="panel-body">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>NORF</label>
                                <input class="form-control" name="ticketNORF" value="<?php echo $ticketNORF ?>" placeholder="#">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>COL</label>
                                <input class="form-control" name="ticketCOL" value="<?php echo $ticketCOL ?>" placeholder="#">
                            </div>                                       
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>SUX</label>
                                <input class="form-control" name="ticketSUX" value="<?php echo $ticketSUX ?>" placeholder="#">
                            </div>
                        </div>                                      
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>PO #</label>
                                <input class="form-control" name="ticketPO" value="<?php echo $ticketPO ?>" placeholder="#">
                            </div>
                        </div>                                                                                                                                                         
                    </div> -->  

                </div>
                <!-- /.panel-body -->

<!-- /.row (nested) -->