                        <div class="panel-heading">
                            <h4><span>Vendor Details</span></h4>
                        </div>
                        <div class="panel-body">

                            <div class="col-md-12">
                                <h1><?php echo $vendorName; ?></h1>
                            </div>
                            <div class="col-md-6">
                                    <?php echo "<strong>Type: </strong>".$vendorType; ?><br/>
                                    <?php echo "<strong>Contact: </strong>".$vendorContact; ?><br/>
                                    <?php echo "<strong>Phone: </strong>".$vendorPhone; ?> <?php if (!empty($vendorExt)) {echo "Ext: ".$vendorExt; } ?><br/>
                            </div>
                            <div class="col-md-6">
                                    <?php echo "<strong>Fax: </strong>".$vendorFax; ?><br/>
                                    <?php echo "<strong>Email: </strong><a href='mailto:".$vendorEmail."'>".$vendorEmail; ?></a><br/>
                            </div>

                            <div class="col-md-12">
                                <h4><span>Vendor Notes:</span></h4>
                                <p><?php if (!empty($vendorNotes)) {echo $vendorNotes; } ?></p>
                            </div>

<!-- 
                            <form role="form" method="post" action="/customers/form/mod.php">
                            	<input type="hidden" name="type" value="edit" />
								<?php //include $root.'/customers/form/fields.php'; ?>
                            </form> -->
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">


                            <a href="/vendors/vend_edit.php?vendorID=<?php echo $vendorID; ?>"><button type="submit" name="submit" class="btn btn-primary btn-default" value="Edit" >Edit</button></a>

                        </div>
                        <!-- /.panel-footer -->

