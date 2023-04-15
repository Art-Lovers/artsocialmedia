<html>

<head>

</head>

<body>
    
    <div>
        <form id="postForm">
            <br>
            <textarea id="postContent"></textarea><br>
            <input type="file" name="fileToUpload" id="attachMediaPost" >
            <!-- <button id="">Add photo/video</button><br> -->
            <button id="createPostButton">Create post</button>
        </form>
    </div>
















    <button id="logout">Log Out</button>

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