 <?php 
####################################
# Special Variable Characters
#
####################################

        $sinDate = date("m/j/Y",strtotime($sinDate)); if ($sinDate == '12/31/1969') {$sinDate = ''; }

####################################

  ?>
                                
                            <div class="row">


                                <input type="hidden" name="sinID" value="<?php echo $sinID; ?>">
                                <div class="col-lg-12" style="margin-bottom:5px;border:none;">
                                       <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="sinName" value="<?php echo $sinName; ?>">
                                        </div>                                         
                                </div>
                                <div class="col-lg-12" style="margin-top:0px;border:none;">
                                       <div class="form-group">
                                            <label>Qty</label>
                                            <input class="form-control" name="sinQty" value="<?php echo $sinQty; ?>">
                                        </div>                                         
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Model</label>
                                        <input class="form-control" name="sinModel" value="<?php echo $sinModel; ?>">
                                    </div>   

                                    <div class="form-group">
                                        <label>Size</label>
                                        <input class="form-control" name="sinSize" value="<?php echo $sinSize; ?>">
                                    </div>          

                                    <div class="form-group">
                                        <label>Interior Color</label>
                                        <input class="form-control" name="sinInterior" value="<?php echo $sinInterior; ?>">
                                    </div> 

                                    <div class="form-group">
                                        <label>Exterior Color</label>
                                        <input class="form-control" name="sinExterior" value="<?php echo $sinExterior; ?>">
                                    </div> 

                                    <div class="form-group">
                                        <label>Grid</label>
                                                <select class="form-control" name="sinGrid" >
                                                    <option value=""<? if($sinGrid == '') echo ' selected="selected"'; ?>>Choose One</option>
                                                    <option value="Yes"<? if($sinGrid == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
                                                    <option value="No"<? if($sinGrid == 'No') echo ' selected="selected"'; ?>>No</option>
                                                </select>                                        
                                    </div> 
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Serial Number</label>
                                        <input class="form-control" name="sinSerial" value="<?php echo $sinSerial; ?>">
                                    </div>   

                                    <div class="form-group">
                                        <label>Nail Fin</label>
                                                <select class="form-control" name="sinNail" >
                                                    <option value=""<? if($sinNail == '') echo ' selected="selected"'; ?>>Choose One</option>
                                                    <option value="Yes"<? if($sinNail == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
                                                    <option value="No"<? if($sinNail == 'No') echo ' selected="selected"'; ?>>No</option>
                                                </select>
                                    </div>          

                                    <div class="form-group">
                                        <label>Price</label>
                                        <input class="form-control" name="sinPrice" value="<?php echo $sinPrice; ?>">
                                    </div> 

                                    <div class="form-group">
                                        <label>Donated</label>
                                                <select class="form-control" name="sinDonated" >
                                                    <option value=""<? if($sinDonated == '') echo ' selected="selected"'; ?>>Choose One</option>
                                                    <option value="Yes"<? if($sinDonated == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
                                                    <option value="No"<? if($sinDonated == 'No') echo ' selected="selected"'; ?>>No</option>
                                                </select>
                                    </div> 

                                    <div class="form-group">
                                        <label>Date</label>
                                        <input class="form-control datepicker" name="sinDate" value="<?php echo $sinDate; ?>">
                                    </div> 
                                </div>

                            </div>

                            
                        </div>
                        <!-- /.panel-body -->

                        <div class="panel-footer">

                            <?php if ($username == 'admin' || $username == 'angie') { ?>
                                <div class="pull-right">
                                            <a class="btn btn-primary btn-danger" onclick="return deleteItem();" href="/sin-bin/del.php?sinID=<?php echo $sinID;?>">Delete</a>
                                </div>
                            <? } ?>


                            <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save Changes" >Save</button>
                        </div>


                            <!-- /.row (nested) -->
