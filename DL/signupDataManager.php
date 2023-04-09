<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/lib/plib.php';
class SignUp{
    public static function createAccount($data){
        
        DB::addEntity('users');
    }
}