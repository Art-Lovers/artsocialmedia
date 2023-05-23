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

    $("#anaId").on("click", '.editpostbtn', function () {
        postId = $(this).data('postid');

        var ajaxData = new FormData();
        ajaxData.append('ajaxCall', "getEditData");
        ajaxData.append('postid', $(this).data('postid'));

        $.ajax({
            url: 'ajax/ajaxPost.php',
            type: 'POST',
            data: ajaxData,
            processData: false,  // tell jQuery not to process the data
            contentType: false,  // tell jQuery not to set contentType
            success: function (data) {
                if (data != 'You can not do this!') {
                    parseData = jQuery.parseJSON(data)[0];
                    html = '<div class="modal fade" id="editpost' + $(this).data('postid') + '" tabindex="-1" role="dialog"'
                        + 'aria-labelledby="exampleModalCenterTitle" aria-hidden="true">'
                        + '<div class="modal-dialog modal-dialog-centered" role="document">'
                        + '<div class="modal-content">'
                        + '<div class="modal-header">'
                        + '<h5 class="modal-title">Edit</h5>'
                        + '</div>'
                        + '<div class="modal-body">'
                        + '<div class="p-2 px-3">'
                        + '<textarea id="postContent' + $(this).data('postid') + '" class="form-control" maxlength="1000">' + parseData.post_content + '</textarea>'
                        + '<label id="postErr' + $(this).data('postid') + '"></label>'
                        + '<div class="showImagePreviewHere' + $(this).data('postid') + '"></div>'
                        + '</div>'
                        + '<div class="d-flex justify-content-end socials p-2 py-3">'
                        + '<label class="btn btn-success"><input type="file" class="Document" id="attachMediaPostID' + $(this).data('postid') + '" name="fileToUpload" accept="image/*" multiple /><i class="bi bi-images" aria-hidden="true"></i>AddImages</label>'
                        + '<button class="btn btn-success" id="editPostButton' + $(this).data('postid') + '">Edit Post</button>'
                        + '</div>'
                        + '</div>'
                        + '<div class="modal-footer">'
                        + '</div>'
                        + '</div>'
                        + '</div>'
                        + '</div>'
                    $("#endPost").html(html);
                    $('#editpost' + $(this).data('postid')).modal('show');
                    $("#attachMediaPostID" + $(this).data('postid')).on('change', function () {
                        $img = '<div id="carouselPostcarouselPostCreating' + postId + '" class="carousel slide" data-ride="carousel">';
                        $img += '<ol class="carousel-indicators">';
                        $.each(this.files, function (i, file) {
                            $active = (i == 0) ? 'class="active"' : '';
                            $img += '<li data-target="#carouselPostcarouselPostCreating' + postId + '" data-slide-to="' + i + '" ' + $active + '></li>';
                        });
                        $img += '</ol>';
                        $img += '<div class="carousel-inner">';
                        $.each(this.files, function (i, file) {
                            $active = (i == 0) ? 'active' : '';
                            $img += '<div class="carousel-item ' + $active + '">';
                            $img += '<div class="feed-image p-2 px-3">';
                            $img += '<img src="' + URL.createObjectURL(file) + '">';
                            $img += '</div></div>';
                        });
                        $img += '</div>';
                        $img += '<a class="carousel-control-prev" href="#carouselPostcarouselPostCreating' + postId + '" role="button" data-slide="prev">';
                        $img += '<span class="carousel-control-prev-icon"></span>';
                        $img += '<span class="sr-only">Previous</span>';
                        $img += '</a>';
                        $img += '<a class="carousel-control-next" href="#carouselPostcarouselPostCreating' + postId + '" role="button" data-slide="next">';
                        $img += '<span class="carousel-control-next-icon"></span>';
                        $img += '<span class="sr-only">Next</span>';
                        $img += '</a>';
                        $img += '</div>';

                        $(".showImagePreviewHere").html($img);
                    });
                    $('#editPostButton' + $(this).data('postid')).on('click', function () {
                        invalidInput = false;
                        if ($('#postContent' + postId).val() == '') {
                            $('#postErr' + postId).text("Please fill the field");
                            invalidInput = true;
                        }
                        else {
                            $('#postErr' + postId).text("");
                        }

                        if (!invalidInput) {
                            var fileData = new FormData();
                            fileData.append('ajaxCall', "editPost");
                            fileData.append('postid', postId);
                            fileData.append('postContent', $('#postContent' + $(this).data('postid')).val());

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
                }
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
    loadEngine();
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
        }
    });
}

function loadEngine() {
    if ($('#endPost').isInViewport()) {
        loadPosts();
    }
    setTimeout(loadEngine, 1000);
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

    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + screen.height + 200;

    return elementTop < viewportBottom;
};