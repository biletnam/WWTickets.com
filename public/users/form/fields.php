                            <input type="hidden" name="userID" value="<? echo $userID; ?>"  />
                                
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input class="form-control" name="viewfirstName" value="<?php echo $viewfirstName ?>" readonly="readonly">
                                    </div>                                                                                                             
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control" name="viewusername" value="<?php echo $viewusername ?>" placeholder="Username" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input class="form-control" name="viewlastName" value="<?php echo $viewlastName ?>" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" name="viewpassword" value="<?php echo $viewpassword ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Initials <span style="font-size:12px;">3 Letters Only (First Name, Middle Name, Last Name)</span></label>
                                        <input class="form-control" name="viewinitials" value="<?php echo $viewinitials ?>">
                                    </div>                                                                                                             
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>User Type</label>
                                        <select class="form-control" name="viewuserAssignType" >
                                            <option value="Sales"<? if($viewuserAssignType== 'Sales') echo ' selected="selected"'; ?>>Sales</option>
                                            <option value="Installer"<? if($viewuserAssignType== 'Installer') echo ' selected="selected"'; ?>>Installer</option>
                                            <option value="Office"<? if($viewuserAssignType== 'Office') echo ' selected="selected"'; ?>>Office</option>
                                            <option value="Manager"<? if($viewuserAssignType== 'Manager') echo ' selected="selected"'; ?>>Manager</option>
                                        </select>
                                    </div>                                    
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>User Location</label>
                                        <select class="form-control" name="viewuserLocation" >
                                            <option value="Norfolk"<? if($viewuserLocation== 'Norfolk') echo ' selected="selected"'; ?>>Norfolk</option>
                                            <option value="Columbus"<? if($viewuserLocation== 'Columbus') echo ' selected="selected"'; ?>>Columbus</option>
                                            <option value="Sioux City"<? if($viewuserLocation== 'Sioux City') echo ' selected="selected"'; ?>>Sioux City</option>
                                        </select>
                                    </div>                                    
                                </div>                                                               
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>User Level<br/><small>User - Customers,Calendar,Tickets/Ticket Attachments | Admin - Everything</small></label>
                                        <select class="form-control" name="viewuserLevel" >
                                            <option value="User"<? if($viewuserLevel== 'User') echo ' selected="selected"'; ?>>User</option>
                                            <option value="Admin"<? if($viewuserLevel== 'Admin') echo ' selected="selected"'; ?>>Admin</option>
                                        </select>
                                    </div>                                    
                                </div>                     
                            </div>
                        </div>
                        <!-- /.panel-body -->

                        <div class="panel-footer">
                            <div class="pull-right">
                                <a class="btn btn-primary btn-danger" href="/users/user_del.php?userID=<?php echo $userID;?>">Delete</a>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save Changes" >Save</button>
                            <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save and Continue Editing">Save and Continue Editing</button>
                        </div>

                            <!-- /.row (nested) -->