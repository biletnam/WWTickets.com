 <?php 
####################################
# Special Variable Characters
#
####################################

        $attachDate = date("m/j/Y",strtotime($attachDate)); if ($attachDate == '12/31/1969') {$attachDate = ''; }

####################################

  ?>

    <input type="hidden" name="attachID" value="<? echo $attachID; ?>"  />
    <input type="hidden" name="custID" value="<? echo $custID; ?>"  />
    <input type="hidden" name="ticketID" value="<? echo $ticketID; ?>"  />


                                

                                           


                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="form-group">
                                        <label>Type</label>
                                        <select class="form-control" name="attachmentType" >
                                            <option value=""<? if($attachmentType == '') echo ' selected="selected"'; ?>>Choose One</option>
                                            <option value="Test Kit Form"<? if($attachmentType == 'Test Kit Form') echo ' selected="selected"'; ?>>Test Kit Form</option>
                                            <option value="Renovation Record Keeping"<? if($attachmentType == 'Renovation Record Keeping') echo ' selected="selected"'; ?>>Renovation Record Keeping</option>
                                            <option value="Measure Sheet"<? if($attachmentType == 'Measure Sheet') echo ' selected="selected"'; ?>>Measure Sheet</option>
                                            <option value="Invoice"<? if($attachmentType == 'Invoice') echo ' selected="selected"'; ?>>Invoice</option>
                                            <option value="Repair"<? if($attachmentType == 'Repair') echo ' selected="selected"'; ?>>Repair</option>
                                            <option value="Proposal"<? if($attachmentType == 'Proposal') echo ' selected="selected"'; ?>>Proposal</option>
                                            <option value="Certificate of Completion"<? if($attachmentType == 'Certificate of Completion') echo ' selected="selected"'; ?>>Certificate of Completion</option>
                                            <option value="Lead Documents"<? if($attachmentType == 'Lead Documents') echo ' selected="selected"'; ?>>Lead Documents</option>
                                            <option value="Other"<? if($attachmentType == 'Other') echo ' selected="selected"'; ?>>Other</option>
                                        </select>
                                    </div>

                                    <div id="typeLabel" class="form-group">
                                        <label for="">Other - Title</label>
                                        <input class="form-control" name="attachmentTypeOveride" value="<?php echo $attachmentTypeOveride ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Browse Photos</label>
                                        <input type="file" name="files[]" multiple/>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Date</label>
                                        <input class="form-control datepicker" name="attachDate" value="<?php echo $attachDate ?>">
                                    </div>


                                </div> <!-- /.table-responsive -->


                            </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->

                        <div class="panel-footer">
                                        <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save Changes" >Save</button>
                                        <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save and Continue Editing">Save and Continue Editing</button>
                        </div>


                            <!-- /.row (nested) -->


