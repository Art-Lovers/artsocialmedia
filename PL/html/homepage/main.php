<html>

<head>
    <link rel="stylesheet" type="text/css"
        href="PL/css/homepage/homepageStyle.css?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <button id="logout">Log Out</button>

    <div class="container">
        <div class="row">
            <div class="col-2">

            </div>
            <div class="col ml-3">
                <div class="postclass">
                    <form id="postForm" enctype="multipart/form-data">
                        <br>

                        <textarea id="postContent"></textarea><br>
                        <input type="file" name="fileToUpload" id="attachMediaPost" multiple>
                        <!-- <button id="">Add photo/video</button><br> -->
                        <button id="createPostButton">Create post</button>
                    </form>
                    <div id="anaId">

                    </div>
                </div>
            </div>

            <div class="col-2">

            </div>
        </div>
    </div>

    <script src="PL/js/jquery-3.6.4.min.js?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>"></script>
    <script src="PL/js/jquery.validate.min.js?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>"></script>
    <script src="PL/js/homepage/homepage.js?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>"></script>

    <script>
        $('#logout').on('click', function () {

            $.post("ajax/ajaxAuthenticate.php", { ajaxCall: "logout" }, function (data, status) {

                window.location.href = "/login";

            });


        })
    </script>

</body>

</html>