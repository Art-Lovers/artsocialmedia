<?php 

include_once $_SERVER['DOCUMENT_ROOT'].'/lib/plib.php';
$post=$_POST;



if($post['ajaxCall']=='createPost'){

    $profileId = DB::convertValue('profiles', 'userid', $_SESSION['userId'], 'profileid');

    $documentId = File::uploadFile($_FILES['file'], $profileId);


    // echo var_dump($post['postContent']).$_FILES['file']['name'];

    $privacyType = DB::convertValue('post_privacy_types', 'type_code', 'public', 'typeid');
    $postId = Post::createPost($post['postContent'], $profileId, $privacyType);


    $relationPost['postid']=$postId;
    $relationPost['mediaid']=$documentId;
    $relationId = DB::addEntity('post_media_relation', $relationPost);
    
    echo var_dump($postId);


}