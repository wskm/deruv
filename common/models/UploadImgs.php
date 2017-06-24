<?php
namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadImgs extends Model
{
 
    public $imageFiles;


    public function rules()
    {
        return [
			 [['imageFiles'], 'image', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, gif', 'maxFiles' => 6],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
			foreach ($this->imageFile as $file) {
                $file->saveAs(\Yii::getAlias('@webroot').'/uploads/' . $file->baseName . '.' . $file->extension);
            }
			return true;
        } else {
            return false;
        }
    }
}