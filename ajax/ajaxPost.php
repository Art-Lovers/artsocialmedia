<?php 

include_once $_SERVER['DOCUMENT_ROOT'].'/lib/plib.php';
$post=$_POST;



if($post['ajaxCall']=='createPost'){

    $documentId = File::uploadFile($_FILES['file'], 1);


    // echo var_dump($post['postContent']).$_FILES['file']['name'];

    $postId = Post::createPost($post['postContent'], 1, 4);
    echo var_dump($postId);


}