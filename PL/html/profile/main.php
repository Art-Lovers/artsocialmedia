<?php

 $path= explode('/', $REQUESTED_PATH);

$userProfile=$path[1];
$userData=DB::select('profiles',array('display_name' => $userProfile));
if(!empty($userData)){
    include_once('view.php');

}
else{
    echo "404";
}



