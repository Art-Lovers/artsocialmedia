$(document).ready(function(){
    $("#loginForm").on("submit", function(){
        
        if(!($('.input[name="username"]').val().match(/^[A-Za-z0-9]+$/)) ){
            $('#userError').text("Username must only be alphanumeric. No special characters allowed.");
        }
        else{
            $('#userError').text("");
        }
        
        $(".pr-password").passwordRequirements({
            numCharacters: 8,
            useLowercase: true,
            useUppercase: true,
            useNumbers: true,
            useSpecial: true
          });

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