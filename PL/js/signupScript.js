$(document).ready(function(){
    $("#signupForm").on("submit", function(){

    var userValidation = true;
    var passwordValidation = true;
    var passwordConfirmValidation = true;

    if(!($('.input[name="username"]').val().match(/^[A-Za-z0-9]+$/))){
        $('#userErr').text("Username must only be alphanumeric. No special characters allowed.");
        userValidation = false;
    }
    else{
        $('#userErr').text("");
    }

    if(!($('.input[name="password"]').val().match(/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/)) ){
        $('#passwordErr').text("Password must have 1 lowercase and 1 uppwecase letter, 1 number and 1 special character (!@#$%^&*)");
        passwordValidation = false;
    }
    else{
        $('#passwordErr').text("");
    }

    if(!($('.input[name="confirmpassword"]').val() == $('.input[name="password"]').val())){
        $("#passconfirmfErr").text("Password doesn't match!");
        passwordConfirmValidation = false;
    }
    else{
        $('#passconfirmfErr').text("");
    }

    if(userValidation && passwordValidation && passwordConfirmValidation){
        $.post("ajax/ajaxAuthenticate.php",{ajaxCall: 'signup',data:JSON.stringify( $("#signupForm").serializeArray() )}, function(data, status){
        if(data=="success"){
            window.location.replace("/login");
        } 
        if(data=="Username already taken!"){
            $('#userErr').text('Username already taken!');
        }
        else{
            $('#userErr').text("");
        }
        if(data=="Email already exists!"){
            $('#email').text('Email already exists!');
        }
        else{
            $('#email').text("");
        }
        
        });
    }
    
    return false;

});

});