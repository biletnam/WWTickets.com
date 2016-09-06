 <?php 
####################################
# Special Variable Characters
#
####################################

        $ticketDate = date("m/j/Y",strtotime($ticketDate)); if ($ticketDate == '12/31/1969') {$ticketDate = ''; }
        $ticketOrdDate = date("m/j/Y",strtotime($ticketOrdDate)); if ($ticketOrdDate == '12/31/1969') {$ticketOrdDate = ''; }
        $ticketDateM = date("m/j/Y",strtotime($ticketDateM)); if ($ticketDateM == '12/31/1969') {$ticketDateM = ''; }
        $ticketColum = date("m/j/Y",strtotime($ticketColum)); if ($ticketColum == '12/31/1969') {$ticketColum = ''; }
        $ticketInstall = date("m/j/Y",strtotime($ticketInstall)); if ($ticketInstall == '12/31/1969') {$ticketInstall = ''; }
        $leadTestEmpDate = date("m/j/Y",strtotime($leadTestEmpDate)); if ($leadTestEmpDate == '12/31/1969') {$leadTestEmpDate = ''; }
        $pamDate = date("m/j/Y",strtotime($pamDate)); if ($pamDate == '12/31/1969') {$pamDate = ''; }
        $renoDate = date("m/j/Y",strtotime($renoDate)); if ($renoDate == '12/31/1969') {$renoDate = ''; }
        $paidDate = date("m/j/Y",strtotime($paidDate)); if ($paidDate == '12/31/1969') {$paidDate = ''; }
        $testDate = date("m/j/Y",strtotime($testDate)); if ($testDate == '12/31/1969') {$testDate = ''; }
        $diyDate = date("m/j/Y",strtotime($diyDate)); if ($diyDate == '12/31/1969') {$diyDate = ''; }

