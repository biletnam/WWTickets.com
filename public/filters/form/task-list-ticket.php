<div class="well">
    
                                    <h4><span>Ticket - Task List</span></h4>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <select class="form-control" name="taskEmp">
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
                                        <button class="btn btn-primary" type="submit"><i class="fa  fa-search fa-fw"></i> </button>
                                    </div>
                                        
                                    <div class="clearfix"></div>
                           
</div>