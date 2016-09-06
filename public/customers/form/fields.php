<style>
    #page-wrapper .col-lg-12 {
        border-bottom: none!important;
        margin-bottom: 0px;
        margin-top: 0px;
    }
        #refferal-container{
        display: none;
    }
</style>
    <input type="hidden" name="custID" value="<? echo $custID; ?>"  />
    <input type="hidden" name="referralFilled" value="<? echo $referralFilled; ?>"  />
    <input type="hidden" name="marketReferred" value="<? echo $marketReferred; ?>"  />
    <input type="hidden" name="marketRefOne" value="<? echo $marketRefOne; ?>"  />
    <input type="hidden" name="marketRefTwo" value="<? echo $marketRefTwo; ?>"  />
                                
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input class="form-control" name="custFName" value="<?php echo $custFName ?>" placeholder="First Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" name="custLName" value="<?php echo $custLName ?>" placeholder="Last Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input class="form-control" name="custComp" value="<?php echo $custComp ?>" placeholder="Company Name">
                                        </div>                                                                                                                                                                                                                                                 
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" name="custBillAdd" value="<?php echo $custBillAdd ?>" placeholder="800 Street">
                                        </div>

                                        <div class="form-group">
                                            <label>City</label>
                                            <select class="form-control" name="custCity">
                                                    <option value="Norfolk" <?php if ($city_result == 'Norfolk') {echo 'selected="selected"';} ?>>Norfolk</option>
                                            <?
                                                $city_request = ("SELECT city_name from cities ORDER BY city_name ASC");
                                                $city_result = mysql_query ($city_request,$db) or die ("Query failed: $city_request");
                                                
                                                while ($city_row = mysql_fetch_array($city_result)) { 
                                                    extract($city_row);?>
                                                    <?
                                                    echo '<option value="'.$city_name.'"'.($city_name == $custCity ? ' selected="selected"' : '').'>'.$city_name.'</option>'."\r";
                                                }
                                            ?>
                                            </select>                                         
                                        </div>




                                        <div class="form-group">
                                            <label>State</label>
                                            <select class="form-control" name="custState">

                                                <option value="Nebraska" <?php if ($custState == 'Nebraska') {echo 'selected="selected"';} ?>>Nebraska</option>
                                                <option value="Iowa" <?php if ($custState == 'Iowa') {echo 'selected="selected"';} ?>>Iowa</option>
                                                <option value="South Dakota" <?php if ($custState == 'South Dakota') {echo 'selected="selected"';} ?>>South Dakota</option>
                                                <option value="-" <?php if ($custState == '-') {echo 'selected="selected"';} ?>>-</option>
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
                                                    // 'Iowa',
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
                                                    //'Nebraska',
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
                                                    // 'South Dakota',
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
                                                    echo '<option value="'.$state_item.'"'.($state_item == $custState ? ' selected="selected"' : '').'>'.$state_item.'</option>'."\r";
                                                  }

                                                ?>
                                         
                                            </select>
                                        </div>
                                                                                

                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-4">     
                                        <div class="form-group">
                                            <label>Zip Code</label>
                                            <input class="form-control" name="custZip" value="<?php echo $custZip ?>" placeholder="Zip Code">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" name="custPhone" value="<?php echo $custPhone ?>" placeholder="(800) 800-8000">
                                        </div>                                                                                                                                                                                
                                        <div class="form-group">
                                            <label>Fax</label>
                                            <input class="form-control" name="custFax" value="<?php echo $custFax ?>" placeholder="(800) 800-8000">
                                        </div>         
                                        <div class="form-group">
                                            <label>Mobile</label>
                                            <input class="form-control" name="custMobile" value="<?php echo $custMobile ?>" placeholder="(800) 800-8000">
                                        </div>           
                                        <div class="form-group">
                                            <label>Work</label>
                                            <input class="form-control" name="custWork" value="<?php echo $custWork ?>" placeholder="(800) 800-8000">
                                        </div>         
                                        <div class="form-group">
                                            <label>Primary Email</label>
                                            <input class="form-control" name="custEmail" value="<?php echo $custEmail ?>" placeholder="Info@DomainName.com">
                                        </div>                  
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Secondary Email</label>
                                            <input class="form-control" name="custEmail2" value="<?php echo $custEmail2 ?>" placeholder="Info@DomainName.com">
                                        </div>                    
                                        <div class="form-group">
                                            <label>Primary Contact</label>
                                            <input class="form-control" name="custPrimaryF" value="<?php echo $custPrimaryF ?>" placeholder="Contact Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Primary Phone</label>
                                            <input class="form-control" name="custPrimPhone" value="<?php echo $custPrimPhone ?>" placeholder="(800) 800-8000">
                                        </div>                  
                                        <div class="form-group">
                                            <label>VIP Customer</label>
                                            <select class="form-control" name="custRank" >
                                                <option value="1"<? if($custRank== '1') echo ' selected="selected"'; ?>>1</option>
                                                <option value="2"<? if($custRank== '2') echo ' selected="selected"'; ?>>2</option>
                                                <option value="3"<? if($custRank== '3') echo ' selected="selected"'; ?>>3</option>
                                                <option value="4"<? if($custRank== '4') echo ' selected="selected"'; ?>>4</option>
                                                <option value="5"<? if($custRank== '5') echo ' selected="selected"'; ?>>5</option>
                                            </select>
