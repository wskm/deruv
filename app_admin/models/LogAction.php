<?php

namespace admin\models;

use Yii;

/**
 * This is the model class for table "{{%log_admin_action}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $user_name
 * @property string $url
 * @property string $title
 * @property string $msg
 * @property string $type
 * @property integer $level
 * @property integer $created_at
 */
class LogAction extends \yii\db\ActiveRecord
{

	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%log_action}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'user_name', 'url', 'title', 'type', 'created_at'], 'required'],
            [['user_id', 'level', 'created_at'], 'integer'],
            [['user_name', 'url', 'title'], 'string', 'max' => 255],
			[['type'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'user_name' => Yii::t('app', 'User Name'),
            'url' => Yii::t('app', 'Url'),
            'title' => Yii::t('app', 'Title'),
            'type' => Yii::t('admin', 'Type'),
            'level' => Yii::t('admin', 'Level'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
