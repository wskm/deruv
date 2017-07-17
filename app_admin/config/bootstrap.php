<?php

$app->language = \service\Setting::getSysConf('language');
$app->timeZone = \service\Setting::getSysConf('timeZone');
$app->layout = \service\Setting::getSysConf('adminLayout') ? \service\Setting::getSysConf('adminLayout') : 'main';
define('IN_ADMIN', true);
define('STATIC_URL', \Wskm::getStaticUrl());
