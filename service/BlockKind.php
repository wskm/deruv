<?php

namespace service;

use common\models\BlockKind as BlockKindModel;

class BlockKind
{

	const CACHE_KEY = 'blockkind:list';
	
	public static function getList()
	{
		$list = [];
		$query = (new \yii\db\Query())
				->from(BlockKindModel::tableName())
				->orderBy('sorting DESC');

		foreach ($query->each() as $item) {
			$list[$item['id']] = $item;
		}

		return $list;
	}
	
	public static function getListOptions()
	{
		$list = self::getCache();
		
		$data = [];
		foreach($list as $v){
			$data[$v['id']] = \Wskm::t($v['name'], 'admin');
		}
		
		return $data;
	}
	
	public static function getInfo($id)
	{
		if (!$id) {
			return false;
		}
		return isset(self::getCache()[$id]) ? self::getCache()[$id] : false;
	}
	
	public static function getInfoByKey($key)
	{
		if (!$key) {
			return false;
		}
		
		return BlockKindModel::find()->where(['key' => $key])->asArray()->one();
	}
	
	public static function setCache($key = self::CACHE_KEY)
	{
		if (!$key) {
			return false;
		}
		$list = self::getList();
		\wskm\Cache::set($key, $list);
		
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

	
}
