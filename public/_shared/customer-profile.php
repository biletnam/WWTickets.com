                        <div class="panel-heading">
                            <h4><span>Customer Details</span></h4>
                        </div>
                        <div class="panel-body" style="background-color:#f8f8f8;">

                            <div class="col-md-12">
                                <h1><?php echo $custFName; echo " "; echo $custLName; ?> <?php if (!empty($custComp)) { echo " - ".$custComp;} ?></h1>
                                
                            </div>

                            <div class="col-md-6">
                                    <?php 
                                switch ($custRank) {
                                    case '1': echo "<img src=\"/_images/1-star.png\" alt=\"\" title=\"\" /><br/><br/>"; break;
                                    case '2': echo "<img src=\"/_images/2-star.png\" alt=\"\" title=\"\" /><br/><br/>"; break;
                                    case '3': echo "<img src=\"/_images/3-star.png\" alt=\"\" title=\"\" /><br/><br/>"; break;
                                    case '4': echo "<img src=\"/_images/4-star.png\" alt=\"\" title=\"\" /><br/><br/>"; break;
                                    case '5': echo "<img src=\"/_images/5-star.png\" alt=\"\" title=\"\" /><br/><br/>"; break;

                                }
                                    echo "<strong>Address: </strong>".$custBillAdd;
                                    if (!empty($custCity)) { echo "<br/>".$custCity;}
                                    if (!empty($custState)) { echo ", ".$custState;}
                                    if (!empty($custZip)) { echo " ".$custZip;}
                                    echo "<br/><strong>Billing Address: </strong>".$custSecAdd;
                                echo "<br/>";
                                if (!empty($custPrimaryF)) { echo "<br/><strong>Primary Contact: </strong>".$custPrimaryF;}
                                if (!empty($custPrimPhone)) { echo "<br/><strong>Primary Phone: </strong>".$custPrimPhone;}?>
                                    </p>
                            </div>

                            <div class="col-md-6">
                                <p><?php 

                                    if (!empty($custPhone)) { echo "<br/><strong>Phone: </strong> <a href='tel:$custPhone'>".$custPhone."</a>";}
                                    if (!empty($custFax)) { echo "<br/><strong>Fax: </strong> ".$custFax;}
                                    if (!empty($custMobile)) { echo "<br/><strong>Mobile: </strong> <a href='tel:$custMobile'>".$custMobile."</a>";}
                                    if (!empty($custWork)) { echo "<br/><strong>Work: </strong><a href='tel:$custWork'> ".$custWork."</a>";}
                                    if (!empty($custEmail)) { echo "<br/><strong>Email: </strong> <a href='mailto:$custEmail'>".$custEmail."</a>";}
                                    if (!empty($custEmail2)) { echo "<br/><strong>Secondary Email: </strong> <a href='mailto:$custEmail'>".$custEmail2."</a>";}
                                    if (!empty($storeID)) { echo "<br/><strong>Store ID: </strong> ";
                                            if ($storeID == '72') {echo "Norfolk"; }
                                            if ($storeID == '73') {echo "Columbus"; }
                                            if ($storeID == '112') {echo "Sioux City"; }
                                    echo "";}
                                    echo "<br/><strong>Referral: </strong>".$refferalFName." ".$refferalLName;
                                    echo '<br/><strong>How did the customer hear about us?</strong><br/>'.$marketingSold; 
                                    echo '<br/><strong>Did we get this customer from marekting?</strong><br/>'.$referralType; 

                                        $dateCreated = date("m/j/Y",strtotime($dateCreated));
                                        if ($dateCreated == '12/31/1969') {$dateCreated = ''; }
                                   
?>
                                <p>
                            </div>

                            <div class="col-md-12">
                                <h4><span>Customer Notes:</span></h4>
                                <p><?php if (!empty($custNotes)) {echo $custNotes; } ?></p>
                                <p><small> <em>Date Created: <?php echo $dateCreated; ?></em></small></p>
                            </div>

<!-- 
                            <form role="form" method="post" action="/customers/form/mod.php">
                            	<input type="hidden" name="type" value="edit" />
								<?php //include $root.'/customers/form/fields.php'; ?>
                            </form> -->
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">


                            <a href="/customers/cust_edit.php?ID=<?php echo $custID; ?>"><button type="submit" name="submit" class="btn btn-primary btn-default" value="Save Changes" >Edit</button></a>

                        </div>
                        <!-- /.panel-footer -->