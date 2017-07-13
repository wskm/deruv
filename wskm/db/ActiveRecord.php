<?php

namespace wskm\db;

class ActiveRecord extends \yii\db\ActiveRecord
{	
	
	public static function getStatusName($key)
	{
		$status = static::getListStatus();
		return isset($status[$key]) ? $status[$key] : false;
	}

}
