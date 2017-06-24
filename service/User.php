<?php

namespace service;

use Yii;
use common\models\User as UserModel;

class User
{

	public static function getListStatus()
	{
		return [
			UserModel::STATUS_DELETED => \Wskm::t('Status Deleted', 'user'),
			UserModel::STATUS_ACTIVE => \Wskm::t('Status Active', 'user'),
		];
	}

}
