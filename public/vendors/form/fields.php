    <input type="hidden" name="vendorID" value="<? echo $vendorID; ?>"  />
                                
                            <div class="row">
                                <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Vendor Name</label>
                                            <input class="form-control" name="vendorName" value="<?php echo $vendorName ?>" placeholder="Vendor Name">
                                        </div>                                    
                                </div>
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Vendor Type</label>
                                            <select class="form-control" name="vendorType" >
                                                <option value="Newspaper"<? if($vendorType== 'Newspaper') echo ' selected="selected"'; ?>>Newspaper</option>
                                                <option value="Magazine"<? if($vendorType== 'Magazine') echo ' selected="selected"'; ?>>Magazine</option>
                                                <option value="Radio"<? if($vendorType== 'Radio') echo ' selected="selected"'; ?>>Radio</option>
                                                <option value="Television"<? if($vendorType== 'Television') echo ' selected="selected"'; ?>>Television</option>
                                                <option value="Directories"<? if($vendorType== 'Directories') echo ' selected="selected"'; ?>>Directories</option>
                                                <option value="Outdoor and Transit"<? if($vendorType== 'Outdoor and Transit') echo ' selected="selected"'; ?>>Outdoor and Transit</option>
                                                <option value="Direct Mail"<? if($vendorType== 'Direct Mail') echo ' selected="selected"'; ?>>Direct Mail</option>
                                                <option value="Online"<? if($vendorType== 'Online') echo ' selected="selected"'; ?>>Online</option>
                                                <option value="Social Media"<? if($vendorType== 'Social Media') echo ' selected="selected"'; ?>>Social Media</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Contact</label>
                                            <input class="form-control" name="vendorContact" value="<?php echo $vendorContact ?>" placeholder="First Name">
                                        </div>
                                </div>
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Fax</label>
                                            <input class="form-control" name="vendorFax" value="<?php echo $vendorFax ?>" placeholder="(800) 800-8000">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="vendorEmail" value="<?php echo $vendorEmail ?>" placeholder="Info@Example.com">
                                        </div>
                                </div>
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" name="vendorPhone" value="<?php echo $vendorPhone ?>" placeholder="(800) 800-8000">
                                        </div>
                                        <div class="form-group">
                                            &nbsp;
                                        </div>
                                </div>
                                <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Vendor Notes</label>
                                            <textarea class="form-control" rows="3" name="vendorNotes" placeholder="Notes go here..."><?php echo $vendorNotes ?></textarea>
                                        </div>
                                </div>               


                                </div>
                                                        </div>
                        <!-- /.panel-body -->

                        <div class="panel-footer">

                            <?php if ($username == 'admin' || $username == 'angie') { ?>
                                <div class="pull-right">
                                            <a class="btn btn-primary btn-danger" onclick="return deleteItem();" href="/vendors/vend_del.php?vendorID=<?php echo $vendorID;?>">Delete</a>
                                </div>
                            <? } ?>
                            
                                        <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save Changes" >Save</button>
                                        <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save and Continue Editing">Save and Continue Editing</button>
                        </div>


                            <!-- /.row (nested) -->
