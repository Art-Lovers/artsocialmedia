<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/lib/plib.php';

addServerImplementedPaths();

$REQUESTED_PATH = trim($_SERVER["REQUEST_URI"], "/ \n\r\t\v\x00");

if(in_array($REQUESTED_PATH, $SERVER_IMPLEMENTED_PATHS)){
    if(in_array($REQUESTED_PATH, array('login','signup','resetpassword'))){
        include_once $_SERVER['DOCUMENT_ROOT'].'/PL/html/authenticate/'.$REQUESTED_PATH.'.php';
    }
    else{
        include_once $_SERVER['DOCUMENT_ROOT'].'/PL/html/'.explode('/', $REQUESTED_PATH)[0].'/main.php';
    }
}
else{
    // $param = array('join' => array(array(
    //     'table' => 'user_login_tokens',
    //     'alias' => 'ult',
    //     'localKey' => 'userid',
    //     'foreignKey' => 'userid',
    //     'fields' => array(
    //         'logintoken' => 'token'
    //     )
    // )));
    // $param['se'] = true;
    // echo var_dump(DB::select('users', array('main.username' => 'asdfdsaf'), array('se' => true, 'fetch' => 'value'), 'main.password as password'));
    echo '404 :(';
}