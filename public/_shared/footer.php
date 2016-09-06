    <!-- jQuery -->
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Datepicker -->
    <script src="/bower_components/datepicker/js/bootstrap-datepicker.js"></script>

    <?php $uri = $_SERVER['REQUEST_URI'];?>
    
    <script>

    <?php 
        switch ($uri) {
            case '/filters/': ?>
                    $(function(){$('.datepicker').datepicker({format: 'yyyy-mm-dd'}); }); 
                <? break;
            default: ?>
                $(function(){$('.datepicker').datepicker({format: 'mm/dd/yyyy'}); }); 
                <? break;
        }
     ?>

function deleteItem() {
    if( confirm("Are you sure you want to delete this?")) return true;
    else return false;
}



    </script>


<?php 
$URI = explode('/', $uri);
if ($URI[1] == 'customers') {?>
<script>    
$(document).ready(function(){

  //$('#refferal-container').hide();
  if ($('#isRefferal').val() == 'Yes') { $('#refferal-container').show();}
  else{$('#refferal-container').hide(); }

  $('#isRefferal').change(function () {
      if ($(this).val() == 'Yes') {
          $('#refferal-container').show();
          $("input[name='refFName']").prop('required',true);
          $("input[name='refLName']").prop('required',true);
    } else {
          $('#refferal-container').hide();
      }
  });


});
</script>                            

<? } ?>



<? if ($URI[1] == 'calendar') {?>

    <script>
        function doSomething() {
            document.getElementById("btn").disabled=true;
            setTimeout('document.getElementById("btn").disabled=false;',60000);
            document.getElementById("cal-edit-btn").hide();
            //$('#cal-edit-btn').hide();
            // do your heavy stuff here
        }
    </script>


    <? } ?>




    <!-- Custom Theme JavaScript -->
    <script src="/dist/js/sb-admin-2.js"></script>