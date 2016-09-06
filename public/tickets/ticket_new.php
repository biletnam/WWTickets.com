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


    <link href="/calendar/css/smoothness/jquery-ui.css" rel="stylesheet">
    <link href="/calendar/css/fullcalendar.print.css" media="print" rel="stylesheet">
    <link href="/calendar/css/fullcalendar.css" rel="stylesheet">
    <link href="/calendar/lib/spectrum/spectrum.css" rel="stylesheet">    
    <link href="/calendar/lib/timepicker/jquery-ui-timepicker-addon.css" rel="stylesheet">
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
                    <h1 class="page-header">Create Ticket</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><span>Ticket Details</span></h4>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="/tickets/form/detail-mod.php">
                            	<input type="hidden" name="type" value="new" />
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

   
    <script src="/calendar/lib/moment.js"></script>
    <script src="/calendar/lib/jquery.js"></script>
    <script src="/calendar/lib/jquery-ui.js"></script>
    <script src="/calendar/js/bootstrap.js"></script>
    <script src="/calendar/js/fullcalendar.js"></script>
    <script src="/calendar/js/lang-all.js"></script>
    <script src="/calendar/js/jquery.calendar.js"></script>
    <script src="/calendar/lib/spectrum/spectrum.js"></script>
    
    <script src="/calendar/lib/timepicker/jquery-ui-sliderAccess.js"></script>
    <script src="/calendar/lib/timepicker/jquery-ui-timepicker-addon.min.js"></script>
    
    <script src="/calendar/js/g.map.js"></script>
    <script src="/calendar/http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    
    <script src="/calendar/js/custom.js"></script>

<script>    

    $(document).ready(function () {

        $('#wrap-needed select[name="wrap"]').change(function () {
            if ($('#wrap-needed select[name="wrap"]').val() == 'Yes') {
                $('#installation-blind').show();
            } else  {
                $('#installation-blind').hide();
            }
        });



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
