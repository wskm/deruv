<?php

namespace service;

use common\models\Block as BlockModel;
use common\models\BlockKind;

class Block
{

	const CACHE_KEY_PRE = 'block:list:';
	
	public static function shows($key, $length = 0)
	{
		$data = (array)self::getCache($key);
		if ($data && $length > 0) {
			if (count($data) > 1) {
				$data = array_slice($data, 0, $length, true);
			}
			
			if ($length == 1) {
				$data = current($data);
			}
		}
		
		return $data;
	}
	
	public static function getInfo($id, $key)
	{
		$data = self::getCache(self::CACHE_KEY_PRE.$key);
		if (is_array($data) && isset($data[$id])) {
			return $data[$id];
		}
		
		return false;
	}
	
	public static function getListByKindid($kind_id){
		$list = [];
		$query = (new \yii\db\Query())
				->from(BlockModel::tableName())
				->where([
					'kind_id' => $kind_id
				])->orderBy('sorting DESC');

		$i = 0;
		foreach ($query->each() as $item) {
			$item['index'] = $i;
			$list[$item['id']] = $isval ? $item['v'] : $item;
			
			$i++;
		}

		return $list;
	}
			
	public static function setCache($kind_id, $iskey = false)
	{
		if (!$kind_id) {
			return false;
		}
		
		$list = [];
		$key = '';
		if ($iskey) {
			$kindInfo = \service\BlockKind::getInfoByKey($kind_id);
			if (!$kindInfo) {
				throw new \yii\web\HttpException('500', 'No block kind key: '.$kind_id);
			}
			
			$list = self::getListByKindid($kindInfo['id']);
			$key = $kind_id;
		}else{
			$kindInfo = \service\BlockKind::getInfo($kind_id);
			if (!$kindInfo) {
				throw new \yii\web\HttpException('500', 'No block kind id: '.$kind_id);
			}
			
			$list = self::getListByKindid($kind_id);
			$key = $kindInfo['key'];
		}

		$sec = \service\Setting::getConf('cache', 'blockList') !== false ? (int)\service\Setting::getConf('cache', 'blockList') : 86400;
		\wskm\Cache::set(self::CACHE_KEY_PRE.$key, $list, $sec);
		return $list;
	}

	public static function getCache($key, $w = false)
	{
		$key = trim($key);
		$data = \wskm\Cache::get(self::CACHE_KEY_PRE.$key);
			
		if ($data === false || $w) {
			$data = self::setCache($key, true);
		}

		return $data;
	}

	
}
