<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%stat_day}}".
 *
 * @property string $day
 * @property integer $pv
 */
class StatDay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%stat_day}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['day'], 'required'],
            [['day'], 'safe'],
            [['pv'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'day' => Yii::t('admin', 'Day'),
            'pv' => 'Pv',
        ];
    }
}
