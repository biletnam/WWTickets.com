 <?php 
####################################
# Special Variable Characters
#
####################################

        $ticketDate = date("m/j/Y",strtotime($ticketDate)); if ($ticketDate == '12/31/1969') {$ticketDate = ''; }
        $ticketOrdDate = date("m/j/Y",strtotime($ticketOrdDate)); if ($ticketOrdDate == '12/31/1969') {$ticketOrdDate = ''; }
        $ticketDateM = date("m/j/Y",strtotime($ticketDateM)); if ($ticketDateM == '12/31/1969') {$ticketDateM = ''; }
        $ticketColum = date("m/j/Y",strtotime($ticketColum)); if ($ticketColum == '12/31/1969') {$ticketColum = ''; }
        $ticketInstall = date("m/j/Y",strtotime($ticketInstall)); if ($ticketInstall == '12/31/1969') {$ticketInstall = ''; }
        $leadTestEmpDate = date("m/j/Y",strtotime($leadTestEmpDate)); if ($leadTestEmpDate == '12/31/1969') {$leadTestEmpDate = ''; }
        $pamDate = date("m/j/Y",strtotime($pamDate)); if ($pamDate == '12/31/1969') {$pamDate = ''; }
        $renoDate = date("m/j/Y",strtotime($renoDate)); if ($renoDate == '12/31/1969') {$renoDate = ''; }
        $paidDate = date("m/j/Y",strtotime($paidDate)); if ($paidDate == '12/31/1969') {$paidDate = ''; }

####################################

  ?>

    <input type="hidden" name="attachID" value="<? echo $attachID; ?>"  />
    <input type="hidden" name="custID" value="<? echo $custID; ?>"  />
    <input type="hidden" name="ticketID" value="<? echo $ticketID; ?>"  />


                                

                                           


                            <div class="row">
                                <div class="col-lg-12">




                                    <div class="dataTable_wrapper">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>                                        <tr>
                                                            <th>Type</th>
                                                            <th>PDF</th>
                                                            <th>Upload</th>
                                                            <th>Date</th>
                                                        </tr></thead>
                                                        <?php

                                                                $attachment_request = ("SELECT * FROM ticketAttachments WHERE ticketID = '".$_GET['ticketID']."'");
                                                                $attachment_result = mysql_query ($attachment_request,$db) or die ("Query failed: $attachment_request");
                                                                $attachment_total = mysql_num_rows($attachment_result);
                                                                if($attachment_total == 0) echo "<p>That ticket doesn't exist.</p>\n";

                                                                while ($attachment_row = mysql_fetch_array($attachment_result)) {
                                                                    extract($attachment_row);
                                                                }


                                                        ####################################
                                                        # Special Variable Characters
                                                        #
                                                        ####################################

                                                                $leadDate = date("m/j/Y",strtotime($leadDate)); if ($leadDate == '12/31/1969') {$leadDate = ''; }
                                                                $testDate = date("m/j/Y",strtotime($testDate)); if ($testDate == '12/31/1969') {$testDate = ''; }
                                                                $renoTestDate = date("m/j/Y",strtotime($renoTestDate)); if ($renoTestDate == '12/31/1969') {$renoTestDate = ''; }
                                                                $measDate = date("m/j/Y",strtotime($measDate)); if ($measDate == '12/31/1969') {$measDate = ''; }
                                                                $invoicDate = date("m/j/Y",strtotime($invoicDate)); if ($invoicDate == '12/31/1969') {$invoicDate = ''; }

                                                        ####################################

                                                         ?>
                                                    <tbody>
                                                        <tr class="odd">
                                                            <td>Lead Test</td>
                                                            <td>
                                                                <?php if (!empty($leadTestPDF)) {?><a href="/_storage/lead/<?php echo $leadTestPDF; ?>" target="_blank"><?php echo $leadTestPDF; ?></a><? } ?>
                                                                <input type="hidden" name="origLead" value="<?php echo $leadTestPDF?>">
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label>File inputs</label>
                                                                    <input type="file" name="leadPDF">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <input class="form-control datepicker" name="leadDate" value="<?php echo $leadDate ?>">
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr class="even">
                                                            <td>Test Kit Form</td>
                                                            <td>
                                                                <?php if (!empty($testKitPDF)) {?><a href="/_storage/test-kit/<?php echo $testKitPDF; ?>" target="_blank"><?php echo $testKitPDF; ?></a><? } ?>
                                                                <input type="hidden" name="origTest" value="<?php echo $testKitPDF?>">
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label>File input</label>
                                                                    <input type="file" name="testkitPDF">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <input class="form-control datepicker" name="testDate" value="<?php echo $testDate ?>">
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr class="odd">
                                                            <td>Renovation Record Keeping</td>
                                                            <td>
                                                                <?php if (!empty($renoRecPDF)) {?><a href="/_storage/renovation/<?php echo $renoRecPDF ?>" target="_blank"><?php echo $renoRecPDF ?></a><? } ?>
                                                                <input type="hidden" name="origReno" value="<?php echo $renoRecPDF?>">
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label>File input</label>
                                                                    <input type="file" name="renoPDF">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <input class="form-control datepicker" name="renoTestDate" value="<?php echo $renoTestDate ?>">
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr class="even">
                                                            <td>Measure Sheet</td>
                                                            <td>
                                                                <?php if (!empty($measSheetPDF)) {?><a href="/_storage/measure/<?php echo $measSheetPDF; ?>" target="_blank"><?php echo $measSheetPDF; ?></a><? } ?>
                                                                <input type="hidden" name="origMeas" value="<?php echo $origMeas?>">
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label>File input</label>
                                                                    <input type="file" name="measPDF">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <input class="form-control datepicker" name="measDate" value="<?php echo $measDate ?>">
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr class="odd">
                                                            <td>Invoice</td>
                                                            <td>
                                                                <?php if (!empty($invoiceSheetPDF)) {?><a href="/_storage/invoice/<?php echo $invoiceSheetPDF; ?>" target="_blank"><?php echo $invoiceSheetPDF; ?></a><? } ?>
                                                                <input type="hidden" name="origInv" value="<?php echo $invoiceSheetPDF?>">
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label>File input</label>
                                                                    <input type="file" name="invoiPDF">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <input class="form-control datepicker" name="invoicDate" value="<?php echo $invoicDate ?>">
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->

        

                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->

                        <div class="panel-footer">
                                        <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save Changes" >Save</button>
                                        <button type="submit" name="submit" class="btn btn-primary btn-default" value="Save and Continue Editing">Save and Continue Editing</button>
                        </div>


                            <!-- /.row (nested) -->
