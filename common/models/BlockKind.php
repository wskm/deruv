<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%block_kind}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $key
 * @property integer $sorting
 */
class BlockKind extends \wskm\db\ActiveRecord
{		
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%block_kind}}';
    }
	
	public function primaryName() {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'key'], 'required'],
			[['sorting'], 'integer', 'max' => 99],
			[['key'], 'unique'],
            [['name', 'key'], 'string', 'max' => 20],
			[['sorting'], 'default', 'value' => 0],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'key' => Yii::t('app', 'Key'),
            'sorting' => Yii::t('app', 'Sorting'),
        ];
    }
	
	public function afterDelete()
	{
		parent::afterDelete();

		\service\BlockKind::setCache();
	}

	public function afterSave($insert, $changedAttributes)
	{
		parent::afterSave($insert, $changedAttributes);

		\service\BlockKind::setCache();
	}
}
