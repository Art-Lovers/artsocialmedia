<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Login Page </title>
    <link rel="stylesheet" type="text/css" href="PL/css/style.css?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>">
    <link href="PL/css/boxicons.min.css?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>" rel='stylesheet'>
</head>

<body>
    <div class="box">
        <div class="container">
            <div class="top">
                <span>Have an account?</span>
                <header>Login</header>
            </div>
            <form method="post" action="">

                <div class="input-field">
                    <input type="text" class="input" placeholder="UserName" name="username" required>
                    <i class='bx bx-user'></i>
                </div>

                <div class="input-field">
                    <input type="Password" class="input" placeholder="Password" name="password" required>
                    <i class='bx bx-lock-alt'></i>
                </div>

                <div class="input-field">
                    <input type="submit" class="submit" value="Login">
                </div>

                <div class="two-col">
                    <div class="one">
                        <input type="checkbox" name="check" id="check">
                        <label for="check"> Remember Me</label>
                    </div>
                    <div class="two">
                        <label><a href="#">Forgot password?</a></label>
                    </div>
                </div>
                <label> <a href="signup">Not a member? Sign up!</a> </label>
            </form>



        </div>

    </div>
    <script src="PL/js/jquery-3.6.3.min.js?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>"></script>
</body>

</html>