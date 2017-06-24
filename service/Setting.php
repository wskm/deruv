<?php

namespace service;

use admin\models\Setting as SettingModel;

class Setting
{

	const CACHE_KEY = 'setting:list';
	
	public static function getList($isval = false)
	{
		$list = [];
		$query = (new \yii\db\Query())
				->from(SettingModel::tableName())
				->orderBy('sorting DESC');

		foreach ($query->each() as $item) {
			$list[$item['type']][$item['k']] = $isval ? $item['v'] : $item;
		}

		return $list;
	}

	public static function getConf($type, $key = '')
	{
		$data = isset(self::getCache()[$type]) ? self::getCache()[$type] : false;
		if (!$data) {
			return false;
		}
		
		if (!$key) {
			return $data;
		}
		
		if ($key && isset($data[$key])) {
			return $data[$key];
		}
		
		return false;
	}

	public static function getSysConf($key = '')
	{
		return self::getConf('sys', $key);
	}

	public static function getParamConf($key = '')
	{
		return self::getConf('param', $key);
	}
	
	public static function setCache()
	{
		$list = self::getList(true);
		\wskm\Cache::set(self::CACHE_KEY, $list);
		
		self::okDebug($list['sys']['debug']);
		
		return $list;
	}

	public static function getCache($key = self::CACHE_KEY, $w = false)
	{
		$data = \wskm\Cache::get($key);
		if ($data === false || $w) {
			$data = self::setCache($key);
		}

		return $data;
	}
	
	public static function okDebug($isdebug = true)
	{
		$path = \Yii::getAlias('@runtime');
		if (!is_dir($path)) {
            \yii\helpers\FileHelper::createDirectory($path);
        }
		
		$file = $path.DIRECTORY_SEPARATOR.'debug';
		if (!$isdebug) {
			@unlink($file);
			return;
		}
		@file_put_contents($file, 'debug');
	}
	
}
