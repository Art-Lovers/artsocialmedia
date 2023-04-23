<?php 

include_once $_SERVER['DOCUMENT_ROOT'].'/lib/plib.php';
$post=$_POST;



if($post['ajaxCall']=='createPost'){

    $profileId = DB::convertValue('profiles', 'userid', $_SESSION['userId'], 'profileid');

    if(isset($_FILES['file'])){
        $documentId = File::uploadFile($_FILES['file'], $profileId);
        $relationPost['mediaid']=$documentId;
    }

    // echo var_dump($post['postContent']).$_FILES['file']['name'];

    $privacyType = DB::convertValue('post_privacy_types', 'type_code', 'public', 'typeid');
    $postId = Post::createPost($post['postContent'], $profileId, $privacyType);


    $relationPost['postid']=$postId;
    $relationId = DB::addEntity('post_media_relation', $relationPost);
    
    echo var_dump($postId);

    return ;
}
if($post['ajaxCall']=='getPost'){
   $postData=Post::getPostData();
   
    echo json_encode($postData);

    return ;
}