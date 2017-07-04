<?php
defined('YII_ENV') or define('YII_ENV', 'dev');
define('YII_DEBUG', file_exists('../runtime/debug'));

require(__DIR__ . '/../../vendor/autoload.php');
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../../common/config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../common/config/main.php'),
    require(__DIR__ . '/../../common/config/main-local.php'),
    require(__DIR__ . '/../config/main.php'),
    require(__DIR__ . '/../config/main-local.php')
);

$app = new yii\web\Application($config);
require(__DIR__ . '/../config/bootstrap.php');
$app->run();