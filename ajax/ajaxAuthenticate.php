<?php 
$post=$_POST;


if($post['ajaxCall']=='signup'){
    $data=json_decode($post['data']);
    echo var_dump($data);
    foreach($data as $field){
        $parseData[$field['name']]=$field['value'];
    }
    
    $userData['username']=$parseData['username'];
    $userData['password']=password_hash($parseData['password'],PASSWORD_DEFAULT);
    $userData['email']=$parseData['email'];
    
}
