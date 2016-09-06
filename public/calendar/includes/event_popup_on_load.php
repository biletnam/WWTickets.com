<?
    // Configure site
    $root = $_SERVER['DOCUMENT_ROOT']; 
    $private = str_replace("public","private",$root);
    include_once("$private/config.php");

    // Verify login
    include_once("$root/lc.php");
    $custTicket = $_POST['custTicket'];
    $post_request = ("SELECT * FROM calendar WHERE id = '$custTicket'");
    $post_result = mysql_query ($post_request,$db) or die ("Query failed: $post_request");

    while ($post_row = mysql_fetch_array($post_result)) {
        extract($post_row);?>

        <script>

            function deleteItem() {
                if( confirm("Are you sure you want to delete this?")) return true;
                else return false;
            }

        </script>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel"><?php echo $title ;?></h4>
</div>
<div id="details-body-content" class="modal-body onload">
    <?php echo $description; ?>
</div>
<div class="modal-footer">
    <button type="button" style="float: left" id="mapit-event" onclick="mapIt('onload')" class="btn btn-success">Map It</button>
    <a style="float: left" href="/tickets/ticket_view.php?ticketID=<?php echo $calTicketID;?>&custID=<?php echo $calCustID;?>" class="btn btn-warning" id="view-ticket">View Ticket</a>
    <a href="/calendar/includes/remove_calendar_entry.php?id=<?php echo $id;?>" type="button" id="delete-event" class="btn btn-danger" onclick="return deleteItem();">Delete</a>
    <a href="edit_event.php?id=<?php echo $id;?>" class="btn btn-info" id="edit-event">Edit </a>

</div>

<? } ?>
