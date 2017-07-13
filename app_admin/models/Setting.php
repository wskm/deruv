<?php

namespace admin\models;

use wskm\db\AdminAR;

class Setting extends AdminAR 
{
	public function primaryName() {
        return $this->k;
    }
	
	public static function tableName()
	{
		return '{{%setting}}';
	}

	public function rules()
    {
        return [
            [['k', 'v'], 'required'],			
			['k', 'unique'],
			[['k', 'v'], 'trim'],
			['type', 'in', 'range' => [0, 1]],
			[['v', 'out'], 'default', 'value' => '' ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'k' => 'Key',
			'v' => 'Value',
        ];
    }

}
