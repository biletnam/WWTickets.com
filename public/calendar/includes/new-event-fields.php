<?php
/**
 * Created by PhpStorm.
 * User: WebDesign
 * Date: 8/30/2016
 * Time: 9:34 AM
 */
?>
<input type="hidden" name="categorie" value="General">
<input type="hidden" name="color" value="#587ca3">
<input type="hidden" name="repeat_method" value="no">
<input type="hidden" name="url" value="false">
<input type="hidden" name="all-day" value="false">
<input type="hidden" name="repeat_id" value="1">


                <div class="col-lg-12">
                    <label>New Customer</label>
                    <select class="form-control" name="newCustomer" >
                        <option value="">No</option>
                        <option value="1">Yes</option>
                    </select>

<!--                    <input type="checkbox" class="form-control" name="newCustomer"  value="1" id="newCustomer">-->
                </div>

                <div class="col-lg-12">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="title" placeholder="First Name" id="name">
                </div>

                <div class="col-lg-12">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lname" placeholder="Last Name" id="name">
                </div>

                <div class="col-lg-12">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Address" id="address">
                </div>

                <div class="col-lg-12">
                    <label>Phone:</label>
                    <input type="text" class="form-control" name="phone" placeholder="Phone" id="phone">
                </div>

                <div class="col-lg-12">
                    <label>Email:</label>
                    <input type="text" class="form-control" name="email" placeholder="Email" id="email">
                </div>

                <div class="col-lg-12">
                    <label>City:</label>
                    <input type="text" class="form-control" name="city" placeholder="City" id="city">
                </div>

                <div class="col-lg-12">
                    <label for="">State</label>
                    <select class="form-control" name="state" >
                        <option value="Nebraska">Nebraska</option>
                        <option value="Iowa">Iowa</option>
                        <option value="South Dakota">South Dakota </option>
                    </select>
                </div>


                <div class="col-lg-6">
                        <label>Start Date:</label>
                        <input type="text" name="start_date" class="form-control input-sm" placeholder="Y-M-D" id="startDate">
                </div>
     
                <div class="col-lg-6">
                        <label>Start Time:</label>
                        <input type="text" class="form-control input-sm" name="start_time" placeholder="HH:MM" id="startTime">
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label>End Date:</label>
                        <input type="text" class="form-control input-sm" name="end_date" placeholder="Y-M-D" id="endDate">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>End Time:</label>
                        <input type="text" class="form-control input-sm" name="end_time" placeholder="HH:MM" id="endTime">
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                        <label>Assign Employee:</label>
                        <select name="calUsers" id="" class="form-control">
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

<div class="col-md-6">
    <div id="selectProduct">
        <label>Job</label>
        <select class="form-control" name="jobProduct" >
            <option value="Windows" selected="selected">Windows</option>
            <option value="Siding">Siding</option>
            <option value="Doors">Doors</option>
            <option value="Window Door Repair">Window &amp; Door Repair</option>
            <option value="Siding Repair">Siding Repair</option>
            <option value="Solar Zone Attic">Solar Zone & Attic</option>
            <option value="">Other</option>
        </select>
    </div>
</div>

<div class="col-md-6">
    <label>Status</label>
    <select class="form-control" name="ticketStatus" >
        <option value="">Choose One</option>
        <option value="Scheduled">Scheduled Estimate</option>
        <option value="Scheduled to Install">Scheduled to Install </option>
    </select>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label>Customers:</label>
        <select name="calCustomers" id="first-choice" class="form-control">
            <option value="">Choose One</option>
            <?
            $custInfo_request = ("SELECT custID,custFName,custLName FROM customerInfo ORDER BY custLName ASC");
            $custInfo_result = mysql_query ($custInfo_request,$db) or die ("Query failed: $custInfo_request");

            while ($custInfo_row = mysql_fetch_array($custInfo_result)) {
                $calCustFName = $custInfo_row['custFName'];
                $calCustLName = $custInfo_row['custLName'];
                $calCustID = $custInfo_row['custID'];

                ?>
                <option value="<?php echo $calCustID; ?>"><?php echo $calCustLName; ?> <?php echo $calCustFName; ?></option>
            <? } ?>
        </select>
        <!-- <input type="text" class="input-small form-control" name="color" id="cp"> -->
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label>Tickets:</label>
        <select name="calTickets" id="secondChoice" class="form-control">
            <option value="">Choose One From Dropdown Selection Above</option>
            <!--                                            Data retrieved from getCustomerIDTickets.php-->
        </select>
        <!-- <input type="text" class="input-small form-control" name="color" id="cp"> -->
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label>Customer Referral:</label>
        <input type="text" class="form-control" name="customerReferral" placeholder="Type" id="customerReferral">
    </div>
</div>

<div class="col-lg-12">
    <div class="form-group">
        <label>Notes:</label>
        <textarea class="form-control" name="description" id="description" placeholder="Notes"></textarea>
    </div>
</div>

