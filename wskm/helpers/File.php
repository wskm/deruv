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
    
    public static function isReallyWritable($file)
	{
		// If we're on a Unix server with safe_mode off we call is_writable
		if (DIRECTORY_SEPARATOR == '/' AND @ ini_get("safe_mode") == false) {
			return is_writable($file);
		}

		// For windows servers and safe_mode "on" installations we'll actually
		// write a file then read it.  Bah...
		if (is_dir($file)) {
			$file = rtrim($file, '/') . '/test';
			if (($fp = @fopen($file, 'w')) === false) {
				return false;
			}

			@fclose($fp);
			@unlink($file);
			return true;
		} elseif (!is_file($file) OR ( $fp = @fopen($file, 'w')) === false) {
			return false;
		}

		@fclose($fp);
		return true;
	}

}
