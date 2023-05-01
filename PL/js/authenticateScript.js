$(document).ready(function () {
    $("#loginForm").on("submit", function () {
        invalidInput = false;
        if (!($('.input[name="username"]').val().match(/^[A-Za-z0-9]+$/))) {
            $('#userError').text("Username must only be alphanumeric. No special characters allowed.");
            invalidInput = true;
        }
        else {
            $('#userError').text("");
        }

        /*    if(!($('.input[name="password"]').val().match(/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/)) ){
                $('#passError').text("Password must have 1 lowercase and 1 uppwecase letter, 1 number and 1 special character (!@#$%^&*)");
                invalidInput=true;
            }
            else{
                $('#passError').text("");
            } */
        if (invalidInput == false) {

            $.post("ajax/ajaxAuthenticate.php", { ajaxCall: "login", data: JSON.stringify($("#loginForm").serializeArray()) }, function (data, status) {
                alert("Data: " + data + "\nStatus: " + status);

                if (data == 'Logged in!') {

                    window.location.replace("/homepage");
                }
            });

        }

        return false;
    });
}); 