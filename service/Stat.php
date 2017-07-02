<?php

namespace service;

use Yii;
use Wskm;
use common\models\StatDay;

class Stat
{

	public static function pvDay($begin = '', $end = '', $limit = 31)
	{
		if (!$begin) {
			$begin = date('Y-m-d', time() - 86400 * 30);
		}

		if (!$end) {
			$end = date('Y-m-d', time());
		}

		$query = (new \yii\db\Query())
				->from(StatDay::tableName())
				->where(['between', 'day', $begin, $end])
				->orderBy(['day' => SORT_ASC]);
		if ($limit) {
			$query->limit($limit);
		}

		$days = $pvs = [];
		foreach ($query->each() as $item) {
			$days[] = $item['day'];
			$pvs[] = $item['pv'];
		}
		
		return [
			'day' => $days,
			'pv' => $pvs,
		];
	}

}
