<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use common\models\Content;

/**
 * This is the model class for table "{{%content_article}}".
 *
 * @property integer $id
 * @property integer $content_id
 * @property string $detail
 * @property integer $created_at
 * @property integer $updated_at
 */
class Article extends ActiveRecord
{
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%content_article}}';
    }
	
	public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                   // ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['detail'], 'required'],
            [['content_id', 'created_at', 'updated_at'], 'integer'],
            [['detail'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'content_id' => Yii::t('app', 'Content ID'),
            'detail' => Yii::t('admin', 'Content'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

	public function getContent()
    {
        return $this->hasOne(Content::className(), ['id' => 'content_id']);
    }

}
