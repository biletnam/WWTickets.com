<?
	// Configure site
	$root = $_SERVER['DOCUMENT_ROOT']; 
	$private = str_replace("public","private",$root);
	include_once("$private/config.php");

// Verify login
include_once("$root/lc.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="<?php echo $siteAuthor; ?>">

    <title><?php echo $siteName; ?></title>

    <?php include $root.'/_shared/head.php'; ?>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

    <script type='text/javascript'>
        $(document).ready(function(){
            $("#search_results").slideUp();
            $("#button_find").click(function(event){
                event.preventDefault();
                search_ajax_way();
            });
            $("#search_query").keyup(function(event){
                event.preventDefault();
                search_ajax_way();
                });
        });

        function search_ajax_way(){
            $("#search_results").show();
            var search_this=$("#search_query").val();
            $.post("ticket-list.php", {searchit : search_this}, function(data){
                $(".heading").hide();
                $("#display_results").html(data);
            })
        }

    </script>    

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background-color:#004ca9;">
        
		<?php include $root.'/_shared/header-nav.php'; ?>

		<?php include $root.'/_shared/sidebar-nav.php'; ?>

        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Users</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="heading">
                        
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-group fa-fw"></i>Users
                                <a href="/users/user_new.php"><button class="btn btn-success pull-right" type="button" style="margin-top:-7px;">New User</button></a>
                            </div>
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            
                                        <tr>
                                            <th>Name</th>
                                            <th>Initials</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Location</th>
                                            <th>User Level</th>
                                        </tr>


                                        </thead>
                                        <tbody>

                                            <?php 

                                                $cust_request = ("SELECT * FROM cmsUsers ORDER BY lastName DESC");
                                                $cust_result = mysql_query ($cust_request,$db) or die ("Query failed: $cust_request");

                                                $ticketcount = 0;
                                                while ($cust_row = mysql_fetch_array($cust_result)) { 
                                                    $userID = $cust_row['ID'];
                                                    $viewusername = $cust_row['username'];
                                                    $viewpassword = $cust_row['password'];
                                                    $viewfirstName = $cust_row['firstName'];
                                                    $viewlastName = $cust_row['lastName'];
                                                    $viewinitials = $cust_row['initials'];
                                                    $viewLocation = $cust_row['userLocation'];
                                                    $viewLevel = $cust_row['userLevel'];

                                                    if ($viewusername == 'admin') {
                                                        
                                                    }
                                                    else{

                                                        $ticketcount = ($ticketcount == '0') ? 'odd' : 'even'; ?>

                                                        <tr class="<?php echo $ticketcount; ?>">
                                                            <td><a href="/users/user_edit.php?userID=<?php echo $userID; ?>"><?php echo $viewfirstName ?> <?php echo $viewlastName ?></a></td>
                                                            <td><?php echo $viewinitials ?></td>
                                                            <td><?php echo $viewusername ?></td>
                                                            <td><?php echo $viewpassword ?></td>
                                                            <td><?php echo $viewLocation ?></td>
                                                            <td><?php echo $viewLevel ?></td>
                                                        </tr>

                                                        <?php $ticketcount = ($ticketcount == '1') ? '0' : '1'; 
                                                    }

                                                //    include $root.'/tickets/_shared/table_index_loop.php'; 

                                             } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>

                </div>

                <div id="display_results"></div>

                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include $root.'/_shared/footer.php'; ?>

</body>

</html>