####################################

  ?>

    <input type="hidden" name="custID" value="<? echo $custID; ?>"  />
    <input type="hidden" name="ticketID" value="<? echo $ticketID; ?>"  />
    <input type="hidden" name="appSent" value="<? echo $appSent; ?>"  />
                                
                            <div class="row">
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Job Name</label>
                                        <input class="form-control" type="text" name="jobName" value="<?php echo $jobName; ?>">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label>Install/P&amp;B</label>
                                        <input class="form-control datepicker" name="ticketInstall" value="<?php echo $ticketInstall ?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Went To Columbus</label>
                                        <input class="form-control datepicker" name="ticketColum" value="<?php echo $ticketColum ?>">
                                    </div> 
                                </div>  
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Order Date</label>
                                        <input class="form-control datepicker" name="ticketOrdDate" value="<?php echo $ticketOrdDate ?>">
                                    </div>
                                </div>                              
                                <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="ticketStatus" >
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
                                                <option value="Complete"<? if($ticketStatus == 'Complete') echo ' selected="selected"'; ?>>Complete</option>
                                                <option value="Invoiced"<? if($ticketStatus == 'Invoiced') echo ' selected="selected"'; ?>>Invoiced</option>
                                            </select>
                                        </div>
                                </div> 

                            </div>
                                <div class="col-md-6" style="padding-left:0px;">

                                        <div class="form-group">
                                            <label>Customer Type</label>
                                            <select class="form-control" name="ticketRelation" >
                                                <option value="Prospective"<? if($ticketRelation == 'Prospective') echo ' selected="selected"'; ?>>Prospective</option>
                                                <option value="Customer"<? if($ticketRelation == 'Customer') echo ' selected="selected"'; ?>>Customer</option>
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
                                                  $state_list = array(
                                                    'Alabama',
                                                    'Alaska',
                                                    'Arizona',
                                                    'Arkansas',
                                                    'California',
                                                    'Colorado',
                                                    'Connecticut',
                                                    'Delaware',
                                                    'Florida',
                                                    'Georgia',
                                                    'Hawaii',
                                                    'Idaho',
                                                    'Illinois',
                                                    'Indiana',
                                                    'Iowa',
                                                    'Kansas',
                                                    'Kentucky',
                                                    'Louisiana',
                                                    'Maine',
                                                    'Maryland',
                                                    'Massachusetts',
                                                    'Michigan',
                                                    'Minnesota',
                                                    'Mississippi',
                                                    'Missouri',
                                                    'Montana',
                                                    'Nebraska',
                                                    'Nevada',
                                                    'New Hampshire',
                                                    'New Jersey',
                                                    'New Mexico',
                                                    'New York',
                                                    'North Carolina',
                                                    'North Dakota',
                                                    'Ohio',
                                                    'Oklahoma',
                                                    'Oregon',
                                                    'Pennsylvania',
                                                    'Rhode Island',
                                                    'South Carolina',
                                                    'South Dakota',
                                                    'Tennessee',
                                                    'Texas',
                                                    'Utah',
                                                    'Vermont',
                                                    'Virginia',
                                                    'Washington',
                                                    'West Virginia',
                                                    'Wisconsin',
                                                    'Wyoming'
                                                  );
                                                  foreach($state_list as $state_item) {
                                                    echo '<option value="'.$state_item.'"'.($state_item == $ticketState ? ' selected="selected"' : '').'>'.$state_item.'</option>'."\r";
                                                  }

                                                ?>
                                         
                                            </select>
                                        </div> 
                                        <div class="form-group">
                                            <label>Zip Code</label>
                                            <input class="form-control" name="ticketZip" value="<?php echo $ticketZip ?>" placeholder="">
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


                                <!-- /.col-lg-6 (nested) -->                                
                                <div class="col-md-6" style="padding-left:0px;">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Assign</label>

                                            <select class="form-control" name="ticketAssign">
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
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" id="selectProduct">
            
                                            <label>Job</label>
                                            <select class="form-control" name="jobProduct" >
                                                    <option value="Windows"<? if($jobProduct == 'Windows') echo ' selected="selected"'; ?>>Windows</option>

                                                    <option value="Doors"<? if($jobProduct == 'Doors') echo ' selected="selected"'; ?>>Doors</option>
                                                    <option value="Siding"<? if($jobProduct == 'Siding') echo ' selected="selected"'; ?>>Siding</option>
                                                    <option value="Window Repair"<? if($jobProduct == 'Window Repair') echo ' selected="selected"'; ?>>Window Repair</option>
                                                    <option value="Door Repair"<? if($jobProduct == 'Door Repair') echo ' selected="selected"'; ?>>Door Repair</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Type</label>
                                            <div id="job-windows">
                                                <select class="form-control" name="ticketType" >
                                                        <option value="Basic"<? if($ticketType == 'Basic') echo ' selected="selected"'; ?>>Basic</option>
                                                        <option value="Windows w/ Wraps"<? if($ticketType == 'Windows w/ Wraps') echo ' selected="selected"'; ?>>Windows w/ Wraps</option>
                                                        <option value="Tough Install"<? if($ticketType == 'Tough Install') echo ' selected="selected"'; ?>>Tough Install</option>
                                                        <option value="Cut-In"<? if($ticketType == 'Cut-In') echo ' selected="selected"'; ?>>Cut-In</option>
                                                </select>
                                            </div>

                                            <div id="job-doors">
                                                <select class="form-control" name="ticketType" >
                                                    <option value="Patio"<? if($ticketType == 'Patio') echo ' selected="selected"'; ?>>Patio</option>
                                                    <option value="Entry Door"<? if($ticketType == 'Entry Door') echo ' selected="selected"'; ?>>Entry Door</option>
                                                    <option value="Cut-In"<? if($ticketType == 'Cut-In') echo ' selected="selected"'; ?>>Cut-In</option>
                                                </select>                                                
                                            </div>
                                            
                                            <div id="job-siding">
                                                <select class="form-control" name="ticketType" >
                                                    <option value="Single-Story"<? if($ticketType == 'Single-Story') echo ' selected="selected"'; ?>>Single-Story</option>
                                                    <option value="Two-Story"<? if($ticketType == 'Two-Story') echo ' selected="selected"'; ?>>Two-Story</option>
                                                    <option value="Tough Install"<? if($ticketType == 'Tough Install') echo ' selected="selected"'; ?>>Tough Install</option>
                                                </select>                                                
                                            </div>
                                            <div id="job-window-repair">
                                                <select class="form-control" name="ticketType" >
                                                    <option value="Double Hung"<? if($ticketType == 'Double Hung') echo ' selected="selected"'; ?>>Double Hung</option>
                                                    <option value="Casement"<? if($ticketType == 'Casement') echo ' selected="selected"'; ?>>Casement</option>
                                                    <option value="Glass"<? if($ticketType == 'Glass') echo ' selected="selected"'; ?>>Glass</option>
                                                    <option value="Other"<? if($ticketType == 'Other') echo ' selected="selected"'; ?>>Other</option>
                                                </select>                                                
                                            </div>
                                            <div id="job-door-repair">
                                                <select class="form-control" name="ticketType" >
                                                    <option value="Attic"<? if($ticketType == 'Attic') echo ' selected="selected"'; ?>>Attic</option>
                                                    <option value="Siding"<? if($ticketType == 'Siding') echo ' selected="selected"'; ?>>Siding</option>
                                                </select>                                                
                                            </div>            
                                        </div>                                       
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Financing Details</label>
                                            <select class="form-control" name="financeStatus" >
                                                <option value=""<? if($leadTest == '') echo ' selected="selected"'; ?>>Choose One</option>
                                                <option value="Approved"<? if($leadTest == 'Approved') echo ' selected="selected"'; ?>>Approved</option>
                                                <option value="Contract Sent"<? if($leadTest == 'Contract Sent') echo ' selected="selected"'; ?>>Contract Sent</option>
                                                <option value="Received"<? if($leadTest == 'Received') echo ' selected="selected"'; ?>>Received</option>
                                                <option value="Paid"<? if($leadTest == 'Paid') echo ' selected="selected"'; ?>>Paid</option>
                                            </select>
                                        </div>                                         
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Year of Home</label>
                                            <input id="homeNum" class="form-control" name="homeYear" value="<?php echo $homeYear ?>" placeholder="1970">
                                        </div> 
                                    </div>

                                                                                                                  
                                </div>

                        </div>
                        <!-- /.panel-body -->
                    </div>

