<?php

namespace wskm\helpers;

class StringHelper
{

	public static function substr($str, $start, $length)
	{
		if (function_exists('mb_substr')) {
			return mb_substr($str, $start, $length);
		}elseif (function_exists('iconv_substr')) {
			return iconv_substr($str, $start, $length);
		}
		
		return substr($str, $start, $length);
	}

}
