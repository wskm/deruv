<?php

namespace common\models;

use Yii;
use wskm\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "files".
 *
 * @property integer $id
 * @property string $name
 * @property string $ext
 * @property string $type
 * @property integer $size
 * @property string $url
 * @property integer $width
 * @property integer $height
 * @property integer $created_at
 */
class Files extends ActiveRecord
{

    public static function tableName()
    {
        return '{{%files}}';
    }
	
	public function primaryName() {
        return $this->name;
    }
	
	public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    //ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }
	
    public function rules()
    {
        return [
            [['type'], 'string'],
            [['size', 'width', 'height', 'created_at'], 'integer'],
            [['name', 'url'], 'string', 'max' => 255],
            [['ext'], 'string', 'max' => 10],
			[['type'], 'string', 'max' => 20],
			[['plan'], 'default', 'value' => 0],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'name' => Yii::t('common', 'Name'),
            'ext' => Yii::t('common', 'Ext'),
            'type' => Yii::t('common', 'Type'),
            'size' => Yii::t('common', 'Size'),
            'url' => Yii::t('common', 'Url'),
            'width' => Yii::t('common', 'Width'),
            'height' => Yii::t('common', 'Height'),
            'created_at' => Yii::t('common', 'Created At'),
        ];
    }
}
