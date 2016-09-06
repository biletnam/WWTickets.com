/************************
    Pickers
*************************/
$("#startDate, #startDate_edit").datepicker({dateFormat: "yy-mm-dd"});
$("#endDate, #endDate_edit").datepicker({dateFormat: "yy-mm-dd"});

$("#colorp, #edit_color").spectrum({
	preferredFormat: "hex",
    showPaletteOnly: true,
    togglePaletteOnly: true,
    togglePaletteMoreText: 'more',
    togglePaletteLessText: 'less',
    color: '#587ca3',
    palette: [
        ["#000","#444","#666","#999","#ccc","#eee","#f3f3f3","#fff"],
        ["#f00","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f"],
        ["#f4cccc","#fce5cd","#fff2cc","#d9ead3","#d0e0e3","#cfe2f3","#d9d2e9","#ead1dc"],
        ["#ea9999","#f9cb9c","#ffe599","#b6d7a8","#a2c4c9","#9fc5e8","#b4a7d6","#d5a6bd"],
        ["#e06666","#f6b26b","#ffd966","#93c47d","#76a5af","#6fa8dc","#8e7cc3","#c27ba0"],
        ["#c00","#e69138","#f1c232","#6aa84f","#45818e","#3d85c6","#674ea7","#a64d79"],
        ["#900","#b45f06","#bf9000","#38761d","#134f5c","#0b5394","#351c75","#741b47"],
        ["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130"]
    ]
});

$('#startTime, #endTime, #startTime_edit, #endTime_edit').timepicker({  
    timeFormat: 'hh:mm TT',controlType: 'select',
    oneLine: true,
    stepHour: 1,
    stepMinute: 10,
    hourMin: 7,
    hourMax: 18,
    timezoneList: [ 
            { value: -360, label: 'Central' }
        ]
    });

$('#endTime,#startTime').text(
    $.datepicker.formatTime('h:mm',{})
);

$('#calendar-colors li').on('click',function(e){
   filterEvents($(this));
});
$('#search-button').on('click',function(e){
    filterEvents($(this));
});

$('#mapit-event').on('click',function() {
   var url = 'http://google.com/maps?saddr&daddr=';
    var myString = $('#details-body-content').text();
    var myRegexp = /.+Where:\s?(.+)Assigned:.+/;
    var match = myRegexp.exec(myString);
    match[1] = replaceAll(match[1],' ','+');
    url += match[1];
    window.open(url,'_blank');
});

function replaceAll(str, find, replace) {
    return str.replace(new RegExp(escapeRegExp(find), 'g'), replace);
}
function escapeRegExp(str) {
    return str.replace(/([.*+?^=!:${}()|\[\]\/\\])/g, "\\$1");
}

function filterEvents(el){
    if(username != 'jerry'){
        construct = [];
        if(el.is('li')) {
            if(el.hasClass('displayAll')){
                $('#calendar-colors li').each(function () {
                 $(this).removeClass('active');
                });
            } else{
                if($('.displayAll').hasClass('active')){
                    $('.displayAll').removeClass('active');
                }
            }
            el.toggleClass('active');
        }

        //if($('#calendar-colors li').hasClass('active')) {
            $('#calendar-colors li').each(function () {
                if ($(this).hasClass('active')) {
                    construct.push($(this).text().trim());
                }
            });
            construct = 'user_filter=' + construct;
        //}
        if(el.is('li')){
    if($('#search-input').val().length != 0){
        construct += '&search='+ $('#search-input').val();
    }
} else{
    // if($('#search-input').val().length == 0){
    //     alert('Input must be value');
    // } else{

        construct += '&search='+ $('#search-input').val();
    // }
}
        $.post('includes/loader.php', construct, function(response)
    {
        $('#calendar').fullCalendar('refetchEvents');
    });
    }
}
$(document).ready(function () {
    var isMobile = false; //initiate as false
// device detection
    if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
        || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;
    if(isMobile){
        $("div#" + username + "-color").parent('li').click();
        $(".fc-button-group button.fc-agendaDay-button").click();
        $('.calendar-colors-wrapper').insertAfter('#page-wrapper');

    } else{
        $('div#all-color').parent('li').click();
    }
});