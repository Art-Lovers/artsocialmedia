<html>
    <head> </head>
    <body>



<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/lib/plib.php';
echo var_dump(DB::select('users', array('userid'=>$_SESSION['userId']))[0]['username']);
?>

<button id="logout">Log Out</button>


<script src="PL/js/jquery-3.6.4.min.js?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>"></script>
<script src="PL/js/jquery.validate.min.js?v=<?php echo $GLOBAL_SCRIPTS_VER; ?>"></script>
<script>
    $('#logout').on('click', function(){

        $.post("ajax/ajaxAuthenticate.php", {ajaxCall: "logout"}, function(data, status){
            
            window.location.href = "/login";

          });


    })

    //pershendetje si jeni
</script>

</body>

</html>