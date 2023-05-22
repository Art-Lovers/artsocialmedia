<div class="">
    <div class="row">
        <div class="col-2">
            <!-- BUTONAT 
                    <button class="btn btn-primary mb-2"><i class="bi bi-house-door-fill"></i>Home</button><br>
                <button class="btn btn-primary mb-2"><i class="bi bi-people-fill"></i>Friends</button><br>
                <button id="logout" class="btn btn-primary mb-2"><i class="bi bi-box-arrow-right"></i></i>Log
                    Out</button> -->
        </div>
        <div class="col-8">

            <!-- <div class="input-group"> SEARCH BOX
                    <div class="form-outline">
                        <input type="search" id="form1" class="form-control" />
                    </div>
                    <button class="btn btn-primary mb-2"><i class="bi bi-search"></i>Search</button><br>
                </div> -->

            <div class="postclass">
                <div class="feed p-2">
                    <div class="bg-light border mt-2 mb-2">
                        <div
                            class="d-flex flex-row justify-content-between align-items-center p-2 bg-light bg-gradient border">
                            <div class="feed-text px-2">
                                <h6 class="text-black-50 mt-2">What's on your mind?</h6>
                            </div><br>
                        </div>
                        <div class="p-2 px-3">
                            <textarea id="postContent" class="form-control"></textarea>
                            <label id="postErr"></label>
                            <div class="showImagePreviewHere"></div>
                        </div>
                        <div class="d-flex justify-content-end socials p-2 py-3">
                            <!-- <input type="file" name="fileToUpload" id="attachMediaPost" multiple> -->
                            <label class="btn btn-success"><input type="file" class="Document" id="attachMediaPost"
                                    name="fileToUpload" accept="image/*" multiple /><i class="bi bi-images"
                                    aria-hidden="true"></i>AddImages</label>
                            <!-- <button id="">Add photo/video</button><br> -->
                            <button class="btn btn-success" id="createPostButton">Create post</button>
                        </div>
                    </div>

                    <div id="anaId">

                    </div>
                    <div id="endPost">

                    </div>
                </div>
            </div>


        </div>

        <div class="col-2">
            <!-- <button class="btn btn-primary mb-2"><i class="bi bi-bell-fill"></i>Notifications</button><br>
                <button class="btn btn-primary mb-2"><i class="bi bi-person-fill"></i>Profile</button><br>
                <button class="btn btn-primary mb-2"><i class="bi bi-chat-square-dots"></i>Inbox</button><br> -->
        </div>
    </div>
</div>

<script src="PL/js/homepage/homepage.js?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>"></script>

<script>
    $('#logout').on('click', function () {

        $.post("ajax/ajaxAuthenticate.php", {
            ajaxCall: "logout"
        }, function (data, status) {

            window.location.href = "/login";

        });


    })
</script>