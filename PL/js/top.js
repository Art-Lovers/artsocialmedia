$(document).ready(function () {
    var rightNow = new Date();
    var temp = rightNow.toGMTString();
    var rightNowGMT = new Date(temp.substring(0, temp.lastIndexOf(" ") - 1));
    var time_offset = (rightNow - rightNowGMT) / (1000 * 60 * 60);

    var ajaxData = new FormData();
    ajaxData.append('ajaxCall', "registerUserOffset");
    ajaxData.append('offset', parseInt(time_offset));

    $.ajax({
        url: 'ajax/ajaxHeader.php',
        type: 'POST',
        data: ajaxData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        success: function (data) {
        }
    });
});