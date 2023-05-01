<html>

<head>
    <link rel="stylesheet" type="text/css"
        href="PL/css/homepage/homepageStyle.css?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-3 gap-2">
                <button class="btn btn-primary mb-2"><i class="bi bi-house-door-fill"></i>Home</button><br>
                <button class="btn btn-primary mb-2"><i class="bi bi-people-fill"></i>Friends</button><br>
                <!-- <div class="input-group">
        <div class="form-outline">
            <input type="search" id="form1" class="form-control" />
            <label class="form-label" for="form1">Search</label>
        </div>
        <button type="button" class="btn btn-primary">
            <i class="fas fa-search"></i>
        </button>
    </div> -->
                <button id="logout" class="btn btn-primary mb-2"><i class="bi bi-box-arrow-right"></i></i>Log
                    Out</button>
            </div>
            <div class="col-6">
                <div class="postclass">
                    <form id="postForm" enctype="multipart/form-data">
                        <br>

                        <textarea id="postContent" class="form-control"></textarea><br>
                        <input type="file" name="fileToUpload" id="attachMediaPost" multiple>
                        <!-- <button id="">Add photo/video</button><br> -->
                        <button class="btn btn-success" id="createPostButton">Create post</button>
                    </form>
                    <div id="anaId">

                    </div>
                </div>
            </div>

            <div class="col-3 d-grid gap-2 mx-auto">
                <button class="btn btn-primary mb-2"><i class="bi bi-person-fill"></i>Profile</button><br>
                <button class="btn btn-primary mb-2"><i class="bi bi-chat-square-dots"></i>Inbox</button><br>
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