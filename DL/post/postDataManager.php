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

    public static function getPostData($start, $cnt)
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
                'limit' => $start . ', ' . $cnt
            )
        );
        return $postdata;
    }

    public static function getPostMedia($postID)
    {
        $postdata = DB::select(
            'posts',
            array('main.postid' => $postID),
            array(
                'join' => array(
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

        $profileID = DB::convertValue('profiles', 'userid', $_SESSION['userId'], 'profileid');
        $checkLike = DB::select('likes', array('postid' => $postID, 'profileid' => $profileID), array());

        if (empty($checkLike)) {
            $likeValues['postid'] = $postID;
            $likeValues['profileid'] = $profileID;
            DB::addEntity('likes', $likeValues);
        } else {
            DB::TERMINATE_ENTITY('likes', array('postid' => $postID, 'profileid' => $profileID));
        }

        return DB::select('likes', array('postid' => $postID), array('groupBy' => 'postid', 'se' => true, 'fetch' => 'value'), 'count(*)');
    }

    public static function updateLikeCount($postID)
    {
        $count = DB::select('likes', array('postid' => $postID), array('groupBy' => 'postid', 'se' => true, 'fetch' => 'value'), 'count(*)');

        $count = (empty($count)) ? 0 : $count;

        DB::updateEntity('posts', array('postid' => $postID), array('likes_counter' => $count));
        return $count;
    }

    public static function hasPostPerm($postID)
    {
        $userProfileID = DB::convertValue('profiles', 'userid', $_SESSION['userId'], 'profileid');

        return !empty(DB::select('posts', array('postid' => $postID, 'profileid' => $userProfileID)));
    }

    public static function deletePost($postID)
    {
        return DB::deleteEntityById('posts', $postID);
    }
}