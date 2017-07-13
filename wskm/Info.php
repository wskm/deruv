<?php

namespace wskm;

use Yii;

class Info
{

	public static function getList()
	{
		$info = [
			[
				'name' => 'PHP',
				'value' => phpversion(),
			],
			[
				'name' => 'Mysql',
				'value' => self::mysqlVersion(),
			],
			[
				'name' => 'Memory Usage',
				'value' => Yii::$app->formatter->asShortSize(memory_get_usage()),
			],
			[
				'name' => 'Web Server',
				'value' => $_SERVER['SERVER_SOFTWARE'].' ('.php_sapi_name().')',
			],			
		];

		$info[] = [
			'name' => 'System Version',
			'value' => php_uname(),
		];
		return $info;
	}

	public static function mysqlVersion()
	{
		return Yii::$app->db->createCommand('SELECT VERSION()')
						->queryScalar();
	}

}
