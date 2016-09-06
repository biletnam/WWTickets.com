 <?php 
####################################
# Special Variable Characters
#
####################################

        $listDate = date("m/j/Y",strtotime($listDate)); if ($listDate == '12/31/1969') {$listDate = ''; }

####################################

  ?>
                                
                            <div class="row">
                                <div class="col-lg-8">
                                       <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="listTitle" value="<?php echo $listTitle ?>">
                                        </div>                                         
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input class="form-control datepicker" name="listDate" value="<?php echo $listDate ?>">
                                    </div>                                    
                                </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Assign</label>

                                            <select class="form-control" name="listAssign">
                                            <?
                                                $emp_request = ("SELECT ID,firstName,lastname from cmsUsers ORDER BY firstName ASC");
                                                $emp_result = mysql_query ($emp_request,$db) or die ("Query failed: $emp_request");
                                                
                                                while ($emp_row = mysql_fetch_array($emp_result)) { 
                                                    extract($emp_row);
                                                    $empName = $firstName;
                                                    if ($empName == 'Power') {}
                                                    else{
                                                    echo '<option value="'.$empName.'"'.($empName == $listAssign ? ' selected="selected"' : '').'>'.$empName.'</option>'."\r";
                                                    }
                                                }
                                            ?>
                                            </select>
                                        </div>                                        
                                    </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Details</label>
                                        <textarea class="form-control" name="listDetails" cols="30" rows="10"><?php echo $listDetails; ?></textarea>
                                    </div>  
                                </div>
                            </div>

                            
                        </div>
                        <!-- /.panel-body -->

                        <div class="panel-footer">



                   

                             <div class="pull-right"><a class="btn btn-primary btn-danger" onclick="return deleteItem();" href="/to-do-list/del.php?listID=<?php echo $listID;?>">Delete</a></div>
                            <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save Changes" >Save</button>
                        </div>


                            <!-- /.row (nested) -->
