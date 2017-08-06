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
        
        $confFile = \yii\helpers\FileHelper::normalizePath(\Yii::getAlias('@common/config/setting.php'));
        $setting = require $confFile;
        $setting['frontendTheme'] = $list['sys']['frontendTheme'];
        $phpstr = "<?php \nreturn ".var_export($setting, true).';';
        file_put_contents($confFile, $phpstr);
		
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
	
	private static function writeConfig($config, $type = 'sys')
	{
		$path = \Yii::getAlias('@runtime');
		if (!is_dir($path)) {
            \yii\helpers\FileHelper::createDirectory($path);
        }
		
		$file = $path.DIRECTORY_SEPARATOR.$type.'.php';
		
		@file_put_contents($file, "<?php \nreturn ".var_export($config, true).';');
	}
	
}
