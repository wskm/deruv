<?php

namespace wskm\db;

use \service\Log;

class ActiveRecord extends \yii\db\ActiveRecord
{	
	
	public function afterDelete()
	{
		parent::afterDelete();
		
		$class = explode("\\", get_called_class());
		$title = \Wskm::t('Deleted {model}:{name}', 'log',[ 
			'model' => \Wskm::t( end($class), 'admin'),
			'name' => method_exists($this,'primaryName') ? $this->primaryName() : 'id:'.$this->primaryKey,
		]);
		Log::action($title, Log::TYPE_DELETE);
	}

	public function afterSave($insert, $changedAttributes)
	{
		parent::afterSave($insert, $changedAttributes);
		
		$class = explode("\\", get_called_class());
		$title = \Wskm::t(($insert ? 'Created' : 'Updated'). ' {model}:{name}', 'log',[ 
			'model' => \Wskm::t(end($class), 'admin'),
			'name' => method_exists($this,'primaryName') ? $this->primaryName() : 'id:'.$this->primaryKey,
		]);
		Log::action($title, $insert ? Log::TYPE_CREATE : Log::TYPE_UPDATE);
	}

}
