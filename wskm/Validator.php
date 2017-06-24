<?php

namespace wskm;

class Validator
{

    public static function UploadImage($imagePath)
    {
        if (false === ($imageInfo = getimagesize($imagePath))) {
            return false;
        }

        return $imageInfo;
    }

}
