 <?php 
####################################
# Special Variable Characters
#
####################################


####################################

  ?>
                                
                            <div class="row">


                                <input type="hidden" name="city_id" value="<?php echo $city_id; ?>">
                                <div class="col-lg-4 col-md-4">
                                       <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="city_name" value="<?php echo $city_name; ?>" required>
                                        </div>                                         
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label>State (State Abbreviation Only)</label>
                                        <input class="form-control" name="city_state" value="<?php echo $city_state; ?>" placeholder="NE" required>
                                    </div>   
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label>Zip</label>
                                        <input class="form-control" name="city_zip" value="<?php echo $city_zip; ?>" required>
                                    </div>          
                                </div>

                            </div>
                            
                        </div>
                        <!-- /.panel-body -->

                        <div class="panel-footer">

                       
                                <div class="pull-right">
                                            <a class="btn btn-primary btn-danger" onclick="return deleteItem();" href="/city/del.php?city_id=<?php echo $city_id;?>">Delete</a>
                                </div>
                      


                            <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save Changes" >Save</button>
                        </div>


                            <!-- /.row (nested) -->
