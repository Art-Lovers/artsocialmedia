$(document).ready(function () {
    var postData = new FormData();
    postData.append('ajaxCall', "getPost");


    $.ajax({
        url: 'ajax/ajaxPost.php',
        type: 'POST',
        data: postData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        success: function (data) {
            $("anaId").text(String(data));
        }
    });







    $("#postForm").on("submit", function () {

        return false;
    });

    $("#createPostButton").on("click", function () {

        var fileData = new FormData();
        fileData.append('ajaxCall', "createPost");
        fileData.append('postContent', $('#postContent').val());

        $.each($("input[type=file]"), function (i, obj) {
            $.each(obj.files, function (i, file) {
                fileData.append('file[' + i + ']', file);
            })
        });

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

    $.post("ajax/ajaxPost.php", { ajaxCall: "getPost" }, function (data, status) {
        $('#anaId').text('');
        parseData = jQuery.parseJSON(data);

        for (let i = 0; i < parseData.length; i++) {
            imgData = (parseData[i]['mediaid'] !== null) ? '<img src="lib/serveImg.php?img=' + parseData[i]['mediaid'] + '">' : '';

            for (let i = 0; i <= parseData.length; i++) {
                var htmlContent = '<div class="postContent mb-2">';

                htmlContent += '<label>' + parseData[i]['full_name'] + '</label><br>';
                htmlContent += '<label>' + parseData[i]['post_content'] + '</label><br>';
                htmlContent += imgData;
                htmlContent += '<br><button id="likeButton"> Like </button>';
                htmlContent += '<button> Comment </button>';
                htmlContent += '<br>'
                htmlContent += '</div>';


                $('#anaId').append(htmlContent);

            }

        });


    $(".editPost").on("click", function (id) {
        var txt = document.getElementById("content" + id).textContent;
        var editContent = '<textarea id="txtArea">' + txt + '</textarea><br><button class="saveChanges">Ruaj</button><button>Anullo</button>';
        $('"#"+id').append(editContent);

        $(".saveChanges").on("click", function () {
            document.getElementById("content" + id).textContent = document.getElementsById("txtArea").value;
        });


    });

    function deletePosts(id) {
        alert("are you sure you want to delete?");
        $('"#"+id').remove();
    }




    /*    //DELETE DUHET TE FUNKSIONOJE SI KJOOO
         var s='<button class="a"> a </button';
          $('#anaId').append(s);
         $(".a").on ("click", function () {
           alert("The button was clicked.");
           $(".a").remove();
          });
    
    
     */




    $(".deletePost").on("click", function () {
        alert("are you sure you want to delete?");
        $(this.id).remove();
    });

    function fshi() {
        alert("The button was clicked.");
        $(".a").remove();
    }



});

//likecount
$("#likebutton").on("click", function () {

    var fileData = new FormData();
    fileData.append('ajaxCall', "countLike");

    $.ajax({
        url: 'ajax/ajaxPost.php',
        type: 'POST',
        data: fileData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        success: function (data) {
            //location.reload();    
        }
    });

});
//});