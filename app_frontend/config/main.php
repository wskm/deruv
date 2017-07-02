<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
	'language' => 'zh-CN',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-dfrontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_id-dfrontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'deruv-frontend',
        ],
		'errorHandler' => [
            'errorAction' => 'site/error',
        ],
		'assetManager' => [
			//'bundles' => require(__DIR__ .DIRECTORY_SEPARATOR .(YII_ENV_PROD ? 'assets-prod.php' : 'assets-prod.php')),
			'bundles' => require(__DIR__ .DIRECTORY_SEPARATOR .'assets-prod.php'),
        ],
		'view' => [
            'theme' => [
                'basePath' => '@frontend/themes/default',
                'baseUrl' => '@web/themes/default',
                'pathMap' => [
                    '@frontend/views' => '@frontend/themes/default',
                ],
            ],
        ],
		'urlManager' => [
			'class' => 'wskm\web\Url',
        ],
		/*
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 0,
        ],
		 */
        
    ],
    'params' => $params,
];
