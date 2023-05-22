<html>

<head>
    <link rel="stylesheet" type="text/css"
        href="PL/css/homepage/homepageStyle.css?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="PL/css/sweetalert2.min.css?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>">
</head>

<body>
    <script src="PL/js/jquery-3.6.4.min.js?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>"></script>
    <script src="PL/js/jquery.validate.min.js?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>"></script>
    <script src="PL/js/bootstrap.bundle.min.js?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>"></script>
    <script src="PL/js/sweetalert2.all.min.js?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>"></script>
    <script src="PL/js/top.js?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>"></script>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="col-2">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="/homepage" class="nav-link active" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Friends</a></li>
            </ul>
        </div>
        <div class="col-8">
            <form class="form-control mt-2">
                <input type="text" class="col-xs-4 form-control" placeholder="Search">
            </form>
        </div>
        <div class="col-2">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="#" class="nav-link">Notifications</a></li>
                <li class="nav-item"><a href="/profile" class="nav-link">Profile</a></li>
                <li class="nav-item"><a href="#" id="logout" class="nav-link">Log Out</a></li>
            </ul>
        </div>
    </nav>
    <div style='margin-bottom:80px'>
    </div>