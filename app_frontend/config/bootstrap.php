<?php

define('STATIC_URL', Wskm::getWebUrl());
define('WEB_URL', Wskm::getWebUrl());

if (!is_array($setting) || !$setting['installed']) {
    if (!isset($_COOKIE['install'])) {
        setcookie('install', 1);
        header('Location: index.php?r=install');
        exit();
    }
}else{
    $app->language = \service\Setting::getSysConf('language');
    $app->timeZone = \service\Setting::getSysConf('timeZone');
    if (\service\Setting::getConf('sys', 'webClose')) {
        $app->catchAll = [
            'site/close',
        ];
    }
    
    if (\service\Setting::getConf('sys', 'enablePrettyUrl')) {
        Yii::$app->urlManager->initRules();
    }
}
