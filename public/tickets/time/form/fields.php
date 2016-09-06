<?
        $timeDate = date("m/j/Y",strtotime($timeDate)); if ($timeDate == '12/31/1969') {$timeDate = ''; }
        $custID = $_GET['custID'];
?>
    <input type="hidden" name="timeID" value="<? echo $timeID; ?>"  />
    <input type="hidden" name="ticketID" value="<? echo $ticketID; ?>"  />
    <input type="hidden" name="custID" value="<? echo $custID; ?>"  />
                                
                            <div class="row">
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Employee</label>

                                            <select class="form-control" name="empID">
                                            <?
                                                $city_request = ("SELECT ID,firstName,lastname from cmsUsers ORDER BY firstName ASC");
                                                $city_result = mysql_query ($city_request,$db) or die ("Query failed: $city_request");
                                                
                                                while ($city_row = mysql_fetch_array($city_result)) { 
                                                    extract($city_row);
                                                    $empName = $firstName;
                                                    if ($empName == 'Power') {}
                                                    else{
                                                    echo '<option value="'.$empName.'"'.($empName == $empID ? ' selected="selected"' : '').'>'.$empName.'</option>'."\r";
                                                    }
                                                }
                                            ?>

                                            </select>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input class="form-control datepicker" name="timeDate" value="<?php echo $timeDate ?>">
                                        </div>                                       
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Time</label>
                                            <input class="form-control" name="timeTime" value="<?php echo $timeTime ?>" placeholder="minutes only">
                                        </div>                                    
                                </div>
                                <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Time Notes</label>
                                            <textarea class="form-control" rows="3" name="timeNotes" placeholder="Notes go here..."><?php echo $timeNotes ?></textarea>
                                        </div>
                                </div>               


                                </div>
                                                        </div>
                        <!-- /.panel-body -->

                        <div class="panel-footer">
                            <?php if ($username == 'admin' || $username == 'angie') { ?>
                                <div class="pull-right">
                                            <a class="btn btn-primary btn-danger" onclick="return deleteItem();" href="/tickets/time/del.php?timeID=<?php echo $timeID;?>&ticketID=<?php echo $ticketID; ?>&custID=<?php echo $custID; ?>">Delete</a>
                                </div>
                            <? } ?>

                                        <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save Changes" >Save</button>
                                        <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save and Continue Editing">Save and Continue Editing</button>
                        </div>


                            <!-- /.row (nested) -->
