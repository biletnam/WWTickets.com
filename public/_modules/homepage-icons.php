               

                <!-- Customers -->
                <div class="col-lg-2 col-md-6 col-sm-4">
                    <a href="/customers/">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="padding-top:10px;">
                            <div class="row center-text">
                                <div class="col-s-12 text-center"><i class="fa fa-group fa-5x"></i><br/>
                                    <span class="center-text">Customers</span>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left">View Customers</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                    </a>
                </div>

            
                <!-- Tickets -->
                <div class="col-lg-2 col-md-6 col-sm-4">
                    <a href="/tickets/">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="padding-top:10px;">
                            <div class="row center-text">
                                <div class="col-s-12 text-center">
                                    <i class="fa fa-file-text fa-5x"></i><br/>
                                    <span class="center-text">Tickets</span>
                                </div>
                            </div>
                        </div>

                            <div class="panel-footer">
                                <span class="pull-left">View Tickets</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                    </a>
                </div>

                <!-- Calendar -->
                <div class="col-lg-2 col-md-6 col-sm-4">
                    <a href="/calendar/">                    
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="padding-top:10px;">
                            <div class="row center-text">
                                <div class="col-s-12 text-center">
                                    <i class="fa fa-calendar fa-5x"></i><br/>
                                    <span class="center-text">Calendar</span>
                                </div>
                            </div>
                        </div>

                            <div class="panel-footer">
                                <span class="pull-left">View Calendar</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                    </a>
                </div>

            <?php if (pagePermission()) { ?>

                <!-- Filters -->
                <div class="col-lg-2 col-md-6 col-sm-4">
                    <a href="/filters/">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="padding-top:10px;">
                            <div class="row center-text">
                                <div class="col-s-12 text-center">
                                    <i class="fa fa-yen fa-5x"></i><br/>
                                    <span class="center-text">Filters</span>
                                </div>
                            </div>
                        </div>

                            <div class="panel-footer">
                                <span class="pull-left">View Filters</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>

                    </div>
                    </a>
                </div>


            	<!-- Monthly Reports -->
                <div class="col-lg-2 col-md-6 col-sm-4">
                    <a href="/reports/">                    
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="padding-top:10px;">
                            <div class="row center-text">
                                <div class="col-s-12 text-center">
                                    <i class="fa fa-bar-chart-o fa-5x"></i><br/>
                                    <span class="center-text">Monthly Reports</span>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left">View Reports</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                    </a>
                </div>

            	<!-- Vendors -->
                <div class="col-lg-2 col-md-6 col-sm-4">
                    <a href="/vendors/">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="padding-top:10px;">
                            <div class="row center-text">
                                <div class="col-s-12 text-center">
                                    <i class="fa fa-share-alt fa-5x"></i><br/>
                                    <span class="center-text">Vendors</span>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left">View Vendors</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                    </a>
                </div>
            <? } ?>