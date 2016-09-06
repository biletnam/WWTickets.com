            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
<!--                         <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group 
                        </li> -->

                        <?php if (!isMobile()) { ?>                        
                            <?php if (pagePermission()) { ?>                        

                            <? } ?>
                        <? } ?>
                        <?php if (pagePermission()) { ?>
                            <li> <a href="/" id="home"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a> </li>
                            <li> <a href="/customers/"><i class="fa fa-group fa-fw"></i> Customers</a> </li>
                            <li> <a href="/tickets/"><i class="fa fa-file-text fa-fw"></i> Tickets</a> </lip0wp0w3rpgs>
                            <li> <a href="/calendar/"><i class="fa fa-calendar fa-fw"></i> Calendar</a> </li>
                            <li> <a href="/filters"><i class="fa fa-yen fa-fw"></i> Filters</a> </li>
                            <li> <a href="/reports/"><i class="fa fa-bar-chart-o fa-fw"></i> Monthly Reports</a> </li>
                            <li> <a href="/vendors/"><i class="fa fa-share-alt fa-fw"></i> Vendors</a> </li>
                            <li> <a href="/to-do-list/"><i class="fa fa-th-list fa-fw"></i> To-Do List</a> </li>
                            <li> <a href="/sin-bin/"><i class="fa fa-trash-o fa-fw"></i> Sin Bin List</a> </li>
                            <li> <a href="/city/"><i class="fa fa-align-justify fa-fw"></i> Cities</a> </li>
                        <? }else{ ?>
                            <li> <a href="/calendar/"><i class="fa fa-group fa-fw"></i> Calendar</a> </li>
                            <li> <a href="/" id="home"><i class="fa fa-dashboard fa-fw"></i> Tasks</a> </li>
                            <li> <a href="/to-do-list/"><i class="fa fa-th-list fa-fw"></i> To-Do List</a> </li>
                            <li> <a href="/tickets/"><i class="fa fa-file-text fa-fw"></i> Tickets</a> </li>
                            <li> <a href="/customers/"><i class="fa fa-group fa-fw"></i> Customers</a> </li>
                        <? } ?>







                        <?php if ($username == 'admin' || $firstName == 'Angi') { ?>
                        <li><a href="/users/"><i class="fa fa-user fa-fw"></i> Users</a></li>
                        <? } ?>
                        <li><a href="/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>


                    </ul>

<?php if ($URI['1'] == 'calendar') {
    if (pagePermission()) { ?>
        <div class="calendar-colors-wrapper">
                        <h4 style="margin-left:10px;">Calendar Colors</h4>
                        <ul id="calendar-colors">
                            <li><div id="angi-color">&nbsp;</div> Angi</li>
                            <li><div id="karla-color">&nbsp;</div> Karla</li>
                            <li><div id="brent-color">&nbsp;</div> Brent</li>
                            <li><div id="hailey-color">&nbsp;</div> Jolene</li>
                            <li><div id="jons-color">&nbsp;</div> Jons</li>
                            <li><div id="dwayne-color">&nbsp;</div> Dwayne</li>
                            <li><div id="mike-color">&nbsp;</div> Mike</li>
                            <li><div id="stephen-color">&nbsp;</div> Stephen</li>
                            <li><div id="tyler-color">&nbsp;</div> Tyler</li>
                            <li><div id="mark-color">&nbsp;</div> Mark</li>
                            <li><div id="jerry-color">&nbsp;</div> Jerry</li>
                            <li><div id="sue-color">&nbsp;</div> Sue</li>
                            <li><div id="scottsi-color">&nbsp;</div> Scott Simomsen</li>
                            <li><div id="scottst-color">&nbsp;</div> Scott Stenwall</li>
                            <li><div id="josh-color">&nbsp;</div> Josh</li>
                            <li><div id="jeff-color">&nbsp;</div> Jeff</li>
                            <li><div id="adam-color">&nbsp;</div> Adam</li>
                            <li class="displayAll"><div id="all-color">&nbsp;</div> All/General</li>
                        </ul> 
                    </div>

<?  }  } ?>




                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->