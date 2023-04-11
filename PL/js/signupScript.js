$(document).ready(function(){
    $("#signupForm").on("submit", function(){
    userError=false;
    if(!($('.input[name="username"]').val().match(/^[A-Za-z0-9]+$/)) ){
        $('#userErr').text("Username must be alphanumeric. No special characters allowed.");
        userError=true;
    }
    else { $('#userErr').text("");}

    nameError=false;
    if(!($('.input[name="firstname"]').val().match(/^[A-Za-z0-9]+$/))){
        $('#nameErr').text("Name must me alphanumeric. No special characters allowed.");
        nameError=true;
    }
    else {$('#nameErr').text("");}
    
    lastNameError=false;
    if(!($('.input[name="lastname"]').val().match(/^[A-Za-z0-9]+$/))){
        $('#nameErr').text("Name must me alphanumeric. No special characters allowed.");
        lastNameError=true;
    }
    else {$('#nameErr').text("");}
    
    passError=false;
    if(!($('.input[name="password"]').val().match(/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/)) ){
        $('#passError').text("Password must have 1 lowercase and 1 uppwecase letter, 1 number and 1 special character (!@#$%^&*)");
        passError=true;
    }
    else{
        $('#passError').text("");
    }

    $.post("ajax/ajaxAuthenticate.php",{ajaxCall: 'signup',data:JSON.stringify( $("#signupForm").serializeArray() )}, function(data, status){
        alert("Data: " + data + "\nStatus: " + status);
      });

      return false;

});

});