$(document).ready(function(){
    $("#signupForm").on("submit", function(){
    
    if(!($('.input[name="usersname"]').val().match(/^[A-Za-z0-9]+$/)) ){
        $('#userErr').text("Username must be alphanumeric. No special characters allowed.");
    }
    else if(!($('.input[name="namee"]').val().match(/^[A-Za-z0-9]+$/))){
        $('#nameErr').text("Name must me alphanumeric. No special characters allowed.")
    }
    else if(!($('.input[name="Lastname"]').val().match(/^[A-Za-z0-9]+$/))){
        $('#nameErr').text("Name must me alphanumeric. No special characters allowed.")
    }

    $.post("ajax/ajaxAuthenticate.php",{ajaxCall: 'signup',data:JSON.stringify( $("#signupForm").serializeArray() )}, function(data, status){
        alert("Data: " + data + "\nStatus: " + status);
      });

      return false;

});

});