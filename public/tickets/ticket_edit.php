<?
	// Configure site
	$root = $_SERVER['DOCUMENT_ROOT']; 
	$private = str_replace("public","private",$root);
	include_once("$private/config.php");

// Verify login
include_once("$root/lc.php");

	
        $ticket_request = ("SELECT * FROM customerTickets WHERE ticketCustID= '".$_GET['custID']."' AND ticketID = '".$_GET['ticketID']."'");
        $ticket_result = mysql_query ($ticket_request,$db) or die ("Query failed: $ticket_request");
        $ticket_total = mysql_num_rows($ticket_result);
        if($ticket_total == 0) echo "<p>That ticket doesn't exist.</p>\n";
        
        while ($ticket_row = mysql_fetch_array($ticket_result)) { 
            extract($ticket_row);  
        }

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
                    <h1 class="page-header">Edit Ticket</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color:red!important;">
                            <h4><span>Ticket Details</span></h4>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="/tickets/form/detail-mod.php">
                            	<input type="hidden" name="type" value="edit" />
								<?php include $root.'/tickets/form/detail-fields.php'; ?>
                            </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include $root.'/_shared/footer.php'; ?>

    <script>    

    $(document).ready(function () {


        $('#wrapColor select[name="wrapColor"]').change(function () {
            if ($('#wrapColor select[name="wrapColor"]').val() == 'Other') {
                $('#secret-color').show();
            } else  {
                $('#secret-color').hide();

            }
        });



            if ($('#wrapColor select[name="wrapColor"]').val() == 'Other') {
                $('#secret-color').show();
            } else {
                $('#secret-color').hide();
            }




        $('#propertyTypediv select[name="propertyType"]').change(function () {
            if ($('#propertyTypediv select[name="propertyType"]').val() == 'Multiple Property') {
                $('#multi').show();
            } else  {
                $('#multi').hide();

            }
        });



            if ($('#propertyTypediv select[name="propertyType"]').val() == 'Multiple Property') {
                $('#multi').show();
            } else {
                $('#multi').hide();
            }



        $('#propertyTypediv select[name="propertyType"]').change(function () {
            if ($('#propertyTypediv select[name="propertyType"]').val() == 'DIY') {
                $('#diy-main').show();
            } else {
                $('#diy-main').hide();

            }
        });

        if ($('#propertyTypediv select[name="propertyType"]').val() == 'DIY') {
            $('#diy-main').show();
        } else {
            $('#diy-main').hide();
        }







        $('#selectProduct select[name="jobProduct"]').change(function () {
            if ($('#selectProduct select[name="jobProduct"]').val() == 'Windows') {
                $('#job-windows').show();
            } else {
                $('#job-windows').hide();

            }
        });

        $('#selectProduct select[name="jobProduct"]').change(function () {
            if ($('#selectProduct select[name="jobProduct"]').val() == 'Doors') {
                $('#job-doors').show();
            } else {
                $('#job-doors').hide();

            }
        });


        $('#selectProduct select[name="jobProduct"]').change(function () {
            if ($('#selectProduct select[name="jobProduct"]').val() == 'Siding') {
                $('#job-siding').show();
            } else {
                $('#job-siding').hide();

            }
        });

        $('#selectProduct select[name="jobProduct"]').change(function () {
            if ($('#selectProduct select[name="jobProduct"]').val() == 'Window Repair') {
                $('#job-window-repair').show();
            } else {
                $('#job-window-repair').hide();

            }
        });

        $('#selectProduct select[name="jobProduct"]').change(function () {
            if ($('#selectProduct select[name="jobProduct"]').val() == 'Door Repair') {
                $('#job-door-repair').show();
            } else {
                $('#job-door-repair').hide();

            }
        });                        



        if ($('#selectProduct select[name="jobProduct"]').val() == 'Windows') {
            $('#job-windows').show();
            $('#job-doors').hide();
            $('#job-siding').hide();
            $('#job-window-repair').hide();
            $('#job-door-repair').hide();
            
        } 

        else if ($('#selectProduct select[name="jobProduct"]').val() == 'Doors') {
            $('#job-windows').hide();
            $('#job-doors').show();
            $('#job-siding').hide();
            $('#job-window-repair').hide();
            $('#job-door-repair').hide();
            
        } 

        else if ($('#selectProduct select[name="jobProduct"]').val() == 'Siding') {
            $('#job-windows').hide();
            $('#job-doors').hide();
            $('#job-siding').show();
            $('#job-window-repair').hide();
            $('#job-door-repair').hide();
            
        } 

        else if ($('#selectProduct select[name="jobProduct"]').val() == 'Window Repair') {
            $('#job-windows').hide();
            $('#job-doors').hide();
            $('#job-siding').hide();
            $('#job-window-repair').show();
            $('#job-door-repair').hide();
            
        } 

        else if ($('#selectProduct select[name="jobProduct"]').val() == 'Door Repair') {
            $('#job-windows').hide();
            $('#job-doors').hide();
            $('#job-siding').hide();
            $('#job-window-repair').hide();
            $('#job-door-repair').show();
            
        } 

        else {
            $('#job-windows').hide();
            $('#job-doors').hide();
            $('#job-siding').hide();
            $('#job-window-repair').hide();
            $('#job-door-repair').hide();
        }



        $("#homeNum").change(function(){
             if(parseFloat(this.value) < 1978){
                $('#wrap-div').show();
                /*if it is*/
             } 
             else{
                $('#wrap-div').hide();

             }
        })

        if(parseFloat($("#homeNum").val()) < 1978) {
            $('#wrap-div').show();
        }
        else{
            $('#wrap-div').hide();
        }


    });
;
</script>


</body>

</html>
