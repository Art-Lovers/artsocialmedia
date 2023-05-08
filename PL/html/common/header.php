<html>

<head>
    <link rel="stylesheet" type="text/css"
        href="PL/css/homepage/homepageStyle.css?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>
    <script src="PL/js/jquery-3.6.4.min.js?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>"></script>
    <script src="PL/js/jquery.validate.min.js?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>"></script>
    <script src="PL/js/top.js?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>"></script>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <!-- <div class="row"> -->
        <!-- <a href="#" class="col-xs-4 navbar-brand">Home</a>
            <ul class=" col-xs-4 navbar-nav mx-auto">
                <li class="nav-item"><a href="#" class="nav-link">Friends</a></li>
                <form class="form-inline">
                    <input type="text" class="col-xs-4 form-control" placeholder="Search">
                </form>
                <li class="nav-item"><a href="#" class="nav-link">Notifications</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Profile</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Log Out</a></li>
            </ul> -->
        <div class="col-2">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Friends</a></li>
            </ul>
            <!-- <button class="btn btn-primary mb-2"><i class="bi bi-house-door-fill"></i>Home</button><br>
                <button class="btn btn-primary mb-2"><i class="bi bi-people-fill"></i>Friends</button><br> -->
        </div>
        <div class="col-8">
            <form class="form-control mt-2">
                <input type="text" class="col-xs-4 form-control" placeholder="Search">
            </form>
            <!-- <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="searchButton btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form> -->
        </div>
        <div class="col-2">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="#" class="nav-link">Notifications</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Profile</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Log Out</a></li>
            </ul>
            <!-- <button class="btn btn-primary mb-2"><i class="bi bi-bell-fill"></i>Notifications</button><br>
                <button class="btn btn-primary mb-2"><i class="bi bi-chat-square-dots"></i></button><br>
                <button class="btn btn-primary mb-2"><i class="bi bi-person-fill"></i>Profile</button><br>
                <button id="logout" class="btn btn-primary mb-2"><i class="bi bi-box-arrow-right"></i></i>Log
                    Out</button> -->
        </div>
    </nav>
    <div style='margin-bottom:80px'>
    </div>