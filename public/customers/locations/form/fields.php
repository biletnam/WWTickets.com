<style>
    #page-wrapper .col-lg-12 {
        border-bottom: none!important;
        margin-bottom: 0px;
        margin-top: 0px;
    }
</style>
    <?php $custLocID = $ID; ?>
    <input type="hidden" name="custLocID" value="<? echo $custLocID; ?>"  />
    <input type="hidden" name="locationID" value="<? echo $locationID; ?>"  />
                                
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input class="form-control" name="locationName" value="<?php echo $locationName ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" name="locationAddress" value="<?php echo $locationAddress; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>City</label>
                                            <select class="form-control" name="locationCity">
                                                    <option value="Norfolk" <?php if ($city_result == 'Norfolk') {echo 'selected="selected"';} ?>>Norfolk</option>
                                            <?
                                                $city_request = ("SELECT city_name from cities ORDER BY city_name ASC");
                                                $city_result = mysql_query ($city_request,$db) or die ("Query failed: $city_request");
                                                
                                                while ($city_row = mysql_fetch_array($city_result)) { 
                                                    extract($city_row);?>
                                                    <?
                                                    echo '<option value="'.$city_name.'"'.($city_name == $locationCity ? ' selected="selected"' : '').'>'.$city_name.'</option>'."\r";
                                                }
                                            ?>
                                            </select>                                         
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>State</label>
                                            <select class="form-control" name="locationState">

                                                <option value="Nebraska" <?php if ($locationState == 'Nebraska') {echo 'selected="selected"';} ?>>Nebraska</option>
                                                <option value="Iowa" <?php if ($locationState == 'Iowa') {echo 'selected="selected"';} ?>>Iowa</option>
                                                <option value="South Dakota" <?php if ($locationState == 'South Dakota') {echo 'selected="selected"';} ?>>South Dakota</option>
                                                <option value="-" <?php if ($locationState == '-') {echo 'selected="selected"';} ?>>-</option>
                                                <?php
                                                  $state_list = array(
                                                    'Alabama',
                                                    'Alaska',
                                                    'Arizona',
                                                    'Arkansas',
                                                    'California',
                                                    'Colorado',
                                                    'Connecticut',
                                                    'Delaware',
                                                    'Florida',
                                                    'Georgia',
                                                    'Hawaii',
                                                    'Idaho',
                                                    'Illinois',
                                                    'Indiana',
                                                    // 'Iowa',
                                                    'Kansas',
                                                    'Kentucky',
                                                    'Louisiana',
                                                    'Maine',
                                                    'Maryland',
                                                    'Massachusetts',
                                                    'Michigan',
                                                    'Minnesota',
                                                    'Mississippi',
                                                    'Missouri',
                                                    'Montana',
                                                    //'Nebraska',
                                                    'Nevada',
                                                    'New Hampshire',
                                                    'New Jersey',
                                                    'New Mexico',
                                                    'New York',
                                                    'North Carolina',
                                                    'North Dakota',
                                                    'Ohio',
                                                    'Oklahoma',
                                                    'Oregon',
                                                    'Pennsylvania',
                                                    'Rhode Island',
                                                    'South Carolina',
                                                    // 'South Dakota',
                                                    'Tennessee',
                                                    'Texas',
                                                    'Utah',
                                                    'Vermont',
                                                    'Virginia',
                                                    'Washington',
                                                    'West Virginia',
                                                    'Wisconsin',
                                                    'Wyoming'
                                                  );
                                                  foreach($state_list as $state_item) {
                                                    echo '<option value="'.$state_item.'"'.($state_item == $locationState ? ' selected="selected"' : '').'>'.$state_item.'</option>'."\r";
                                                  }

                                                ?>
                                         
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Zip Code</label>
                                            <input class="form-control" name="locationZip" value="<?php echo $locationZip; ?>">
                                        </div>
                                    </div>                                                                                

                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                   
    
                                </div><!-- /.row -->
                            </div>
                        <!-- /.panel-body -->

                        <div class="panel-footer">
                                <div class="pull-right">
                                    <a class="btn btn-primary btn-danger" onclick="return deleteItem();" href="/customers/locations/del.php?locationID=<?php echo $locationID;?>&custID=<?php echo $custLocID;?>">Delete</a>
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save Changes" >Save</button>
                        </div>

<!-- /.row (nested) -->