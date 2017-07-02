<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%comment}}".
 *
 * @property integer $id
 * @property integer $content_id
 * @property integer $user_id
 * @property string $user_name
 * @property string $avatar
 * @property string $msg
 * @property string $ip
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Comment extends \yii\db\ActiveRecord
{
	const STATUS_CLOSE = 0;
	const STATUS_OPEN = 1;
	const STATUS_AUDIT = 2;

	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comment}}';
    }
	
	public static function getListStatus()
    {
        return [
			\Wskm::t('Close', 'admin'),
			\Wskm::t('Open', 'admin'),
			\Wskm::t('Audit', 'admin'),
		];
    }
	
	public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
			]
		];
	}
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content_id', 'user_id', 'user_name', 'msg', 'ip'], 'required'],
            [['content_id', 'user_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['msg'], 'string'],
            [['user_name', 'avatar'], 'string', 'max' => 255],
            [['ip'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'content_id' => Yii::t('admin', 'Content ID'),
            'user_id' => Yii::t('admin', 'User ID'),
            'user_name' => Yii::t('app', 'User Name'),
			'avatar' => Yii::t('app', 'Avatar'),
            'msg' => Yii::t('app', 'Message'),
            'ip' => Yii::t('app', 'Ip'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
