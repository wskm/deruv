<?php

namespace wskm\helpers;

use yii\helpers\FileHelper;

class File
{

    public static function getDir($dir)
    {
        $dir = FileHelper::normalizePath($dir);
        if (!is_dir($dir)) {
            throw new InvalidParamException("The dir argument must be a directory: $dir");
        }
        $dir = rtrim($dir, DIRECTORY_SEPARATOR);

        $list = [];
        $handle = opendir($dir);
        if ($handle === false) {
            throw new InvalidParamException("Unable to open directory: $dir");
        }

        while (($file = readdir($handle)) !== false) {
            if ($file === '.' || $file === '..') {
                continue;
            }
            $path = $dir.DIRECTORY_SEPARATOR.$file;
            if (is_dir($path)) {
                $list[] = $file;
            }
        }
        closedir($handle);

        return $list;
    }

}
