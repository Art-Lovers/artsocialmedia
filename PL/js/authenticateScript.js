$(document).ready(function(){
    $("#loginForm").on("submit", function(){
        
        if(!($('.input[name="username"]').val().match(/^[A-Za-z0-9]+$/)) ){
            $('#userError').text("Username must only be alphanumeric. No special characters allowed.");
        }
        else{
            $('#userError').text("");
        }
        
        if(!($('.input[name="username"]').val().match(/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/)) ){
            $('#passError').text("Password must have 1 lowercase and 1 uppwecase letter, 1 number and 1 special character (!@#$%^&*)");
        }
        else{
            $('#passError').text("");
        }

        return false;
      });
  }); //kjo esht kot, nuk esht ajo klase ja futa kot

/*
  $(document).ready(function(){
    $(".submit").click(function(){
        alert("Allahu akbar.");
    });
  });

  $("form").submit(function(event) {
    alert( "BOSBOSBOS" );
    event.preventDefault();
  });


$("form").submit(function( event ) {
    if ( $("input").first().val() === "correct" ) {
      $( "span" ).text( "Validated..." ).show();
      return;
    }
   
    $( "span" ).text( "Not valid!" ).show().fadeOut( 1000 );
    event.preventDefault();
  });


  $(document).ready(function(){
    $("form").submit(function(){
      alert("Submitted");
    });
  });

  $("#loginForm").on("submit", function(){
    alert("Bosiiiiiii");
    return false;
  })*/