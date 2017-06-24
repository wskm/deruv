<?php

namespace common\models;

use yii\base\Model;
//use yii\web\UploadedFile;

class Uploads extends Model
{

	public $file;

	/**
	 * maxSize byte, 1024*1024*1024 = 1m
	 * https://en.wikipedia.org/wiki/Media_type#List_of_common_media_types
	 * @return type
	 */
	public function rules()
	{
		return [
			[['file'], 'file',
				//'extensions' => ['png', 'jpg', 'gif'],
				//'mimeTypes' => ["image/png", "image/jpeg", "image/jpg", "image/gif"],
				//'maxSize' => 1024 * 1024 * 1024,
				//'checkExtensionByMimeType' => true,
				//'minSize' => 1024,
				//maxFiles => 10,
			],
		];
	}

	public function upload($filePath)
	{
		if ($this->validate()) {
			return $this->file->saveAs($filePath);
		}

		return false;
	}

}
