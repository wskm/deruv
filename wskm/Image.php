<?php

namespace wskm;

use yii\imagine\Image as YiiImage;
use Imagine\Image\ManipulatorInterface;

class Image
{

    public static function thumbnail($path, $topath, $width, $height, $quality=50)
    {
        return YiiImage::thumbnail($path, $width, $height, ManipulatorInterface::THUMBNAIL_OUTBOUND)
				->save($topath, ['quality' => $quality]);
    }

}
