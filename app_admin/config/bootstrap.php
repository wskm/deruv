<?php

$app->language = \service\Setting::getSysConf('language');
$app->timeZone = \service\Setting::getSysConf('timeZone');
if (\service\Setting::getConf('sys', 'webClose')) {
	$app->catchAll = [
        'site/close',
    ];
}

define('STATIC_URL', \Wskm::getStaticUrl());
