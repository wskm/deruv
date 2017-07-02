<?php

namespace wskm;

class Timezone
{

	public static function getList()
	{
		if (!function_exists('timezone_abbreviations_list')) {
			throw new \Exception('timezone_abbreviations_list does not exist!');
		}
		$list = [];
		foreach (timezone_abbreviations_list() as $abbr => $timezone) {
			foreach ($timezone as $val) {
				if (isset($val['timezone_id'])) {
					$list[$val['timezone_id']] = $val['timezone_id'];
				}
			}
		}
		
		asort($list);
		
		return $list;
	}

}
