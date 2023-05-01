<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/plib.php';
$post = $_POST;



if ($post['ajaxCall'] == 'createPost') {

    $profileId = DB::convertValue('profiles', 'userid', $_SESSION['userId'], 'profileid');



    // echo var_dump($post['postContent']).$_FILES['file']['name'];

    $privacyType = DB::convertValue('post_privacy_types', 'type_code', 'public', 'typeid');
    $postId = Post::createPost($post['postContent'], $profileId, $privacyType);

    if (isset($_FILES['file'])) {

        foreach ($_FILES['file'] as $key => $file) {
            foreach ($file as $i => $data) {
                $fileData[$i][$key] = $data;
            }
        }

        foreach ($fileData as $f) {
            $documentId = File::uploadFile($f, $profileId);
            $relationPost['mediaid'] = $documentId;
            $relationPost['postid'] = $postId;
            $relationId = DB::addEntity('post_media_relation', $relationPost);
        }
    }

    echo var_dump($postId);


    return;
}
if ($post['ajaxCall'] == 'getPost') {
    $postData = Post::getPostData();

    echo json_encode($postData);

    return;
}

if ($post['ajaxCall'] == 'countLike') {

    $likeCount = Post::updateLike(43);

    echo (empty($likeCount)) ? 0 : $likeCount;

    return;
}