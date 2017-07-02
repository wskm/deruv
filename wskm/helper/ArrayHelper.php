<?php

namespace wskm\helper;

class ArrayHelper
{

	public static function number2array($num, $length = 8)
	{
		$num = intval($num);
		$arr = array();
		for ($i = 1; $i <= $length; $i++) {

			$k = pow(2, $i - 1);
			$arr[$i] = ($num & $k) ? 1 : 0;
		}
		return $arr;
	}

	public static function array2number($arr, $length = 8)
	{
		$arr = (array)$arr;
		$num = 0;
		for ($i = 1; $i <= $length; $i++) {
			if (!empty($arr[$i])) {
				$num += pow(2, $i - 1);
			}
		}
		return $num;
	}

}
