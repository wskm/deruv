<?php

namespace wskm;

use Yii;

class Cache
{
	public static function get($key)
	{
		return Yii::$app->cache->get($key);
	}
    
    public static function set($key, $value, $duration = null, $dependency = null)
    {
		return Yii::$app->cache->set($key, $value, $duration, $dependency);
	}
}