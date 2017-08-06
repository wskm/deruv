<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    //require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php')
    //require(__DIR__ . '/params-local.php')
);

if (!is_array($setting)) {
    $setting = [];
}

if (!isset($setting['frontendTheme'])) {
    $setting['frontendTheme'] = 'default';
}

$config = [
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
            'enableAutoLogin' => false,
            'identityCookie' => ['name' => '_id-dfrontend', 'httpOnly' => true],
        ],
        'session' => [
            'name' => 'deruv-frontend',
        ],
		'errorHandler' => [
            'errorAction' => 'site/error',
        ],		
		'view' => [
            'theme' => [
                'basePath' => '@frontend/themes/'.$setting['frontendTheme'],
                'baseUrl' => '@web/themes/'.$setting['frontendTheme'],
                'pathMap' => [
                    '@frontend/views' => '@frontend/themes/'.$setting['frontendTheme'],
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

if ($setting['frontendTheme'] == 'default') {
    $config['components']['assetManager'] = [
        //'bundles' => require(__DIR__ .DIRECTORY_SEPARATOR .(YII_ENV_PROD ? 'assets-prod.php' : 'assets-dev.php')),
        'bundles' => require(__DIR__ .DIRECTORY_SEPARATOR .'assets-prod.php'),
    ];
}

if ($setting['db']) {
    $config['components']['db'] = $setting['db'];
}

if (isset($setting['frontendRequest']['cookieValidationKey'])) {
    $config['components']['request']['cookieValidationKey'] = $setting['frontendRequest']['cookieValidationKey'];
}

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;