<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/lib/plib.php';


class File{


    public static function uploadFile($fileData, $profileId){

        $storagelocation = $_SERVER['DOCUMENT_ROOT']."/uploads"."/";
        $filePath = $storagelocation . $fileData['name'];
        move_uploaded_file( $fileData['tmp_name'], $filePath);
        

        $fileDBdata['profileid'] = $profileId;
        $fileDBdata['media'] = $filePath;

        return DB::addEntity('medias', $fileDBdata);

    }




}