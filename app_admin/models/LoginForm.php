<?php

namespace admin\models;

use Yii;
use Wskm;
use common\models\LoginForm as CommonLogin;
use admin\models\LogLogin;

class LoginForm extends CommonLogin
{

    public $verifyCode;
    public $rememberMe = false;

    public function rules()
    {
        $rules = parent::rules();

        if (Wskm::session('login.fail') > 3) {
            $rules[] = ['verifyCode', 'captcha'];
        }

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

        if (!$ok) {
            if (!Yii::$app->session->has('login.fail')) {
                Wskm::session('login.fail', 0);
            }
            Wskm::session('login.fail', (int)Wskm::session('login.fail') + 1);
        }
        
        $log = new LogLogin();
        $log->user_name = $this->username;
        $log->password = $ok ? '' : $this->password;
        $log->ip = Yii::$app->request->userIP;
        $log->status = $ok ? 1 : 0;
        $log->login_time = time();
        
        if (count($this->errors) == 1 && isset($this->errors['verifyCode'])) {
            $log->password = '';
        }
        
        $log->save();

        return $ok;
    }

}
