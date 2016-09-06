<div class="well">
    
                                    <h4><span>City Location</span></h4>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <select class="form-control" name="ticketLocation" >
                                                <option value="">All Cities</option>

                                                <?php 

                                                $citySearch = $ticketCity;
                                                    $post_request = ("SELECT ticketCity FROM customerTickets GROUP BY ticketCity DESC ORDER BY ticketCity ASC");
                                                    $post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");
                                                    
                                                    while ($post_row = mysql_fetch_array($post_result)) { 
                                                        extract($post_row); ?>
                                                            <option value="<?php echo $ticketCity ?>"><?php echo $ticketCity; ?></option>
                                                    <? } ?>
                                            </select>
                                        </div>
                                    </div>
                                        
                                    <div class="col-md-2">
                                        <button class="btn btn-primary" type="submit"><i class="fa  fa-search fa-fw"></i> </button>
                                    </div>
                                        
                                    <div class="clearfix"></div>
                           
</div>