$(document).ready(function () {
    $("#postForm").on("submit", function () {

        return false;
    });

    $("#createPostButton").on("click", function () {

        var fileData = new FormData();
        fileData.append('ajaxCall', "createPost");
        fileData.append('postContent', $('#postContent').val());
        fileData.append('file', $('#attachMediaPost')[0].files[0]);

        $.ajax({
            url: 'ajax/ajaxPost.php',
            type: 'POST',
            data: fileData,
            processData: false,  // tell jQuery not to process the data
            contentType: false,  // tell jQuery not to set contentType
            success: function (data) {
                location.reload();
            }
        });

        // $.post("ajax/ajaxPost.php", {ajaxCall: "createPost", postContent: $('#postContent').val(), file: fileData}, function(data, status){
        //     alert("Data: " + data + "\nStatus: " + status);
        //   });


    });

    $.post("ajax/ajaxPost.php",{ajaxCall: "getPost"},function(data,status){
        $('#anaId').text('');
        parseData=jQuery.parseJSON(data);

        for(let i = 0; i < parseData.length; i++){
            imgData = (parseData[i]['mediaid'] !== null)? '<img src="lib/serveImg.php?img='+ parseData[i]['mediaid'] +'">':'';

            var htmlContent =   '<div class="postContent mb-2">';

            htmlContent +=          '<label>' + parseData[i]['full_name'] + '</label><br>';
            htmlContent +=          '<label>' + parseData[i]['post_content'] + '</label><br>';
            htmlContent +=          imgData;
            htmlContent +=          '<br><button> Like </button>';
            htmlContent +=      '</div>';

            $('#anaId').append(htmlContent);
        }
        

    });

});