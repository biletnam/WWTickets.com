 <?php 
####################################
# Special Variable Characters
#
####################################

        $appDate = date("m/j/Y",strtotime($appDate)); if ($appDate == '12/31/1969') {$appDate = ''; }

####################################

  ?>

    <input type="hidden" name="custID" value="<? echo $custID; ?>"  />
    <input type="hidden" name="ticketID" value="<? echo $ticketID; ?>"  />
                                
                            <div class="row">
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Levels</label>
                                            <select class="form-control" name="appLevel" >
                                                <option value="1"<? if($appLevel == '1') echo ' selected="selected"'; ?>>1</option>
                                                <option value="2"<? if($appLevel == '2') echo ' selected="selected"'; ?>>2</option>
                                                <option value="3"<? if($appLevel == '3') echo ' selected="selected"'; ?>>3</option>
                                                <option value="4"<? if($appLevel == '4') echo ' selected="selected"'; ?>>4</option>
                                                <option value="5"<? if($appLevel == '5') echo ' selected="selected"'; ?>>5</option>
                                            </select>
                                        </div> 
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label>App Sent</label>
                                            <select class="form-control" name="appSent" >
                                                <option value="No"<? if($appSent == 'No') echo ' selected="selected"'; ?>>No</option>
                                                <option value="Yes"<? if($appSent == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date Sent</label>
                                        <input class="form-control datepicker" name="appDate" value="<?php echo $appDate ?>" placeholder="">
                                    </div>                                         
                                </div>
                                <!-- /.col-lg-6 (nested) -->                                
                            <div class="row" style="margin-top: 15px;">

                            </div>
                        </div>
                        <!-- /.panel-body -->

                        <div class="panel-footer">

                                        <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save Changes" >Save</button>
                                        <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save and Continue Editing">Save and Continue Editing</button>
                        </div>


                            <!-- /.row (nested) -->
