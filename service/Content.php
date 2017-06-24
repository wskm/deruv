<?php

namespace service;

use Yii;
use Wskm;
use common\models\Content as ContentModel;
use service\Category;

class Content
{

	const CACHE_KEY_PRE = 'content:list';

	public static function getRanking($order = 'pv', $limit = 10 , $w = false)
	{
		if (!in_array($order, array('pv', 'comment', 'updated_at'))) {
			$order = 'pv';
		}
		$key = 'content:ranking:'.$order.':'.$limit;
		$list = \wskm\Cache::get($key);
		
		if (!$list || $w) {
			$list = [];
			
			$query = (new \yii\db\Query())
					->from(ContentModel::tableName())
					->where([
						'status' => 1
					])
					->orderBy([$order => SORT_DESC])
					->limit($limit);

			foreach ($query->each() as $item) {
				$list[] = $item;
			}

			$sec = \service\Setting::getConf('cache', 'contentList') !== false ? (int) \service\Setting::getConf('cache', 'contentList') : 3600;
			\wskm\Cache::set($key, $list, $sec);
		}

		return $list;
	}

	public static function getListByCategoryid($categoryid, $limit = 20)
	{
		$list = [];
		$cateIds = Category::getChilds($categoryid);

		$cateIds[] = $categoryid;

		$query = (new \yii\db\Query())
				->from(ContentModel::tableName())
				->where(['in', 'category_id', $cateIds])
				->andWhere([
					'status' => 1
				])
				->orderBy('updated_at DESC')
				->limit($limit);

		foreach ($query->each() as $item) {
			$list[] = $item;
		}

		return $list;
	}

	public static function setCache($category_id, $limit = 20)
	{
		if (!$category_id) {
			return false;
		}

		$key = self::CACHE_KEY_PRE.$category_id.':'.$limit;
		$list = self::getListByCategoryid($category_id, $limit);
		$sec = \service\Setting::getConf('cache', 'contentList')  !== false ? (int) \service\Setting::getConf('cache', 'contentList') : 3600;
		\wskm\Cache::set($key, $list, $sec);

		return \wskm\Cache::get($key);
	}

	public static function getCache($category_id, $limit = 20, $w = false)
	{
		$data = \wskm\Cache::get(self::CACHE_KEY_PRE.$category_id.':'.$limit);
		if ($data === false || $w) {
			$data = self::setCache($category_id, $limit);
		}

		return $data;
	}

}
