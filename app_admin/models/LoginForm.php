<?php
namespace admin\models;

use Yii;
use common\models\LoginForm as CommonLogin;
use admin\models\LogLogin;

class LoginForm extends CommonLogin
{
	public $verifyCode;
	
	public function rules()
    {
		$rules = parent::rules();
        $rules[] = ['verifyCode', 'captcha'];
		
		return $rules;
    }
	
	public function attributeLabels()
    {
		$labels = parent::attributeLabels();
        $labels['verifyCode'] = \Wskm::t('Verify code');
		
		return $labels;
    }
	
	public function login()
    {
		$ok = false;
        if ($this->validate()) {
            $ok = Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
		
		$log = new LogLogin();
		$log->user_name = $this->username;
		$log->password = $ok ? '' : $this->password;
		$log->ip = Yii::$app->request->userIP;
		$log->status = $ok ? 1 : 0;
		$log->login_time = time();
		$log->save();
		
		return $ok;
    }
	
}
