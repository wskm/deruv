<?php

namespace common\models;

use Yii;
use wskm\db\ActiveRecord;

/**
 * This is the model class for table "{{%block}}".
 *
 * @property integer $id
 * @property integer $kind_id
 * @property integer $user_id
 * @property integer $content_id
 * @property string $title
 * @property string $thumb
 * @property string $url
 * @property string $summary
 * @property integer $sorting
 * @property integer $updated_at
 */
class Block extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%block}}';
    }
	
	public function primaryName() {
        return $this->title;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kind_id', 'user_id', 'title' ], 'required'],
            [['kind_id', 'user_id', 'content_id', 'sorting', 'updated_at'], 'integer'],
            [['title', 'thumb', 'url', 'summary'], 'string', 'max' => 255],
			[['content_id', 'sorting'], 'default', 'value' => 0],
        ];
    }
	
	public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => [ 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => [ 'updated_at'],
                ],
            ],
        ];
    }
	
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'kind_id' => Yii::t('app', 'Kind ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'content_id' => Yii::t('app', 'Content ID'),
            'title' => Yii::t('app', 'Title'),
            'thumb' => Yii::t('app', 'Thumb'),
            'url' => Yii::t('app', 'Url'),
            'summary' => Yii::t('app', 'Summary'),
            'sorting' => Yii::t('app', 'Sorting'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
	
	public function afterDelete()
	{
		parent::afterDelete();

		\service\Block::setCache($this->kind_id);
	}

	public function afterSave($insert, $changedAttributes)
	{
		parent::afterSave($insert, $changedAttributes);

		\service\Block::setCache($this->kind_id);
	}
}
