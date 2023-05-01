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

    public static function updateLike($postID)
    {

        $profileID = DB::convertValue('profiles', 'userid', $_SESSION['userId'], 'profiled');
        $checkLike = DB::select('likes', array('postid' => $postID, 'profileid' => $profileID), array());

        if (empty($checkLike)) {
            $likeValues['postId'] = $postID;
            $likeValues['profileid'] = $profileID;
            DB::addEntity('likes', $likeValues);
        } else {
            DB::TERMINATE_ENTITY('likes', array('postid' => $postID, 'profileid' => $profileID));
        }

        return DB::select('likes', array('postid' => $postID), array('groupBy' => 'postid', 'se' => true, 'fetch' => 'value'), 'count(*)');
    }


}