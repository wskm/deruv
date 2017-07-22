<?php
$app->language = \service\Setting::getSysConf('language');
$app->timeZone = \service\Setting::getSysConf('timeZone');

define('STATIC_URL', './');

if (\service\Setting::getConf('sys', 'webClose')) {
	$app->catchAll = [
        'site/close',
    ];
}
