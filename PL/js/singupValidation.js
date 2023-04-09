$(document).ready(function(){
    if(!($('.input[name="usersname"]').val().match(/^[A-Za-z0-9]+$/)) ){
        $('#userErr').text("Username must be alphanumeric. No special characters allowed.");
    }
    else if(!($('.input[name="namee"]').val().match(/^[A-Za-z0-9]+$/))){
        $('#nameErr').text("Name must me alphanumeric. No special characters allowed.")
    }
    else if(!($('.input[name="Lastname"]').val().match(/^[A-Za-z0-9]+$/))){
        $('#nameErr').text("Name must me alphanumeric. No special characters allowed.")
    }
});