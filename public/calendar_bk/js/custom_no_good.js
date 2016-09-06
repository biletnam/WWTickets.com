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
   $('div#all-color').parent('li').click();
});