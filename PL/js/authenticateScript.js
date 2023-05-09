$(document).ready(function () {
    $('#exampleModalCenter').modal('hide');
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
                if (data == 'Logged in!') {
                    $('#exampleModalCenter').modal('show')
                    setTimeout(function () { window.location.replace("/homepage"); }, 4000);
                }
                else if (data == 'Ke probleme me login!') {
                    $('#userError').text("Username or Password may not be correct!");
                }
            });

        }

        return false;
    });
}); 