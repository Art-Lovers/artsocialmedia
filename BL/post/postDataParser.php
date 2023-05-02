<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/plib.php';
class PostParser
{
    public static function createPostHtml($dbData, $profileId)
    {
        foreach ($dbData as $i => $data) {
            $imgData = Post::getPostMedia($data['postid']);

            $manageButtons = '';
            if ($profileId = $data['profileid']) {
                $manageButtons .= '<button class="btn btn-success editpostbtn">Edit</button>';
                $manageButtons .= '<button class="btn btn-danger deletepostbtn">Delete</button>';
            }

            $htmlContent[$i] = '<div class="postContent mb-2" id="' . $data['postid'] . '">';

            $img = '';
            if (!empty($imgData)) {
                foreach ($imgData as $val) {
                    $img .= '<img src="lib/serveImg.php?img=' . $val['mediaid'] . '">';
                }
            }

            $htmlContent[$i] .= '<label>' . $data['full_name'] . '</label>' . $manageButtons . '<br>';
            $htmlContent[$i] .= '<label>' . $data['post_content'] . '</label><br>';
            $htmlContent[$i] .= $img;
            $htmlContent[$i] .= '<br><button class="likeButton"> Like (' . Post::updateLikeCount($data['postid']) . ') </button>';
            $htmlContent[$i] .= '<button> Comment </button>';
            $htmlContent[$i] .= '<br>';
            $htmlContent[$i] .= '</div>';
        }

        return $htmlContent;
    }
}