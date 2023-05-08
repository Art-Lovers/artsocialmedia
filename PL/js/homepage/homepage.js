$(document).ready(function () {
    $("#postForm").on("submit", function () {

        return false;
    });

    $("#createPostButton").on("click", function () {

        invalidInput = false;
        if ($('#postContent').val() == '') {
            $('#postErr').text("Please fill the field");
            invalidInput = true;
        }
        else {
            $('#postErr').text("");
        }

        if (!invalidInput) {
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
        }

    });

    loadPosts();

    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
            $(window).unbind('scroll');
            loadPosts();
        }
    });

    $(".editPost").on("click", function () {

    });

    /*    //DELETE DUHET TE FUNKSIONOJE SI KJOOO
         var s='<button class="a"> a </button';
          $('#anaId').append(s);
         $(".a").on ("click", function () {
           alert("The button was clicked.");
           $(".a").remove();
          });
    
     function fshi() {
        alert("The button was clicked.");
        $(".a").remove();
    }
     */




    $(".deletePost").on("click", function () {
        alert("are you sure you want to delete?");
        $(this.id).remove();
    });



    //likecount
    $("#anaId").on("click", ".likeButton", function () {

        var fileData = new FormData();
        fileData.append('ajaxCall', "countLike");
        fileData.append('postid', $(this).parent().attr('id'));

        thisButton = $(this);

        $.ajax({
            url: 'ajax/ajaxPost.php',
            type: 'POST',
            data: fileData,
            processData: false,  // tell jQuery not to process the data
            contentType: false,  // tell jQuery not to set contentType
            success: function (data) {
                thisButton.html('Like (' + data + ')');
            }
        });

    });
});

function loadPosts() {
    var postData = new FormData();
    postData.append('ajaxCall', "getPost");
    postData.append('postcnt', $('.postContent').length);

    $.ajax({
        url: 'ajax/ajaxPost.php',
        type: 'POST',
        data: postData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        success: function (data) {
            parseData = jQuery.parseJSON(data);
            for (let i = 0; i <= parseData.length; i++) {
                let el = $(parseData[i]);
                el.hide().appendTo('#anaId').fadeIn();
            }
            if ($('#endPost').isInViewport()) {
                loadPosts();
            }
        }
    });
}

$.fn.isInViewport = function () {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();

    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
};