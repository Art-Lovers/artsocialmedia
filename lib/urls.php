<?php

$SERVER_IMPLEMENTED_PATHS = array();

function addServerImplementedPaths(){
    global $SERVER_IMPLEMENTED_PATHS;

    //Authentication Urls
    array_push($SERVER_IMPLEMENTED_PATHS, 'login');
    array_push($SERVER_IMPLEMENTED_PATHS, 'signup');

    //Homepage urls
    array_push($SERVER_IMPLEMENTED_PATHS, 'homepage');
    array_push($SERVER_IMPLEMENTED_PATHS, 'homepage/test');
}