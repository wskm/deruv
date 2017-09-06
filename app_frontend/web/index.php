<?php

defined('YII_DEBUG') or define('YII_DEBUG', false);
defined('YII_ENV') or define('YII_ENV', 'prod');

require(__DIR__ . '/../../vendor/autoload.php');
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../../common/config/bootstrap.php');

$setting = require(__DIR__ . '/../../common/config/setting.php');
$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../common/config/main.php'),    
    require(__DIR__ . '/../config/main.php')
);

$app = new yii\web\Application($config);
require(__DIR__ . '/../config/bootstrap.php');
$app->run();
