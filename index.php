<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/plib.php';

addServerImplementedPaths();

$REQUESTED_PATH = trim($_SERVER["REQUEST_URI"], "/ \n\r\t\v\x00");

Login::checkRememberCookie();

if (in_array($REQUESTED_PATH, $SERVER_IMPLEMENTED_PATHS)) {
    if (in_array($REQUESTED_PATH, array('login', 'signup', 'resetpassword'))) {

        if (isset($_SESSION['userId'])) {
            header("Location: http://localhost/homepage");
        } else {
            include_once $_SERVER['DOCUMENT_ROOT'] . '/PL/html/authenticate/' . $REQUESTED_PATH . '.php';
        }
    } else {
        // echo var_dump($_SESSION['userId']);
        if (isset($_SESSION['userId'])) {
            include_once $_SERVER['DOCUMENT_ROOT'] . '/PL/html/common/header.php';
            include_once $_SERVER['DOCUMENT_ROOT'] . '/PL/html/' . explode('/', $REQUESTED_PATH)[0] . '/main.php';
            include_once $_SERVER['DOCUMENT_ROOT'] . '/PL/html/common/footer.php';
        } else {
            header("Location: http://localhost/login");
        }
    }
} else {
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
    // echo var_dump(DB::updateEntity('posts', array('main.postid' => 8), array('post_content' => 'Chipsy')));
    echo '404 :(';
}