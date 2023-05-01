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

    public static function rememberUser(){
        $cookie_name = "rmbme";
        $cookie_value = random_str(500);
        setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/");

        $dbData['userid'] = $_SESSION['userId'];
        $dbData['token'] = $cookie_value;

        return DB::addEntity('user_login_tokens', $dbData);
    }

    public static function checkRememberCookie(){
        if(isset($_COOKIE['rmbme'])){
            $dbData = DB::select('user_login_tokens', array('token' => $_COOKIE['rmbme']), array('se' => true));
            if(!empty($dbData)){
                $_SESSION['userId'] = $dbData['userid'];
                return true;
            }
        }
        else return false;
    }
}