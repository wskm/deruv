<?php

namespace wskm;

use Yii;
use Wskm;
use admin\models\LogLogin;

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
	
	public static function getLastLogin()
	{
		$data = LogLogin::find()->where([
			'user_name' => Wskm::getUser()->username,
		])->orderBy([ 'login_time' => SORT_DESC])->asArray()->limit(2)->all();
		
		array_shift($data);
		return $data ? $data[0] : false;
	}
	
	public static function getOnlineCount()
	{
		$query = new \yii\db\Query();
        return $query->select('COUNT(*)')->from('{{%session}}')
            ->where('[[expire]]>:expire ', [':expire' => time() ])->scalar();
	}

}
