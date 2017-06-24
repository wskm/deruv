<?php

namespace wskm;

class Debug
{

    public static function dump()
	{
		$args = func_get_args();
		foreach ($args as $arg){
			\yii\helpers\VarDumper::dump($arg, 10, true);
		}
	}

}
