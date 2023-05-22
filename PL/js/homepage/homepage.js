$(document).ready(function () {
    $("#postForm").on("submit", function () {

        return false;
    });

    $("#anaId").on("click", '.deletepostbtn', function () {
        Swal.fire({
            title: 'Are you sure you want to delete this post?',
            icon: 'info',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText:
                'Yes, I am!',
            confirmButtonAriaLabel: 'Yes, I am!',
            cancelButtonText:
                'No! Take me back!',
            cancelButtonAriaLabel: 'No! Take me back!',
            preConfirm: () => {
                var formData = new FormData();
                formData.append('ajaxCall', "deletePost");
                formData.append('postid', $(this).data('postid'));

                $.ajax({
                    url: 'ajax/ajaxPost.php',
                    type: 'POST',
                    data: formData,
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,  // tell jQuery not to set contentType
                    success: function (data) {
                        if (data != 'You can not do this!') {
                            location.reload();
                        }
                    }
                });
            }
        });
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
                });
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



    //likecount
    $("#anaId").on("click", ".likeButton", function () {

        var fileData = new FormData();
        fileData.append('ajaxCall', "countLike");
        fileData.append('postid', $(this).parent().parent().attr('id'));

        thisButton = $(this);

        $.ajax({
            url: 'ajax/ajaxPost.php',
            type: 'POST',
            data: fileData,
            processData: false,  // tell jQuery not to process the data
            contentType: false,  // tell jQuery not to set contentType
            success: function (data) {
                thisButton.html(data);
            }
        });
    });

    $("input[type=file]").on('change', function () {
        $img = '<div id="carouselPostcarouselPostCreatinguno" class="carousel slide" data-ride="carousel">';
        $img += '<ol class="carousel-indicators">';
        $.each(this.files, function (i, file) {
            $active = (i == 0) ? 'class="active"' : '';
            $img += '<li data-target="#carouselPostcarouselPostCreatinguno" data-slide-to="' + i + '" ' + $active + '></li>';
        });
        $img += '</ol>';
        $img += '<div class="carousel-inner">';
        $.each(this.files, function (i, file) {
            $active = (i == 0) ? 'active' : '';
            $img += '<div class="carousel-item ' + $active + '">';
            $img += '<div class="feed-image p-2 px-3">';
            reader.readAsDataURL(file);
            $img += '<img src="' + URL.createObjectURL(file) + '">';
            $img += '</div></div>';
        });
        $img += '</div>';
        $img += '<a class="carousel-control-prev" href="#carouselPostcarouselPostCreatinguno" role="button" data-slide="prev">';
        $img += '<span class="carousel-control-prev-icon"></span>';
        $img += '<span class="sr-only">Previous</span>';
        $img += '</a>';
        $img += '<a class="carousel-control-next" href="#carouselPostcarouselPostCreatinguno" role="button" data-slide="next">';
        $img += '<span class="carousel-control-next-icon"></span>';
        $img += '<span class="sr-only">Next</span>';
        $img += '</a>';
        $img += '</div>';

        $(".showImagePreviewHere").html($img);
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
            scrollWin();
            if ($('#endPost').isInViewport()) {
            }
        }
    });
}

function scrollWin() {
    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
            $(window).unbind('scroll');
            loadPosts();
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