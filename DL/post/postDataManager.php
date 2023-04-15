<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/plib.php';


class Post{


    public static function createPost($postContent, $profileId, $privacyType, $mediaId = ""){

        $postData['profileid']=$profileId;
        $postData['post_content']=$postContent;
        $postData['post_privacyid']=$privacyType;


        return DB::addEntity('posts', $postData);



    }




}