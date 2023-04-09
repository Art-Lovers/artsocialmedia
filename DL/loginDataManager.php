<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/lib/plib.php';

class Login{
    
    public static function authenticateUser($username, $password){
        $userdata=DB::select('users', array('username'=>$username), array('se'=>true));
        
        
        if(!empty($userdata)){
            $userId = $userdata['userid'];
            if(password_verify($password, $userdata['password'])){
                $_SESSION['userId']=$userId;
                return true;
            }
            else{

                return false;
            }
        }
        
        else{

            return false;
        }
    }




}