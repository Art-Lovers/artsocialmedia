$(document).ready(function(){
    $("#loginForm").on("submit", function(){
        
        if(!($('.input[name="username"]').val().match(/^[A-Za-z0-9]+$/)) ){
            $('#userError').text("Username must only be alphanumeric. No special characters allowed.");
        }
        else{
            $('#userError').text("");
        }
        
        if(!($('.input[name="password"]').val().match(/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/)) ){
            $('#passError').text("Password must have 1 lowercase and 1 uppwecase letter, 1 number and 1 special character (!@#$%^&*)");
        }
        else{
            $('#passError').text("");
        }

        $.post("ajax/ajaxAuthenticate.php", {ajaxCall: "login", data: JSON.stringify( $("#loginForm").serializeArray() )}, function(data, status){
            alert("Data: " + data + "\nStatus: " + status);
            window.location.replace("/homepage");

          });



        return false;
      });
  }); 