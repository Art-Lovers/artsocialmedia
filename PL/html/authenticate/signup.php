<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="PL/css/style2.css?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>">
</head>

<body>
    <section class="signup-container">
        <header>Registration Form</header>
        <form action="" method="post" class="form" id="signupForm">
            <div class="input_box">
                <label for="">First Name *</label>
                <input type="text" class="input name" name="firstname" placeholder="Enter your name" required>
                <label class="error" id='nameErr'></label>
            </div>
            <div class="input_box">
                <label for="">Last Name *</label>
                <input type="text" class="input" name="lastname" placeholder="Enter your last name" required>
                <label class="error" id='lastNameErr'></label>
            </div>
            <div class="input_box">
                <label for="">Username *</label>
                <input type="text" name="username" class="input user1" placeholder="Enter your username" required>
                <label class="error" id='userErr'></label>
            </div>
            <div class="column">
                <div class="input_box">
                    <label for="">Email Address *</label>
                    <input type="email" name="email" placeholder="Enter your email address" required>
                    <label class="error" id='emailErr'></label>
                </div>
                <div class="input_box">
                    <label for="">Phone number *</label>
                    <input type="text" name="phoneNumber" placeholder="Enter your phone number" min="0">
                    <label class="error" id='phoneNumErr'></label>
                </div>
            </div>
            <div class="input_box">
                <label for="">Birth Date *</label>
                <input type="date" name="birthDate" placeholder="Enter your birth date " required>
            </div>
            <div class="gender-box">
                <h3>Gender *</h3>
                <div class='gender-option'>
                    <div class='gender'>
                        <input type="radio" id="check-male" name=gender value="m" checked>
                        <label for="check-male">Male</label>
                    </div>
                    <div class='gender'>
                        <input type="radio" id="check-female" name=gender  value="f" checked>
                        <label for="check-female">Female</label>

                    </div>
                    <div class='gender'>
                        <input type="radio" id="check-other" name=gender value="other">
                        <label for="check-other">Prefer not to say</label>

                    </div>
                </div>
            </div>
            <div class="input_box">
                <label for="">Create Password *</label>
                <input type="password" name="password" class="input" placeholder="minimum length is 8 characters" minlength="8"
                    maxlength="30" required>
                <label class="error" id='passwordErr'></label>
            </div>
            <div class="input_box">
                <label for="">Confirm Password *</label>
                <input type="password" name="confirmpassword" class="input" placeholder="Confirm Password" minlength="8"
                    maxlength="30" required>
                    <label class="error" id='passconfirmfErr'></label>
            </div>

            <button type="submit" name="createAccountBtn" class="creatAcc">Create Account</button>

        </form>
        
    </section>

    <script src="PL/js/jquery-3.6.4.min.js?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>"></script>
    <script src="PL/js/signupScript.js?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>"></script>
    <script src="PL/js/jquery.validate.min.js?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>"></script>    
</body>

</html>