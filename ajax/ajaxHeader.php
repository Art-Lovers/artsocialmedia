<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/plib.php';
$post = $_POST;



if ($post['ajaxCall'] == 'registerUserOffset') {
    $_SESSION['timeOffset'] = $post['offset'];
}