<div class="panel panel-default">
    <div class="panel-heading"> <h4><span>Installation Info</span></h4> </div>
    <div class="panel-body">
  <h4><span>Wraps</span></h4>
  <div class="col-md-6">
      
                                        <div class="form-group">
                                            <label>Needed?</label>
                                            <select class="form-control" name="wrap" >
                                                <option value=""<? if($wrap == '') echo ' selected="selected"'; ?>>Choose One</option>
                                                <option value="Yes"<? if($wrap == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
                                                <option value="No"<? if($wrap == 'No') echo ' selected="selected"'; ?>>No</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Completed</label>
                                            <select class="form-control" name="wrapStatus" >
                                                <option value=""<? if($wrapStatus == '') echo ' selected="selected"'; ?>>Choose One</option>
                                                <option value="Yes"<? if($wrapStatus == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
                                                <option value="No"<? if($wrapStatus == 'No') echo ' selected="selected"'; ?>>No</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Color</label>
                                            <select class="form-control" name="wrapColor" >
                                                <option value=""<? if($wrapColor == '') echo ' selected="selected"'; ?>>Choose One</option>
                                                <option value="Yes"<? if($wrapColor == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
                                                <option value="No"<? if($wrapColor == 'No') echo ' selected="selected"'; ?>>No</option>
                                            </select>
                                        </div>    
  </div>
  <div class="col-md-6">
      
                                        <div class="form-group">
                                            <label>Ladder Needed</label>
                                            <select class="form-control" name="jobLadder" >
                                                <option value=""<? if($jobLadder == '') echo ' selected="selected"'; ?>>Choose One</option>
                                                <option value="Yes"<? if($jobLadder == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
                                                <option value="No"<? if($jobLadder == 'No') echo ' selected="selected"'; ?>>No</option>
                                            </select>
                                        </div>    
                                        <div class="form-group">
                                            <label>Wrap Details</label>
                                            <textarea class="form-control" name="wrapDetails" cols="30" rows="3"><?php echo $wrapDetails; ?></textarea>
                                        </div>      

                                            <div class="form-group">
                                                <label>Certificate of Completion</label>
                                                    <input class="form-control datepicker" name="certCompletion" value="<?php echo $certCompletion ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Yard Sign</label>
                                                <select class="form-control" name="yardSign" >
                                                    <option value=""<? if($yardSign == '') echo ' selected="selected"'; ?>>Choose One</option>
                                                    <option value="Yes"<? if($yardSign == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
                                                    <option value="No"<? if($yardSign == 'No') echo ' selected="selected"'; ?>>No</option>
                                                </select>
                                            </div>                                                                     
  </div>
    </div>
    <div class="panel-footer"> </div>
</div>

<div id="wrap-div">
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4><span>Forms</span></h4>
        </div>
        <div class="panel-body">
     <div class="col-md-3">
                                            
                                            <div class="form-group">
                                                <label>Lead Test</label>
                                                <select class="form-control" name="leadTest" >
                                                    <option value=""<? if($leadTest == '') echo ' selected="selected"'; ?>>Choose One</option>
                                                    <option value="Yes"<? if($leadTest == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
                                                    <option value="No"<? if($leadTest == 'No') echo ' selected="selected"'; ?>>No</option>
                                                </select>
                                            </div> 
                                            <div class="col-md-6" style="padding-left: 0;">
                                                <label>Employee</label>

                                                <select class="form-control" name="leadTestEmp">
                                                <?
                                                    $emp_request = ("SELECT ID,firstName,lastname from cmsUsers ORDER BY firstName ASC");
                                                    $emp_result = mysql_query ($emp_request,$db) or die ("Query failed: $emp_request");
                                                    
                                                    while ($emp_row = mysql_fetch_array($emp_result)) { 
                                                        extract($emp_row);
                                                        $empName = $firstName;
                                                        if ($empName == 'Power') {}
                                                        else{
                                                        echo '<option value="'.$empName.'"'.($empName == $leadTestEmp ? ' selected="selected"' : '').'>'.$empName.'</option>'."\r";
                                                        }
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6"  style="padding-right: 0;">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input class="form-control datepicker" name="leadTestEmpDate" value="<?php echo $leadTestEmpDate ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            
                                            <div class="form-group">
                                                <label>Pamphlet Filled</label>
                                                <select class="form-control" name="pamfill" >
                                                    <option value=""<? if($pamfill == '') echo ' selected="selected"'; ?>>Choose One</option>
                                                    <option value="Yes"<? if($pamfill == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
                                                    <option value="No"<? if($pamfill == 'No') echo ' selected="selected"'; ?>>No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6" style="padding-left: 0;">
                                                <label>Employee</label>

                                                <select class="form-control" name="pamEmpfill">
                                                <?
                                                    $emp_request = ("SELECT ID,firstName,lastname from cmsUsers ORDER BY firstName ASC");
                                                    $emp_result = mysql_query ($emp_request,$db) or die ("Query failed: $emp_request");
                                                    
                                                    while ($emp_row = mysql_fetch_array($emp_result)) { 
                                                        extract($emp_row);
                                                        $empName = $firstName;
                                                        if ($empName == 'Power') {}
                                                        else{
                                                        echo '<option value="'.$empName.'"'.($empName == $pamEmpfill ? ' selected="selected"' : '').'>'.$empName.'</option>'."\r";
                                                        }
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6"  style="padding-right: 0;">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input class="form-control datepicker" name="pamDate" value="<?php echo $pamDate ?>">
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="col-md-3">
                                            
                                            <div class="form-group">
                                                <label>Test Kit Form</label>
                                                <select class="form-control" name="testKit" >
                                                    <option value=""<? if($testKit == '') echo ' selected="selected"'; ?>>Choose One</option>
                                                    <option value="Yes"<? if($testKit == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
                                                    <option value="No"<? if($testKit == 'No') echo ' selected="selected"'; ?>>No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6" style="padding-left: 0;">
                                                <label>Employee</label>

                                                <select class="form-control" name="testKitEmp">
                                                <?
                                                    $emp_request = ("SELECT ID,firstName,lastname from cmsUsers ORDER BY firstName ASC");
                                                    $emp_result = mysql_query ($emp_request,$db) or die ("Query failed: $emp_request");
                                                    
                                                    while ($emp_row = mysql_fetch_array($emp_result)) { 
                                                        extract($emp_row);
                                                        $empName = $firstName;
                                                        if ($empName == 'Power') {}
                                                        else{
                                                        echo '<option value="'.$empName.'"'.($empName == $testKitEmp ? ' selected="selected"' : '').'>'.$empName.'</option>'."\r";
                                                        }
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6"  style="padding-right: 0;">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input class="form-control datepicker" name="testDate" value="<?php echo $testDate ?>">
                                                </div>
                                            </div>                                        
                                        </div>
                                        <div class="col-md-3">
                                            
                                            <div class="form-group">
                                                <label>Renovation Record Keeping</label>
                                                <select class="form-control" name="reno" >
                                                    <option value=""<? if($reno == '') echo ' selected="selected"'; ?>>Choose One</option>
                                                    <option value="Yes"<? if($reno == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
                                                    <option value="No"<? if($reno == 'No') echo ' selected="selected"'; ?>>No</option>
                                                </select>
                                            </div>     
                                            <div class="col-md-6" style="padding-left: 0;">
                                                <label>Employee</label>

                                                <select class="form-control" name="renoEmp">
                                                <?
                                                    $emp_request = ("SELECT ID,firstName,lastname from cmsUsers ORDER BY firstName ASC");
                                                    $emp_result = mysql_query ($emp_request,$db) or die ("Query failed: $emp_request");
                                                    
                                                    while ($emp_row = mysql_fetch_array($emp_result)) { 
                                                        extract($emp_row);
                                                        $empName = $firstName;
                                                        if ($empName == 'Power') {}
                                                        else{
                                                        echo '<option value="'.$empName.'"'.($empName == $renoEmp ? ' selected="selected"' : '').'>'.$empName.'</option>'."\r";
                                                        }
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6"  style="padding-right: 0;">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input class="form-control datepicker" name="renoDate" value="<?php echo $renoDate ?>">
                                                </div>
                                            </div>                                                                                                                                                                                                    
                                        </div>   
        </div>
        <div class="panel-footer">
        </div>
    </div>
</div>
         
<div class="panel panel-default">
    <div class="panel-heading"> <h4><span>Billing</span></h4> </div>
    <div class="panel-body"> </div>
    <div class="panel-footer"> </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading"> <h4><span>Office Use Only</span></h4> </div>
    <div class="panel-body">
                                            <div class="form-group">
                                                <label>MI Order</label>
                                                <input class="form-control" name="ticketMIOrd" value="<?php echo $ticketMIOrd ?>" placeholder="#">
                                            </div> 
                                            <div class="form-group">
                                                <label># AMI</label>
                                                <input class="form-control" name="ticketAMI" value="<?php echo $ticketAMI ?>" placeholder="#">
                                            </div> 
                                            <div class="form-group">
                                                <label>AMI FO#</label>
                                                <input class="form-control" name="ticketAMIFO" value="<?php echo $ticketAMIFO ?>" placeholder="#">
                                            </div>       
                                                                                                                               
    </div>
    <div class="panel-footer"> </div>
</div>

                            </div>

                            <div class="row" style="margin-top: 15px;">
                                
                                    <div class="col-lg-4">
                                        <h4><span>Details</span></h4>

                                            <div class="form-group">
                                                <label>COL</label>
                                                <input class="form-control" name="ticketCOL" value="<?php echo $ticketCOL ?>" placeholder="#">
                                            </div>                                       
                                            <div class="form-group">
                                                <label>NORF</label>
                                                <input class="form-control" name="ticketNORF" value="<?php echo $ticketNORF ?>" placeholder="#">
                                            </div>
                                            <div class="form-group">
                                                <label># MI</label>
                                                <input class="form-control" name="ticketMI" value="<?php echo $ticketMI ?>" placeholder="#">
                                            </div> 



                                    </div>


                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-4">
                                        <h4><span>Payment Received</span></h4>
                                            <div class="form-group">
                                                <label>Paid</label>
                                                <input class="form-control datepicker" name="paidDate" value="<?php echo $paidDate ?>">
    <!--                                             <p class="help-block">Example block-level help text here.</p> -->
                                            </div>
                                            <div class="form-group">
                                                <label>Got Check?</label>
                                                <select class="form-control" name="checkStatus" >
                                                    <option value=""<? if($checkStatus == '') echo ' selected="selected"'; ?>>Choose One</option>
                                                    <option value="Yes"<? if($checkStatus == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
                                                    <option value="No"<? if($checkStatus == 'No') echo ' selected="selected"'; ?>>No</option>
                                                </select>
                                    </div>                                

                            </div>
                        </div>
                        <!-- /.panel-body -->

                        <div class="panel-footer">

                            <?php if ($username == 'admin' || $username == 'angie') { ?>
                                <div class="pull-right">
                                            <a class="btn btn-primary btn-danger" onclick="return deleteItem();" href="/tickets/ticket_del.php?ticketID=<?php echo $ticketID;?>">Delete</a>
                                </div>
                            <? } ?>
                                        <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save Changes" >Save</button>
                                        <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save and Continue Editing">Save and Continue Editing</button>
                        </div>


                            <!-- /.row (nested) -->
