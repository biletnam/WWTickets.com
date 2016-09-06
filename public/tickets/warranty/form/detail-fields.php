 <?php 
####################################
# Special Variable Characters
#
####################################

        $warrantyDate = date("m/j/Y",strtotime($warrantyDate)); if ($warrantyDate == '11/30/-0001') {$warrantyDate = ''; }


####################################

  ?>

    <input type="hidden" name="warrantyID" value="<? echo $warrantyID; ?>"  />
    <input type="hidden" name="ticketID" value="<? echo $ticketID; ?>"  />
    <input type="hidden" name="custID" value="<? echo $custID; ?>"  />
                                
                            <div class="row">
<!--                                 <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Contact Name</label>
                                        <select name="customerNot" id="" class="form-control">
                                            <?
                                                $acustomer_request = ("SELECT * FROM customerInfo ORDER BY custLName ASC");
                                                $acustomer_result = mysql_query ($acustomer_request,$db) or die ("Query failed: $acustomer_request");
                                                
                                                while ($acustomer_row = mysql_fetch_array($acustomer_result)) { 
                                                    extract($acustomer_row); 
                                                        $acustFName = $acustomer_row['custFName'];
                                                        $acustLName = $acustomer_row['custLName'];
                                                        $acustID = $acustomer_row['custID'];
                                                     ?>
                                                        <option value="<?php echo $custID; ?>"><?php echo $custFName; ?> <?php echo $custLName; ?></option>
                                                    <? } ?>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Contact Name</label>
                                            <input class="form-control" name="newName" value="<?php echo $newName ?>" placeholder="">
                                        </div> 
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input class="form-control" name="newPhone" value="<?php echo $newPhone ?>" placeholder="(800) 800-8000">
                                        </div>
                                </div>
                                <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Email Address</label>
                                            <input class="form-control" name="newEmail" value="<?php echo $newEmail ?>" placeholder="Example@DomainName.com">
                                        </div>                                         
                                        <div class="form-group">
                                            <label>Warranty Date</label>
                                            <input class="form-control datepicker" name="warrantyDate" value="<?php echo $warrantyDate ?>">
                                        </div> 
                                </div>
<!--                                 <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Transfer Warranty to Another Customer</label>
                                            <select name="warrantyTransID" id="">
                                                
                                                <?
                                                    $cust_request = ("SELECT * FROM customerInfo ORDER BY custLName");
                                                    $cust_result = mysql_query ($cust_request,$db) or die ("Query failed: $cust_request");
                                                    
                                                    while ($cust_row = mysql_fetch_array($cust_result)) { 
                                                        extract($cust_row);  ?>
                                                    <option value="<?php echo $custID; ?>"><?php echo $custFName; ?> <?php echo $custLName ?></option>
                                                <? } ?>

  
                                            </select>
                                        </div>                                         
                                        <div class="form-group">
                                            &nbsp;
                                        </div> 
                                </div>  -->                               
                                <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Warranty Notes</label>
                                            <textarea class="form-control" rows="3" name="newNotes" placeholder="Notes go here..."><?php echo $newNotes; ?></textarea>
                                        </div>                                    
                                </div>

                              

                            </div>
                        </div>
                        <!-- /.panel-body -->

                        <div class="panel-footer">

                            <?php if ($username == 'admin' || $username == 'angie') { ?>
                                <div class="pull-right">
                                            <a class="btn btn-primary btn-danger" onclick="return deleteItem();" href="/tickets/warranty/warranty_del.php?warrantyID=<?php echo $warrantyID;?>">Delete</a>
                                </div>
                            <? } ?>


                                        <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save Changes" >Save</button>
                                        <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save and Continue Editing">Save and Continue Editing</button>
                        </div>


                            <!-- /.row (nested) -->
