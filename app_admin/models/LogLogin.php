<?php

namespace admin\models;

use Yii;

/**
 * This is the model class for table "{{%log_admin_login}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $user_name
 * @property string $password
 * @property string $ip
 * @property string $user_agent
 * @property integer $status
 * @property integer $login_time
 */
class LogLogin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%log_login}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_name', 'ip', 'login_time'], 'required'],
            [['status', 'login_time'], 'integer'],
            [['user_name', 'password'], 'string', 'max' => 255],
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
            'user_name' => Yii::t('app', 'User Name'),
            'password' => Yii::t('app', 'Password'),
            'ip' => Yii::t('app', 'Ip'),
            'status' => Yii::t('app', 'Status'),
            'login_time' => Yii::t('admin', 'Login Time'),
        ];
    }
}
