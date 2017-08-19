<?php

namespace service;

use Yii;
use Wskm;
use admin\models\LogAction;

class Log
{

	const LEVEL_NORMAL = 0;
	const LEVEL_WARN = 1;
	const LEVEL_DANGER = 2;
	
	const TYPE_CREATE = 'create';
	const TYPE_UPDATE = 'update';
	const TYPE_DELETE = 'delete';
	const TYPE_VIEW = 'view';
	const TYPE_UPLOAD = 'upload';

	public static function getListLevel()
	{
		return [
			\Wskm::t('Normal', 'admin'),
			\Wskm::t('Warn', 'admin'),
			\Wskm::t('Danger', 'admin'),
		];
	}
	
	public static function getListType()
	{
		return [
			'create' => 'create',
			'update' => 'update',
			'delete' => 'delete',
			'view' => 'view',
			'upload' => 'upload',
		];
	}

	public static function action($title, $type, $level = self::LEVEL_NORMAL)
	{
        if (defined('NO_LOG') && NO_LOG) {
            return;
        }
        
		$type = strtolower($type);
		if ($type == self::TYPE_DELETE) {
			$level = self::LEVEL_WARN;
		}

		$log = new LogAction();
		$log->title = Wskm::t($title);
		$log->user_id = Wskm::getUser(false)->id;
		$log->user_name = Wskm::getUser(false)->username;
		$log->url = Yii::$app->request->url;
		$log->type = $type;
		$log->level = $level;
		$log->created_at = time();

		return $log->save();
	}

}
