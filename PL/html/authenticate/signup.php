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
        <form action="" method="post" class="form">
            <div class="input_box">
                <label for="">First Name</label>
                <input type="text" name="name" placeholder="Enter your name">
            </div>
            <div class="input_box">
                <label for="">Last Name</label>
                <input type="text" name="name" placeholder="Enter your last name">
            </div>
            <div class="column">
                <div class="input_box">
                    <label for="">Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email address">
                </div>
                <div class="input_box">
                    <label for="">Phone number</label>
                    <input type="number" name="phoneNumber" placeholder="Enter your phone number" min="0">
                </div>
            </div>
            <div class="input_box">
                <label for="">Birth Date</label>
                <input type="date" name="birthDate" placeholder="Enter your birth date ">
            </div>
            <div class="gender-box">
                <h3>Gender</h3>
                <div class='gender-option'>
                    <div class='gender'>
                        <input type="radio" id="check-male" name=gender checked>
                        <label for="check-male">Male</label>
                    </div>
                    <div class='gender'>
                        <input type="radio" id="check-female" name=gender checked>
                        <label for="check-female">Female</label>

                    </div>
                    <div class='gender'>
                        <input type="radio" id="check-other" name=gender>
                        <label for="check-other">Prefer not to say</label>

                    </div>
                </div>
            </div>
            <div class="input_box">
                <label for="">Create Password</label>
                <input type="password" name="password" placeholder="minimum length is 8 characters" minlength="8"
                    maxlength="30">
            </div>
            <div class="input_box">
                <label for="">Confirm Password</label>
                <input type="password" name="password" placeholder="minimum length is 8 characters" minlength="8"
                    maxlength="30">
            </div>

        </form>
        <button type="submit" name="createAccountBtn" class="creatAcc">Create Account</button>

    </section>
</body>

</html>