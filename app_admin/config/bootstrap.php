<?php

$app->language = \service\Setting::getSysConf('language');
$app->timeZone = \service\Setting::getSysConf('timeZone');

define('IN_ADMIN', true);
define('STATIC_URL', \Wskm::getStaticUrl());