<!--                                             <p class="help-block">Example block-level help text here.</p> -->
                                        </div>
                                        <div class="form-group">
                                            <label>Store ID</label>
                                            <select class="form-control" name="storeID" >
                                                <option value="72"<? if($storeID== '72') echo ' selected="selected"'; ?>>Norfolk</option>
                                                <option value="73"<? if($storeID== '73') echo ' selected="selected"'; ?>>Columbus</option>
                                                <option value="112"<? if($storeID== '112') echo ' selected="selected"'; ?>>Sioux City</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12" style="margin-top:20px;">
                                        <div class="form-group">
                                            <label>Billing Address</label>
                                            <input class="form-control" name="custSecAdd" value="<?php echo $custSecAdd ?>" placeholder="800 Street">
                                        </div>                                    
                                    </div>

                                    <div class="col-lg-12" style="margin-top:20px;">
                                            <div class="form-group">
                                                <label>Is this a Referral?</label>
                                                <select id="isRefferal" class="form-control" name="isReferral" required <?php if ($isReferral == 'Yes') { echo "disabled";} ?>>
                                                    <option value="No"<? if($isReferral== 'No') echo ' selected="selected"'; ?>>No</option>
                                                    <option value="Yes"<? if($isReferral== 'Yes') echo ' selected="selected"'; ?>>Yes</option>
                                                </select>
                                            </div>
                                    </div>

                                    <div id="refferal-container">                                                
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input id="refFName" class="form-control" name="refFName" value="<?php echo $refferalFName ?>"<?php if (!empty($refferalFName)) { echo " disabled";} required ?>>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input id="refLName" class="form-control" name="refLName" value="<?php echo $refferalLName ?>"<?php if (!empty($refferalLName)) { echo " disabled";} required ?>>
                                            </div> 
                                        </div>
                                    </div>



                                    <?php 


if ($isReferral == 'Yes') { ?>
    <input type="hidden" name="isReferral" value="<? echo $isReferral; ?>"  />
    <input type="hidden" name="refFName" value="<? echo $refferalFName; ?>"  />
    <input type="hidden" name="refLName" value="<? echo $refferalLName; ?>"  />
<? } ?>





                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>How did the customer hear about us?</label>
                                            <input class="form-control" name="marketingSold" value="<?php echo $marketingSold ?>">
                                        </div> 
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Did we get this customer from marketing?</label>
                                            <select class="form-control" name="referralType" <?php if ($marketReferred == '1') { echo " disabled"; } ?>>
                                                <option value="">Choose One</option>
                                                <?
                                                    $referral_request = ("SELECT * FROM Vendors LEFT JOIN VendorAds ON VendorAds.adVendorID = Vendors.vendorID WHERE VendorAds.adName != '' ORDER BY Vendors.vendorName ASC");
                                                    $referral_result = mysql_query ($referral_request,$db) or die ("Query failed: $referral_request");
                                                    
                                                    while ($referral_row = mysql_fetch_array($referral_result)) { 
                                                        extract($referral_row);
                                                        $referralName = $vendorName.' - '.$adName;
                                                        echo '<option value="'.$adName.'"'.($adName == $referralType ? ' selected="selected" disabled' : '').'>'.$referralName.'</option>'."\r";
                                                    }
                                                ?>
                                            </select>
                                        </div> 
                                    </div>

                                    <div class="col-lg-12" style="margin-top:20px;">
                                            <div class="form-group">
                                                <label>Customer Notes</label>
                                                <textarea class="form-control" rows="3" name="custNotes" placeholder="Notes go here..."><?php echo $custNotes ?></textarea>
                                            </div>
                                    </div>


                                </div><!-- /.row -->
                            </div>
                        <!-- /.panel-body -->

                        <div class="panel-footer">
                                <div class="pull-right">

                                    <?
                                        $ticketresult_request = ("SELECT * FROM customerTickets WHERE ticketCustID = '$custID'");
                                        $ticketresult_result = mysql_query ($ticketresult_request,$db) or die ("Query failed: $ticketresult_request");
                                        $num_total = mysql_num_rows($ticketresult_result);


                                        if ($num_total == '0') { ?>
                                            <a class="btn btn-primary btn-danger" onclick="return deleteItem();" href="/customers/cust_del.php?custID=<?php echo $custID;?>">Delete</a>
                                        <? }
                                        else{ ?>
                                            <a href="#" class="btn btn-primary btn-warning">Delete Tickets Before Removing Customer</a>
                                        <? } ?>

                                </div>


    <input type="hidden" name="refferalFName" value="<? echo $refferalFName; ?>"  />
    <input type="hidden" name="refferalLName" value="<? echo $refferalLName; ?>"  />
    <input type="hidden" name="marketRefOne" value="<? echo $marketRefOne; ?>"  />
    <input type="hidden" name="marketRefTwo" value="<? echo $marketRefTwo; ?>"  />

                                <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save Changes" >Save</button>
                        </div>


                            <!-- /.row (nested) -->

