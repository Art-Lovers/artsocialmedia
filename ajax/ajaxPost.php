<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/plib.php';
$post = $_POST;



if ($post['ajaxCall'] == 'createPost') {

    if (empty(trim($post['postContent']))) {
        echo 'Error! Empty Content';
        return;
    }

    $profileId = DB::convertValue('profiles', 'userid', $_SESSION['userId'], 'profileid');

    // echo var_dump($post['postContent']).$_FILES['file']['name'];

    $privacyType = DB::convertValue('post_privacy_types', 'type_code', 'public', 'typeid');
    $postId = Post::createPost(trim($post['postContent']), $profileId, $privacyType);

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
    $postData = Post::getPostData($post['postcnt'], 1);
    $profileId = DB::convertValue('profiles', 'userid', $_SESSION['userId'], 'profileid');
    echo json_encode(PostParser::createPostHtml($postData, $profileId));

    return;
}

if ($post['ajaxCall'] == 'deletePost') {
    if (Post::hasPostPerm($post['postid'])) {
        echo Post::deletePost($post['postid']);
    } else {
        echo "You can not do this!";
    }

    return;
}

if ($post['ajaxCall'] == 'getEditData') {
    if (Post::hasPostPerm($post['postid'])) {
        echo json_encode(Post::getContentPostData(array('main.postid' => $post['postid'])));
    } else {
        echo "You can not do this!";
    }

    return;
}

if ($post['ajaxCall'] == 'editPost') {
    if (Post::hasPostPerm($post['postid'])) {
        echo Post::editPost($post['postContent'], $post['postid']);
    } else {
        echo "You can not do this!";
    }

    return;
}

if ($post['ajaxCall'] == 'countLike') {

    $likeCount = Post::updateLike($post['postid']);

    echo (empty($likeCount)) ? 0 : $likeCount;

    return;
}