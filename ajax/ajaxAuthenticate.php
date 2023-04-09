<?php 

include_once $_SERVER['DOCUMENT_ROOT'].'/lib/plib.php';
$post=$_POST;


if($post['ajaxCall']=='signup'){
    $data=json_decode($post['data'],true);
    
    foreach($data as $field){
        $parseData[$field['name']]=$field['value'];
    }
    if(SignUp::isExistingAccount($parseData['username'])){
        echo "Username already taken!";
        return ;
    }
    if(SignUp::isExistingEmail($parseData['email'])){
        echo "Email already exists!";
        return ;
    }
    $userData['username']=$parseData['username'];
    $userData['password']=password_hash($parseData['password'],PASSWORD_DEFAULT);
    $userData['email']=$parseData['email'];
    $profileData['display_name']=$parseData['username'];
    $profileData['full_name']=$parseData['firstname'] .' '.$parseData['lastname'];
    $profileData['phone_number']=$parseData['phoneNumber'];
    $profileData['birthday']=$parseData['birthDate'];

    SignUp::createAccount($userData,$profileData);
    echo 'success';
}


else if($post['ajaxCall']=='login'){
    $data=json_decode($post['data'],true);
    
    foreach($data as $field){
        $parseData[$field['name']]=$field['value'];
    }
    
    // return var_dump(Login::authenticateUser($parseData['username'], $parseData['password']));

    if(Login::authenticateUser($parseData['username'], $parseData['password'])){
        echo 'Logged in!';
        return;
    }

    else{
        echo 'Ke probleme me login!';
        return;
    }


}

else if($post['ajaxCall']=='logout'){
    
    unset($_SESSION['userId']);

}
