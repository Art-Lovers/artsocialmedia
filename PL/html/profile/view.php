<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Profile Page <?php echo $userProfile; ?></title>
    <link rel="stylesheet" type="text/css" href="PL/css/homepage/homepageStyle.css?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



</head>

<body>
    <center>
        <h1> Post Form </h1>
        
    </center>
    <div class="col-2 ml-3">
                <form id="postForm">
                    <br>

                    <textarea id="postContent"></textarea><br>
                    <input type="file" name="fileToUpload" id="attachMediaPost" >
                    <!-- <button id="">Add photo/video</button><br> -->
                    <button id="createPostButton">Create post</button>
                </form>
                </div>

</body>

</html>