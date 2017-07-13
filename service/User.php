<?php

namespace service;

use Yii;
use common\models\User as UserModel;

class User
{

	public static function getAvatarDefaultHeight()
	{
		return \service\Setting::getConf('image', 'avatarHeight') > 0 ? 
				(int)\service\Setting::getConf('image', 'avatarHeight') : 100;
	}

}
