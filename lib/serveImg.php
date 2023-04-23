<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/lib/plib.php';
$imgId = $_GET['img'];

$imgPath = DB::select('medias', array('mediaid' => $imgId), array('se' => true, 'fetch' => 'value'), 'main.media as media');
$contentType = mime_content_type($imgPath);

header("Content-type: " . $contentType);
readfile($imgPath);