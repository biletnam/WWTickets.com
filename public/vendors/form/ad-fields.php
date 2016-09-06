<?
        $adstartContract = date("m/j/Y",strtotime($adstartContract)); if ($adstartContract == '12/31/1969') {$adstartContract = ''; }
        $adendContract = date("m/j/Y",strtotime($adendContract)); if ($adendContract == '12/31/1969') {$adendContract = ''; }
        $adRenewal = date("m/j/Y",strtotime($adRenewal)); if ($adRenewal == '12/31/1969') {$adRenewal = ''; }  
?>
    <input type="hidden" name="vendorID" value="<? echo $vendorID; ?>"  />
    <input type="hidden" name="adID" value="<? echo $adID; ?>"  />
                                
                            <div class="row">
                                <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Contract Name</label>
                                            <input class="form-control" name="adName" value="<?php echo $adName ?>" placeholder="Contract Name" required>
                                        </div>                                    
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contract Location</label>
                                            <select class="form-control" name="adLocation" >
                                                <option value="Columbus"<? if($adLocation== 'Columbus') echo ' selected="selected"'; ?>>Columbus</option>
                                                <option value="Norfolk"<? if($adLocation== 'Norfolk') echo ' selected="selected"'; ?>>Norfolk</option>
                                                <option value="Sioux City"<? if($adLocation== 'Sioux City') echo ' selected="selected"'; ?>>Sioux City</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input class="form-control" name="adPrice" value="<?php echo $adPrice ?>" placeholder="000.00">
                                        </div>
                                        <div class="form-group">
                                            <label>Payment Type</label>
                                            <select class="form-control" name="adPayment" >
                                                <option value="Check"<? if($adPayment== 'Check') echo ' selected="selected"'; ?>>Check</option>
                                                <option value="Cash"<? if($adPayment== 'Cash') echo ' selected="selected"'; ?>>Cash</option>
                                                <option value="Debit Card"<? if($adPayment== 'Debit Card') echo ' selected="selected"'; ?>>Debit Card</option>
                                                <option value="Cashier Check"<? if($adPayment== 'Cashier Check') echo ' selected="selected"'; ?>>Cashier Check</option>
                                                <optgroup label="Credit Cards">
                                                        <option value="Visa"<? if($adPayment== 'Visa') echo ' selected="selected"'; ?>>Visa</option>
                                                        <option value="Mastercard"<? if($adPayment== 'Mastercard') echo ' selected="selected"'; ?>>Mastercard</option>
                                                        <option value="Amercian Express"<? if($adPayment== 'Amercian Express') echo ' selected="selected"'; ?>>Amercian Express</option>
                                                        <option value="Amercian Discover"<? if($adPayment== 'Amercian Discover') echo ' selected="selected"'; ?>>Amercian Discover</option>
                                                </optgroup>
                                                <option value="Wire Transfer"<? if($adPayment== 'Wire Transfer') echo ' selected="selected"'; ?>>Wire Transfer</option>

                                            </select>
                                        </div>                                        
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contract Start Date</label>
                                            <input class="form-control datepicker" name="adstartContract" value="<?php echo $adstartContract ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Contract End Date</label>
                                            <input class="form-control datepicker" name="adendContract" value="<?php echo $adendContract ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Renewal Date</label>
                                            <input class="form-control datepicker" name="adRenewal" value="<?php echo $adRenewal ?>">
                                        </div>                                        
                                </div>
                                <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Contract Notes</label>
                                            <textarea class="form-control" rows="3" name="adNotes" placeholder="Notes go here..."><?php echo $adNotes ?></textarea>
                                        </div>
                                </div>               


                                </div>
                                                        </div>
                        <!-- /.panel-body -->

                        <div class="panel-footer">
                            <?php if ($username == 'admin' || $username == 'angie') { ?>
                                <div class="pull-right">
                                            <a class="btn btn-primary btn-danger" onclick="return deleteItem();" href="/vendors/ad_del.php?adID=<?php echo $adID;?>">Delete</a>
                                </div>
                            <? } ?>

                                        <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save Changes" >Save</button>
                                        <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save and Continue Editing">Save and Continue Editing</button>
                        </div>


                            <!-- /.row (nested) -->
