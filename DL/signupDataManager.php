<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/lib/plib.php';
class SignUp{
    public static function createAccount($userData,$profileData){
        
        $userId=DB::addEntity('users',$userData);
        $profileData['userId']=$userId;
        $_SESSION['userId']=$userId;
        DB::addEntity('profiles',$profileData);
        
    }
    public static function isExistingAccount($username){
        $userdata=DB::select('users',array('username'=>$username));
        return !empty($userdata);
        
    }
    public static function isExistingEmail($email){
        $userdata=DB::select('users',array('email'=>$email));
        return !empty($userdata);
        
    }
}