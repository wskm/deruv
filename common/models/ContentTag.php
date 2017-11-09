<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%content_tag}}".
 *
 * @property integer $content_id
 * @property integer $tag_id
 */
class ContentTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%content_tag}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content_id', 'tag_id'], 'required'],
            [['content_id', 'tag_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'content_id' => 'Content ID',
            'tag_id' => 'Tag ID',
        ];
    }
}
