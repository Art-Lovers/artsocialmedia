<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/plib.php';


class Post
{


    public static function createPost($postContent, $profileId, $privacyType, $mediaId = "")
    {

        $postData['profileid'] = $profileId;
        $postData['post_content'] = $postContent;
        $postData['post_privacyid'] = $privacyType;


        return DB::addEntity('posts', $postData);



    }

    public static function getPostData()
    {
        $postdata = DB::select(
            'posts',
            array(),
            array(
                'join' => array(
                    array(
                        'table' => 'profiles',
                        'alias' => 'profiles',
                        'localKey' => 'profileid',
                        'foreignKey' => 'profileid',
                        'fields' => array(
                            'full_name' => 'full_name',
                            'display_name' => 'display_name'
                        )
                    )
                ),
                'orderBy' => array('postid' => 'DESC'),
                'groupBy' => 'postid',
                'left join' => array(
                    array(
                        'table' => 'post_media_relation',
                        'alias' => 'post_media_relation',
                        'localKey' => 'postid',
                        'foreignKey' => 'postid',
                        'fields' => array(
                            'mediaid' => 'mediaid'
                        )
                    )
                )
            )
        );
        return $postdata;
    }




}