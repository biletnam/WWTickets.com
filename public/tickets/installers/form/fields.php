<?
        $custID = $_GET['custID'];
?>
    <input type="hidden" name="installerID" value="<? echo $installerID; ?>"  />
    <input type="hidden" name="ticketID" value="<? echo $ticketID; ?>"  />
    <input type="hidden" name="custID" value="<? echo $custID; ?>"  />
                                
                            <div class="row">
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Employee</label>

                                            <select class="form-control" name="installerName">
                                            <?
                                                $city_request = ("SELECT ID,firstName,lastname from cmsUsers ORDER BY firstName ASC");
                                                $city_result = mysql_query ($city_request,$db) or die ("Query failed: $city_request");
                                                
                                                while ($city_row = mysql_fetch_array($city_result)) { 
                                                    extract($city_row);
                                                    $empName = $firstName;
                                                    if ($empName == 'Power') {}
                                                    else{
                                                    echo '<option value="'.$empName.'"'.($empName == $installerName ? ' selected="selected"' : '').'>'.$empName.'</option>'."\r";
                                                    }
                                                }
                                            ?>

                                            </select>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Type</label>
                                            <select class="form-control" name="installerType" >
                                                <option value="A"<? if($installerType == 'A') echo ' selected="selected"'; ?>>A</option>
                                                <option value="B"<? if($installerType == 'B') echo ' selected="selected"'; ?>>B</option>
                                                <option value="C"<? if($installerType == 'C') echo ' selected="selected"'; ?>>C</option>
                                            </select>
                                        </div>                                       
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label>#</label>
                                            <input class="form-control" name="installerNum" value="<?php echo $installerNum ?>" placeholder="#">
                                        </div>                                    
                                </div>


                                </div>
                                                        </div>
                        <!-- /.panel-body -->

                        <div class="panel-footer">
                            <?php if ($username == 'admin' || $username == 'angie') { ?>
                                <div class="pull-right">
                                            <a class="btn btn-primary btn-danger" onclick="return deleteItem();" href="/tickets/installer/del.php?installerID=<?php echo $installerID;?>&ticketID=<?php echo $ticketID; ?>&custID=<?php echo $custID; ?>">Delete</a>
                                </div>
                            <? } ?>

                                        <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save Changes" >Save</button>
                                        <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save and Continue Editing">Save and Continue Editing</button>
                        </div>


                            <!-- /.row (nested) -->
