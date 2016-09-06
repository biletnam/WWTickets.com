<?
        $taskDate = date("m/j/Y",strtotime($taskDate)); if ($taskDate == '12/31/1969') {$taskDate = ''; } if ($taskDate == '11/30/-0001') {$taskDate = ''; }
        $completeBy = date("m/j/Y",strtotime($completeBy)); if ($completeBy == '12/31/1969') {$completeBy = '';}  if ($completeBy == '11/30/-0001') {$completeBy = ''; }
        $custID = $_GET['custID'];
?>
    <input type="hidden" name="taskID" value="<? echo $taskID; ?>"  />

    <input type="hidden" name="custID" value="<? echo $custID; ?>"  />
                                
                            <div class="row">
                                <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Assign Employee</label>

                                            <select class="form-control" name="taskEmp">
                                                <option value="" <?php if (empty($taskEmp)) {echo 'selected="selected"'; } ?>>Choose One</option>
                                            <?
                                                $city_request = ("SELECT ID,firstName,lastname from cmsUsers ORDER BY firstName ASC");
                                                $city_result = mysql_query ($city_request,$db) or die ("Query failed: $city_request");
                                                
                                                while ($city_row = mysql_fetch_array($city_result)) { 
                                                    extract($city_row);
                                                    $empName = $firstName;
                                                    if ($empName == 'Power') {}
                                                    else{
                                                    echo '<option value="'.$empName.'"'.($empName == $taskEmp ? ' selected="selected"' : '').'>'.$empName.'</option>'."\r";
                                                    }
                                                }
                                            ?>

                                            </select>
                                        </div>
                                </div>
                                <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Created By</label>

                                            <select class="form-control" name="createdBy">
                                                <option value="" <?php if (empty($createdBy)) {echo 'selected="selected"'; } ?>>Choose One</option>
                                            <?
                                                $city_request = ("SELECT ID,firstName,lastname from cmsUsers ORDER BY firstName ASC");
                                                $city_result = mysql_query ($city_request,$db) or die ("Query failed: $city_request");
                                                
                                                while ($city_row = mysql_fetch_array($city_result)) { 
                                                    extract($city_row);
                                                    $empName = $firstName;
                                                    if ($empName == 'Power') {}
                                                    else{
                                                    echo '<option value="'.$empName.'"'.($empName == $createdBy ? ' selected="selected"' : '').'>'.$empName.'</option>'."\r";
                                                    }
                                                }
                                            ?>

                                            </select>
                                        </div>
                                </div>                              
                                    <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Date Created</label>
                                                <input class="form-control datepicker" name="taskDate" value="<?php echo $taskDate ?>">
                                            </div>                                       
                                    </div>
                                    <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Date Due</label>
                                                <input class="form-control datepicker" name="completeBy" value="<?php echo $completeBy ?>">
                                            </div>                                       
                                    </div>                                    
                                    <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="taskStatus" >
                                                    <option value="Processing"<? if($taskStatus == 'Processing') echo ' selected="selected"'; ?>>Processing</option>
                                                    <option value="Complete"<? if($taskStatus == 'Complete') echo ' selected="selected"'; ?>>Complete</option>
                                                </select>
                                            </div>                                    
                                    </div>
                                    <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Red Flag</label>
                                                <select class="form-control" name="ticketRedFlag" >
                                                    <option value=""<? if($ticketRedFlag == '') echo ' selected="selected"'; ?>>No</option>
                                                    <option value="Yes"<? if($ticketRedFlag == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
                                                </select>
                                            </div>                                    
                                    </div>                                
                                </div>              
                                <div class="row">
                                    <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Task Notes</label>
                                                <textarea class="form-control" rows="3" name="taskNotes" placeholder="Notes go here..."><?php echo $taskNotes ?></textarea>
                                            </div>
                                    </div>               
                                </div>              


                                </div>
                                                        </div>
                        <!-- /.panel-body -->

                        <div class="panel-footer">
                            <?php if ($username == 'admin' || $username == 'angie') { ?>
                                <div class="pull-right">
                                            <a class="btn btn-primary btn-danger" onclick="return deleteItem();" href="/tickets/task/del.php?timeID=<?php echo $taskID;?>&ticketID=<?php echo $ticketID; ?>&custID=<?php echo $custID; ?>">Delete</a>
                                </div>
                            <? } ?>

                                        <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save Changes" >Save</button>
                                        <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save and Continue Editing">Save and Continue Editing</button>
                        </div>


                            <!-- /.row (nested) -->
