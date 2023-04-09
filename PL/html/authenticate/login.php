<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Login Page </title>
    <link href="PL/css/boxicons.min.css?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>" rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="PL/css/style.css?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>">    
</head>

<body>
    <div class="box">
        <div class="container">
            <div class="top">
                <header>Login</header>
            </div>
            <form method="post" action="" id="loginForm">

                <div class="input-field">
                    <input type="text" class="input" placeholder="UserName" name="username" required minlength="5"
                    maxlength="30">
                    <i class='bx bx-user'></i>
                    <label class="error" id="userError"></label>
                </div>

                <div class="input-field">
                    <input type="Password" class="input pr-password" placeholder="Password" name="password" required minlength="8"
                    maxlength="30">
                    <i class='bx bx-lock-alt'></i>
                    <label class="error" id="passError"></label>
                </div>

                <div class="input-field">
                    <input type="submit" class="submit" value="Login">
                </div>

                <div class="two-col">
                    <div class="one">
                        <input type="checkbox" name="rememberMe" id="check">
                        <label for="check"> Remember Me</label>
                    </div>
                    <div class="two">
                        <label><a href="#">Forgot password?</a></label>
                    </div>
                </div>
                <div class = "label-holder">
                    <label> <a href="signup">Not a member? Sign up!</a> </label>
                </div>
            </form>



        </div>

    </div>
    <script src="PL/js/jquery-3.6.4.min.js?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>"></script>
    <script src="PL/js/jquery.validate.min.js?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>"></script>    
    <script src="PL/js/authenticateScript.js?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>"></script>
</body>

</html>