<?php 
switch ($ticketStatus) {
    case 'Rejected': $color = 'style="font-weight:600;background-color:#FF0000;color:#000"'; break;
    case 'Unscheduled': $color = 'style="font-weight:600;background-color:#FF9900;color:#000"'; break;
    case 'Need Estimate': $color = 'style="font-weight:600;background-color:#FF0000;color:#000"'; break;
    case 'Scheduled': $color = 'style="font-weight:600;background-color:#339900;color:#000"'; break;
    case 'Sold': $color = 'style="font-weight:600;background-color:#FFDD44;color:#000"'; break;
    case 'Needs Measured': $color = 'style="font-weight:600;background-color:#FF0000;color:#000"'; break;
    case 'Ordered': $color = 'style="font-weight:600;background-color:#FF9900;color:#000"'; break;
    case 'Received': $color = 'style="font-weight:600;background-color:#339900;color:#000"'; break;
    case 'Went To Columbus': $color = 'style="font-weight:600;background-color:#FF0000;color:#000"'; break;
    case 'Ready to Install': $color = 'style="font-weight:600;background-color:#001155;color:#fff"'; break;
    case 'Installed': $color = 'style="font-weight:600;background-color:#FF9900;color:#000"'; break;
    case 'Pending Wrap': $color = 'style="font-weight:600;background-color:#FF0000;color:#000"'; break;
    case 'Incomplete': $color = 'style="font-weight:600;background-color:#FF0000;color:#000"'; break;
    case 'Complete': $color = 'style="font-weight:600;background-color:#339900;color:#000"'; break;
    case 'Invoiced': $color = 'style="font-weight:600;background-color:#FF9900;color:#000"'; break;
    case 'Paid': $color = 'style="font-weight:600;background-color:#339900;color:#000"'; break;
    case 'Gift Sent': $color = 'style="font-weight:600;background-color:#339900;color:#000"'; break;
    //case 'Old': $color = 'style="font-weight:600;background-color:#FFA4FF;color:#000"'; break;
    //case 'Ready': $color = 'style="font-weight:600;background-color:#C9DECB;color:#000"'; break;
    default: $color = 'style="font-weight:600;background-color:#892EE4;color:#fff"'; break;
}
?>