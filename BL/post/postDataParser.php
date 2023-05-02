<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/plib.php';
class PostParser
{
    public static function createPostHtml($dbData, $profileId)
    {
        foreach ($dbData as $i => $data) {
            $imgData = Post::getPostMedia($data['postid']);

            $manageButtons = '';
            if ($profileId == $data['profileid']) {
                $manageButtons .= '<button class="btn btn-success btn-sm editpostbtn">Edit</button>';
                $manageButtons .= '<button class="btn btn-danger btn-sm deletepostbtn">Delete</button>';
            }

            $htmlContent[$i] = '<div class="postContent bg-light border mt-2" id="' . $data['postid'] . '">';

            $img = '';
            if (!empty($imgData)) {
                $img .= '<div id="carouselPost' . $data['postid'] . '" class="carousel slide" data-ride="carousel">';
                $img .= '<ol class="carousel-indicators">';
                foreach ($imgData as $j => $val) {
                    $active = ($j == 0) ? 'class="active"' : '';
                    $img .= '<li data-target="#carouselPost' . $data['postid'] . '" data-slide-to="' . $j . '" ' . $active . '></li>';
                }
                $img .= '</ol>';
                $img .= '<div class="carousel-inner">';
                foreach ($imgData as $j => $val) {
                    $active = ($j == 0) ? 'active' : '';
                    $img .= '<div class="carousel-item ' . $active . '">';
                    $img .= '<div class="feed-image p-2 px-3">';
                    $img .= '<img src="lib/serveImg.php?img=' . $val['mediaid'] . '">';
                    $img .= '</div></div>';
                }
                $img .= '</div>';
                $img .= '<a class="carousel-control-prev" href="#carouselPost' . $data['postid'] . '" role="button" data-slide="prev">';
                $img .= '<span class="carousel-control-prev-icon"></span>';
                $img .= '<span class="sr-only">Previous</span>';
                $img .= '</a>';
                $img .= '<a class="carousel-control-next" href="#carouselPost' . $data['postid'] . '" role="button" data-slide="next">';
                $img .= '<span class="carousel-control-next-icon"></span>';
                $img .= '<span class="sr-only">Next</span>';
                $img .= '</a>';
                $img .= '</div>';
            }

            $htmlContent[$i] .= '<div class="d-flex flex-row justify-content-between align-items-center p-2 border-bottom">';
            $htmlContent[$i] .= '<div class="d-flex flex-row align-items-center feed-text px-2">';
            $htmlContent[$i] .= '<div class="d-flex flex-column flex-wrap ml-2"><span class="font-weight-bold">' . $data['full_name'] . '</span><span class="text-black-50 time">40 minutes ago</span></div>';
            $htmlContent[$i] .= '</div><div class="feed-icon px-2">' . $manageButtons . '</div>';
            $htmlContent[$i] .= '</div>';
            $htmlContent[$i] .= '<div class="p-2 px-3"><span>' . $data['post_content'] . '</span></div>';
            $htmlContent[$i] .= $img;
            $htmlContent[$i] .= '<br><button class="likeButton"> Like (' . Post::updateLikeCount($data['postid']) . ') </button>';
            $htmlContent[$i] .= '<button> Comment </button>';
            $htmlContent[$i] .= '<br>';
            $htmlContent[$i] .= '</div>';
        }

        return $htmlContent;
    }
}
