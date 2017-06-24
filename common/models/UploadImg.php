<?php

namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadImg extends Model {

	/**
	 * @var UploadedFile
	 */
	public $file;

	/**
	 * maxSize byte, 1024*1024*1024 = 1m
	 * https://en.wikipedia.org/wiki/Media_type#List_of_common_media_types
	 * @return type
	 */
	public function rules() {
		return [

			['file', \common\validators\ImageValidator::className(),
				//'extensions' => 'png, jpg, gif',
				//'mimeTypes' => ["image/png", "image/jpg", "image/jpeg", "image/gif"],
				//'checkExtensionByMimeType' => true,
				'minWidth' => 1,
				//'maxWidth' => 1000,
				'minHeight' => 1,
				//'maxHeight' => 1000,
			],
		];
	}

	public function upload($filePath) {
		if ($this->validate()) {
			return $this->imageFile->saveAs($filePath);
		}

		return false;
	}

}
